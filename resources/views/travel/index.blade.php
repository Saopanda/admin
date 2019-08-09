@extends('travel.layouts.index')
@section('style')
        .color-green {
            color: #0EC658;
        }

        .color-blue {
            color: #1497E4;
        }

        .color-orange {
            color: #FC4A0C;
        }

        .color-purple {
            color: #924BF4;
        }

        .kjbg1 {
            background: #7A70EE;
        }

        .kjbg2 {
            background: #90C400;
        }

        .kjbg3 {
            background: #0085CE;
        }

        .kjbg4 {
            background: #924BF4;
        }

        .kjbg5 {
            background: #D24726;
        }

        .border-none {
            border: none !important;
        }

        .main {
            padding: 10px;
        }

        .main .main-left {
            width: 50%;
        }

        .main .main-right {
            width: 50%;
        }

        .main h2 {
            margin-top: 13px;
            margin-bottom: 10px;
            font-size: 17px;
        }

        .main-box {
            padding: 14px;
            background: #F7F7F7;
            border-radius: 10px;
        }

        .main-box .Tnum {
            text-align: center;
            padding: 10px 24px;
            border-right: solid 1px #DEDEDE;
        }

        .main-box .Tnum span {
            color: #272727;
            font-size: 23px;
        }

        .main-box .Tnum p {
            padding-top: 3px;
            color: #666666;
            font-size: 16px;
        }

        .main-box ul {
            margin-top: 20px;
            padding: 10px;
        }

        .main-box ul li {
            float: left;
            border-right: solid 1px #DEDEDE;
            padding: 0 10px;
            font-size: 14px;
        }

        .w375 {
            width: 340px;
        }

        .main .main-kj {
            display: flex;
            flex-wrap: wrap;
        }

        .main-kj a {
            display: block;
            width: 30%;
            height: 100px;
            line-height: 100px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 10px;
        }

        .mr5 {
            margin-right: 4%;
            margin-bottom: 2%;
        }

        /* right */
        .main-right {
            height: 100%;
            box-sizing: border-box;
            padding-left: 30px;
        }

        .ml20 {
            margin-left: 20px;
        }

        .main-right table {
            width: 100%;
        }

        table thead {
            display: none;
        }
        table tbody tr{
            height: 25px;
        }
        .main-right .bg-gray {
            box-sizing: border-box;
            padding: 20px;
            height: 90%;
            background: #F7F7F7;
            color: #666666;
        }
@endsection

@section('toplist')
    <li><a href="/"  class="active">首页</a></li>
@endsection
@section('main')
    <div style="height: 100%;
    width: 85%;
    position: fixed;
    background-color: #5656567a;
    text-align: center;
    color: #fff;
    line-height: 86vh;
    font-size: 42px;">
        功能开发中。
    </div>
    <div class="main fl clearfloat">
        <div class="main-left fl">
            <h2>行程路线</h2>
            <div class="main-box clearfloat">
                <div class="Tnum fl">
                    <span>25</span>
                    <p>行程数量</p>
                </div>
                <ul class="fl">
                    <li class="color-green">1万以下：10</li>
                    <li class="color-blue">1万--1.5万：07</li>
                    <li class="color-orange">1.5--2万：07</li>
                    <li class="border-none color-purple">2万以上：08</li>
                </ul>
            </div>
            <h2>资源信息</h2>
            <div class="main-box clearfloat w375">
                <div class="Tnum fl">
                    <span>25</span>
                    <p>景点数量</p>
                </div>
                <div class="Tnum fl">
                    <span>25</span>
                    <p>酒店数量</p>
                </div>
                <div class="Tnum fl border-none">
                    <span>25</span>
                    <p>餐厅数量</p>
                </div>
            </div>
            <h2>快捷功能入口</h2>
            <div class="main-kj">
                <a href="" class="kjbg1 mr5">
                    行程制作
                </a>
                <a href="" class="kjbg2 mr5">
                    添加合伙人
                </a>
                <a href="" class="kjbg3">
                    景点资源录入
                </a>
                <a href="" class="kjbg4 mr5">
                    酒店资源录入
                </a>
                <a href="" class="kjbg5 mr5">
                    餐厅资源录入
                </a>
            </div>
        </div>
        <div class="main-right fr">
            <h2>订单管理
                <span class="color-blue  ml20"> 预定数量：10</span>
                <span class="color-orange ml20"> 完成数量：10</span>
            </h2>
            <div class="bg-gray box">
                <table>
                    <thead>
                    <tr>
                        <td>123</td>
                        <td>123</td>
                        <td>123</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <span class="color-blue">大飞狼</span> 预定 <span class="color-orange">斐济6天8晚</span>
                        </td>
                        <td>
                            ￥5000(30%)
                        </td>
                        <td>
                            07-12 14:20
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span class="color-blue">大飞狼</span> 预定 <span class="color-orange">斐济6天8晚</span>
                        </td>
                        <td>
                            ￥5000(30%)
                        </td>
                        <td>
                            07-12 14:20
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('script')
    $('#index').addClass('active');
@endsection
