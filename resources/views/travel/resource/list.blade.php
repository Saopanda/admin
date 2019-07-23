<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>懒游星球-行程资源库</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
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

        .main a {
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

        .main button {
            font-size: 13px;
            color: #fff;
            border: none;
            width: 60px;
            height: 25px;
            line-height: 25px;
            border-radius: 5px;
        }

        .main .modify {
            background: #90C400;
        }

        .main .delete {
            background: #D24726;
        }

        .main .checkbox {
            width: 20px;
        }

        .main table button {
            cursor: pointer;
        }
        .table-list .bgfff{
            background-color: #fff;
        }
        form{
            display: inline-block;
        }
    </style>
</head>

<body class="clearfloat">
    <div class="nav fl">
        <div class="logo">
            <h1>懒游星球</h1>
            <span>A端管理系统</span>
        </div>
        <ul class="">
                <li class="clearfloat"><a  href="/">首页</a></li>
                <li class="clearfloat"><a class="active" href="/resource">行程资源库</a></li>
                <li class="clearfloat"><a href="../GoodsTravel/index.html">商品行程</a></li>
                <li class="clearfloat"><a href="../OrderList/index.html">订单列表</a></li>
                <li class="clearfloat"><a href="../ClassAdmin/index.html">分类管理</a></li>
                <li class="clearfloat"><a href="../UserAdmin/index.html">用户管理</a></li>
            </ul>
    </div>
    <div class="content fl">
        <div class="header clearfloat">
            <ul class="fl clearfloat">
                <li><a class="active" href="">资源库</a></li>
                <li><a href=""></a></li>
            </ul>
            <div class="user fr">
                <img class="user-avatar" src="/images/avatar.jpg" alt="user avatar">
                <span class="user-name">用户名</span>
                <span>【退出】</span>
            </div>
        </div>
        <!-- 缺省页 列表无数据显示 -->
        @if(count($resource) == 0)
        <div class="main">
            <div class="table-list clearfloat">

                <ul class="clearfloat fl">
                    @foreach($Tclass as $k=>$v)
                        <a class="bgfff" href="/resource?classid={{$v->id}}">
                            <li class="iconChange @if($k == $classid-1) iconBg @endif">
                                <img src="/images/TravelRepository/icon/{{$v->icon}}">{{$v->name}}
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="none-page">
                <a href="/resource/create"><img src="/images/none-page.png" alt=""></a>
            </div>
        </div>
        @else
        <!-- main 内容 -->
        <div class="main fl clearfloat">
            <div class="table-list clearfloat">
                <ul class="clearfloat fl">
                    @foreach($Tclass as $k=>$v)
                        <a  class="bgfff" href="/resource?classid={{$v->id}}">
                            <li class="iconChange @if($k == $classid-1) iconBg @endif">
                                <img src="/images/TravelRepository/icon/{{$v->icon}}">{{$v->name}}
                            </li>
                        </a>
                    @endforeach
                </ul>
                <a href="/resource/create" class="fr">添加</a>
                <div class="search fr">
                    <input class="" type="text" placeholder="输入名称/位置搜索">
                    <i><img src="../images/TravelRepository/搜索.png" alt=""></i>
                </div>
            </div>

            <table border="0" cellpadding="3" cellspacing="1" bgcolor="#fff">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>名称</td>
                        <td>位置</td>
                        <td>描述</td>
                        <td>价格</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resource as $k=>$v)
                    <tr>
                        <td>
                            <input class="checkbox" type="checkbox" name="" id="">
                            <span>{{$v->id}}</span>
                        </td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->site}}</td>
                        <td>{{$v->des}}</td>
                        <td>{{$v->price}}</td>
                        <td>
                            <a href="/resource/{{$v->id}}/edit" class="modify">修改</a>
                            <form action="/resource/{{$v->id}}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button class="delete">删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- main 内容 -->
        @endif
    </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/public.js"></script>
<script>
    var iconChange = document.getElementsByClassName('iconChange');
    // tabChange(iconChange)
</script>

</html>