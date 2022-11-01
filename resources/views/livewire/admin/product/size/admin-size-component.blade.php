<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h4 class="page-title">Dress Sizes</h4>
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong>Sizes</strong>
                    </div>
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
                                <button wire:click.prevent="deleteSelected" class="btn btn-secondary" onclick="confirm('Are you sure, You want to delete this colour?') || event.stopImmediatePropagation()" >Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
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
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($sizes->count()>0)
                            @foreach($sizes as $size)
                            <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{$size->id}}" wire:model="selectedSizes" value="{{$size->id}}">
                                <label class="custom-control-label" for="{{$size->id}}"></label>
                                </div>
                            </td>
                            <td>{{$size->name}}</td>
                            <td>{{$size->status == 1? 'visible':'Hidden'}}</td>
                            <td>
                                <a href="{{route('admin.editsizes',['size_id'=>$size->id])}}">
                                <i class="fe fe-16 fe-edit"></i></a>
                                <a href="#" onclick="confirm('Are you sure, You want to delete this size?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSize({{$size->id}})" style="margin-left:10px;">
                                <i class="fe fe-16 fe-trash-2"></i> </a>
                            </td>
                            </tr>
                            @endforeach
                            @else
                            <tr><td colspan="5" style=text-align:center >No size Found</td></tr>
                            @endif
                        </tbody>
                        </table>
                        </div>
                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                        <ul class="pagination justify-content-end mb-0">
                            {{$sizes->onEachSide(1)->links()}}
                        </ul>
                        </nav>
                        
                    </div>
                  </div> <!-- .card -->
                </div> <!-- .col -->
                <div class="col-md-6">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong>Add Size</strong>
                    </div>
                    <div class="card-body">
                    <form enctype="multipart/form-data" wire:submit.prevent="addSize">
                      @csrf           
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="simpleinput">Name</label>
                                <input type="text" id="simpleinput" class="form-control" placeholder="size" wire:model="name">
                                @error('name')<p class="text-danger">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group mb-3">
                                    <label>Status</label>
                                    <div class="col-sm-12">
                                      <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="0" wire:model="status">hidden</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="1" wire:model="status">Visible </label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    @error('status')<p class="text-danger">{{$message}}</p>@enderror
                              </div>
                        </div> <!-- /.col -->
                      </div>
                      <button type="submit" class="btn btn-primary">Add</button>
                  </from>
                  <a class="btn btn-secondary" href="{{route('admin.addproducts')}}"> 
                    Add product +</a>
                    <a class="btn btn-secondary" href="{{route('admin.addnewproducts')}}"> 
                    Add new product +</a>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col -->
              </div> <!-- .row -->
            </div>
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
</main> 

