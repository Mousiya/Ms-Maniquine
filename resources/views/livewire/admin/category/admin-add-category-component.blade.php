<main role="main" class="main-content">
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h3 class="page-title">Add Categories</h3>
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <div class="d-md-flex">
                          <ol class="breadcrumb ms-auto">
                              <li><a href="/" class="fw-normal">/ Dashboard</a> 
                                  <a href="{{route('admin.categories')}}" class="fw-normal"> / Categories </a>
                                  <a href="#" class="fw-normal">/ Add New Categories</a>
                              </li>
                          </ol>
                      </div>
              </div>
                
              <div class="card shadow mb-4">
                
                <div class="card-header">
                  <strong class="card-title">Category details</strong>
                </div>
                <div class="card-body">
                  <!-- error messages --> 
                  <!--@if ($errors->any())
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div>
                  @endif  -->      
                  <form enctype="multipart/form-data" wire:submit.prevent="addCategory">
                      @csrf           
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Category Name</label>
                                <input type="text" id="simpleinput" class="form-control" placeholder="category" wire:model="name">
                                @error('name')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                            <div class="form-group mb-3">
                              <label for="example-fileinput">Category Image</label>
                              <input type="file" id="example-fileinput" class="form-control-file" wire:model="image">
                                @if($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120" height="40"/>
                                @endif
                                @error('image')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                        </div> <!-- /.col -->
                      </div>
                      @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                      @endif
                      <button type="submit" class="btn btn-primary">Add</button>
                  </from>
                  <a class="btn btn-secondary" href="{{route('admin.categories')}}">All Categaries</a>
                </div>
              </div> <!-- / .card -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main>

