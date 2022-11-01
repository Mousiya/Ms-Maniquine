<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-0">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3 text-center">
                    <span class="circle circle-sm bg-primary">
                      <i class="fe fe-16 fe-filter text-white mb-0"></i>
                    </span>
                  </div>
                  <div class="col">
                    <p class="small text-muted mb-0">Total sales</p>
                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">
                        <span class="h3 mr-2 mb-0">${{$totalSales}}</span>
                      </div>
                      <div class="col-md-12 col-lg">
                        <div class="progress progress-sm mt-2" style="height:3px">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-0">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3 text-center">
                    <span class="circle circle-sm bg-primary">
                      <i class="fe fe-16 fe-dollar-sign text-white mb-0"></i>
                    </span>
                  </div>
                  <div class="col">
                    <p class="small text-muted mb-0">Total Revenue</p>
                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">
                        <span class="h3 mr-2 mb-0">${{$totalRevenue}}</span>
                      </div>
                      <div class="col-md-12 col-lg">
                        <div class="progress progress-sm mt-2" style="height:3px">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-0">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3 text-center">
                    <span class="circle circle-sm bg-primary">
                      <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                    </span>
                  </div>
                  <div class="col">
                    <p class="small text-muted mb-0">Today sales</p>
                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">
                        <span class="h3 mr-2 mb-0">${{$todaySales}}</span>
                      </div>
                      <div class="col-md-12 col-lg">
                        <div class="progress progress-sm mt-2" style="height:3px">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-0">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3 text-center">
                    <span class="circle circle-sm bg-primary">
                      <i class="fe fe-16 fe-dollar-sign text-white mb-0"></i>
                    </span>
                  </div>
                  <div class="col">
                    <p class="small text-muted mb-0">Today Revenue</p>
                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">
                        <span class="h3 mr-2 mb-0">${{$todayRevenue}}</span>
                      </div>
                      <div class="col-md-12 col-lg">
                        <div class="progress progress-sm mt-2" style="height:3px">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div> <!-- end section -->
        <div class="row">
          <!-- Recent orders -->
          <div class="col-md-12">
            <h6 class="mb-3">Last orders</h6>
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
                      @if(Session::has('order_message'))
                        <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                      @endif
                      <table class="table table-bordered text-nowrap">
                        <thead>
                          <tr>
                            <th>OrderId</th>
                            <th>Sub Total</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>First Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th colspan="2" class="text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $no=0;
                          @endphp
                          @if($orderdetail->count()>0)
                          @foreach($orderdetail as $order)
                          <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->subtotal}}</td>
                            <td>{{$order->discount}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->firstname}}</td>
                            <td>{{$order->mobile}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>

                            <td><a class="btn btn-info btn-sm" href="{{route('admin.orderdetail',['order_id'=>$order->id])}}"> Details</a></td>
                            <td>
                              <div class="dropdown">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                  <span class="caret"></span><button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                      <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'ready_to_shipped')">Ready To Shipped</a></li>
                                      <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'shipped')">Shipped</a></li>
                                      <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Cancelled</a></li>
                                    </ul>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                          @else
                          <tr><td colspan="11" style=text-align:center >
                            <div class="text-center" style="padding:30px 0;">
                            <figure><center><img src="{{asset('admin\assets\images\noresult.jpeg')}}" alt="" width="250" height="250"></center></figure>
                                <h4>You Don't Have any Orders</h4>
                                <h2 >Yet !</h2>
                            </div>
                            </td></tr>
                          @endif
                        </tbody>
                      </table>
                      <nav aria-label="Table Paging" class="mb-0 text-muted">
                        <ul class="pagination justify-content-end mb-0">
                          {{$orderdetail->onEachSide(1)->links()}}
                        </ul>
                      </nav>
                    </div>
                    </div>
                  </div>
          </div> <!-- / .col-md-3 -->
        </div> <!-- end section -->
      </div>
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->