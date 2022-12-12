<main id="main" class="main">

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Contact us</span></li>
        </ul>
    </div>
    <div class="row">
        <div class=" main-content-area">
            <div class="wrap-contacts ">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="contact-box contact-info">
                     <p style="border:1px; border-style:solid; font-size:15px; border-color:; padding: 5em;">
                    <strong>If you want to get our services as it is in our works</strong>
                     <br><label><u><a href="/ourworks">Go to our works</a></u></label></br>
                     </p>
                        <h2 class="box-title">Contact Detail</h2>
                        <div class="wrap-icon-box">

                            <div class="icon-box-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Email</b>
                                    <p>maniquine@gmail.com</p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Phone</b>
                                    <p>+94 779859126</p>
                                </div>
                            </div>

                            <div class="icon-box-item">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Mail Office</b>
                                    <p>Rajaveethy,Kopay North,Kopay,</br>40000 Jaffna,Srilanka.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="contact-box contact-form">
                        <h2 class="box-title">Leave a Message</h2>
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="#" method="get" name="frm-contact" wire:submit.prevent="sendMessage">

                            <label for="name">Name<span>*</span></label>
                            <input type="text" value="" id="name" name="name" wire:model="name">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror

                            <label for="email">Email<span>*</span></label>
                            <input type="text" value="" id="email" name="email" wire:model="email">
                            @error('email') <p class="text-danger">{{$message}}</p> @enderror

                            <label for="phone">Phone Number<span>*</span></label>
                            <input type="text" value="" id="phone" name="phone" wire:model="phone">
                            @error('phone') <p class="text-danger">{{$message}}</p> @enderror

                            <label for="Address">Address</label>
                            <textarea name="Address" id="comment" wire:model="Address"></textarea>
                            @error('Address') <p class="text-danger">{{$message}}</p> @enderror

                            <input type="submit" name="ok" value="Send Request" >
                            
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end main products area-->

    </div><!--end row-->

</div><!--end container-->

</main>

