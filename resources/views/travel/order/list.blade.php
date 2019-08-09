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
    <li><a href="/order"  class="active">订单列表</a></li>
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

@endsection
@section('script')
    $('#orders').addClass('active');
@endsection