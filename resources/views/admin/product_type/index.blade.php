@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<a class="btn btn-info mb-3" href="/admin/product_type/create">新增產品類別</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>產品類別名稱</th>
            <th>排序</th>
            <th>功能</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product_type_list as $product_type)
            <tr>
                <td>{{$product_type->type_name}}</td>
                <td>{{$product_type->sort}}</td>
                <td>
                    <a href="/admin/product_type/{{$product_type->id}}/edit" class="btn btn-sm btn-secondary">編輯</a>
                    <button data-ptid="{{$product_type->id}}" class="btn btn-sm btn btn-danger btn-del">刪除</button>
                    <form id="logout-form-{{$product_type->id}}" action="/admin/product_type/{{$product_type->id}}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
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
                    console.log();
                    $("#logout-form-"+$(this).attr('data-ptid')).submit();
                    // $(this).attr('data-ptid')
                }
            });
        } );
    </script>
@endsection
