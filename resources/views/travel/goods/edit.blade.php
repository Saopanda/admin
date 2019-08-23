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

        <form action="/goods/{{$rs->id}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('put')}}
            <label for="file">上传图片</label>
            <div id="upimgbox">
                <div class="uploadImgBtn" id="uploadImgBtn" style="display: none">
                    <input class="uploadImg" type="file" name="banner" id="file">
                </div>
                <div class="pic"><img src="{{$rs->banner}}"><b>×</b></div>
            </div>
            <br><br>
            <label for="XCname">行程名称</label><input maxlength="51" onkeyup="fontLen(this.value)" type="text" name="name" id="XCname" value="{{$rs->name}}">
            <label for="XCdate">出发时间</label><input type="date" name='start_date' id="XCdeta" value="{{$rs->start_date}}">
            <br><br>
            <label for="XCdayNum">出行天数</label><input type="text" name="days" id="XCdayNum" value="{{$rs->days}}">
            <label for="JDtype">选择分类</label>

            <select name="classid" style="width: 230px;height: 40px;">
                @if(isset($goodclass[0]))
                    @foreach($goodclass as $k => $v)
                        <option @if($rs->classid == $v->id)selected @endif value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                @else
                    <option value="0">请添加对应分类</option>
                @endif
            </select>
            <br><br>
            <label for="XCdayNum">指导价</label><input type="number" name="price_sel" min="0" value="{{$rs->price_sel}}">

            <div class="submitbox">
                <input type="submit" name="submit" id="submit" value="完成">
                <p style="margin: 10px 0;">每日行程在详情页修改，点击完成跳到详情页</p>
            </div>
        </form>
    </div>
@endsection
@section('script')

//行程名称最多50个字
function fontLen(v){
    fontLenght = v.length;
    console.log(fontLenght);
    if(fontLenght > 50){
        alert('行程名称不能超过50个字符')
    }
}


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
@endsection
