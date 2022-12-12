<main role="main" class="main-content">
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Edit Dresses</h2>
              
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ms-auto">
                        <li><a href="/" class="fw-normal">/ Dashboard</a> 
                            <a href="{{route('admin.products')}}" class="fw-normal"> / Dresses </a>
                            <a href="#" class="fw-normal">/ Edit Dress</a>
                        </li>
                    </ol>
                </div>
              </div>
              
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Dress details</strong>
                </div>
                <div class="card-body"> 
                  <form enctype="multipart/form-data" wire:submit.prevent="updateProduct">          
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Name</label>
                                <input type="text" id="simpleinput" class="form-control" placeholder="dress name" wire:model="name">
                                @error('name')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-form-label" >Dress Categories</label>
                                <div  wire:ignore>
                                <select class="select_dress_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                </select>
                                </div>
                                @error('selected_categories')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="form-group mb-3">
                                  <label for="short_description">Short Discription</label>
                                  <div wire:ignore>
                                  <textarea class="form-control" id="short_description" wire:model="short_description"></textarea>
                                  </div> 
                                @error('short_description')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <div wire:ignore>
                                <textarea class="form-control" id="description" wire:model="description"></textarea>
                                </div> 
                                @error('description')<p class="text-danger">{{$message}}</p>@enderror
                            </div>    
                            <div class="form-group mb-3">                 
                              <div class="row">
                                <div class="col-sm-6">
                                  <label for="regprice">Regular Price</label>
                                  <input type="text" class="form-control" id="regprice" placeholder="Regular price" wire:model="regular_price">
                                  @error('regular_price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-sm-6">
                                  <label for="saleprice">Sale Price</label>
                                  <input type="text" class="form-control" id="saleprice" placeholder="Sale price" wire:model="sale_price">
                                </div>
                              </div>
                            </div>
                            <div class="form-group mb-3"> 
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="dress-image">Dress Image</label>
                                  <input type="file" id="dress-image" class="form-control-file" wire:model="newimage">
                                    @if($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120"/>
                                        @else
                                        <img src="{{asset('assets/images/dresses')}}/{{$image}}" width="120"/>
                                    @endif
                                    @error('newimage')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="col-sm-8">
                                  <label for="image-gallery">Dress Gallery</label>
                                  <input type="file" id="image-gallery" class="form-control-file" wire:model="newimages" multiple>
                                    @if($newimages)
                                    @foreach($newimages as $newimage)
                                        @if($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120" height="40"/>
                                        @endif
                                    @endforeach
                                    @else
                                    @foreach($images as $image)
                                        @if($image)
                                        <img src="{{asset('assets/images/dresses')}}/{{$image}}" width="120" height="40"/>
                                        @endif
                                    @endforeach
                                    @endif
                                </div>
                              </div>
                            </div>
                            <div class="form-group mb-3">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="size-chart">Size Chart</label>
                                  <input type="file" id="size-chart" class="form-control-file" wire:model="newsizechart">
                                    @if($newsizechart)
                                        <img src="{{$newsizechart->temporaryUrl()}}" width="120"/>
                                        @else
                                        <img src="{{asset('assets/images/sizechart')}}/{{$sizechart}}" width="120"/>
                                    @endif
                                    @error('newsizechart')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="form-group col-sm-8">
                                  <label class="col-sm-3 col-form-label">Stock Status</label>
                                  <div class="col-sm-9">
                                    <div class="row">
                                    <div class="col-sm-5">
                                      <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="instock" wire:model="stock_status">In stock</label>
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="outofstock" wire:model="stock_status">Out Of Stock </label>
                                      </div>
                                    </div>
                                  </div>
                                  @error('stock_status')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                              </div>
                            </div>

                            <div class="card shadow mb-4 col-12">
                                <div class="card-header">
                                  <strong class="card-title">Attributes</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-3"><label class="col-form-label" >Colour</label><a class="btn btn-info btn-sm float-right ml-3" href="{{route('admin.colours')}}">Add +</a></div>
                                      <div class="col-md-3"><label class="col-form-label" >Size</label><a class="btn btn-info btn-sm float-right ml-3" href="{{route('admin.sizes')}}">Add +</a></div>
                                      <div class="col-md-3"><label class="col-form-label" >Quantity</label></div>
                                      <div class="col-md-3"><button type="button" class="clone_select2 btn btn-info btn-sm" wire:click.prevent="add">+ Add new</button></div>
                                    </div>
                                    @foreach($dress_sizes as $key=>$attribute)
                                    <table>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div  wire:ignore>
                                        <select class="form-control"  wire:model="dress_sizes.{{$key}}.color_id">
                                          <option>-- select colour --</option>
                                          @foreach($colors as $color)
                                              <option value="{{$color->id}}">{{$color->name}}</option>
                                          @endforeach
                                        </select>
                                        </div>
                                        @error('dress_sizes.'.$key.'.color_id')<p class="text-danger">{{$message}}</p>@enderror
                                      </div>
                                      <div class="col-md-3">
                                        <div  wire:ignore>
                                        <select class="form-control"  wire:model="dress_sizes.{{$key}}.size_id">
                                          <option>-- select size --</option>
                                          @foreach($sizes as $size)
                                              <option value="{{$size->id}}">{{$size->name}}</option>
                                          @endforeach
                                        </select>
                                        </div>
                                        @error('dress_sizes.'.$key.'.color_id')<p class="text-danger">{{$message}}</p>@enderror
                                      </div>
                                      <div class="col-md-3">
                                        <input type="number" class="form-control" placeholder="quantity" wire:model="dress_sizes.{{$key}}.qty">
                                        @error('dress_sizes.'.$key.'.qty')<p class="text-danger">{{$message}}</p>@enderror
                                      </div>
                                      <div class="col-md-3">
                                        <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                                      </div>
                                    </div>
                                    </table>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                      </div>
                      @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                      @endif</div>
                      <button type="submit" class="btn btn-primary">Update</button>

                  </from>
                  <a class="btn btn-secondary" href="{{route('admin.products')}}">All Dresses</a>
                </div>
              </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
</div> <!-- .container-fluid -->
</main>

@push('scripts')

<script>
    $(function(e){
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
    });
</script>
<script>
    $(function(e){
      $('#short_description').summernote({
        placeholder: 'Enter Short Description',
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
            @this.set('short_description',contents);
          }
        }
      });
    });
</script>

<script src="{{asset('admin/js/select2.min.js')}}"></script>
<script>
        $(document).ready(function(){
        $('.select_dress_categories').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.select_dress_categories').on('change',function(e){
        var data =  $('.select_dress_categories').select2("val");
        @this.set('selected_categories', data);
        });
        });
</script>   
@endpush