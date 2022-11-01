<main role="main" class="main-content">
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h3 class="page-title">Add Coupons</h3>
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                      <div class="d-md-flex">
                          <ol class="breadcrumb ms-auto">
                              <li><a href="/" class="fw-normal">/ Dashboard</a> 
                                  <a href="{{route('admin.coupons')}}" class="fw-normal"> / Coupons </a>
                                  <a href="#" class="fw-normal">/ Add New Coupons</a>
                              </li>
                          </ol>
                      </div>
              </div>
                
              <div class="card shadow mb-4">
                
                <div class="card-header">
                  <strong class="card-title">Coupon details</strong>
                </div>
                <div class="card-body">
                  <!-- error messages --> 
                  <!--@if ($errors->any())
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div>
                  @endif  -->      
                  <form enctype="multipart/form-data" wire:submit.prevent="addCoupon">
                      @csrf           
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Coupon Code</label>
                                <input type="text" id="simpleinput" class="form-control" placeholder="Coupon Code" wire:model="code">
                                @error('code')<p class="text-danger">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group mb-3">
                                    <label>Status</label>
                                    <div class="col-sm-12">
                                      <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="fixed" wire:model="type">Fixed</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="percent" wire:model="type">Percent</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    @error('status')<p class="text-danger">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="simpleinput">Coupon Value</label>
                                <input type="text" id="simpleinput" class="form-control" placeholder="Coupon Value" wire:model="value">
                                @error('value')<p class="text-danger">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="simpleinput">Cart Value</label>
                                <input type="text" id="simpleinput" class="form-control" placeholder="Cart Value" wire:model="cart_value">
                                @error('cart_value')<p class="text-danger">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="expiry-date">Expiry Date</label>
                                <div class="col-md-4" wire:ignore>
                                <input type="text" id="expiry-date" class="form-control" placeholder="Expiry Date" wire:model="expiry_date">
                                @error('expiry_date')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                        </div> <!-- /.col -->
                      </div>
                      @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                      @endif
                      <button type="submit" class="btn btn-primary">Add</button>
                  </from>
                  <a class="btn btn-secondary" href="{{route('admin.coupons')}}">All Coupons</a>
                </div>
              </div> <!-- / .card -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main>

@push('scripts')
<script>
  $(function(){
    $('#expiry-date').datetimepicker({
      format:'Y-MM-DD'
    })
    .on('dp.change',function(ev){
      var data=$('#expiry-date').val();
      @this.set('expiry_date',data)
    });
  });
</script>
@endpush

