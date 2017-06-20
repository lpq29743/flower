@extends('app')
@section('head')
    <title>我的订单</title>
    <style type="text/css">
        .table-order {
            max-width: 800px;
            text-align: center;
            margin: 15px auto 15px auto;
        }

        .table-order caption {
            text-align: center;
            font-size: large;
            font-family: SimSun;
            font-weight: bold;
            color: #0f0f0f;
            background: lightsalmon;
        }

        .table-order th, td {
            text-align: center;
        }

        .td-order {
            text-align: left;
            font-size: medium;
            font-family: KaiTi;
            font-weight: bold;
            color: #0f0f0f;
            background: yellow;
        }
    </style>
@endsection
@section('content')
    <table class="table table-bordered table-order">
        <caption>我的订单记录</caption>
        <tr>
            <th>宝贝</th>
            <th>单价</th>
            <th>数量</th>
            <th>实付款</th>
            <th>交易状态</th>
            <th>操作</th>
        </tr>
        @forelse($orders as $order)
            <tr>
                <td class="td-order" colspan="6">
                    订单编号：{{ $order->orderID }}&nbsp;
                    配送日期：{{ $order->peisongday }}&nbsp;
                    收货人：{{ $order->sname }}
                </td>
            </tr>
            @define $sum=0
            @foreach($flowers as $flower)
                @if($flower->orderID == $order->orderID)
                    @php
                    $sum++;
                    @endphp
                @endif
            @endforeach
            @define $count=0
            @foreach($flowers as $flower)
                @if($flower->orderID == $order->orderID)
                    <tr>
                        <td><img src="getFlowerImg/{{ $flower->picturem }}" width="50px" height="50px"
                                 style="margin: auto 5px auto 5px">{{ $flower->fname }}</td>
                        <td>
                            <span style="text-decoration: line-through">{{ $flower->price }}</span><br/>
                            <span style="color: blue;">{{ $flower->yourprice }}</span>
                        </td>
                        <td>{{ $flower->num }}</td>
                        @if ($count++ == 0)
                            <td rowspan="{{ $sum }}">{{ $order->shifu }}</td>
                            <td rowspan="{{ $sum }}">
                                {{ $order->ddzt }}
                                @if($order->ddzt == "已发货")
                                    <a href="orderUpdate/{{ $order->orderID }}">确认收货</a>
                                @endif
                            </td>
                            <td rowspan="{{ $sum }}">
                                <a href="orderDetail?orderID={{ $order->orderID }}">查看</a>
                                @if($order->ddzt == "未付款")
                                    <a href="cancelOrder/{{ $order->orderID }}">取消</a>
                                    <a href="payOrder/{{ $order->orderID }}">付款</a>
                                @elseif($order->ddzt == "已完成")
                                    <a href="pingjia?orderID={{ $order->orderID }}">评价</a>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endif
            @endforeach
        @empty
        @endforelse
    </table>
    <div align=center>
        {{ $orders->links() }}
    </div>
@endsection
@section('script')
@endsection