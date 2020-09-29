@extends('../layouts/nav_footer')
@section('css')
    <link rel="stylesheet" href="./css/news.css">
    <link rel="stylesheet" href="./css/index.css">
@endsection

@section('section')
<section class="news">
    <div class="container">
        <h2 class="news_title">最新消息</h2>
        <div class="row news_lists">
            @foreach ($news_list as $news)
            <div class="col-md-4">
                <div class="news_list">
                    <h3>{{$news->title}}</h3>
                    <h4>{{$news->sub_title}}</h4>
                    <img width="100%" src="{{$news->img_url}}" alt="圖片建議尺寸: 1000 x 567">
                    <p class="news_content">{{$news->cont}}</p>
                    <a class="btn btn-success" href="./news_info/{{$news->id}}" role="button">點擊查看更多 &raquo;</a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $news_list->links() }}
    </div>
</section>
<hr>
@endsection
