<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row">
                <!-- Striped rows -->
                <div class="col-md-12 my-4">
                  <h2 class="h4 mb-1">Customer Reviews</h2>
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="toolbar row mb-3">
                        <div class="col">
                          <form class="form-inline">
                            <div class="form-row">
                              <div class="form-group col-auto">
                                <label for="search" class="sr-only" >Search</label>
                                <input type="text" class="form-control" id="search" value="" placeholder="Search..." wire:model="searchTerm">
                              </div>
                            </div>
                          </form>
                        </div>
                        
                      </div>
                      <div class="table-responsive">
                      @if(Session::has('message'))
                      <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                      @endif
                      <!-- error messages --> 
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                          </ul>
                      </div>
                      @endif        
                      <!-- table -->
                      <style>
                      .switch {
                          position: relative;
                          display: inline-block;
                          width: 60px;
                          height: 34px;
                        }

                        /* Hide default HTML checkbox */
                        .switch input {
                          opacity: 0;
                          width: 0;
                          height: 0;
                        }

                        /* The slider */
                        .slider {
                          position: absolute;
                          cursor: pointer;
                          top: 0;
                          left: 0;
                          right: 0;
                          bottom: 0;
                          background-color: #ccc;
                          -webkit-transition: .4s;
                          transition: .4s;
                        }

                        .slider:before {
                          position: absolute;
                          content: "";
                          height: 26px;
                          width: 26px;
                          left: 4px;
                          bottom: 4px;
                          background-color: white;
                          -webkit-transition: .4s;
                          transition: .4s;
                        }

                        input:checked + .slider {
                          background-color: #2196F3;
                        }

                        input:focus + .slider {
                          box-shadow: 0 0 1px #2196F3;
                        }

                        input:checked + .slider:before {
                          -webkit-transform: translateX(26px);
                          -ms-transform: translateX(26px);
                          transform: translateX(26px);
                        }

                        /* Rounded sliders */
                        .slider.round {
                          border-radius: 34px;
                        }

                        .slider.round:before {
                          border-radius: 50%;
                        }
                      </style>
                      <table class="table table-bordered text-nowrap">
                        <thead>
                          <tr>
                            <th>OrderItem</th>
                            <th>Product</th>
                            <th>Customer Name</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $no=0;
                          @endphp
                          @if($orderDetails->count()>0)
                          @foreach($orderDetails->where('rstatus',1) as $orderDetail)
                          <tr>
                            <td><img src="{{asset('assets/images/dresses')}}/{{$orderDetail->dress->image}}" width="60" height="40"/></td>
                            <td>{{$orderDetail->dress->name}}</td>
                            <td>{{$orderDetail->order->user->name}}</td>
                            <td>{{$orderDetail->review->rating}}</td>
                            <td>{{$orderDetail->review->comment}}</td>
                            <td>
                              <label class="switch">
                                <input type="checkbox" checked="" wire:model="view">
                                <span class="slider round"></span>
                              </label>
                            </td>

                          </tr>
                          @endforeach
                          @else
                           <tr>
                            <td colspan="5" style=text-align:center >
                              <div class="text-center" style="padding:30px 0;">
                                <figure><center><img src="{{asset('admin\assets\images\noresult.jpeg')}}" alt="" width="250" height="250"></center></figure>
                                  <h4>No Review Found</h4>
                              </div>
                            </td>
                            </tr>
                          @endif
                        </tbody>
                      </table>
                      <nav aria-label="Table Paging" class="mb-0 text-muted">
                        <ul class="pagination justify-content-end mb-0">
                          {{$orderDetails->onEachSide(1)->links()}}
                        </ul>
                      </nav>
                    </div>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main>