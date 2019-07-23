@extends('travel.layouts.index')
@section('style')
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
    }
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
            <label for="XCname">行程名称</label><input type="text" name="name" id="XCname" placeholder="请输入行程名称">
            <label for="XCdate">出发时间</label><input type="date" name='start_date' id="XCdeta" placeholder="请输入出发时间">
            <label for="XCdayNum">出行天数</label><input type="text" name="days" id="XCdayNum"
                                                     placeholder="请输入出行天数">
            <br><br>
            <div class="submitbox">
                <input type="submit" name="submit" id="submit" value="下一步添加每日行程">
            </div>
        </form>
    </div>
@endsection
@section('script')
    $('#goods').addClass('active');
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
    if ($('.pic').length >= 1) {
    alert('上传图片最多6张');
    return false;
    }
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
    $.each(files, function (key, value) {
    //每次都只会遍历一个图片数据
    var div = document.createElement("div"),
    img = document.createElement("img");
    upimgbox = document.getElementById('upimgbox')
    div.className = "pic";

    var fr = new FileReader();
    fr.onload = function () {
    img.src = this.result;
    div.appendChild(img);
    upimgbox.appendChild(div);
    }
    fr.readAsDataURL(value);
    })

    })

    //4、我们把当前input标签的id属性remove
    $input.removeAttr("id");
    //我们做个标记，再class中再添加一个类名就叫test
    var newInput = '<input class="uploadImg test" type="file" name="file" multiple id="file">';
    $(this).append($(newInput));

    })

    })
@endsection
