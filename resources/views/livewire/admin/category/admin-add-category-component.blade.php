<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add New Categories</h4>
                    </div>
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
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h3 class="box-title">Fill the Categories Detail</h3>
                                </div>
                                <div class="col-sm-3">
                                    <a class="btn btn-linkedin  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white" href="{{route('admin.categories')}}">
                                    <!--<i class="fa fa-plus-circle" aria-hidden="true"></i>  -->  
                                    All Categaries</a>
                                </div>
                            </div>      
                            <!--<div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-material">
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Category Name</label>
                                            <div class="col-md-12  p-0">
                                                <input type="text" placeholder="Johnathan Doe"
                                                    class="form-control p-0 border-1"> </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Category Name</label>
                                            <div class="col-md-12  p-0">
                                                <input type="text" placeholder="Johnathan Doe"
                                                    class="form-control p-0 border-1"> </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="example-email" class="col-md-12 p-0">Slug</label>
                                            <div class="col-md-12 p-0">
                                                <input type="email" placeholder="johnathan@admin.com"
                                                    class="form-control p-0 " name="example-email"
                                                    id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Password</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="password" value="password" class="form-control p-0 border-0">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Phone No</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder="123 456 7890"
                                                    class="form-control p-0 border-0">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Message</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <textarea rows="5" class="form-control p-0 border-0"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-sm-12">Select Country</label>

                                            <div class="col-sm-12 border-bottom">
                                                <select class="form-select shadow-none p-0 border-0 form-control-line">
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>Usa</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>-->
                            <div class="card">
                                <div class="card-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                    <form enctype="multipart/form-data" wire:submit.prevent="addCategory">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Category Name</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="category" wire:model="name" wire:keyup="generateSlug">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Slug</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="category-slug" wire:model="slug">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" placeholder="category description" wire:model="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                            
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="dress" wire:model="status"> Dress</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" value="work" wire:model="status"> Work </label>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="categoryImage" class="col-sm-3 col-form-label" >Category Image</label>
                                            <div class="col-sm-5">
                                            <input type="file" class="input-file" wire:model="image" />
                                                @if($image)
                                                    <img src="{{$image->temporaryUrl()}}" width="120" height="40"/>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-dark">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
    </div>
