@extends('layouts/app')

@section('css')

@endsection

@section('content')
<form method="POST" action="/admin/product_type" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">產品類別名稱</label>
        <input name="type_name" type="text" class="form-control" id="title">
    </div>
    <div class="form-group">
        <label for="title">排序</label>
        <input name="sort" type="text" class="form-control" id="title">
    </div>
    <button type="submit" class="btn btn-primary">送出資料</button>
</form>
@endsection

@section('js')

@endsection
