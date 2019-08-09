@extends('travel.layouts.index')
@section('style')
    .table-list li {
    float: left;
    width: 100px;
    height: 44px;
    margin: 0 10px;
    line-height: 44px;
    text-align: center;
    border-radius: 10px;
    background: #f2f2f2;
    color: #7D7D7D;
    border: solid #f2f2f2 1px;
    cursor: pointer;
    }

    .table-list li:hover {
    border: solid #1497E4 1px;
    background: #fff;
    }

    .table-list li img {
    width: 20px;
    vertical-align: middle;
    }

    .table-list .iconBg {
    color: #fff;
    background: #1497E4 !important;
    }

    .main .table-list a {
    display: inline-block;
    text-align: center;
    width: 120px;
    height: 40px;
    line-height: 40px;
    background: rgba(249, 143, 21, 1);
    border-radius: 10px;
    border: none;
    cursor: pointer;
    color: #fff;
    margin-right: 20px;
    }

    .main input {
    width: 200px;
    border: none;
    padding: 10px 0 6px 8px;
    background: #fff;
    border-bottom: solid 1px #e5e5e5;
    }

    .main .search {
    margin-right: 180px;
    }

    .main .search i {
    display: inline-block;
    width: 18px;
    margin-left: -35px;
    cursor: pointer;
    }

    .main table {
    text-align: center;
    margin-top: 20px;
    width: 100%;
    /* border-top-left-radius: 10px;
    border-top-right-radius: 10px; */
    }

    .main td {
    height: 40px;
    }

    .main thead {
    color: #fff;
    background: rgba(20, 151, 228, 1);
    }

    .main tbody {
    background: #eef2fe;
    color: #646363;
    }

    .main button{
    font-size: 13px;
    color: #fff;
    border: none;
    padding: 2px 10px;
    line-height: 25px;
    border-radius: 5px;
    }

    .main .modify {
    background: #90C400;
    }

    .main .delete {
    background: #D24726;
    }

    .main .ljfx {
    background: #F98F15;
    }

    .main .ewmfx {
    background: #F98F15;
    }

    .main .downfile {
    background: #17A9FF;
    }

    .main .checkbox {
    width: 20px;
    }

    .main table button {
    cursor: pointer;
    }
    .fl .bgfff{
    background-color: #fff!important;
    }
    form{
    display: inline-block;
    }
    /* 分页 */
    .pagination-box ul{
    padding-top:20px;
    }
    .pagination-box ul li{
    padding: 10px;
    width: 15px;
    height: 15px;
    line-height: 15px;
    float: left;
    color: #000;
    background: #1497E4;
    margin-left: 7px;
    text-align: center;
    color: #fff;
    cursor: pointer;
    }
    .pagination-box ul li a{
    color: #fff;
    background: #1497E4;
    }
    .main table tbody .button-padding{
        padding:5px 10px;

    }
@endsection

@section('toplist')
    <li><a href="/goods" class="active">行程列表</a></li>
@endsection
@section('main')
<!-- main 列表内容 -->
<div class="main fl clearfloat">
    <div class="table-list clearfloat">
        <ul class="clearfloat fl">
            <a class="bgfff" href="/goods?limit1=0&limit2=1">
                <li class="iconChange @if($limit2 == 1 || $limit1 == 0)iconBg @endif">1万以下</li>
            </a>
            <a class="bgfff" href="/goods?limit1=1&limit2=1.5">
                <li class="iconChange @if($limit2 == 1.5)iconBg @endif">1--1.5万</li>
            </a>
            <a class="bgfff" href="/goods?limit1=1.5&limit2=2">
                <li class="iconChange @if($limit2 == 2)iconBg @endif">1.5--2万</li>
            </a>
            <a class="bgfff" href="/goods?limit1=2&limit2=999">
                <li class="iconChange @if($limit2 == 999)iconBg @endif">2万以上</li>
            </a>
        </ul>
        <a href="/goods/create" class="fr">添加</a>
        <!--<div class="search fr">
            <input class="" type="text" placeholder="输入名称/位置搜索">
            <i><img src="/images/TravelRepository/搜索.png" alt=""></i>
        </div>--!>
    </div>
    <table border="0" cellpadding="3" cellspacing="1" bgcolor="#fff">
        <thead>
        <tr>
            <td>ID</td>
            <td>所属分类</td>
            <td>行程名称</td>
            <td>出行天数</td>
            <td>出发时间</td>
            <td>成本价</td>
            <td>指导价</td>
            <td>制作状态</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($goods as $k=>$v)
            <tr>
                <td>
                    <input class="checkbox" type="checkbox" name="" id="">
                    <span>{{$v->id}}</span>
                </td>
                <td>{{$v->classInfo->name}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->days}}</td>
                <td>{{$v->start_date}}</td>
                <td>{{$v->price}}</td>
                <td>{{$v->price_sel}}</td>
                <td>@if($v->status == 0)未完成 @else 已完成 @endif</td>
                <td>
                    <a href="/goods/{{$v->id}}" class="modify button-padding" style="background-color:#00CC66">查看行程</a>
                    @if($v->status == 0)
                    <a href="/goods_poi/{{$v->id}}/create" class="modify button-padding" style="background-color:#4caca7">继续制作</a>
                    @else
                        <a href="/goods/{{$v->id}}/edit" class="modify button-padding" style="background-color:#e26000">修改行程</a>
                    @endif

                    <a href="" class="ljfx button-padding" style="background-color:#1497E4">链接分享</a>
                    <a href="" class="ewmfx button-padding" style="background-color:#1497E4">二维码分享</a>
                    <a href="" class="downfile button-padding" style="background-color:#ff8820">下载文档</a>
                    <form action="/goods/{{$v->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <button class="delete" style="background-color: #d23226">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination-box">
        {{ $goods->appends(['limit1' => $limit1,'limit2'=>$limit2])->links() }}
    </div>
</div>
@endsection
@section('script')
    $('#goods').addClass('active');
    var iconChange = document.getElementsByClassName('iconChange');
    tabChange(iconChange);
@endsection

