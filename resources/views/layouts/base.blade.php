<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
</head>
@livewireStyles
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
								</li>
							</ul>
						</div>
						
						<div class="topbar-menu right-menu">
							<ul>
                                <li>
                                @if (Route::has('login'))
                                    	@auth
										<li class="menu-item menu-item-has-children parent" >
										<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="submenu curency" >
											<li class="menu-item" >
												<a title="Dashboard" href="{{route('dashboard')}}">Dashboard</a>
											</li>
											<li class="menu-item">
													<a href="{{route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
											</li>	
											<form id="logout-form" method="POST" action="{{route('logout')}}">
												@csrf																																																															
											</form>
										</ul>
										</li>
                                        @else
                                            <li class="menu-item"><a title="Register or Login" href="{{ route('login') }}" >Log in</a></li>

                                            @if (Route::has('register'))
                                                <li class="menu-item"><a title="Register or Login" href="{{ route('register') }}" >Register</a></li>
                                            @endif
                                        @endauth
                                    @endif
                                </li>
							<ul>	
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">
                       
						<div class="wrap-search left-section">
							<div class="wrap-search-form">
								<form action="#" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value="" placeholder="Search here...">
									<button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
									<div class="wrap-list-cate">
										<input type="hidden" name="product-cate" value="0" id="product-cate">
										<a href="#" class="link-control">All Collections</a>
										<ul class="list-cate">
											<li class="level-0">All Collections</li>
											<li class="level-1">-Casual wears</li>
											<li class="level-2">Skirt</li>
											<li class="level-2">Blouses</li>
											<li class="level-2">Tops</li>
                                            <li class="level-2">Frokes</li>
                                            <li class="level-2">kids dresses</li>
											<li class="level-1">-Smart Casual</li>
                                            <li class="level-2">Skirt</li>
											<li class="level-2">Blouses</li>
											<li class="level-2">Tops</li>
											<li class="level-2">kids dresses</li>
											<li class="level-1">-Wedding Dresses</li>
											<li class="level-2">Lehenga & Anarkali Suit</li>
											<li class="level-1">-Party wears</li>
											<li class="level-2">Frocks</li>
											<li class="level-2">Tops</li>
											<li class="level-2">kid dresses</li>
                                            <li class="level-1">-kid Dresses</li>
											<li class="level-2">party frocks</li>
											<li class="level-2">frocks</li>
											<li class="level-2"></li>
										</ul>
									</div>
								</form>
							</div>
						</div>
						
						<div class="wrap-logo-top center-section">
							<a href="index.html" class="link-to-home"><img src="assets/images/logo-top-2.png" alt="mercado"></a>
						</div>
						
						
						<div class="header-font-style01 center-section">
							<p>Ms.<b>Maniquine</b></p>
                        </div>  
						 
                        
						

						<div class="wrap-icon right-section">
							
							
							<div class="wrap-icon-section wishlist">
								<a href="#" class="link-direction">
									<i class="fa fa-heart" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">0 item</span>
										<span class="title">Wishlist</span>
									</div>
								</a>
							</div>
							
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
							
							<div class="wrap-icon-section minicart">
								<a href="#" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">4 items</span>
										<span class="title">CART</span>
									</div>
								</a>
							</div>
							
						</div>

                        
					</div>
				</div>

				
				<div class="nav-section header-sticky">
                    
					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="index.html" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="shop.html" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
                                    <a href="ourservice.html" class="link-term mercado-item-title">Our Services</a>
								</li>
								<li class="menu-item">
									<a href="ourworks.html" class="link-term mercado-item-title">Our Works</a>
								</li>
								<li class="menu-item">
									<a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
                                </li>
								<li class="menu-item">
									<a href="about-us.html" class="link-term mercado-item-title">About Us</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--@yield('lay')-->
	{{$slot}}
	<footer id="footer">
		<div class="wrap-footer-content footer-style-1 ">

			<div class="wrap-function-info">
				<div class="container">
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Free Shipping</h4>
								<p class="fc-desc">Free On Oder Over $99</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-recycle" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Guarantee</h4>
								<p class="fc-desc">30 Days Money Back</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Safe Payment</h4>
								<p class="fc-desc">Safe your online payment</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Online Suport</h4>
								<p class="fc-desc">We Have Support 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			<div class="main-footer-content">

				<div class="container">

					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="wrap-footer-item">
							<h3 class="item-header">Contact Details</h3>
							<div class="item-content">
								<div class="wrap-contact-detail">
									<ul>
										<li>
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<p class="contact-txt">Rajaveethy,Kopay North,Kopay,40000 Jaffna,Srilanka.</p>
										</li>
										<li>
											<i class="fa fa-phone" aria-hidden="true"></i>
											<p class="contact-txt">+94 779859126</p>
										</li>
										<li>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<p class="contact-txt">maniquine@gmail.com</p>
										</li>											
									</ul>
								</div>
							</div>
						</div>					
					</div>

					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="wrap-footer-item">
							<h3 class="item-header">We Using Safe Payments:</h3>
							<div class="item-content">
								<div class="wrap-list-item wrap-gallery">
									<img src="{{asset('assets/images/payment.png')}}" style="max-width: 260px;">
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="wrap-footer-item">
							<h3 class="item-header">Social network</h3>
							<div class="item-content">
								<div class="wrap-list-item social-network">
									<ul>
										<li><a href="#" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#" class="link-to-item" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
										<li><a href="#" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="wrap-footer-item">
							<h3 class="item-header">Dowload App</h3>
							<div class="item-content">
								<div class="wrap-list-item apps-list">
									<ul>
										<li><a href="#" class="link-to-item" title="our application on google play store"><figure><img src="assets/images/brands/google-play-store.png" alt="google play store" width="128" height="36"></figure></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="wrap-back-link">
					<div class="container">
						<div class="back-link-box">
							<h3 class="backlink-title">Quick Links</h3>
							<div class="back-link-row">

								<ul class="list-back-link" >
									<li><span class="row-title">Shop:</span></li>
									<li><a href="#" class="redirect-back-link" title="Casual wears" >Casual wears</a></li>
									<li><a href="#" class="redirect-back-link" title="Smart Casual" >Smart Casual</a></li>
									<li><a href="#" class="redirect-back-link" title="Wedding Dresses" >Wedding Dresses</a></li>
									<li><a href="#" class="redirect-back-link" title="Party wears" >Party wears</a></li>
									<li><a href="#" class="redirect-back-link" title="Kid Dresses" >Kid Dresses</a></li>
								</ul>

                                <ul class="list-back-link" >
									<li><span class="row-title">Our Services:</span></li>
                                    <li><a href="#" class="redirect-back-link" title="Aari Work" >Aari Works</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Mehendi" >Mehendi</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Saree Blouses" >Saree Blouses</a></li>
                                    <li><a href="#" class="redirect-back-link" title="Lehenga & Anarkali Suit" >Lehenga & Anarkali Suit</a></li>
                                    <li><a href="#" class="redirect-back-link" title="All ladies wears" >All ladies wears</a></li>
                                </ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright © 2020 Surfside Media. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>								
								<li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>								
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
	
	
	<script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('assets/js/functions.js')}}"></script>
	@livewiresScripts
</body>
</html>