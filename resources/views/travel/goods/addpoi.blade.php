@extends('travel.layouts.index')
@section('style')

form {
padding-top: 20px;
}

form label {
width: 93px;
display: inline-block;
text-align: right;
font-size: 18px;
color: #7D7D7D;
margin-right: 10px;
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
display: none;
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
max-height: 50vh;
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
float:left;
display: inline-block;
width: 39%;
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
}

.typeList li p {
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 3;
overflow: hidden;
color: #7D7D7D;
font-size: 14px;
text-align: left;
height: 57px; font-size: 14px; margin-left: 4px;
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
position: relative;
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
.delete{
position: absolute;
top: 0px;
color: #7e7e7e;
font-size: 13px;
font-weight: 100;
cursor: pointer;
display: inline-block;
margin-left: 330px;
text-align: right;
}

/* 按钮 */
.submit-box {
width:100%;
box-sizing: border-box;
position: absolute;
bottom: -62px;
right: 14px;
padding: 12px 0;
text-align: right;
}
.submit-box h3{
text-align: left;
}
form textarea {
vertical-align: top;
width: 50%;
height: 100px;
outline: none;
padding: 10px 5px;
resize: none;
}
/*搜索框*/
.table-list .search {
position:relative;
width: 230px;
height: 40px;
border: solid #efefef 2px;
outline: none;
}
.table-list .search input{
width: 230px;
height: 40px;
border-bottom: solid #c0c0c0 1px;
outline: none;
padding-left: 15px;
}
.table-list .search i{
background-image: url("http://58pic.ooopic.com/58pic/15/55/49/57V58PICgap.png");
display: block;
width: 40px;
height: 40px;
background-repeat: no-repeat;
background-size: 80% 80%;
position: absolute;
bottom: 0;
left: 0;
cursor: pointer;
}
@endsection

@section('toplist')
<li><a href="/goods">行程列表</a></li>
<li class="closeLi">
    <a class="active">添加每日行程</a>
    <a class="closePage" href="/goods">×</a>
</li>
@endsection
@section('main')
<div class="main fl clearfloat" id="app">
    <h2>每日行程安排</h2>
    <form id="formSubmit" action="/goods_poi/{{$gid}}" method="post">
        {{csrf_field()}}
        <label for="toDay">第 {{$count+1}} 天</label> <input name="comment" type="text" placeholder="今日行程概况">
        <!-- 备注 -->
        <br><br>
        <label for="info">备注</label> <textarea name="dess" placeholder="请输入备注.."></textarea>
        <!-- 已添加内容 -->
        <div class="added">
            <ul id="addedUl">
                <!-- <li>
                        <h4>名称 <span class='delete'>删除</span></h4>
                        <p>
                            <img src='https://hbimg.huabanimg.com/e6cb32aa55e2f11b5aeb21ee6286ef18e1a2beda15cdc9-IVq6Kx_fw658'
                                alt="img">
                        </p>
                        <p>详情</p>
                         <input type="hidden" name="resouceId" value="">
                    </li> -->
            </ul>
        </div>
        <!-- 已添加内容 -->
    </form>

    <!-- add 添加选项 -->
    <div class="addContent clearfloat">
        <h3 class="fl">选择添加内容</h3>
        <div class="table-list clearfloat fl">
            <ul class="clearfloat fl">
                <li class="iconChange" data-id='1'><img src="/images/TravelRepository/icon/jingdian0.png"> 景点
                </li>
                <li class="iconChange" data-id='2'><img src="/images/TravelRepository/icon/jiudian0.png"> 酒店
                </li>
                <li class="iconChange" data-id='3'><img src="/images/TravelRepository/icon/canting0.png"> 餐厅
                </li>
                <li class="iconChange" data-id='4'><img src="/images/TravelRepository/icon/jiaotong0.png"> 交通
                </li>
                <li class="iconChange" data-id='5'><img src="/images/TravelRepository/icon/cankao0.png">参考行程
                </li>
            </ul>
        </div>
    </div>
    <!-- 添加类型 -->
    <div class="addTypeContent">
        <div class="clearfloat">
            <div class="table-list clearfloat fl">
                <ul id="ulClass" class="typeListTitle clearfloat fl">
                    <!-- <li data-id="1" data-classid='1a' class="iconChangePage1 active">景点类型1</li> -->
                </ul>
                <!-- 搜索框 -->
                <div class="fl search">
                    <!-- <i onclick="locationSearch($('#sv').val())"></i> -->
                    
                    <input type="text" class="Rsearch" data-classid="1" id="sv" placeholder='输入名称/位置搜索' onfocus="noActive()">
                </div>
            </div>

            <ul id="typeListUl" class="typeList clearfloat fl">

            </ul>

        </div>
        <!-- 添加按钮 -->
        <div class="submit-box">
            <!-- 添加备注 -->
            <!-- <h3>添加备注 <input type="text" placeholder='请输入备注..'></h3> -->
            <p>
                <button id="gotolast" class='blue-btn' style="margin-right: 10px">完成行程添加【共{{$count+1}}天】</button>

                <button id="formButton" class='yellow-btn'>继续新增下一天行程【第{{$count+2}}天】</button>
            </p>
        </div>

    </div>
</div>
@endsection
@section('script')
// <script>
// 搜索框
function Rsearch(e){
        var value = e.val()
        var classid = e.attr('data-classid')
        $.ajax({
            url: '/R_search',
            type: 'post',
            data: {
                value: value,
                classid: classid
            },
            success:function (mes) {
                console.log(mes)
                $("#typeListUl").html('')
                window.class2 = mes;
                $.each(window.class2, function (i, item) {
                $("#typeListUl").append(
                    "<li data-id=" + i + "><h4>" + item.name + "</h4><img src=" + JSON.parse(mes[i].imgs)[0] + ">" + "<div><p>" + item
                    .des + "</p>" + "<span>参考价格：" + item.price + "</span>" + "</div>" +
                    "</li>"

                );
            });
            // 数据到form 表单中
            clickli();
            //切换选中状态
            iconChange1Fc();
            }
        })
    }

    // $('.Rsearch').blur(function () {
    //     Rsearch($(this));
    // })
    $('.Rsearch').change(function () {
        Rsearch($(this))
    })

    $('.iconChange').click(function () {
        var classid = $(this).attr('data-id')
        $('.Rsearch').attr('data-classid',classid)
        $('.Rsearch').val('')
    })
// 搜索


    $('#goods').addClass('active');

    $('#formButton').click(function () {
        $('#formSubmit').submit();
    });

    $('#gotolast').click(function () {
        var action = $('#formSubmit').attr('action');
        $('#formSubmit').attr('action', action + '?last=1');
        $('#formSubmit').submit();
    })

    window.class2 = null;
    var ip = '/goodsAdd_class';

    tabChange();

    $(document).ready(function () {
        // 首次加载时，默认一级分类[0]的数据，渲染默认列表 
        $.get(ip, function (res) {
            // console.log(res)
            var class1 = res.class.dclass;
            window.class2 = res.poi;
            // 渲染二级分类
            $.each(class1, function (i, item) {
                $("#ulClass").append(
                    "<li class='iconChangePage1' data-id=" + item.id + " data-classid=" +
                    item.classid + ">" + item.name + "</li>"
                );
            });
            // 选然位置选项
            // locationSearch()
            // 加载数据
            $.each(class2, function (i, item) {
                $("#typeListUl").append(
                    "<li data-id=" + i + "><h4>" + item.name + "</h4>" + "<div>"+ "<span>参考价格：" + item.price + "</span>" + "</div>" +
                    "</li>"
                );
            });

            document.getElementsByClassName('iconChange')[0].className = 'iconChange iconBg';
            document.getElementById('ulClass').children[0].className = 'iconChangePage1 active';
            iconChange1Fc();
            clickli()

        })
    })

    // 点击二级分类切换
    iconChange1Fc();
    // 添加到form 表单
    clickli()


    // 搜索获取焦点时，取消二级分类的选中状态
    function noActive() {
        var iconChange = document.getElementsByClassName('iconChangePage1');
        var len = iconChange.length;
        for (var i = 0; i < len; i++) {
            iconChange[i].className = 'iconChangePage1';
        }
    }

// 判断

    // 点击li 出 li 里的数据
    // var li1 = $('#typeListUl>li');
    // clickli(li1)
    function clickli() {
        // $("#addedUl").text('');
        var li = $('#typeListUl>li');
        for (var i = 0; i < li.length; i++) {
            li[i].index = i;
            li[i].onclick = function () {
                var n = li[this.index].getAttribute('data-id');
                var added = window.class2[n]
                // console.log(n);
                // console.log(added);
                var price = prompt("请输入价格", " ");

                var img = added.imgs;
                if(added.imgs[0] == '['){
                    img = JSON.parse(added.imgs)[0]
                }
                if (price != null) {
                    $("#addedUl").append(
                        "<li><h4>" + added.name +
                        "</h4><span class='delete' onclick='deleteElement(this)'>删除</span><p><img src=" +
                        img + "></p><p>" + added.des +
                        "</p> <input type='hidden' name='resourceid[]' value=" + added.id +
                        "><input type='hidden' name='price[]' value=" + price + "></li>"
                    );
                }
            }
        }

    }

    // 点击一级分类 分类
    function getClass1(id) {
        $.get(ip, {
            classid: id
        }, function (res) {
            $("#ulClass").text('');
            $("#typeListUl").text('')
            // console.log(res)
            var claas1 = res.class.dclass;
            class2 = res.poi;
            $.each(claas1, function (i, item) {
                //渲染二级分类
                $("#ulClass").append(
                    "<li class='iconChangePage1' data-id=" + item.id + " data-classid=" +
                    item.classid + ">" + item.name + "</li>"
                );
            });
            // 二级分类加 active
            document.getElementById('ulClass').children[0].className = 'iconChangePage1 active';
            //渲染列表
            $.each(class2, function (i, item) {
                $("#typeListUl").append(
                    "<li data-id=" + i + "><h4>" + item.name + "</h4><img src=" + item.imgs + ">" +
                    "<div><p>" + item
                    .des + "</p>" + "<span>参考价格：" + item.price + "</span>" + "</div>" + "</li>"
                );
            });
            clickli()
            iconChange1Fc();
        })
    }
    // 点击二级分类  时获取信息
    function getClass2(id, classid) {
        $.get(ip, {
            classid: classid,
            lxid: id
        }, function (res) {
            $("#typeListUl").text('');
            // console.log(res)
            class2 = res.poi;
            //渲染二级分类
            $.each(class2, function (i, item) {
                $("#typeListUl").append(
                    "<li data-id=" + i + "><h4>" + item.name + "</h4><img src=" + item.imgs + ">" +
                    "<div><p>" + item
                    .des + "</p>" + "<span>参考价格：" + item.price + "</span>" + "</div>" + "</li>"
                );
            });
            // 数据到form 表单中
            clickli();
            //切换选中状态
            iconChange1Fc();
        })
    }



    function tabChange() {
        if ($('.addTypeContent').css('display') == 'none') {
            $('.addTypeContent').css('display', 'block')
        }
        var iconChange = $('.iconChange');
        for (var i = 0; i < iconChange.length; i++) {
            iconChange[i].index = i;
            iconChange[i].onclick = function () {
                for (var j = 0; j < iconChange.length; j++) {
                    iconChange[j].className = 'iconChange';
                }
                var id = iconChange[this.index].getAttribute("data-id");
                iconChange[this.index].className = 'iconChange iconBg';
                // console.log(id);
                getClass1(id); //class 1
            }
        }
    }

    // 二级切换
    function iconChange1Fc() {
        // document.getElementById('ulClass').children[0].className = 'iconChangePage1 active';
        var iconChange = document.getElementsByClassName('iconChangePage1');
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

    function deleteElement(Obj) {
        Obj.parentNode.parentNode.removeChild(Obj.parentNode);
        console.log(Obj.parentNode)
    }
    // 
</script>
@endsection