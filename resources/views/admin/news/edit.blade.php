@extends('layouts/app')

@section('css')

@endsection

@section('content')
<form method="POST" action="/admin/news/update/{{$news_list->id}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">標題</label>
        <input name="title" type="text" class="form-control" value="{{$news_list->title}}" id="title">
    </div>
    <div class="form-group">
        <label for="sub_title">副標題</label>
        <input name="sub_title" type="text" class="form-control" value="{{$news_list->sub_title}}" id="sub_title">
    </div>
    <div class="form-group">
        <div for="">圖片</div>
        <img class="mb-2" width="200px" src="{{$news_list->img_url}}" alt=""><br>
        <label for="exampleFormControlFile1">上傳更新照片</label>
        <input name="img_url" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="content">景點詳述</label>
        <textarea name="cont" class="form-control" id="content" rows="3">{{$news_list->cont}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">編輯資料</button>
</form>
@endsection

@section('js')

@endsection
