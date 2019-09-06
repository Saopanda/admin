@extends('travel.layouts.index')
@section('style')
    <style>
    .main h3 {
    font-weight: 500;
    font-size: 19px;
    margin-bottom: 20px;
    color: #000;
    }

    /* form */
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
    width: 220px;
    height: 40px;
    padding: 0 5px;
    }


    form .upimgspan {
    display: inline-block;
    width: 150px;
    height: 150px;
    border: solid #ededed 2px;
    background: url('/images/TravelRepository/upimg.png') no-repeat 50%;
    }

    form input[type='file'] {
    opacity: 0;
    width: 150px;
    height: 150px;
    cursor: pointer;
    }

    form p {
    margin-top: 10px;
    margin-left: 110px;
    font-size: 13px;
    color: #7D7D7D;
    }

    form p span {
    font-size: 13px;
    color: #F98F15;
    }

    form .submitbox {
    text-align: center;
    }

    form input[type='submit'] {
    margin-top: 80px;
    padding: 5px 10px;
    background: rgba(23, 169, 255, 1);
    border-radius: 6px;
    cursor: pointer;
    color: #fff;
    font-size: 18px;
    }
    /* 上传图片 */
    #upimgbox {
    width: 85%;
    display: inline-block;
    vertical-align: top;
    }

    #upimgbox div {
    width: 40%;
    height: 150px;
    margin-right: 10px;
    display: inline-block;
    }

    #upimgbox .pic {
    position: relative;
    border: solid 2px #ededed;
    }

    #upimgbox .pic b {
    width: 20px;
    height: 20px;
    color: #fff;
    text-align: center;
    line-height: 20px;
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer;
    background: rgba(0, 0, 0, .5);
    }

    .uploadImgBtn {
    width: 85%;
    height: 150px;
    border: solid #ededed 2px;
    cursor: pointer;
    position: relative;
    background: url("/images/TravelRepository/upimg.png") no-repeat 50%;
    -webkit-background-size: 50px;
    background-size: 50px;
    }

    .uploadImgBtn .uploadImg {
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    }

    /* //这是一个用做回显的盒子的样式 */
    .pic {
    width: 100px;
    height: 100px;
    }

    .pic img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    }

    /* 上传图片 */

    input[type=date]::-webkit-inner-spin-button {
    visibility: hidden;
    }
    /* 添加酒店 */
        .add-hotel {
            border: #000 1px solid;
        }
    .model-in{
        margin-left: 110px;
        margin-bottom: 20px;
    }
    #add_jiudian .name_input{
        width: 40%;
        padding: 0 8px;
        box-sizing: border-box;
        margin-right: 20px;
    }
    .in-list {
        width: 40%;
        max-height: 170px;
        overflow-x: hidden;
        background: #ededed;
        border-top: dashed #fff;
        border-bottom-left-radius: 6px;
        border-bottom-right-radius: 6px;
        line-height: 2;
        color: #7D7D7D;
        list-style: none;
        display: none;
    }
    .in-list li{
        cursor: pointer;
        padding: 0 8px;
    }
    .in-list li:hover{
        background: #17A9FF;
        color: #fff;
    }
    .in-list li span{
        float: right;
    }
    .add_button{
        margin-left: 110px;
        border: 0px;
        padding: 8px 12px;
        border-radius: 4px;
        background: rgb(249, 143, 21);
        color: #fff;
        cursor: pointer;
        margin-top: 4px;
        display: inline-block;
    }
        .jiudiandays{
            width:66px;
        }
        .closebtn{
            cursor: pointer;
            background: #d43f3a;
            padding: 6px 8px;
            color: #fff;
            border-radius: 4px;
        }

    </style>
@endsection

@section('toplist')
    <li><a href="/goods">行程列表</a></li>
    <li class="closeLi">
        <a class="active">添加行程</a>
        <a class="closePage" href="/goods">×</a>
    </li>
