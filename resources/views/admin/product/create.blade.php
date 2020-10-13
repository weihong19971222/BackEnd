@extends('layouts/app')

@section('css')

@endsection

@section('content')
<form method="POST" action="/admin/product/store" enctype="multipart/form-data">
    @csrf
    {{-- {{$ProductType_list}} --}}
    <div class="form-group">
        <label for="title">產品名稱</label>
        <input name="name" type="text" class="form-control" id="title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">上傳產品圖片</label>
        <input name="product_image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="title">價格</label>
        <input name="price" type="text" class="form-control" id="title">
    </div>
    <div class="form-group">
        <label for="title">產品內容</label>
        <input name="info" type="text" class="form-control" id="title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">上傳產品內容圖片</label>
        <input name="info_image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="title">上架日期</label>
        <input name="date" type="text" class="form-control" id="title">
    </div>
    <div class="form-group">
        <label for="title">產品分類</label>

            <select class="form-control" name="type_id" id="">
                @foreach ($ProductType_list as $item)
                    <option value="{{$item->id}}">{{$item->type_name}}</option>
                @endforeach
            </select>

        {{-- <input name="type_id" type="text" class="form-control" id="title"> --}}
    </div>
    <button type="submit" class="btn btn-primary">送出資料</button>
</form>
@endsection

@section('js')

@endsection
