<div class="wrap-search left-section">
	<div class="wrap-search-form">
		<form action="{{route('dress.search')}}" id="form-search-top" name="form-search-top">
			<input type="text" name="search" value="{{$search}}" placeholder="Search here...">
				<button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				<div class="wrap-list-cate">
					<input type="hidden" name="dress_cat" value="{{$dress_cat}}" id="dress-cate">
                    <input type="hidden" name="dress_cat_id" value="{{$dress_cat_id}}" id="dress-cate-id">
					<a href="#" class="link-control">{{str_split($dress_cat,12)[0]}}</a>
					<ul class="list-cate">
						<li class="level-0">All Category</li>
                        @foreach($categories as $category)
                        <li class="level-1" data-id="{{$category->id}}">{{$category->name}}</li>
                        @endforeach
					</ul>
				</div>
		</form>
	</div>
</div>