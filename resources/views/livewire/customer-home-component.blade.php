<main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					@foreach($sliders as $slide)
					<div class="item-slide">
						<img src="{{asset('assets/images/home_sliders')}}/{{$slide->image}}" alt="" class="img-slide">
						<div class="slide-info slide-1">
							<h2 class="f-title"><b><i>{!!$slide->title!!}</i></b></h2>
							<p><span class="subtitle">{!!$slide->subtitle!!}</span></p>
							@if($slide->price)
							<p class="sale-info">Only price: <span class="price">{{$slide->price}}</span></p>
							@endif
							<a href="{{$slide->link}}" class="btn-link">Shop Now</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			
			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="assets/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="assets/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>
			<!--On Sale-->
			@if($ddresses->count()>0 && $sale->status ==1 && $sale->sale_date > Carbon\Carbon::now())
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">Discount </h3>
				<div class="wrap-countdown mercado-countdown" data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
					@foreach($ddresses as $ddress)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{route('dress.details',['dress_id'=>$ddress->id])}}" title="{{$ddress->name}}">
								<figure><img src="{{asset('assets/images/dresses')}}/{{$ddress->image}}" width="300" height="300" alt="{{$ddress->name}}"></figure>
							</a>
							<div class="group-flash">
								<span class="flash-item sale-label">sale</span>
							</div>
						</div>
						<div class="product-info">
							<a href="#" class="product-name"><span>{{$ddress->name}}</span></a>
							<div class="wrap-price"><ins><p class="product-price">{{$ddress->sale_price}}</p></ins> <del><span class="product-price regprice">{{$ddress->regular_price}}</span></del></div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif	
			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
									@foreach($dresses as $ldress)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{route('dress.details',['dress_id'=>$ldress->id])}}" title="{{$ldress->name}}">
											<figure><img src="{{asset('assets/images/dresses')}}/{{$ldress->image}}" width="300" height="300" alt="{{$ldress->name}}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$ldress->name}}</span></a>
											@if($ldress->sale_price>0)
											<div class="wrap-price">
												<span class="product-price">{{$ldress->sale_price}}</span>
												<span class="product-price regprice">{{$ldress->regular_price}}</span>
											</div>
											@else
											<div class="wrap-price">
												<span class="product-price">{{$ldress->regular_price}}</span>
											</div>
											@endif
										</div>
									</div>
									@endforeach
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Categories</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">
							@foreach($categories as $key=>$category)
							<a href="#category_{{$category->id}}" class="tab-control-item {{$key==0 ? 'active':''}}">{{$category->name}}</a>
							@endforeach
						</div>
						<div class="tab-contents">	
							@foreach($categories as $key=>$category)						
							<div class="tab-content-item {{$key==0 ? 'active':''}}" id="category_{{$category->id}}">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
								
									@php
										$c_dresses = DB::table('dress_categories')
										->join('dresses','dress_categories.dress_id','=','dresses.id')
										->join('categories','dress_categories.category_id','=','categories.id')
										->select('dresses.name','dresses.regular_price','dresses.sale_price','dresses.image','categories.id')
										->where('dress_categories.category_id',$category->id)->get()->take($no_of_dresses);
									@endphp

									@foreach($c_dresses as $key=>$c_dress)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{route('dress.details',['dress_id'=>$c_dress->id])}}" title="{{$c_dress->name}}">
											<figure><img src="{{asset('assets/images/dresses')}}/{{$c_dress->image}}" width="214" height="214" alt="{{$c_dress->name}}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{$c_dress->name}}</span></a>
											@if($c_dress->sale_price>0)
											<div class="wrap-price">
												<span class="product-price">{{$c_dress->sale_price}}</span>
												<span class="product-price regprice">{{$c_dress->regular_price}}</span>
											</div>
											@else
											<div class="wrap-price">
												<span class="product-price">{{$c_dress->regular_price}}</span>
											</div>
											@endif
										</div>
									</div>
									@endforeach
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
</main>

