<x-base-layout>
<div class="main">
      <div class="shop_top">
		<div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">home</a></li>
                    <li class="item-link"><span>Forgot Password</span></li>
                </ul>
            </div>
        
        
            <div class=" main-content-area">
                <div class="wrap-login-item ">						
                    <div class="login-form form-item form-stl">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-jet-validation-errors class="mb-4" />
                            <form name="frm-login" method="POST" action="{{route('password.email')}}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h1 class="form-title">Forgot Password</h1>										
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="email" id="frm-login-uname" name="email" placeholder="Type your email address":value="old('email')" required autofocus>
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Email Password Reset link" name="submit">
                            </form>
                    </div>												
                </div>
            </div>	
        
			</div>
		  </div>
	  </div>
</x-base-layout>

