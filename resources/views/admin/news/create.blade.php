@extends('layouts/app')

@section('css')

@endsection

@section('content')
<form method="POST" action="/admin/news/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">標題</label>
        <input name="title" type="text" class="form-control" id="title">
    </div>
    <div class="form-group">
        <label for="sub_title">副標題</label>
        <input name="sub_title" type="text" class="form-control" id="sub_title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">上傳照片</label>
        <input name="img_url" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="content">景點詳述</label>
        <textarea name="cont" class="form-control" id="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">送出資料</button>
</form>
@endsection

@section('js')

@endsection
