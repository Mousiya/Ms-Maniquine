<main id="main" class="main-site left-sidebar">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/customer-home-component" class="link">HOME</a></li>
            <li class="item-link"><span>WISHLIST</span></li>
        </ul>
    </div>
    <div class="row">
        @if(Cart::instance('wishlist')->content()->count() > 0)
        <ul class="product-list grid-products equal-container">
            @foreach (Cart::instance('wishlist')->content() as $item)
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('dress.details',['dress_id'=>$item->model->id])}}" title="{{$item->model->name}}">
                        <figure><img class="dress-image" src="{{asset('assets/images/dresses')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                    </a>
                    </div>
                    <div class="product-info">
                        <a href="{{route('dress.details',['dress_id'=>$item->model->id])}}"class="product-name"><span>{{$item->model->name}}</span></a>
                        @if($item->model->sale_price>0)
                        <div class="wrap-price">
                            <span class="product-price">{{$item->model->sale_price}}</span>
                            <span class="product-price regprice">{{$item->model->regular_price}}</span>
                        </div>
                        @else
                        <div class="wrap-price">
                            <span class="product-price">{{$item->model->regular_price}}</span>
                        </div>
                        @endif
                        <a href="#" class="btn add-to-cart" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">Move To Cart</a>
                        <div class="product-wish">
                            <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <div class="text-center" style="padding:30px 0;">
        <figure><img src="assets\images\shoppage\wishlist.webp" alt="" width="200" height="200"></figure>
            <h1>Your wishlist is empty!</h1>
            <p>seem like you don't have wishes here.</p>
            <p>Make a wish!<p>
            <a href ="/shop" class="btn btn-success">Start Shopping</a>
        </div>
        @endif
    </div>
</div>
</main>