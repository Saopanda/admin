@extends('travel.layouts.index')
@section('style')

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
    display: inline-block;
    width: 120px;
    height: 90px;
    }

    .typeList li div {
    display: inline-block;
    width: 61%;
    height: 100px;
    padding-top: 4px;
    padding-left: 8px;
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
        height:58px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
    color: #7D7D7D;
    font-size: 14px;
    text-align: left;
    
    }

    .typeList li span {
    display: block;
    color: #F98F15;
    width: 100%;
    text-align: left;
    margin-top: 5px;
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
    padding: 12px;
    padding-right: 3%;
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
        <form id="formSubmit" action="/goods_poi/{{$id}}/{{$res->goodid}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <label for="toDay">ToDay</label> <input name="comment" type="text" value="{{$res->comment}}">
            <!-- 备注 -->
            <br><br>
            <label for="info">备注</label> <textarea name="dess">{{$res->dess}}</textarea>
            <!-- 已添加内容 -->
            <div class="added">
                <ul id="addedUl">
                    @foreach($rs as $k=>$v)
                    <li>
                        @if(isset($v->resource_info))
                        <h4>{{$v->resource_info->name}}</h4>
                        <span class="delete" onclick="deleteElement(this)">删除</span>
                        <p><img src="{{json_decode($v->resource_info->imgs)[0]}}"></p>
                        <p>{{$v->resource_info->des}}</p>
                        <input type="hidden" name="resourceid[]" value="{{$v->resource_id}}">
                        <input type="hidden" name="price[]" value="{{$v->price}}">
                        @else
                        <h4>资源已失效, 请直接添加新资源</h4>
                        @endif
                    </li>
                    @endforeach
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
                </div>

                <ul id="typeListUl" class="typeList clearfloat fl">

                </ul>

            </div>
            <!-- 添加按钮 -->
            <div class="submit-box">
                <!-- 添加备注 -->
                <!-- <h3>添加备注 <input type="text" placeholder='请输入备注..'></h3> -->
                <p>
                    <button id="formButton" class='yellow-btn'>修改行程</button>
                </p>
            </div>

        </div>
    </div>
@endsection
@section('script')
    $('#goods').addClass('active');

    $('#formButton').click(function() {
    $('#formSubmit').submit();
    });

    $('#gotolast').click(function () {
    var action = $('#formSubmit').attr('action');
    $('#formSubmit').attr('action',action+'?last=1');
    $('#formSubmit').submit();
    })

    window.class2= null;
    var ip = '/goodsAdd_class';

    tabChange();

    $(document).ready(function () {
    console.log('a')
    $.get(ip, function (res) {
    // console.log(res)
    var class1 = res.class.dclass;
    window.class2 = res.poi;
    // var class2 = data.poi;
    $.each(class1, function (i, item) {
    $("#ulClass").append(
    "<li class='iconChangePage1' data-id=" + item.id + " data-classid=" +
                item.classid + ">" + item.name + "</li>"
    );
    });
    $.each(class2, function (i, item) {
    $("#typeListUl").append(
    "<li data-id="+i+"><h4>" + item.name + "</h4><img src=" + item.imgs + ">" + "<div><p>" + item
                .des + "</p>" + "<span>参考价格：" + item.price + "</span>" + "</div>" + "</li>"
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

    // 点击li 出 li 里的数据
    // var li1 = $('#typeListUl>li');
    // clickli(li1)
    function clickli() {
    // $("#addedUl").text('');
    var li = $('#typeListUl>li');
    for (var i = 0; i < li.length; i++) {
    li[i].index = i;
    li[i].onclick = function () {
    var n= li[this.index].getAttribute('data-id');
    var added = window.class2[n]
    console.log(n);
    console.log(added);
    var price = prompt("请输入价格", " ");
    if (price != null) {
    $("#addedUl").append(
    "<li><h4>"+ added.name + "</h4><span class='delete' onclick='deleteElement(this)'>删除</span><p><img src=" +
                        added.imgs + "></p><p>" + added.des + "</p> <input type='hidden' name='resourceid[]' value="+added.id+"><input type='hidden' name='price[]' value="+price+"></li>"
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
    console.log(res)
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
    "<li data-id="+i+"><h4>" + item.name + "</h4><img src=" + item.imgs + ">" + "<div><p>" + item
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
    console.log(res)
    class2 = res.poi;
    //渲染二级分类
    $.each(class2, function (i, item) {
    $("#typeListUl").append(
    "<li data-id="+i+"><h4>" + item.name + "</h4><img src=" + item.imgs + ">" + "<div><p>" + item
                .des + "</p>" + "<span>参考价格：" + item.price + "</span>" + "</div>" + "</li>"
    );
    });
    clickli();
    iconChange1Fc();
    })
    }



    function tabChange() {
    if($('.addTypeContent').css('display') == 'none'){
    $('.addTypeContent').css('display','block')
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
    console.log(id);
    getClass1(id); //class 1
    }
    }
    }


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

    function deleteElement(Obj){
    Obj.parentNode.parentNode.removeChild(Obj.parentNode);
    console.log(Obj.parentNode)
    }


@endsection
