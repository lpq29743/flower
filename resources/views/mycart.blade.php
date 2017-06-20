@extends('app')
@section('head')
    <title>购物车</title>
    <style type="text/css">
        th, td {
            text-align: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection
@section('content')
    <div align="center">
        <img src="images/cartbg1.jpg" style="margin:10px auto 10px auto;"/>
        @forelse($carts as $cart)
            @if($loop->first)
                <table class="table table-hover table-bordered" style="max-width: 800px">
                    <tr>
                        <th>编号</th>
                        <th>商品名称</th>
                        <th>市场价</th>
                        <th>现价</th>
                        <th>数量</th>
                        <th>删除</th>
                    </tr>
                    @endif
                    <tr>
                        <td>{{ $cart->flowerID }}</td>
                        <td><img src="getFlowerImg/{{ $cart->picturem }}" width="50px" height="50px"
                                 style="margin: auto 5px auto 5px">{{ $cart->fname }}</td>
                        <td>{{ $cart->price }}</td>
                        <td>{{ $cart->yourprice }}</td>
                        <td>
                            <form class="form-inline" action="cartUpdate" method="post" enctype="multipart/form-data"
                                  data-toggle="validator"
                                  role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="cartID" name="cartID" value="{{ $cart->cartID }}">

                                <div class="form-group">
                                    <input type="number" class="form-control" id="num" name="num"
                                           value="{{ $cart->num }}"
                                           required>
                                </div>
                                <button type="submit" class="btn btn-default">更新</button>
                            </form>
                        </td>
                        <td>
                            <form class="form-inline" action="cartDelete" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="cartID" name="cartID" value="{{ $cart->cartID }}">
                                <button type="submit" class="btn btn-default">删除</button>
                            </form>
                        </td>
                    </tr>
                    @if($loop->last)
                </table>
                <div align="right" style="width: 75%; margin:10px auto 15px auto;">
                    <label style="margin-right: 10px">合计：{{ $sum }}</label>
                    <button type="button" class="btn btn-default" onclick="{location.href='showFlower'}"
                            style="margin-right: 10px">继续挑选商品
                    </button>
                    <button type="button" class="btn btn-default" onclick="{location.href='cartClear'}"
                            style="margin-right: 10px">清除购物车
                    </button>
                    <button type="button" class="btn btn-default" onclick="{location.href='order'}">提交我的订单</button>
                </div>
            @endif
        @empty
            <p style="margin: 10px auto 10px auto">您还没有添加任何鲜花呢！快去<a href="showFlower">鲜花页面</a>添加鲜花吧</p>
        @endforelse
    </div>
@endsection
@section('script')
    <script>
        @if(Session::has('message'))
        alert("{{ Session::get('message') }}");
        @endif
    </script>
@endsection