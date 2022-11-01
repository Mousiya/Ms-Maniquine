<div class="container">
	<div class="main-body">
<!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('customer.myorders')}}">My Orders</a></li>
      </ol>
  </nav>
<!-- /Breadcrumb -->
    <div>
      <style>
        nav svg{
          height: 20px;
        }
        nav .hidden{
          display:black !important;
        }
      </style>
    </div>

    <div class="container" style="padding:30px 0;">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              All Orders
            </div>
            <div class="panel-body">
            <div class="table-responsive">
                <table class="table text-nowrap">
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
                        <th>Action</th>
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
                        <td><a class="btn btn-info btn-sm" href="{{route('customer.orderdetails',['order_id'=>$order->id])}}"> Details</a></td>
                      </tr>
                      @endforeach
                      @else
                      <tr><td colspan="11" style=text-align:center >
                        <div class="text-center" style="padding:30px 0;">
                            <h4>You Don't Have any Orders</h4>
                            <h2 >Yet !</h2>
                        </div>
                        </td></tr>
                      @endif
                    </tbody>
                  </table>
                  {{$orders->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>        
  </div>
</div>

