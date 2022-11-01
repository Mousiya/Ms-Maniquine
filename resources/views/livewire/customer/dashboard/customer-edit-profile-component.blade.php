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
              <li class="breadcrumb-item active" aria-current="page"><a href="{{route('customer.editprofile')}}">Edit Profile</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <form wire:submit.prevent="EditProfile">
          @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
          @endif
          
          <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
          <div class="customerdashboard">
          <div class="customerdashboard-body">
          <div class="d-flex flex-column align-items-center text-center">
             @if($newimage)
                <img src="{{$newimage->temporaryUrl()}}" width="150">
              @elseif($image)  
                <img src="{{asset('assets/images/profiles')}}/{{$user->profile->image}}" alt="Admin" class="rounded-circle" width="150">
              @else
                <img src="{{asset('assets/images/profiles/profile.png')}}" alt="Admin" class="rounded-circle" width="150">
              @endif
                <input type="file" class="form-control" wire:model="newimage" />
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
                      <h6 class="mb-0">Name :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" wire:model="name" />
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$email}}
                    </div>
                  </div>
                 
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="number" class="form-control" wire:model="mobile">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address :</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text area" class="form-control" placeholder="line1" wire:model="line1">
                        <input type="text area" class="form-control" placeholder="line2" wire:model="line2">
                        <input type="text" class="form-control" placeholder="city" wire:model="city">
                        <input type="text" class="form-control" placeholder="province" wire:model="province">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-info">Save</button>
                    </div>
                    <div class="col-sm-6">
                      <a class="btn btn-secondary pull-right" href="{{route('customer.myprofile')}}">Back</a> 
                    </div>
                  </div>
                </form>
                </div>
              </div>

              
              </div>



            </div>
          </div>

        </div>
    </div>
	
		
	
</div>

