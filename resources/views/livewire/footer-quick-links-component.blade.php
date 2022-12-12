<div class="container">
    <div class="back-link-box">
        <h3 class="backlink-title">Quick Links</h3>
        <div class="back-link-row">
            
            <ul class="list-back-link" >
                <li><span class="row-title">Shop:</span></li>
                @foreach($categories as $category)
                    <li class="category-item">
                        <a href="{{route('dress.categories',['category_id'=>$category->id])}}" class="redirect-back-link" title="Kid Dresses">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>

            <ul class="list-back-link" >
                <li><span class="row-title">Our Services:</span></li>
                @foreach($w_categories as $category)
                    <li class="category-item">
                        <a href="{{route('work.categories',['category_id'=>$category->id])}}" class="redirect-back-link" title="Kid Dresses">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>