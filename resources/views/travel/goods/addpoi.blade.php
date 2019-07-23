<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>懒游星球-添加每日行程</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        /* .table-list { */
        /* width: 100%; */
        /* } */
        [v-cloak] {
            display: none;
        }

        form {
            padding-top: 20px;
        }

        form label {
            width: 110px;
            display: inline-block;
            text-align: center;
            font-size: 18px;
            color: #7D7D7D;
        }

        form input {
            width: 320px;
            height: 40px;
            padding: 0 5px;
        }

        /* 选择添加内容 */
        .addContent {
            margin: 30px;
        }

        .addTypeContent {
            position: relative;
            /*display: none;*/
            padding: 10px 10px;
            background: #ededed;

        }

        .addTypeContent .table-list .active {
            background: #17A9FF;
            color: #fff;
        }

        .addContent h3 {
            height: 46px;
            line-height: 46px;
        }

        .addContent h3::before {
            content: '';
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 10px;
            background: #8af64f;
            border-radius: 50%;
        }

        /* 类型 title */
        .typeListTitle {
            padding-bottom: 10px;
        }

        /* 添加选项 type list */
        .typeList {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 330px;
            text-align: center;
            overflow: auto;
        }

        .typeList li {
            width: 29.333%;
            height: 135px;
            margin: 1%;
            padding: 1%;
            cursor: pointer;
            background: #fff;
        }

        .typeList li img {
            display: inline-block;
            width: 120px;
            height: 90px;
        }

        .typeList li div {
            display: inline-block;
            width: 61%;
            height: 100px;
            padding-top: 4px;
            vertical-align: top;
        }

        .typeList li h4 {
            text-align: left;
            margin-bottom: 5px;
            color: #333333;
            font-weight: 400;
            margin-left: 5px;
        }

        .typeList li p {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            color: #7D7D7D;
            font-size: 14px;
        }

        .typeList li span {
            display: block;
            color: #F98F15;
            width: 100%;
            text-align: left;
            margin-top: 10px;
            margin-left: 5px;
        }

        /* added 以添加的内容 */
        .added img {
            display: inline-block;
            width: 120px;
            height: 90px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .added li {
            margin: 30px;
        }

        .added h4::before {
            content: '';
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 10px;
            border-radius: 50%;
            background: #35CCF8;
            background-size: 20px;
        }

        .added li p {
            padding-left: 26px;
            padding-top: 15px;
            color: #696664;
            font-size: 14px;
        }

        /* 按钮 */
        .submit-box {
            position: absolute;
            bottom: -62px;
            right: 14px;
            padding: 12px;
            padding-right: 3%;
            text-align: right;
        }
    </style>
</head>

<body class="clearfloat">
{{csrf_field()}}
    <div class="nav fl">
        <div class="logo">
            <h1>懒游星球</h1>
            <span>A端管理系统</span>
        </div>
        <ul class="">
            <li class="clearfloat"><a href="../index.html">首页</a></li>
            <li class="clearfloat"><a href="../TravelRepository/index.html">行程资源库</a></li>
            <li class="clearfloat"><a class="active" href="../GoodsTravel/index.html">商品行程</a></li>
            <li class="clearfloat"><a href="../OrderList/index.html">订单列表</a></li>
            <li class="clearfloat"><a href="../ClassAdmin/index.html">分类管理</a></li>
            <li class="clearfloat"><a href="../UserAdmin/index.html">用户管理</a></li>
        </ul>
    </div>
    <div class="content fl">
        <div class="header clearfloat">
            <ul class="fl clearfloat">
                <li><a href="./index.html">行程列表</a></li>
                <li class="closeLi">
                    <a class="active" href="#">添加每日行程</a>
                    <a class="closePage" href="./index.html">×</a>
                </li>
            </ul>
            <div class="user fr">
                <img class="user-avatar" src="../images/avatar.jpg" alt="user avatar">
                <span class="user-name">用户名</span>
                <span>【退出】</span>
            </div>
        </div>
        <div class="main fl clearfloat" id="app" >
            <h2>每日行程安排</h2>

            <form action="">
                <label for="toDay">ToDay</label> <input type="text" placeholder="今日行程概况">
                <!-- 已添加内容 -->
                <div class="added">
                    <ul>
                        <li v-for="list in addedList" :key='list.id'>
                            <h4>1111111</h4>
                            <p>
                                <img v-if='list.imgUrl[0]' :src='list.imgUrl[0]' alt="">
                                <img v-if='list.imgUrl[1]' :src='list.imgUrl[1]' alt="">
                                <img v-if='list.imgUrl[2]' :src='list.imgUrl[2]' alt="">
                            </p>
                            <p>2222222222</p>
                        </li>
                    </ul>
                </div>
            </form>

            <!-- add 添加选项 -->
            <div class="addContent clearfloat">
                <h3 class="fl">选择添加内容</h3>
                <div class="table-list clearfloat fl">
                    <ul class="clearfloat fl">
                        <li data-id="" class="iconChange"><img src="../images/TravelRepository/icon/jingdian0.png"> 景点</li>
                        <li data-id="" class="iconChange"><img src="../images/TravelRepository/icon/jiudian0.png"> 酒店</li>
                        <li data-id="" class="iconChange"><img src="../images/TravelRepository/icon/canting0.png"> 餐厅</li>
                        <li data-id="" class="iconChange"><img src="../images/TravelRepository/icon/jiaotong0.png"> 交通</li>
                        <li data-id="" class="iconChange"><img src="../images/TravelRepository/icon/cankao0.png">参考行程</li>
                    </ul>
                </div>
            </div>
            <!-- 添加类型 -->
            <div class="addTypeContent">
                <div class="clearfloat">
                    <div class="table-list clearfloat fl">
                        <ul id="ulClass" class="typeListTitle clearfloat fl">
                        </ul>
                    </div>

                    <ul class="typeList clearfloat fl">
                        <li v-for="list in typeList" @click='clickAdd(list)' :key='list.id'>
                            <h4>11111111111</h4>
                            <img :src='list.imgUrl[0]' alt="">
                            <div>
                                <p> 111111111</p>
                                <span>参考价格：</span>
                            </div>
                        </li>
                    </ul>

                </div>
                <!-- 添加按钮 -->
                <div class="submit-box">
                    <p>
                        <button class='yellow-btn'>添加第二日行程</button>
                        <button class='blue-btn'>完成今日行程</button>
                        <a href="./EverydayTravelList.html">TravelDetail</a>
                    </p>
                </div>
w
            </div>
        </div>
        <!-- mian -->
    </div>
</body>
<script src="/js/vue.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/public.js"></script>
<script>
    var ip = 'http://travelpc.com/goodsAdd_class';



    function getClass(id){
        $.get(ip, {id: id},function (res) {
            console.log(res)
            var claas = res.class.dclass;
            $.each(claas, function (i, item) {
                $("#ulClass").append(
                    "<li class='iconChangePage1' data-id=" + item.id + " data-classid=" +
                    item.claasid + ">" + item.name + "</li>"
                );
            });
        })
    }
    function getClass2(id, classid){
        $.get(ip, {id: id, classid: classid},function (res) {
            console.log(res)
            var claas = res.class.dclass;
            $.each(claas, function (i, item) {
                $("#ulClass").append(
                    "<li class='iconChangePage1' data-id=" + item.id + " data-classid=" +
                    item.claasid + ">" + item.name + "</li>"
                );
            });
        })
    }

    $(document).ready(function () {
        $.get(ip, function (res) {
            console.log(res)
            var claas = res.class.dclass;
            $.each(claas, function (i, item) {
                $("#ulClass").append(
                    "<li class='iconChangePage1' data-id=" + item.id + " data-classid=" +
                    item.claasid + ">" + item.name + "</li>"
                );
            });
        })
    })


    function tabChange() {
        for (var i = 0; i < iconChange.length; i++) {
            iconChange[i].index = i;
            iconChange[i].onclick = function () {
                for (var j = 0; j < iconChange.length; j++) {
                    iconChange[j].className = 'iconChange';
                }
                var id = iconChange[this.index].getAttribute("data-id");
                iconChange[this.index].className = 'iconChange iconBg';
                getClass(id);//class 1
            }
        }
    }
    var iconChange = $('.iconChange');
    tabChange(iconChange);
    var iconChange1 = document.getElementsByClassName('iconChangePage1');
    iconChange1Fc(iconChange1)

    function iconChange1Fc(iconChange) {
        var len = iconChange.length;
        for (var i = 0; i < len; i++) {
            iconChange[i].index = i;
            iconChange[i].onclick = function () {
                for (var j = 0; j < len; j++) {
                    iconChange[j].className = 'iconChangePage1';
                }
// console.log(iconChange[this.index])
                iconChange[this.index].className = 'iconChangePage1 active';
                var id = iconChange[this.index].getAttribute("data-id");
                var classid = iconChange[this.index].getAttribute("data-classid");
                console.log(id, classid);
                getClass2(id, classid)
// console.log(iconChange[this.index].firstElementChild.src)
            }
        }
    }

</html>