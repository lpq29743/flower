@extends('adminindex')
@section('head')
    <title>所有订单</title>
    <style type="text/css">
        .table-order {
            max-width: 800px;
            text-align: center;
            margin: 15px auto 15px auto;
        }

        .table-order th, td {
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div align="center">
        <table class="table table-hover table-bordered table-order" style="max-width: 1000px">
            <tr>
                <th>序号</th>
                <th>订单编号</th>
                <th>订阅人</th>
                <th>收货人</th>
                <th>下单时间</th>
                <th>实付</th>
                <th>订单状态</th>
                <th>处理时间</th>
                <th>功能</th>
            </tr>
            @define $id=0
            @foreach($orders as $order)
                @php
                $id++;
                @endphp
                <tr>
                    <td>{{ $id }}</td>
                    <td>{{ $order->orderID }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->sname }}</td>
                    <td>{{ $order->inputtime }}</td>
                    <td>{{ $order->shifu }}</td>
                    <td>
                        <form class="form-inline" action="adminUpdateDdzt" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="orderID" name="orderID" value="{{ $order->orderID }}">
                            <select class="form-control" name="ddzt">
                                <option value="已付款"
                                        @if($order->ddzt == "已付款")
                                        selected="true"
                                        @endif>
                                    已付款
                                </option>
                                <option value="已发货"
                                        @if($order->ddzt == "已发货")
                                        selected="true"
                                        @endif>
                                    已发货
                                </option>
                                <option value="已完成"
                                        @if($order->ddzt == "已完成")
                                        selected="true"
                                        @endif>
                                    已完成
                                </option>
                            </select>
                            <button type="submit" class="btn btn-default">修改</button>
                        </form>
                    </td>
                    <td>{{ $order->cltime }}</td>
                    <td><a href="#">详情</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@section('script')
    <script>
        @if(Session::has('message'))
        alert("{{ Session::get('message') }}");
        @endif
    </script>
@endsection