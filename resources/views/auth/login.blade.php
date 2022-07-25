<x-guest-layout>
<div class="main">
      <div class="shop_top">
		<div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>login</span></li>
                </ul>
            </div>
        
        
            <div class=" main-content-area">
                <div class="wrap-login-item ">						
                    <div class="login-form form-item form-stl">
                        <div class="col-md-6">
                            <div class="login-page">
                                <fieldset class="wrap-title">
                                <h1 class="form-title">New Customers</h1>
                                </fieldset>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p>
                                <a href="{{route('register')}}">
                                    <input type="submit" class="btn btn-submit" name="Submit" value="Create an Account"></a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                        <x-jet-validation-errors class="mb-4" />
                            <form name="frm-login" method="POST" action="{{route('login')}}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h1 class="form-title">Registered Customer</h1>										
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="email" id="frm-login-uname" name="email" placeholder="Type your email address":value="old('email')" required autofocus>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Password:</label>
                                    <input type="password" id="frm-login-pass" name="password" placeholder="************" required autocomplete="current-password">
                                </fieldset>
                                
                                <fieldset class="wrap-input">
                                    <label class="remember-field">
                                        <input class="frm-input " name="remember" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
                                    </label>
                                    <a class="link-function left-position" href="{{route('password.request')}}" title="Forgotten password?">Forgotten password?</a>
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Login" name="submit">
                            </form>
                        </div>
                    </div>												
                </div>
            </div>	
        
			</div>
		  </div>
	  </div>
</x-guest-layout>
