@extends('adminindex')
@section('head')
    <title>鲜花管理</title>
    <style type="text/css">
        th, td {
            text-align: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection
@section('content')
    <div align="center">
        <div align="left" style="width: 60%; margin:15px auto 15px auto;">
            <button type="button" class="btn btn-default" onclick="{location.href='flowerAdd'}">添加鲜花</button>
        </div>
        <table class="table table-hover table-bordered" style="max-width: 800px">
            <tr>
                <th>编号</th>
                <th>商品名称</th>
                <th>市场价</th>
                <th>现价</th>
                <th>删除</th>
            </tr>
            @foreach($flowers as $flower)
                <tr>
                    <td>{{ $flower->flowerID }}</td>
                    <td><img src="getFlowerImg/{{ $flower->picturem }}" width="50px" height="50px"
                             style="margin: auto 5px auto 5px">{{ $flower->fname }}</td>
                    <td>{{ $flower->price }}</td>
                    <td>
                        <form class="form-inline" action="flowerUpdate" method="post" enctype="multipart/form-data"
                              data-toggle="validator"
                              role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="flowerID" name="flowerID" value="{{ $flower->flowerID }}">

                            <div class="form-group">
                                <input type="number" class="form-control" id="yourprice" name="yourprice"
                                       value="{{ $flower->yourprice }}"
                                       required>
                            </div>
                            <button type="submit" class="btn btn-default">更新</button>
                        </form>
                    </td>
                    <td>
                        <form class="form-inline" action="flowerDelete" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="flowerID" name="flowerID" value="{{ $flower->flowerID }}">
                            <button type="submit" class="btn btn-default">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div align=center>
        {{ $flowers->links() }}
    </div>
@endsection
@section('script')
    <script>
        @if(Session::has('message'))
            alert("{{ Session::get('message') }}");
        @endif
    </script>
@endsection