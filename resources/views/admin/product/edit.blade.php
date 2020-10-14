@extends('layouts/app')

@section('css')

@endsection

@section('content')

<form method="POST" action="/admin/product/update/{{$news_list->id}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">產品名稱</label>
        <input name="name" type="text" class="form-control" value="{{$news_list->name}}" id="title">
    </div>
    <div class="form-group">
        <div for="">產品圖片</div>
        <img class="mb-2" width="200px" src="{{$news_list->product_image}}" alt=""><br>
        <label for="exampleFormControlFile1">上傳更新照片</label>
        <input name="product_image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="sub_title">價格</label>
        <input name="price" type="text" class="form-control" value="{{$news_list->price}}" id="sub_title">
    </div>
    <div class="form-group">
        <label for="content">產品內容</label>
        <textarea name="info" class="form-control" id="content" rows="3">{{$news_list->info}}</textarea>
    </div>
    <div class="form-group">
        <label for="content">產品分類</label>
        <select class="form-control" name="type_id" id="">
            @foreach ($news_lists as $item)
                <option @if ($item->id==$news_list->type_id) selected @endif value="{{$item->id}}">{{$item->type_name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">編輯資料</button>
</form>
@endsection

@section('js')

@endsection
