@extends('../layouts/nav_footer')
@section('css')
    <link rel="stylesheet" href="./css/news.css">
    <link rel="stylesheet" href="./css/index.css">
@endsection

@section('section')
<section class="news">
    <div>
        <ul>
            @foreach ($product_lists as $product_list)
                <li><a href="/products_type/{{$product_list->id}}">{{$product_list->type_name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <h2 class="news_title">產品</h2>
            @foreach ($product_lists as $product_list)
                <h1>{{$product_list->type_name}}</h1>
                <div class="row news_lists">
                @foreach ($product_list->product_type as $product)
                    <div class="col-md-4">
                        <div class="news_list">
                            <h3>{{$product->name}}</h3>
                            <img width="100%" src="{{$product->product_image}}" alt="圖片建議尺寸: 1000 x 567">
                            <p class="news_content">日期:{{$product->date}}</p>
                            <a class="btn btn-dark" href="./product_info/{{$product->id}}">查看更多</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
    </div>
</section>
<hr>
@endsection
