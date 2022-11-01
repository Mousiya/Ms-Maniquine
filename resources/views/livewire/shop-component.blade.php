<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/customer-home-component" class="link">home</a></li>
            <li class="item-link"><span>SHOP</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
            <div class="banner-shop">
                <a href="#" class="banner-link">
                    <figure><img src="{{asset('assets/images/shop-banner01.jpg')}}" alt=""></figure>
                </a>
            </div>
            <div class="wrap-shop-control">

                <h1 class="shop-title">Shop</h1>

                <div class="wrap-right">
                    <div class="sort-item orderby ">
                        <select name="orderby" class="use-chosen" wire:model="sorting">
                            <option value="default" selected="selected">Default sorting</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>

                    <div class="sort-item product-per-page">
                        <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                            <option value="6">6 per page</option>
                            <option value="12" selected="selected">12 per page</option>
                            <option value="16">16 per page</option>
                            <option value="18">18 per page</option>
                            <option value="21">21 per page</option>
                            <option value="24">24 per page</option>
                            <option value="30">30 per page</option>
                            <option value="32">32 per page</option>
                        </select>
                    </div>
                </div>

            </div><!--end wrap shop control-->
            <div class="row">
                <ul class="product-list grid-products equal-container">
                    @php
                        $wishitems=Cart::instance('wishlist')->content()->pluck('id');
                    @endphp

                    @foreach ($dresses as $dress)
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('dress.details',['dress_id'=>$dress->id])}}" title="{{$dress->name}}">
                                <figure><img class="dress-image" src="{{asset('assets/images/dresses')}}/{{$dress->image}}" alt="{{$dress->name}}"></figure>
                            </a>
                            </div>
                            <div class="product-info">
                                <a href="{{route('dress.details',['dress_id'=>$dress->id])}}"class="product-name"><span>{{$dress->name}}</span></a>
                                @if($dress->sale_price>0)
                                <div class="wrap-price">
                                    <span class="product-price">{{$dress->sale_price}}</span>
                                    <span class="product-price regprice">{{$dress->regular_price}}</span>
                                </div>
                                @else
                                <div class="wrap-price">
                                    <span class="product-price">{{$dress->regular_price}}</span>
                                </div>
                                @endif
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$dress->id}},'{{$dress->name}}',{{$dress->regular_price}})">Add To Cart</a>
                                <div class="product-wish">
                                    @if($wishitems->contains($dress->id))
                                        <a href="#" wire:click.prevent="removeFromWishlist({{$dress->id}})"><i class="fa fa-heart fill-heart"></i></a>
                                    @else
                                        <a href="#" wire:click.prevent="addToWishlist({{$dress->id}},'{{$dress->name}}',{{$dress->regular_price}})"><i class="fa fa-heart"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="wrap-pagination-info">
                {{$dresses->links()}}
            </div>
        </div><!--end main products area-->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget mercado-widget categories-widget">
                <h2 class="widget-title">All Categories</h2>
                <div class="widget-content">
                    <ul class="list-category">
                        @foreach($categories as $category)
                            <li class="category-item">
                                <a href="{{route('dress.categories',['category_id'=>$category->id])}}" class="cate-link">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div><!-- Categories widget-->

            <div class="widget mercado-widget filter-widget price-filter">
                <h2 class="widget-title">Price</h2>
                <div class="widget-content">
                    <div id="slider-range"></div>
                    <p>
                        <label for="amount">Price:</label>
                        <input type="text" id="amount" readonly>
                        <button class="filter-submit">Filter</button>
                    </p>
                </div>
            </div><!-- Price-->

            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Color</h2>
                <div class="widget-content">
                    <ul class="list-style vertical-list has-count-index">
                        <li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
                        <li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
                    </ul>
                </div>
            </div><!-- Color -->

            <div class="widget mercado-widget filter-widget">
                <h2 class="widget-title">Size</h2>
                <div class="widget-content">
                    <ul class="list-style inline-round ">
                        <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                        <li class="list-item"><a class="filter-link " href="#">M</a></li>
                        <li class="list-item"><a class="filter-link " href="#">l</a></li>
                        <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                    </ul>
                   
                </div>
            </div><!-- Size -->

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
                                    @if($d_dress->sale_price>0)
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
            </div><!-- brand widget-->

        </div><!--end sitebar-->
    </div><!--end row-->

</div><!--end container-->

</main>