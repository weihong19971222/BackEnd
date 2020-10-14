@extends('../layouts/nav_footer')
@section('css')
    <link rel="stylesheet" href="./css/news.css">
    <link rel="stylesheet" href="./css/index.css">
@endsection

@section('section')
<section class="news">
    <div class="container mt-5">
        <h2 class="news_title">產品</h2>
        <h1>{{$product_lists->type_name}}</h1>
        <div class="row news_lists">
            @foreach ($product_lists->product_type as $product)
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
    </div>
</section>
<hr>
@endsection
