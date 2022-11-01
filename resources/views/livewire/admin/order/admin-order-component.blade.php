<main role="main" class="main-content">
        <style>
          nav svg{
            height: 20px;
          }
          nav .hidden{
            display:black !important;
          }
        </style>
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row">
                <!-- Striped rows -->
                <div class="col-md-12 my-4">
                  <h2 class="h4 mb-1">All Orders </h2>
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
                      <!-- table -->
                      <table class="table table-bordered text-nowrap">
                        <thead>
                          <tr>
                            <th>OrderId</th>
                            <th>Sub Total</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>First Name</th>
                            <th>Last Name</th>
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
                          @if($orders->count()>0)
                          @foreach($orders as $order)
                          <tr>
                            <td>{{$order->id}}</td>
                            <td>${{$order->subtotal}}</td>
                            <td>${{$order->discount}}</td>
                            <td>${{$order->total}}</td>
                            <td>{{$order->firstname}}</td>
                            <td>{{$order->lastname}}</td>
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
                          {{$orders->onEachSide(1)->links()}}
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