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
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
	@livewireStyles
</head>

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
						
						<div class="topbar-menu right-menu">
							<ul>
                                <li>
                                @if (Route::has('login'))
                                    	@auth
										<li class="menu-item menu-item-has-children parent" >
										<a title="My Account" href="#">My Account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="submenu curency" >
											@if(Auth::user()->utype==='USER')
											<li class="menu-item" >
												<a title="Dashboard" href="{{route('customer.dashboard')}}">Dashboard</a>
											</li>
											@else
											<li class="menu-item" >
												<a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
											</li>
											@endif
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
                       
						@livewire('shop.header-search-component')
						
						<div class="wrap-logo-top center-section">
							<a href="index.html" class="link-to-home"><img src="{{asset('assets/images/logo-top-2.png')}}" alt="mercado"></a>
						</div>
						
						
						<div class="wrap-logo-top center-section" alt="mercado">
							<img src="{{asset('assets/images/logo-top-1.png')}}">
                        </div>  
						 
                        
						

						<div class="wrap-icon right-section">
							
							@livewire('wishlist-count-component')
							
							@livewire('cart-count-component')

							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
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
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Check out</a>
								</li>
								<li class="menu-item">
                                    <a href="{{route('user.ourservices')}}" class="link-term mercado-item-title">Our Services</a>
								</li>
								<li class="menu-item">
									<a href="/ourworks" class="link-term mercado-item-title">Our Works</a>
								</li>
								<li class="menu-item">
									<a href="/contactus" class="link-term mercado-item-title">Contact Us</a>
                                </li>
								<li class="menu-item">
									<a href="/aboutus" class="link-term mercado-item-title">About Us</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	{{$slot}}
	
	<footer id="footer">
		<div class="wrap-footer-content footer-style-1 ">
			<hr><div class="main-footer-content">
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
										<li><a href="#" class="link-to-item" title="our application on google play store"><figure><img src="{{asset('assets/images/brands/google-play-store.png')}}" alt="google play store" width="128" height="36"></figure></a></li>
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

		</div>
	</footer>
	@livewireScripts
	
	<script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
	<!--<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>-->
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('assets/js/functions.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
</body>
</html>