@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<a class="btn btn-info mb-3" href="/admin/news/create">新增資料</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>標題</th>
            <th>副標題</th>
            <th>圖片</th>
            <th>created_at</th>
            <th>功能</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news_list as $news)
            <tr>
                <td>{{$news->title}}</td>
                <td>{{$news->sub_title}}</td>
                <td><img height="150px" src="{{$news->img_url}}" alt=""></td>
                <td>{{$news->created_at}}</td>
                <td>
                    <a href="/admin/news/edit/{{$news->id}}" class="btn btn-sm btn-secondary">編輯</a>
                    <a href="" class="btn btn-sm btn btn-danger">刪除</a>
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
        } );
    </script>
@endsection
