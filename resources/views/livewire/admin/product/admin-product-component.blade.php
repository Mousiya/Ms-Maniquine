<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Product</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">/ Dashboard / Product</a></li>
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
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h3 class="box-title">All Products</h3>
                                </div>
                                <div class="col-sm-3">
                                    <a class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white" href="#">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>    
                                    Add New Products</a>
                                </div>
                            </div>
                            <!--<p class="text-muted">Add class <code>.table</code></p>-->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Product Name</th>
                                            <th class="border-top-0">Stock</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dresses as $dress)
                                        <tr>
                                            <td>{{$dress->id}}</td>
                                            <td><img src="{{asset('assets/images/products')}}/{{$dress->name}}" width="60"/></td>
                                            <td>{{$dress->name}}</td>
                                            <td>{{$dress->stock_status}}</td>
                                            <td>{{$dress->reqular_price}}</td>
                                            <td>{{$dress->category->name}}</td>
                                            <td>{{$dress->created_at}}</td>
                                            <!--<td>{{$dress->short_description}}</td>
                                            <td>{{$dress->description}}</td>
                                            <td>{{$dress->sale_price}}</td>
                                            <td>{{$dress->SKU}}</td>
                                            <td>{{$dress->featured}}</td>
                                            <td>{{$dress->quantity}}</td>
                                            <td>{{$dress->likes}}</td>
                                            <td>{{$dress->image}}</td>
                                            <td>{{$dress->images}}</td>
                                            <td>{{$dress->images}}</td>
                                            <td>{{$dress->slug}}</td>-->
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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