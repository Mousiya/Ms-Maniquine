<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row">
                <!-- Striped rows -->
                <div class="col-md-12 my-4">
                  <h2 class="h4 mb-1">Dress Categories</h2>
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
                            <a class="btn btn-primary float-right ml-3" href="{{route('admin.addcategories')}}">Add more +</a>
                            <button wire:click.prevent="deleteSelected" class="btn btn-secondary" onclick="confirm('Are you sure, You want to delete this category?') || event.stopImmediatePropagation()" >Delete</button>
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
                      <table class="table table-bordered text-nowrap">
                        <thead>
                          <tr>
                            <th>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chkCheckAll" wire:model="selectAll" />
                                <label class="custom-control-label" for="chkCheckAll"></label>
                              </div>
                            </th>
                            <th>No.</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $no=0;
                          @endphp
                          @if($categories->count()>0)
                          @foreach($categories as $category)
                          <tr>
                            <td>
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{$category->id}}" wire:model="selectedProducts" value="{{$category->id}}">
                                <label class="custom-control-label" for="{{$category->id}}"></label>
                              </div>
                            </td>
                            <td>{{++$no}}</td>
                            <td>{{$category->name}}</td>
                            <td><img src="{{asset('assets/images/categories')}}/{{$category->image}}" width="60" height="40"/></td>
                            <td>
                                <a href="{{route('admin.editcategories',['category_id'=>$category->id])}}">
                                <i class="fe fe-16 fe-edit"></i></a>
                                <a href="#" onclick="confirm('Are you sure, You want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" style="margin-left:10px;">
                                <i class="fe fe-16 fe-trash-2"></i> </a>
                            </td>
                          </tr>
                          @endforeach
                          @else
                           <tr>
                            <td colspan="5" style=text-align:center >
                              <div class="text-center" style="padding:30px 0;">
                                <figure><center><img src="{{asset('admin\assets\images\noresult.jpeg')}}" alt="" width="250" height="250"></center></figure>
                                  <h4>No Category Found</h4>
                              </div>
                            </td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
                      <nav aria-label="Table Paging" class="mb-0 text-muted">
                        <ul class="pagination justify-content-end mb-0">
                          {{$categories->onEachSide(1)->links()}}
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