@endsection
@section('main')
    <div class="main fl clearfloat">
        <h2>添加行程</h2>

        <form action="/goods" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="file">上传图片</label>
            <div id="upimgbox">
                <div class="uploadImgBtn" id="uploadImgBtn">
                    <input class="uploadImg" type="file" name="banner" id="file">
                </div>
            </div>
            <br><br>
            <label for="XCname">行程名称</label><input maxlength="51" onkeyup="fontLen(this.value)" type="text" name="name" id="XCname" placeholder="请输入行程名称">
            <label for="XCdate">出发时间</label><input type="date" name='start_date' id="XCdeta" placeholder="请输入出发时间">
            <br><br>

            <label for="XCdayNum">出行天数</label><input type="text" name="days" id="XCdayNum" placeholder="请输入出行天数">
            <label for="JDtype">选择分类</label>
            <select name="classid" style="width: 230px;height: 40px;">
                @if(isset($goodclass[0]))
                    @foreach($goodclass as $k => $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                @else
                    <option value="0">请添加对应分类</option>
                @endif
            </select>
            <br><br>

            {{--酒店模块--}}
            <div id="add_jiudian">
                <label style="float: left;margin-top: 7px;" for="XCname">添加酒店</label>
                <div class="model-in">
                    <input onkeyup="hehe($(this))" class="name_input" type="text" placeholder="请输入酒店名称">
                    <input type="hidden" name="jiudian[]" class="trueinput">
                    <span class="closebtn" onclick="deljiudian($(this))">X</span>
                    <div class="in-list">
                        <li> </li>
                    </div>
                </div>
                <span class="add_button">继续新增酒店</span>
            </div>
            <br><br>
            <div class="submitbox">
                <input type="submit" name="submit" id="submit" value="下一步添加每日行程">
            </div>
        </form>
        <div style="width: 1px;height: 200px"></div>
    </div>
@endsection
@section('script')
// <script>
    function getSearch(that){
        var input_value = that.val()
        $.ajax({
            url: '/searchJd',
            type: 'post',
            dataType: 'json',
            data: {
                value: input_value,
                classid:2
            },
            success:function (res) {
                var something = ''
                for (var i = res.length - 1; i >= 0; i--) {
                    something += '<li onclick="clickLi($(this))" id="'+res[i].id+'"><text>'+res[i].name+'</text><span>['+res[i].site+']</span></li>'
                }
                that.siblings('.in-list').html(something)
                that.siblings('.in-list').slideDown()
            }
        })
    }
    //  ajax传值
    function chuandi(zhi){
        return function(){
            getSearch(zhi)
        }
    }

    //  选中项目
    function clickLi(a){
        a.parent('.in-list').siblings('.name_input').val(a.children('text').html())
        a.parent('.in-list').siblings('.trueinput').val(a.attr('id'))
        a.parent('.in-list').slideUp();
    }

    //  输入文字
    var timer
    function hehe(that){
        clearTimeout(timer)
        timer = setTimeout(chuandi(that),300)
    }

    //  删除酒店
    function deljiudian(that){
        that.parent('.model-in').remove()
    }

    $(function(){
        //  增加框
        $('.add_button').click(function(event) {
            var tmp_text = '<div class="model-in"><input onkeyup="hehe($(this))" class="name_input" type="text" placeholder="请输入酒店名称"><input type="hidden" name="jiudian[]" class="trueinput"> <span class="closebtn" onclick="deljiudian($(this))">X</span><div class="in-list"></div></div>'
            $(this).before(tmp_text)
        });
    })

// 添加酒店 the start
//     var hotelList = document.getElementById('hotel-list')
//     function addHotel() {
//         isHide(0);
//         var liNode =
//             '<li> <input type="text" name="" id="" placeholder="搜索酒店" class="must-fill" onkeyup="isMustFill(this.value)">' +
//             '<input type="text" placeholder="居住天数" class="must-fill" onkeyup="isMustFill(this.value)"> 天' +
//             '<input type="text" placeholder="实时价格"> 元' +
//             '<button type="button" onclick="removeThis(this)">×</button></li>'
//         var li = document.createElement('li');
//         li.innerHTML = liNode;
//         hotelList.appendChild(li)
//     }
//     // 删除当前 <li>
//     function removeThis(e) {
//         var len = hotelList.childElementCount;
//         if (len == 1) {
//             isHide(1);
//         }
//         var thisNode = e.parentElement;
//         var parent = thisNode.parentElement;
//         console.log(thisNode)
//         parent.removeChild(thisNode);
//     }
//
//     // 确定输入完成
//     function isMustFill(value) {
//         console.log(value)
//         var AllMustNode = document.getElementsByClassName('must-fill');
//         var len = AllMustNode.length;
//         for (var i = 0; i < len; i++) {
//             //   console.log(AllMustNode[i].value)
//             if (AllMustNode[i].value == '') {
//                 isHide(0)
//             } else {
//                 isHide(1)
//             }
//         }
//     }
//
//     // 是否显示 “添加酒店按钮”
//     function isHide(isHide) {
//         //0 隐藏 1显示
//         var addHotelBtn = document.getElementById('addHotelBtn');
//         if (isHide) {
//             addHotelBtn.style.display = 'block';
//         } else {
//             addHotelBtn.style.display = 'none'
//         }
//     }

    // 添加酒店 the end

//行程名称最多50个字
function fontLen(v){
    fontLenght = v.length;
    console.log(fontLenght);
    if(fontLenght > 50){
        alert('行程名称不能超过50个字符')
    }
}


    $('#goods').addClass('active');

    // 删除图片
    $('#upimgbox').click(function(e){
    console.log(e.target.innerHTML)
    if(e.target.innerHTML == '×'){
    var child = e.target.parentElement;
    var parent = child.parentElement;
    parent.removeChild(child);
    $('#uploadImgBtn').css('display','block')
    console.log(child,parent)
    }
    })


    // 切换tab
    var iconChange = document.getElementsByClassName('iconChange');
    tabChange(iconChange)
    // 上传图片
    // 参考：https://blog.csdn.net/weixin_42225141/article/details/80343812

    $(document).ready(function () {
    //为外面的盒子绑定一个点击事件
    $("#uploadImgBtn").click(function () {
    /*
    1、先获取input标签
    2、给input标签绑定change事件
    3、把图片回显
    */
    //            1、先回去input标签
    // if ($('.pic').length >= 1) {
    //     alert('上传图片最多6张');
    //     return false;
    // }
    var $input = $("#file");
    console.log($input)
    //            2、给input标签绑定change事件
    $input.on("change", function () {
    console.log(this)
    //补充说明：因为我们给input标签设置multiple属性，因此一次可以上传多个文件
    //获取选择图片的个数
    var files = this.files;
    var length = files.length;
    console.log("选择了" + length + "张图片");
    //3、回显
    var pic = document.getElementsByClassName('pic');
    $.each(pic, function (key, value) {
    //每次都只会遍历一个图片数据
    value.style.display = 'none';
    })
    var pic = document.createElement("div"),
    img = document.createElement("img");
    b = document.createElement("b");
    b.innerHTML = '×'

    upimgbox = document.getElementById('upimgbox')
    pic.className = "pic";

    var fr = new FileReader();
    fr.onload = function () {
    img.src = this.result;
    pic.appendChild(img);
    pic.appendChild(b)
    upimgbox.appendChild(pic);
    $('#uploadImgBtn').css('display','none');//添加成功后隐藏
    }
    fr.readAsDataURL(files[0]);

    })

    //4、我们把当前input标签的id属性remove
    $input.removeAttr("id");
    //我们做个标记，再class中再添加一个类名就叫test
    var newInput = '<input class="uploadImg test" type="file" name="file" multiple id="file">';
    $(this).append($(newInput));

    })

    })
    // </script>

@endsection
