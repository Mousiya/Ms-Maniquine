<main role="main" class="main-content">
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h3 class="page-title">Manage Home Categories</h3>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="/" class="fw-normal">/ Dashboard</a> 
                                    <a href="#" class="fw-normal">/ Home Categories</a>
                                </li>
                            </ol>
                        </div>
                </div>
                
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Home Category details</strong>
                </div>
                
                <div class="card-body">
                   
                <form enctype="multipart/form-data" wire:submit.prevent="updateHomeCategory">
                @csrf           
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" >DressCategory</label>
                            <div class="col-sm-8" wire:ignore>
                            <select class="select_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                            </div>
                            @error('selected_categories')<p class="text-danger">{{$message}}</p>@enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="count">No of Dresses</label>
                            <input type="text" id="count" class="form-control" placeholder="no-of-dresses" wire:model="numberofdresses">
                            @error('numberofdresses')<p class="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div> <!-- /.col -->
                    </div>
                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
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
                    @endif   -->  
                    <button type="submit" class="btn btn-primary">Add</button>
                </from>
                <a class="btn btn-secondary" href="{{route('admin.categories')}}"> 
                    All Categaries</a>
                </div>
              </div> <!-- / .card -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main>
@push('scripts')
    <script src="{{asset('admin/js/select2.min.js')}}"></script>
        <script>
            $(document).ready(function(){
            $('.select_categories').select2({
                multiple: true,
                theme: 'bootstrap4',
            });
            $('.select_categories').on('change',function(e){
            var data =  $('.select_categories').select2("val");
            @this.set('selected_categories', data);
            });
            });
        </script>
@endpush
