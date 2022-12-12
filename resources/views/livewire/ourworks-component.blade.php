<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/customer-home-component" class="link">HOME</a></li>
            <li class="item-link"><span>OUR WORKS</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
        <div class="banner-shop">
            <a href="#" class="banner-link">
                <figure><img src="{{asset('assets/images/home-1-banner-1.jpg')}}" alt=""></figure>
            </a>
        </div> 
        <div class="wrap-shop-control">
            
                <h1 class="shop-title">ALL OUR WORKS</h1>

                <div class="wrap-right">
                    <div class="sort-item orderby ">
                        <select name="orderby" class="use-chosen" wire:model="sorting">
                            <option value="default" selected="selected">Default sorting</option>
                            <option value="date">Sort by newness</option>
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

                    @foreach ($works as $work)
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('work.contact',['work_id'=>$work->id])}}" title="{{$work->name}}">
                                <figure><img class="work-image" src="{{asset('assets/images/works')}}/{{$work->image}}" alt="{{$work->name}}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{route('work.contact',['work_id'=>$work->id])}}"class="product-name"><span>{{$work->name}}</span></a>
                                <a href="#" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="wrap-pagination-info">
                {{$works->links()}}
            </div>
        </div><!--end main products area-->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
            <div class="widget mercado-widget categories-widget">
                <h2 class="widget-title">All Categories</h2>
                <div class="widget-content">
                    <ul class="list-category">
                        @foreach($categories as $category)
                            <li class="category-item">
                                <a href="{{route('work.categories',['category_id'=>$category->id])}}" class="cate-link">{{$category->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div><!-- Categories widget-->
        </div><!--end sitebar-->
    </div><!--end row-->

</div><!--end container-->

</main>