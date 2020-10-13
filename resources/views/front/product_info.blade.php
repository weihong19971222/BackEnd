@extends('../layouts/nav_footer')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/news_info.css">
@endsection

@section('section')
<section class="news_info">
    <div class="container mt-5">
        <h2 class="info_title">{{$products_list->product->type_name}}</h2>
        <div class="row">
            <div class="col-12 my-3 my-md-0 col-md-6">
                <div class="image_box h-100">
                    <a href="./images/index/news/news_example.JPG" data-lightbox="image-1" data-title="My caption">
                        <img width="100%" src="{{$products_list->product_image}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-12 my-3 my-md-0 col-md-6">
                <div class="info_content">
                    <h3>價格:{{$products_list->price}}</h3>
                    {{$products_list->info}}
                </div>

            </div>
        </div>
    </div>
</section>
<hr>
@endsection

@section('js')
    <!-- lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection

</body>

</html>
