@extends('app')
@section('head')
    <title>添加鲜花</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection
@section('content')
    <div style="width:35%; margin:10px auto 10px auto;">
        <form class="form-horizontal" action="flowerAdd" method="post" enctype="multipart/form-data"
              data-toggle="validator"
              role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-sm-3 control-label">编号</label>

                <div class="col-sm-9">
                    <input type="number" class="form-control" id="flowerID" name="flowerID" placeholder="鲜花编号" required
                           min="0" max="999999999999999">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">名称</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="鲜花名称" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">类别</label>

                <div class="col-sm-9">
                    <select class="form-control" name="myclass">
                        <option value="鲜花">鲜花</option>
                        <option value="蛋糕">蛋糕</option>
                        <option value="礼篮">礼篮</option>
                        <option value="果篮">果篮</option>
                        <option value="公仔">公仔</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">用途</label>

                <div class="col-sm-9">
                    <select class="form-control" name="fclass1">
                        <option value="爱情鲜花">爱情鲜花</option>
                        <option value="友情鲜花">友情鲜花</option>
                        <option value="生日鲜花">生日鲜花</option>
                        <option value="问候长辈">问候长辈</option>
                        <option value="回报老师">回报老师</option>
                        <option value="祝福庆贺">祝福庆贺</option>
                        <option value="婚庆鲜花">婚庆鲜花</option>
                        <option value="探病慰问">探病慰问</option>
                        <option value="生子祝贺">生子祝贺</option>
                        <option value="道歉鲜花">道歉鲜花</option>
                        <option value="家居鲜花">家居鲜花</option>
                        <option value="丧葬哀思">丧葬哀思</option>
                        <option value="开业乔迁">开业乔迁</option>
                        <option value="商务礼仪">商务礼仪</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">主材料</label>

                <div class="col-sm-9">
                    <select class="form-control" name="fclass">
                        <option value="玫瑰">玫瑰</option>
                        <option value="康乃馨">康乃馨</option>
                        <option value="郁金香">郁金香</option>
                        <option value="百合">百合</option>
                        <option value="扶郎">扶郎</option>
                        <option value="马蹄莲">马蹄莲</option>
                        <option value="向日葵">向日葵</option>
                        <option value="蓝色妖姬">蓝色妖姬</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">材料</label>

                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="cailiao" name="cailiao"
                              placeholder="请用简短的文字描述花的材料" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">包装</label>

                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="baozhuang" name="baozhuang"
                              placeholder="请用简短的文字描述花的包装" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">花语</label>

                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" id="huayu" name="huayu" placeholder="请写出此花的花语" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">说明</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="shuoming" name="shuoming" placeholder="关于花的说明" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">市场价</label>

                <div class="col-sm-9">
                    <input type="number" class="form-control" id="price" name="price" placeholder="市场价格" required
                           min="1">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">现价</label>

                <div class="col-sm-9">
                    <input type="number" class="form-control" id="yourprice" name="yourprice" placeholder="您给出的价格"
                           required min="0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">最小图片</label>

                <div class="col-sm-9">
                    <input type="file" name="picture[]" accept="image/gif, image/jpeg" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">图片</label>

                <div class="col-sm-9">
                    <input type="file" name="picture[]" accept="image/gif, image/jpeg" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">大图片</label>

                <div class="col-sm-9">
                    <input type="file" name="picture[]" accept="image/gif, image/jpeg" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">详细介绍</label>

                <div class="col-sm-9">
                    <input type="file" name="picture[]" accept="image/gif, image/jpeg" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">材料图片</label>

                <div class="col-sm-9">
                    <input type="file" name="picture[]" accept="image/gif, image/jpeg" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">包装图片</label>

                <div class="col-sm-9">
                    <input type="file" name="picture[]" accept="image/gif, image/jpeg" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">是否特价</label>

                <div class="col-sm-9">
                    <select class="form-control" name="tejia">
                        <option value="是">是</option>
                        <option value="否">否</option>
                    </select>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="form-group alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('message'))
                <div class="form-group alert alert-danger">
                    <ul>
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')

@endsection