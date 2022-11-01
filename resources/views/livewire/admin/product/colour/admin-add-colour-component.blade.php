<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add New Colour</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="/" class="fw-normal">/ Dashboard</a> 
                                    <a href="{{route('admin.products')}}" class="fw-normal"> /Products </a>
                                    <a href="#" class="fw-normal">/ Add New Colour</a>
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
                                    <h3 class="box-title">Fill the colour Details</h3>
                                </div>
                                <div class="col-sm-3">
                                    <a class="btn btn-linkedin  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white" href="{{route('admin.colours')}}">
                                    <!--<i class="fa fa-plus-circle" aria-hidden="true"></i>  -->  
                                    All Colour</a>
                                </div>
                            </div>      
                            
                            <div class="card">
                                <div class="card-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                    <!-- error messages --> 
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form enctype="multipart/form-data" wire:submit.prevent="addColour">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Colour</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="colour" wire:model="name">
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Colour Code</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="colour code" wire:model="code">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" wire:model="status" checked>Checked=Hidden,UnChecked=Visible
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
