@extends('travel.layouts.index')
@section('style')
.main h2 {
margin-bottom: 0;
}

.main h3 {
color: #7D7D7D;
font-size: 17px;
font-weight: 500;
}

.main-top {
height: 270px;
}

.main-top p {
color: #7D7D7D;
font-size: 17px;
font-weight: 500;
}

.main-top h3 {
font-size: 17px;
margin-bottom: 10px;
}

.main-top input {
padding: 5px 10px;
color: #17A9FF;
}

.main-bottom h3 {
margin-left: 17px;
margin-bottom: 10px;
}

.main-top .left {
width: 48%;
height: 240px;
padding: 15px;
box-sizing: border-box;
margin: 0 1%;
}

.main-top .right {
width: 48%;
height: 200px;
padding: 15px;
box-sizing: border-box;
margin: 0 1%;
}

.main-top ol {
line-height: 1.5;
margin-left: 10px;
height: 150px;
overflow: auto;
padding-bottom: 10px;
background: #FAFAFA;
}

.main-top ul {
line-height: 1.5;
margin-left: 10px;
height: 150px;
overflow: auto;
padding-bottom: 10px;
background: #FAFAFA;
}
.main-top .bz{
width:95%;
height:100%;
padding:10px;
line-height: 1.5;
resize:none;
margin-left: 10px;
height: 150px;
overflow: auto;
padding-bottom: 10px;
background: #FAFAFA;
margin-left: 10px;
border:none;
outline:none;
}

.main-top li {
padding: 10px 10px 0 10px;
}

.main-top .left p {
margin: 10px 0;
}

ul,
ol {
list-style: none;
}

.main-bottom {
width: 98%;
margin: auto;
}

.main-bottom textarea {
outline: none;
padding: 10px;
width: 98%;
height: 150px;
}

@endsection

@section('toplist')
<li><a href="/goods">行程列表</a></li>
<li class="closeLi">
    <a class="active">其他设置</a>
    <a class="closePage" href="/goods">×</a>
</li>
@endsection
@section('main')

<form class="main fl clearfloat" action="/goods_poi/{{$gid}}/last" method="post">
    {{csrf_field()}}
    <h2>行程主标题</h2>
    <div class="clearfloat main-top">
        <div class="fl left">
            <h3>价格包含</h3>
            <ol>
                @foreach($res as $k=>$v)
                @if(isset($v->resource_info))
                <li>{{$v->resource_info->lxinfo->name}}：{{$v->resource_info->name}} <span
                        style="float: right">￥{{$v->price}}</span></li>
                @else
                <li>资源失效 {{$v->price}}</li>
                @endif
                @endforeach
            </ol>
            <p>
                <span> 成本价：<input type="text" value="{{$price}}" readonly></span>
                <span> 指导价: <input type="number" min="0" name="price_sel" @if($goods->price_sel == 0)
                    placeholder="请输入指导价" @else value="{{$goods->price_sel}}" @endif></span>
            </p>
        </div>
        <!-- 行程备注 -->
        <div class="fl right">
            <h3>行程备注</h3>
            <textarea class="bz" name='' placeholder="选填..."></textarea>
        </div>
        <!-- 酒店住宿安排 -->
        <!-- <div class="fl right">
                <h3>酒店住宿安排</h3>
                <ul>
                    @foreach($jiudian as $k=>$v)
                    <li>{{$v->lxinfo->name}}: {{$v->name}}</li>
                    @endforeach
                </ul>
            </div> -->
    </div>
    <div class="main-bottom">
        <h3>购买须知</h3>
        <textarea name="des" placeholder="请输入购买须知...">{{$goods->des}}</textarea>
    </div>
    <p class="center">
        <button type="submit" class="blue-btn">完成行程创建</button>
    </p>
</form>

@endsection
@section('script')
$('#goods').addClass('active');
@endsection