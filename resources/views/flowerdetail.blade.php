@extends('app')
@section('head')
    <title>鲜花详情</title>
    <style type="text/css">
        .table-pingjia {
            max-width: 850px;
            margin: 15px auto 15px auto;
        }

        .table-pingjia caption {
            text-align: center;
            font-size: large;
            font-family: SimSun;
            font-weight: bold;
            color: #0f0f0f;
            background: lightsalmon;
        }
    </style>
@endsection
@section('content')
    <table cellspacing="20" width="850px"
           style="margin: 15px auto 15px auto;"
           align=center>
        <tr>
            <td rowspan="8">
                <img src="getFlowerImg/{{ $flower->pictureb }}" style="margin: auto 15px auto 15px">
            </td>
            <td>
                <div style="font-weight: bold; font-size: medium; height: 40px; line-height: 40px; color: #000066; text-align: center; border: 1px solid red;">
                    <a href="flowerDetail?flowerID={{ $flower->flowerID }}">{{ $flower->fname }}</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                材料： {{ $flower->cailiao }}
            </td>
        </tr>
        <tr>
            <td>
                包装：{{ $flower->baozhuang }}
            </td>
        </tr>
        <tr>
            <td>
                花语：{{ $flower->huayu }}
            </td>
        </tr>
        <tr>
            <td>
                说明：{{ $flower->shuoming }}
            </td>
        </tr>
        <tr>
            <td style="font-size: medium; color: blue; text-decoration: line-through">
                原价：￥{{ $flower->price }}
            </td>
        </tr>
        <tr>
            <td style="font-size: medium; color: red;">
                现价：￥{{ $flower->yourprice }}
            </td>
        </tr>
        <tr>
            <td>
                <img src="images/ingwc_ico.jpg" width="150px" height="36px"
                     onclick="location.href='addgwch/{{$flower->flowerID}}'"/>
            </td>
        </tr>
    </table>
    <table class="table table-bordered table-pingjia">
        <caption>用户评价</caption>
        @forelse($shoplists as $shoplist)
            <tr>
                <td style="text-align: center">
                    <img src="getFlowerImg/{{ $flower->picturem }}" width="50px" height="50px"
                         style="margin: 5px 5px 5px 5px">

                    <p align="center" style="margin: 5px auto auto auto">{{ $shoplist->email }}</p>
                </td>
                <td>
                    <p>整体评价：
                        @if($shoplist->star == 1)
                            好评
                        @elseif($shoplist->star == 2)
                            中评
                        @else
                            差评
                        @endif
                    </p>

                    <p>
                        评价内容：
                        {{ $shoplist->evaluate }}
                    </p>

                    <p>
                        评价时间：
                        {{ $shoplist->cltime }}
                    </p>
                </td>
            </tr>
        @empty
            <tr>
                <td align="center">目前还没有用户评价</td>
            </tr>
        @endforelse
    </table>
@endsection
@section('script')
@endsection