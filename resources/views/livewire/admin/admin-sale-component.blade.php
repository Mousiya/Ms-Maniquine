<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
            <h3 class="page-title">Sales Manage</h3>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="/" class="fw-normal">/ Dashboard</a> 
                                    <a href="#" class="fw-normal">/ Sale</a>
                                </li>
                            </ol>
                        </div>
                </div>
                
                <div class="card shadow mb-4">
                        <div class="card-header">
                        <strong class="card-title">Sales details</strong>
                        </div>
                        <div class="card-body">  
                            <form enctype="multipart/form-data" wire:submit.prevent="updateSale">           
                                <div class="form-group mb-3">
                                    <label for="sale">Date Range</label>
                                    <input type="text" id="sale-date" class="form-control" wire:model="sale_date">
                                    @error('sale_date')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="0" wire:model="status">Inactive</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" value="1" wire:model="status">Active </label>
                                                </div>
                                            </div>
                                        </div>
                                    @error('status')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
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
                                @endif   -->  
                                <button type="submit" class="btn btn-primary">Add</button>
                            </from>
                            <a class="btn btn-secondary" href="{{route('admin.categories')}}"> 
                            All Categaries</a>
                        </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>
@push('scripts')
   <script>
   $(function(){
        $('#sale-date').datetimepicker({
            format:'Y-MM-DD h:m:s',
        })
        .on('dp.change',function(ev){
            var data = $('#sale-date').val();
            @this.set('sale_date',data);
        });
   });
   </script>
@endpush
