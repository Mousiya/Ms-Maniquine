<div>

	<!--<br><br>-->

	<div class="container">
		<div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{route('customer.myprofile')}}">My Profile</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="customerdashboard">
                <div class="customerdashboard-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if($user->profile->image)
                      <img src="{{asset('assets/images/profiles')}}/{{$user->profile->image}}" alt="Admin" class="rounded-circle" width="150">
                    @else
                      <img src="{{asset('assets/images/profiles/profile.png')}}" alt="Admin" class="rounded-circle" width="150">
                    @endif
                      <div class="mt-3">
                      <h4>Hello {{$user->name}}!</h4>
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="customerdashboard mb-3">
                <div class="customerdashboard-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name :</h6>
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
                      <h6 class="mb-0">Mobile :</h6>
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
                    <div class="col-sm-8 text-secondary">
                    @if($user->profile->line1!=null)
                      <div>
                      {{$user->profile->line1}},
                      </div>
                    @endif
                    @if($user->profile->line2!=null)
                    <div>
                    {{$user->profile->line2}},
                    </div>
                    @endif
                    @if($user->profile->city!=null)
                    <div>
                    {{$user->profile->city}},
                    </div>
                    @endif
                    @if($user->profile->province!=null)
                    <div>
                    {{$user->profile->province}}.
                    </div>
                    @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="{{route('customer.editprofile')}}">Edit Profile</a>
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

