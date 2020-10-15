@extends('layouts/app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
        <label for="info">產品內容</label>
        <textarea name="info" class="form-control" id="info" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="images">上傳多張產品內容圖片</label>
        <input name="info_image2[]" type="file" class="form-control-file" id="images" multiple>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#info').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for(let i=0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                },
                onMediaDelete : function(target) {
                    $.delete(target[0].getAttribute("src"));
                }
            }
        });
    });

    $.upload = function (file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_upload_img',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function (img) {
                    $('#info').summernote('insertImage', img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };

        $.delete = function (file_link) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_delete_img',
                data: {file_link:file_link},
                success: function (img) {
                    console.log("delete:",img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        }
</script>
@endsection
