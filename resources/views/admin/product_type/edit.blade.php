@extends('layouts/app')

@section('css')

@endsection

@section('content')

<form method="POST" action="/admin/product_type/{{$product_type_list->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">產品類別名稱</label>
        <input name="type_name" type="text" class="form-control" value="{{$product_type_list->type_name}}" id="title">
    </div>
    <div class="form-group">
        <label for="title">排序</label>
        <input name="sort" type="text" class="form-control" value="{{$product_type_list->sort}}" id="title">
    </div>
    <button type="submit" class="btn btn-primary">編輯資料</button>
</form>
@endsection

@section('js')

@endsection
