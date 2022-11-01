<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">All Coupons</h2>
                <div class="card shadow">
                <div class="card-body">
                    <div class="toolbar row mb-3">
                    <div class="col">
                        <form class="form-inline">
                        <div class="form-row">
                            <div class="form-group col-auto">
                            <label for="search" class="sr-only" >Search</label>
                            <input type="text" class="form-control" id="search" value="" placeholder="Search..." wire:model="searchTerm">
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col ml-auto">
                        <div class="dropdown float-right">
                        <a class="btn btn-primary float-right ml-3" href="{{route('admin.addcoupon')}}">Add more +</a>
                        <button wire:click.prevent="deleteSelected" class="btn btn-secondary" onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" >Delete</button>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
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
                    <!-- table -->
                    <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="chkCheckAll" wire:model="selectAll" />
                            <label class="custom-control-label" for="chkCheckAll"></label>
                            </div>
                        </th>
                        <th>Coupon Code</th>
                        <th>Coupon type</th>
                        <th>Coupon value</th>
                        <th>Cart Value</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=0;
                        @endphp
                        @if($coupons->count()>0)
                        @foreach($coupons as $coupon)
                        <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{$coupon->id}}" wire:model="selectedCoupons" value="{{$coupon->id}}">
                            <label class="custom-control-label" for="{{$coupon->id}}"></label>
                            </div>
                        </td>
                        <td>{{$coupon->code}}</td>
                        <td>{{$coupon->type}}</td>
                        @if($coupon->type == 'fixed')
                            <td>${{$coupon->value}}</td>
                        @else
                        <td>{{$coupon->value}} %</td>
                        @endif
                        <td>{{$coupon->cart_value}}</td>
                        <td>{{$coupon->expiry_date}}</td>
                        <td>
                            <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}">
                            <i class="fe fe-16 fe-edit"></i></a>
                            <a href="#" onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent="deletecoupon({{$coupon->id}})" style="margin-left:10px;">
                            <i class="fe fe-16 fe-trash-2"></i> </a>
                        </td>
                        </tr>
                        @endforeach
                        @else
                        <tr><td colspan="7" style=text-align:center >No coupon found</td></tr>
                        @endif
                    </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                    <ul class="pagination justify-content-end mb-0">
                        {{$coupons->onEachSide(1)->links()}}
                    </ul>
                    </nav>
                </div>
                </div>
                </div>
            </div> <!-- simple table -->
            </div> <!-- end section -->
        </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>
