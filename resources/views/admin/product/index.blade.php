@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<a class="btn btn-info mb-3" href="/admin/product/create">新增產品</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>產品名稱</th>
            <th>產品圖片</th>
            <th>價格</th>
            <th>產品內容</th>
            <th>產品內容圖片</th>
            <th>上架日期</th>
            <th>產品分類</th>
            <th>created_at</th>
            <th>功能</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news_list as $news)
            <tr>
                <td>{{$news->name}}</td>
                <td><img height="150px" src="{{$news->product_image}}" alt=""></td>
                <td>{{$news->price}}</td>
                <td>{{$news->info}}</td>
                <td><img height="150px" src="{{$news->info_image}}" alt=""></td>
                <td>{{$news->date}}</td>
                <td>{{$news->type_id}}</td>
                <td>{{$news->created_at}}</td>
                <td>
                    <a href="/admin/product/edit/{{$news->id}}" class="btn btn-sm btn-secondary">編輯</a>
                    <button data-newsid="{{$news->id}}" class="btn btn-sm btn btn-danger btn-del">刪除</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example').on("click",".btn-del",function(){
                var r=confirm("確認是否刪除");
                if(r==true){
                    window.location.href=`/admin/product/destroy/${this.dataset.newsid}`;
                }
            });
        } );
    </script>
@endsection
