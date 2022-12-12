<div class="container">
    <div class="main-body">
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb ms-auto">
                <li><a href="/" class="fw-normal">/ Dashboard</a> 
                    <a href="{{route('customer.myorders')}}" class="fw-normal"> / All Orders </a>
                    <a href="#" class="fw-normal">/ Order Details</a>
                </li>
            </ol>
        </nav>
        <div class="container" Style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    Ordered Item(s)
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('customer.myorders')}}" class="btn btn-success pull-right">My Orders</a>
                                    @if($order->status=='ordered')
                                        <a href="#" wire:click.prevent="cancelOrder" style="margin-right:20px" class="btn btn-warning pull-right">Cancel Order</a>
                                    @endif
                                </div>
                            </div>
                        </div>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ordered Item(s)
                        </div>
                        <div class="panel-bady">
                            <div class="wrap-item-in-cart">
                                <h4 class="mb-3 box-title">Products Name</h4>
                                <ul class="products-cart" Style="margin-right:10px;">
                                    @foreach($order->orderDetail as $item)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{asset('assets/images/dresses')}}/{{$item->dress->image}}"alt="{{$item->dress->name}}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{route('dress.details',['dress_id'=>$item->dress->id])}}">{{$item->dress->name}}</a>
                                        </div>
                                        <div class="price-field product-price">
                                            <p class="price">{{$item->price}}</p>
                                        </div>
                                        <div class="quantity">
                                            <h5>{{$item->quantity}}</h5>
                                        </div>
                                        <div class="price-field sub-total">
                                            <p class="price">${{$item->price * $item->quantity}}</p>
                                        </div>
                                        @if($order->status=='delivered' && $item->rstatus==false)
                                            <div class="price-field sub-total">
                                                <p class="price"><a href="{{route('customer.myreviews',['order_item_id'=>$item->id])}}">Write Review</a></p>
                                            </div>
                                        @endif
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Billing Details
                        </div>
                        <div class="panel-bady">
                            <table class="table">
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
                
            @if($order->is_shipping_different)
            <div class="row">
                <div class="col-md-12"> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shipping Details
                        </div>
                        <div class="panel-bady">
                            <table class="table">
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
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transaction
                        </div>
                        <div class="panel-body"> 
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
                </div>
            </div>  
        </div>
    </div> 
</div> <!-- .container-fluid -->

