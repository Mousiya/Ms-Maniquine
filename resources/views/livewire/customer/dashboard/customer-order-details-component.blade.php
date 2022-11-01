<div>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<main role="main" class="main-content">
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h3 class="page-title">Order Details</h3>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li><a href="/" class="fw-normal">/ Dashboard</a> 
                                <a href="{{route('admin.categories')}}" class="fw-normal"> / All Orders </a>
                                <a href="#" class="fw-normal">/ Order Details</a>
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <div class="panel panel-default">
                            <div class="panel-bady">
                                <table class="table">
                                    <tr>
                                        <th>Order Id</th>
                                        <td>{{$order->id}}</td>
                                        <th>Order Date</th>
                                        <td>{{$order->created_at}}</td>
                                        <th>Status</th>
                                        <td>{{$order->status}}</td>
                                        @if($order->status=="delivered")
                                        <th>Delivery Date</th>
                                        <td>{{$order->delivered_date}}</td>
                                        @elseif($order->status=="delivered")
                                        <th>Cancellation Date</th>
                                        <td>{{$order->canceled_date}}</td>
                                        @endif
                                </table>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header">
                    <strong class="card-title">Ordered Item(s)</strong>
                    </div>
                    <div class="card-body"> 
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach($order->orderDetail as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{asset('assets/images/dresses')}}/{{$item->dress->image}}"alt="{{$item->dress->name}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('dress.details',['dress_id'=>$item->dress->id])}}">{{$item->dress->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">{{$item->price}}</p></div>
                                    <div class="quantity">
                                        <h5>{{$item->quantity}}</h5>
                                    </div>
                                    <div class="price-field sub-total"><p class="price">${{$item->price * $item->quantity}}</p></div>
                                </li>
                                @endforeach												
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Order Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{$order->subtotal}}</b></p>
                                <p class="summary-info"><span class="title">Discount</span><b class="index">- ${{$order->discount}}</b></p>
                                <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">${{$order->total}}</b></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .card -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                    <strong class="card-title">Billing Details</strong>
                    </div>
                    <div class="card-body"> 
                        <div class="panel panel-default">
                            <div class="panel-">
                            <div class="panel-bady">
                                <div class="table">
                                    <table>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{$order->firstname}}</td>
                                        <th>Last Name</th>
                                        <td>{{$order->lastname}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$order->mobile}}</td>
                                        <th>Email</th>
                                        <td>{{$order->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            <div>{{$order->line1}},</div>
                                            <div>{{$order->line2}},</div>
                                            <div>{{$order->city}}.</div>
                                        </td>
                                        <th>Province</th>
                                        <td>{{$order->province}}</td>
                                    </tr>
                                    </table>
                                </div>
                                </div>
                        </div>
                    </div>
                </div> <!-- / .card -->
                @if($order->is_shipping_different)
                <div class="card shadow mb-4">
                    <div class="card-header">
                    <strong class="card-title">Shipping Details</strong>
                    </div>
                    <div class="card-body"> 
                        <div class="panel panel-default">
                            <div class="panel-bady">
                                <div class="table">
                                    <table>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{$order->shipping->firstname}}</td>
                                        <th>Last Name</th>
                                        <td>{{$order->shipping->lastname}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$order->shipping->mobile}}</td>
                                        <th>Email</th>
                                        <td>{{$order->shipping->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>
                                            <div>{{$order->shipping->line1}},</div>
                                            <div>{{$order->shipping->line2}},</div>
                                            <div>{{$order->shipping->city}}.</div>
                                        </td>
                                        <th>Province</th>
                                        <td>{{$order->shipping->province}}</td>
                                    </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .card -->
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header">
                    <strong class="card-title">Transaction</strong>
                    </div>
                    <div class="card-body"> 
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{$order->transaction->mode}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$order->transaction->status}}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{$order->transaction->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div> <!-- / .card -->

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main>
</div>
