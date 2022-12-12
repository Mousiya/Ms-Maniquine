<main role="main" class="main-content">
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h3 class="page-title">Add Works</h3>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="/" class="fw-normal">/ Dashboard</a> 
                        <a href="{{route('admin.ourworks')}}" class="fw-normal"> / Works </a>
                        <a href="#" class="fw-normal">/ Add New work</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="card shadow mb-4">
              
            <div class="card-header">
              <strong class="card-title">Work details</strong>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" wire:submit.prevent="addWork">   
                  <div class="row">
                  <div class="col-md-12 ">
                        <div class="form-group mb-3">
                            <label for="simpleinput">Name</label>
                            <input type="text" id="simpleinput" class="form-control" placeholder="work" wire:model="name">
                            @error('name')<p class="text-danger">{{$message}}</p>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Discription</label>
                            <div wire:ignore>
                            <textarea class="form-control" id="description" style="min-height:100px;" placeholder="work description" wire:model="description"></textarea>
                            </div> 
                            @error('description')<p class="text-danger">{{$message}}</p>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="example-fileinput">Image</label>
                            <input type="file" id="example-fileinput" class="form-control-file" wire:model="image">
                            @if($image)
                                <img src="{{$image->temporaryUrl()}}" width="120" height="40"/>
                            @endif
                            @error('image')<p class="text-danger">{{$message}}</p>@enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image-gallery">Gallery</label>
                            <input type="file" id="image-gallery" class="form-control-file" wire:model="images" multiple>
                                @if($images)
                                @foreach($images as $image)
                                    <img src="{{$image->temporaryUrl()}}" width="120" height="40"/>
                                @endforeach
                                @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="image-gallery">Work Category</label>
                            <select class="form-control mb-3"  wire:model="category_id">
                                <option>-- select colour --</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')<p class="text-danger">{{$message}}</p>@enderror
                        </div>

                  </div> <!-- /.col -->
                  </div>
                  @if(Session::has('message'))
                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                  @endif
                  <button type="submit" class="btn btn-primary">Add</button>
              </from>
              <a class="btn btn-secondary" href="{{route('admin.ourworks')}}"> 
                  All Works</a>
            </div>
        </div> <!-- / .card -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->
</main>
@push('scripts')
<script>
      $('#description').summernote({
        placeholder: 'Enter Description',
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        
        callbacks: {
          onChange: function(contents, $editable) {
            @this.set('description',contents);
          }
        }

      });
</script>
@endpush
