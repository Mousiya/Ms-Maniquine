<div>

	<!--<br><br>-->

	<div class="container">
		<div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="customerdashboard">
                <div class="customerdashboard-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if($user->profile->image)
                      <img src="{{asset('assets/images/profiles')}}/{{$user->profile->image}}"  width="150">
                    @else
                      <img src="{{asset('assets/images/profiles/profile.png')}}"  width="150">
                    @endif
                    <div class="mt-3">
                      <h4>Hello {{$user->name}}!</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="customerdashboard mt-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <ul class="list-group profile-nav">
						<li class="list-group-item {{(request()->route()->getName()=='myprofile')?'active':''}}"><a href="{{route('customer.myprofile')}}">My Profile </a></li>
						<li class="list-group-item {{(request()->route()->getName()=='mypayment')?'active':''}}"><a href="{{route('customer.mypayment')}}">My Payment</a></li>
						<li class="list-group-item {{(request()->route()->getName()=='myorders')?'active':''}}"><a href="{{route('customer.myorders')}}">My Orders </a></li>
						<li class="list-group-item {{(request()->route()->getName()=='myreviews')?'active':''}}"><a href="{{route('customer.myreviews')}}">My Reviews</a></li>
						<li class="list-group-item {{(request()->route()->getName()=='mywishlist')?'active':''}}"><a href="{{route('customer.mywishlist')}}">My Wishlist</a></li>
           
						<li class="list-group-item {{(request()->route()->getName()=='Logout')?'active':''}}">
              <a href="{{route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            </li>
              <form id="logout-form" method="POST" action="{{route('logout')}}">
												@csrf																																																															
							</form>
					</ul>
                  </li> 
              </div>
            </div>
            <div class="col-md-8">
              <div class="customerdashboard mb-3">
                <div class="customerdashboard-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile No:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->profile->mobile}}
                    </div>
                  </div>
                  
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$user->profile->address}}
                    </div>
                  </div>
                  <hr>
                  
                </div>
              </div>

              <div class="container" style="padding:30px 0;">
              <div class="row">
                <div class="col-md-8">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      All Orders
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
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
                                <td><a class="btn btn-info btn-sm" href="{{route('customer.orderdetails',['order_id'=>$orders->id])}}">Details</a></td>
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
                          
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>   

            </div>
          </div>

        </div>
    </div>
	
		
	
</div>
