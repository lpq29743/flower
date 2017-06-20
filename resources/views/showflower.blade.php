@extends('app')
@section('head')
    <title>显示鲜花</title>
@endsection
@section('content')
    <table cellspacing="20" width="700px"
           style="border: 1px dotted; margin: 5px auto 5px auto"
           align=center>
        @foreach($flowers as $flower)
            <tr>
                <td rowspan="8">
                    <img src="getFlowerImg/{{ $flower->pictureb }}" width="150px" height="150px"
                         style="margin: auto 5px auto 5px">
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
        @endforeach
    </table>
    <div align=center>
        {{ $flowers->links() }}
    </div>
@endsection
@section('script')

@endsection