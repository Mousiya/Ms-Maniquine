<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
            <!-- Striped rows -->
            <div class="col-md-12 my-4">
                <h2 class="h4 mb-1">Home Sliders</h2>
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
                        <a class="btn btn-primary float-right ml-3" href="{{route('admin.addhomesliders')}}">Add slider +</a>
                        <button wire:click.prevent="deleteSelected" class="btn btn-secondary" onclick="confirm('Are you sure, You want to delete this slider?') || event.stopImmediatePropagation()" >Delete</button>
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Price</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($sliders->count()>0)
                        @foreach($sliders as $slider)
                        <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{$slider->id}}" wire:model="selectedSliders" value="{{$slider->id}}">
                            <label class="custom-control-label" for="{{$slider->id}}"></label>
                            </div>
                        </td>
                        <td>{{++$i}}</td>
                        <td><img src="{{asset('assets/images/home_sliders')}}/{{$slider->image}}" width="60" height="40"/></td>
                        <td>{!!$slider->title!!}</td>
                        <td>{!!$slider->subtitle!!}</td>
                        <td>{{$slider->price}}</td>
                        <td>{{$slider->link}}</td>
                        <td>{{$slider->status == 1? 'Active':'Inactive'}}</td>
                        <td>{{$slider->created_at}}</td>
                        <td>
                            <a href="{{route('admin.edithomesliders',['slide_id'=>$slider->id])}}">
                            <i class="fe fe-16 fe-edit"></i></a>
                            <a href="#" onclick="confirm('Are you sure, You want to delete this slider?') || event.stopImmediatePropagation()" wire:click.prevent="deletehomeslider({{$slider->id}})" style="margin-left:10px;">
                            <i class="fe fe-16 fe-trash-2"></i> </a>
                        </td>
                        </tr>
                        @endforeach
                        @else
                        <tr><td colspan="10" style=text-align:center >No Slider Found</td></tr>
                        @endif
                    </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                    <ul class="pagination justify-content-end mb-0">
                        {{$sliders->onEachSide(1)->links()}}
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
