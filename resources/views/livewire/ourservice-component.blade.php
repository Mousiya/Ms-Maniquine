<main id="main">
		<div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>OUR SERVICES</span></li>
            </ul>
        </div>
			<center>
			<table class="table table-bordered" style="width:1280px; border:2px solid gray">
			<div class="row">
			<div class="col-sm-8 offset-sm-2">
					@php
					$no=0;
					@endphp
					@foreach($categories as $category)
					@php
					$no++;
					@endphp
					@if($no % 2 == 1)
					<tr class="our-services-box-shadow">
						<td align="left">
							<figure><img class="img-border" src="{{asset('assets/images/services')}}/{{$category->image}}" style="width:1170px ,height:240px" alt=""></figure>
						</td>
						<td >
							<h3>{{$category->name}}</h3>
							<p align="justify">
								{!!$category->description!!}
							</p>
						</td>
					</tr>
					@else
                    <tr class="our-services-box-shadow">
					<td>
						<h3>{{$category->name}}</h3>
						<p align="justify">
                            {{$category->description}}
						</p>
					</td>
					<td align="right">
                        <figure><img class="img-border" src="{{asset('assets/images/services')}}/{{$category->image}}" style="width:1170px ,height:240px" alt=""></figure>
					</td>
					</tr>
					@endif
                    @endforeach
					
		</div>
		</div>
	</table>
    {{$categories->links()}}
    </center>
			
		</div>
</main>
