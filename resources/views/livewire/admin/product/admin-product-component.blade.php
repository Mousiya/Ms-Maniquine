<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
              <h2 class="h4 mb-1">Dresses</h2>
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
                    <div class="col ml-auto">
                      <div class="dropdown float-right">
                        <a class="btn btn-primary float-right ml-3" href="{{route('admin.addnewproducts')}}">Add new dresses +</a>
                        <button wire:click.prevent="deleteSelected" class="btn btn-secondary" onclick="confirm('Are you sure, You want to delete this Product?') || event.stopImmediatePropagation()" >Delete</button>
                      </div>
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
                    <table class="table table-bordered text-nowrap ">
                      <thead>
                        <tr>
                          <th>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="chkCheckAll" wire:model="selectAll" />
                              <label class="custom-control-label" for="chkCheckAll"></label>
                            </div>
                          </th>
                          <th>Dress Name</th>
                         
                          <th>Description</th>
                       
                          <th>Regular price</th>
                          <th>Sale price</th>
                          <th>Image</th>
                          <th>Stock</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dresses as $dress)
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="{{$dress->id}}" wire:model="selectedProducts" value="{{$dress->id}}">
                              <label class="custom-control-label" for="{{$dress->id}}"></label>
                            </div>
                          </td>
                          <td>{{$dress->name}}</td>
                        
                          <td>{!!$dress->description!!}</td>
                          
                          <td>{{$dress->regular_price}}</td>                                
                          <td>{{$dress->sale_price}}</td>
                          <td><img src="{{asset('assets/images/dresses')}}/{{$dress->image}}" width="60" height="40"/></td>
                          <td>{{$dress->stock_status}}</td>
                          <td>{{$dress->created_at}}</td>
                          <td>
                              <a href="{{route('admin.editproducts',['dress_id'=>$dress->id])}}">
                              <i class="fe fe-16 fe-edit"></i></a>
                              <a href="#" onclick="confirm('Are you sure, You want to delete this dress?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$dress->id}})" style="margin-left:10px;">
                              <i class="fe fe-16 fe-trash-2"></i> </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @if(count($dresses))
                      {{$dresses->links('livewire-pagination-link')}}
                    @endif
                  </div>
                </div>
              </div><!--end card-->
            </div> <!-- simple table -->
          </div> <!-- end section -->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>