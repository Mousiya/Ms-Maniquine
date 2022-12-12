<main id="main" class="main-site">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><a href="#" class="link">Shop</a></li>
            <li class="item-link"><span>Dress Detail</span></li>
        </ul>
    </div>
    <div class="row">

        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
            <div class="wrap-product-detail">
                <div class="detail-media">
                    <div class="product-gallery">
                      <ul class="slides">
                        <li data-thumb="{{asset('assets/images/dresses')}}/{{$dress->image}}">
                            <img src="{{asset('assets/images/dresses')}}/{{$dress->image}}" alt="{{$dress->name}}" />
                        </li>
                        @php
                            $images = explode(",",$dress->images); 
                        @endphp
                        @foreach($images as $image)
                            @if($image)
                            <li data-thumb="{{asset('assets/images/dresses')}}/{{$image}}" >
                                <img src="{{asset('assets/images/dresses')}}/{{$image}}" alt="{{$dress->name}}" />
                            </li>
                            @endif
                        @endforeach
                      </ul>
                    </div>
                </div>
                <div class="detail-info">
                    <div class="product-rating">
                        <style>
                            .color-gray{
                                color:#e6e6e6 !important;
                            }    
                        </style>
                        @php
                            $avgrating = 0;
                        @endphp
                        @foreach($dress->orderItem->where('rstatus',1) as $orderItem)
                            @php
                                $avgrating = $avgrating + $orderItem->review->rating;
                            @endphp
                        @endforeach
                        @for($i=1;$i<=5;$i++)
                            @if($i<=$avgrating)
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-star color-gray" aria-hidden="true"></i>
                            @endif
                        @endfor
                        <a href="#" class="count-review">({{$dress->orderItem->where('rstatus',1)->count()}} review)</a>
                    </div>
                    <h2 class="product-name">{{$dress->name}}</h2>
                    <div class="short-desc">
                        <ul>
                            {!! $dress->short_description !!}
                        </ul>
                    </div>
                
                    @if($dress->sale_price>0 && $sale->status ==1 && $sale->sale_date > Carbon\Carbon::now())
						<div class="wrap-price">
							<span class="product-price">{{$dress->sale_price}}</span>
							<span class="product-price regprice">{{$dress->regular_price}}</span>
						</div>
					@else
						<div class="wrap-price">
							<span class="product-price">{{$dress->regular_price}}</span>
						</div>
					@endif
                    <div class="stock-info in-stock">
                        <p class="availability">Availability: <b>{{$dress->stock_status}}</b></p>
                    </div>
                    <style>
                        .colorSelectionLabel{
                            color:#000;
                            padding:2px 10px;
                            border:1px solid #000;
                            border-radius:4px;
                            font-size:14px;
                            cursor:pointer;
                        }
                        .colorSelectionlabel:active{
                            background-color:#fff !important;
                            border:2px solid #000;
                        }
                    </style>
                    <div>
                        @if($d_colors)    
                            <div class="row" style="margin-top: 20px ">
                                <div class="col-xs-2">
                                    <p>Colour</p>
                                </div>
                                <div class="col-xs-10">
                                    @foreach($d_colors as $d_color)
                                        <input  type="radio" value="$d_color->color->name" wire:model="sattcolor.{{$d_color->color->code}}" />{{$d_color->color->name}}
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($d_sizes)    
                            <div class="row" style="margin-top: 20px ">
                                <div class="col-xs-2">
                                    <p>Colour</p>
                                </div>
                                <div class="col-xs-10">
                                    @foreach($d_sizes as $d_size)
                                        <input type="radio" class ="btn btn" value="$d_size->size->name"  wire:model="sattsize.{{$d_size->size->name}}"/>{{$d_size->size->name}}
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="quantity">
                        <span>Quantity:</span>
							<div class="quantity-input">
								<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*"  wire:model="qty">	
								<a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity"></a>
								<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
							</div>
					</div>
                    
					<div class="wrap-butons">
            			<div class="wrap-btn">
                            <a href="#" class="btn btn-wishlist">Add Wishlist</a>                                
                        </div>
						<div class="wrap-butons">
                        @if($dress->sale_price>0 && $sale->status ==1 && $sale->sale_date > Carbon\Carbon::now())
                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$dress->id}},'{{$dress->name}}',{{$dress->sale_price}})">Add to Cart</a>
                        @else
                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$dress->id}},'{{$dress->name}}',{{$dress->regular_price}})">Add to Cart</a>
						@endif
							<a href="#" class="btn checkout">Checkout</a>
						</div>
					</div>
                </div>
                <div class="advance-info">
                    <div class="tab-control normal">
                        <a href="#description" class="tab-control-item active">description</a>
                        <a href="#review" class="tab-control-item">Reviews</a>
                    </div>
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="description">
                            {!!$dress->description!!}
                            <img src="{{asset('assets/images/sizechart')}}/{{$dress->sizechart}}" width="1024" height="40"/>
                        </div>
                        <div class="tab-content-item " id="review">
                            
                            <div class="wrap-review-form">
                                <style>
                                    .width-0-percent{
                                        width:0%
                                    }   
                                    .width-20-percent{
                                        width:20%
                                    }   
                                    .width-40-percent{
                                        width:40%
                                    }   
                                    .width-60-percent{
                                        width:60%
                                    }   
                                    .width-80-percent{
                                        width:80%
                                    }  
                                    .width-100-percent{
                                        width:100%
                                    }     
                                </style>
                                
                                <div id="comments">
                                    <h2 class="woocommerce-Reviews-title">{{$dress->orderItem->where('rstatus',1)->count()}} review for <span>{{$dress->name}}</span></h2>
                                    <ol class="commentlist">
                                        @foreach($dress->orderItem->where('rstatus',1) as $orderItem)
                                        <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                            <div id="comment-20" class="comment_container"> 
                                                @if($orderItem->order->user->profile->image)
                                                <img alt="{{$orderItem->order->user->name}}" src="{{asset('assets/images/profiles')}}/{{$orderItem->order->user->profile->image}}"height="80" width="80">
                                                @else
                                                <img alt="" src="{{ asset('assets/images/profiles/profile.png')}}" height="80" width="80">
                                                @endif
                                                <div class="comment-text">
                                                    <div class="star-rating">
                                                        <span class="width-{{ $orderItem->review->rating * 20 }}-percent">Rated <strong class="rating">{{ $orderItem->review->rating}}</strong> out of 5</span>
                                                    </div>
                                                    <p class="meta"> 
                                                        <strong class="woocommerce-review__author">{{$orderItem->order->user->name}}</strong> 
                                                        <span class="woocommerce-review__dash">–</span>
                                                        <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</time>
                                                    </p>
                                                    <div class="description">
                                                        <p>{{$orderItem->review->comment}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ol>
                                </div><!-- #comments -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end main products area-->

        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget mercado-widget widget-product">
                <h2 class="widget-title">Popular Products</h2>
                <div class="widget-content">
                    <ul class="products">
                        
                        @foreach($popular_dresses as $d_dress)
                        <li class="product-item">
                            <div class="product product-widget-style">
                                <div class="thumbnnail">
                                    <a href="{{route('dress.details',['dress_id'=>$d_dress->id])}}" title="{{$d_dress->name}}">
                                        <figure><img src="{{asset('assets/images/dresses')}}/{{$d_dress->image}}" alt="{{$d_dress->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('dress.details',['dress_id'=>$dress->id])}}" class="product-name"><span>{{$d_dress->name}}</span></a>
                                    @if($dress->sale_price>0 && $sale->status ==1 && $sale->sale_date > Carbon\Carbon::now())
									<div class="wrap-price">
									    <span class="product-price">{{$d_dress->sale_price}}</span>
									    <span class="product-price regprice">{{$d_dress->regular_price}}</span>
									</div>
									@else
									<div class="wrap-price">
										<span class="product-price">{{$d_dress->regular_price}}</span>
									</div>
									@endif
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div><!--end sitebar-->

        <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Related Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                        
                        @foreach($related_dresses as $r_dress)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('dress.details',['dress_id'=>$r_dress->id])}}" title="{{$r_dress->name}}">
                                    <figure><img src="{{asset('assets/images/dresses')}}/{{$r_dress->image}}" width="214" height="214" alt="{{$r_dress->name}}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{route('dress.details',['dress_id'=>$r_dress->id])}}" class="product-name"><span>{{$r_dress->name}}</span></a>
                                @if($dress->sale_price>0 && $sale->status ==1 && $sale->sale_date > Carbon\Carbon::now())
								<div class="wrap-price">
				    				<span class="product-price">{{$r_dress->sale_price}}</span>
									<span class="product-price regprice">{{$r_dress->regular_price}}</span>
								</div>
								@else
								<div class="wrap-price">
									<span class="product-price">{{$r_dress->regular_price}}</span>
								</div>
								@endif
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div><!--End wrap-products-->
            </div>
        </div>

    </div><!--end row-->

</div><!--end container-->

</main>