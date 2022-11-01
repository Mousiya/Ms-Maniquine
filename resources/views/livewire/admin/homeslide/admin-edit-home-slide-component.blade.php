<main role="main" class="main-content">
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h3 class="page-title">Edit Slider</h3>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li><a href="/" class="fw-normal">/ Dashboard</a> 
                                <a href="{{route('admin.homesliders')}}" class="fw-normal"> / Home Slider </a>
                                <a href="#" class="fw-normal">/ Edit Slider</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="card shadow mb-4">
                     
                    <div class="card-header">
                      <strong class="card-title">Slider details</strong>
                    </div>
                    <div class="card-body">
                      <form enctype="multipart/form-data" wire:submit.prevent="updateSlide">   
                          <div class="row">
                          <div class="col-md-12 ">
                              
                              <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <div wire:ignore>
                                    <textarea class="form-control" id="title" wire:model="title"></textarea>
                                    </div> 
                                  @error('title')<p class="text-danger">{{$message}}</p>@enderror
                              </div>
                              <div class="form-group mb-3">
                                  <label for="subtitle">Sub Title</label>
                                  <div wire:ignore>
                                  <textarea class="form-control" id="subtitle" wire:model="subtitle"></textarea>
                                  </div> 
                                  @error('subtitle')<p class="text-danger">{{$message}}</p>@enderror
                              </div>
                              <div class="form-group mb-3">
                                  <label for="link">Link</label>
                                  <input type="text" id="link" class="form-control" placeholder="Link" wire:model="link">
                                  @error('link')<p class="text-danger">{{$message}}</p>@enderror
                              </div>
                              <div class="form-group mb-3">
                                  <label for="price">Price</label>
                                  <input type="text" id="price" class="form-control" placeholder="Price" wire:model="price">
                              </div>
                              <div class="form-group mb-3">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                    <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="0" wire:model="status">Inactive</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="1" wire:model="status">Active </label>
                                        </div>
                                    </div>
                                    </div>
                                    @error('status')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="form-group mb-3">
                                <label for="Sliderimage">Image</label>
                                <input type="file" id="Sliderimage" class="form-control-file" wire:model="newimage">
                                @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                                @else
                                    <img src="{{asset('assets/images/home_sliders')}}/{{$image}}" width="120"/>
                                @endif
                                @error('image')<p class="text-danger">{{$message}}</p>@enderror
                              </div>
                          </div> <!-- /.col -->
                          </div>
                          @if(Session::has('message'))
                          <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                          @endif
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </from>
                      <a class="btn btn-secondary" href="{{route('admin.homesliders')}}"> 
                          All Sliders</a>
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main>
@push('scripts')
<script>
    $(function(e){
      $('#subtitle').summernote({
        placeholder: 'Enter subtitle',
        tabsize: 2,
        height: 100,
        
        callbacks: {
          onChange: function(contents, $editable) {
            @this.set('subtitle',contents);
          }
        }
      });
    });
    
    $(function(){
    $('#title').summernote({
        placeholder: 'Enter title',
        tabsize: 2,
        height: 100,
        
        callbacks: {
          onChange: function(contents, $editable) {
            @this.set('title',contents);
          }
        }
      });
    });
</script>
@endpush