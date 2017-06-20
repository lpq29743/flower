@extends('app')
@section('head')
    <title>订单详情</title>
    <style type="text/css">
        .table-order {
            max-width: 700px;
            margin: 15px auto 15px auto;
        }

        .heading {
            text-align: center;
            font-size: medium;
            font-family: SimSun;
            font-weight: bold;
            color: #0f0f0f;
            background: lightsalmon;
        }
    </style>
@endsection
@section('content')
    <table class="table table-order">
        <tr class="heading">
            <td colspan="4">
                订单处理信息
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px">
                    订单编号：<span style="color: red">{{ $order->orderID }}</span>
                </div>
                <div>
                    订单状态：<span style="color: red">{{ $order->ddzt }}</span>
                    @if($order->ddzt == "未付款")
                        <a href="cancelOrder/{{ $order->orderID }}">取消</a>
                        <a href="payOrder/{{ $order->orderID }}">付款</a>
                    @endif
                </div>
            </td>
        </tr>
        <tr class="heading">
            <td colspan="4">
                订单基本信息
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px; font-weight: bold; color: red">
                    订货人信息
                </div>
                <div style="margin-bottom: 10px">
                    姓名：{{ $order->mname }}
                </div>
                <div style="margin-bottom: 10px">
                    地址：{{ $order->address }}
                </div>
                <div style="margin-bottom: 10px">
                    手机：{{ $order->mobile }}
                </div>
                <div>
                    邮箱：{{ $order->email }}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px; font-weight: bold; color: red">
                    收货人信息
                </div>
                <div style="margin-bottom: 10px">
                    姓名：{{ $orderForCustomer->sname }}
                </div>
                <div style="margin-bottom: 10px">
                    地址：{{ $orderForCustomer->address }}
                </div>
                <div style="margin-bottom: 10px">
                    手机：{{ $orderForCustomer->mobile }}
                </div>
                <div>
                    邮编：{{ $orderForCustomer->zip }}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px; font-weight: bold; color: red">
                    其他信息
                </div>
                <div style="margin-bottom: 10px">
                    配送日期：{{ $order->peisongday }}&nbsp;
                    时段：{{ $order->peisongtime }}
                </div>
                <div style="margin-bottom: 10px">
                    订购时间：{{ $order->inputtime }}
                </div>
                <div style="margin-bottom: 10px">
                    付款方式：{{ $order->fkfs }}
                </div>
                <div>
                    @if($order->peisong == 0)
                        配送区域：市区送货
                    @elseif($order->peisong == 30)
                        配送区域：郊区送货
                    @else
                        配送区域：远郊送货
                    @endif
                </div>
            </td>
        </tr>
        <tr class="heading">
            <td colspan="4">
                商品信息
            </td>
        </tr>
        <tr>
            <th>商品名称</th>
            <th>价格</th>
            <th>数量</th>
            <th>小计</th>
        </tr>
        @foreach($flowers as $flower)
            <tr>
                <td><img src="getFlowerImg/{{ $flower->picturem }}" width="50px" height="50px"
                         style="margin: auto 5px auto 5px">{{ $flower->fname }}</td>
                <td>
                    {{ $flower->yourprice }}
                </td>
                <td>
                    {{ $flower->num }}
                </td>
                <td>
                    @php
                    $sum = $flower->yourprice * $flower->num
                    @endphp
                    {{ $sum }}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" align="right" style="font-weight: bold">
                订单合计金额：{{ $order->shifu }}
            </td>
        </tr>
    </table>
@endsection
@section('script')
@endsection