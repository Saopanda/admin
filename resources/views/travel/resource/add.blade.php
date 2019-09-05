@extends('travel.layouts.index')
@section('style')
    /* pages tab 切换 */
    .pages-box{
    position: relative;
    }
    .pages-box .pages{
    display: none;
    position: absolute;
    }
    /* form */
    form {
    padding-top: 20px;
    }

    form label {
    width: 130px;
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

    form select {
    width: 230px;
    height: 40px;
    border: solid #efefef 2px;
    outline: none;
    margin-left: -4px;
    }

    form select option {
    height: 35px;
    }

    form textarea {
    width: 900px;
    height: 150px;
    outline: none;
    resize: none;
    vertical-align: top;
    padding: 5px;
    }

    form .upimgspan {
    display: inline-block;
    width: 150px;
    height: 150px;
    border: solid #ededed 2px;
    background: url('./images/TravelRepository/upimg.png') no-repeat 50%;
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
    width: 139px;
    height: 42px;
    background: rgba(23, 169, 255, 1);
    border-radius: 6px;
    cursor: pointer;
    color: #fff;
    font-size: 18px;
    }

    /* 上传图片 */
    .upimgbox {
    width: 84%;
    position: relative;
    display: inline-block;
    vertical-align: top;
    }

    .upimgbox div {
    width: 110px;
    height: 110px;
    margin-right: 10px;
    display: inline-block;
    }

    #upimgperbox0,
    #upimgperbox1,
    #upimgperbox2,
    #upimgperbox3 {
    width: 100% !important;
    position: absolute;
    top: 0;
    left: 125px;
    }

    .uploadImgBtn {
    border: solid #ededed 2px;
    width: 110px;
    height: 110px;
    cursor: pointer;
    position: relative;
    background: url("../images/TravelRepository/upimg.png") no-repeat 50%;
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

    /* 上传图片 */
    /* 新上传图片 样式 */
    .per img {
    width: 100px;
    margin: 10px 20px;
    }

    .perBox {
    overflow: hidden;
    background: #7D7D7D;
    width: 120px;
    height: 120px;
    position: relative;
    }

    .perBox img {
    object-fit: cover;
    background: #fff;
    width: 100%;
    height: 100%;

    }

    .perBox b {
    width: 20px;
    height: 20px;
    color: #fff;
    text-align: center;
    line-height: 20px;
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer;
    background: rgba(0, 0, 0, .5)
    }

    /* input type number 去掉箭头 */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    }

    input[type="number"] {
    -moz-appearance: textfield;
    }
    #perBox0,
    #perBox1,
    #perBox2,
    #perBox3 {
    width: 100% !important;
    position: absolute;
    top: 0;
    left: 125px;
    }
@endsection

@section('toplist')
    <li><a href="javascript:history.back(-1)">资源库</a></li>
    <li><a class="active" >添加资源</a></li>
@endsection
@section('main')
    <div class="main fl clearfloat">
    <h2>选择资源类型</h2>
    <div class="table-list clearfloat">
        <ul class="clearfloat fl">
            @foreach($Tclass as $k=>$v)
                <li class="iconChange @if($k == 0)iconBg @endif" data-classid="{{$v->id}}">
                    <img src="/images/TravelRepository/icon/{{$v->icon}}">{{$v->name}}
                </li>
            @endforeach
        </ul>
    </div>
    <div class="pages-box">
        <!-- 景点 -->
        <form class="pages" action="/resource" method="post"  style="display: block;" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="classid" class="fxid" value="1">
            <label for="JDname">景点名称</label><input onkeyup="JDreg()" type="text" name="name" id="JDname" placeholder="请输入景点名称">
            <label for="JDposition">景点位置</label><input onkeyup="JDreg()" type="text" name='site' id="JDposition"
                                                       placeholder="请输入景点位置">
            <br><br>
            <label for="JDtype">景点目的地</label>
            <select name="lxid" id="JDtype">
                @if(isset($Tclass[0]->dclass[0]))
                    @foreach($Tclass[0]->dclass as $k => $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                @else
                    <option value="0">请添加对应分类</option>
                @endif
            </select>
            <br><br>
            <label for="JDdetail">景点描述</label><textarea name="des" id="JDdetail" onkeyup="JDreg()" placeholder="请输入景点描述"></textarea>
            <br><br>
            <!-- 上传图片 -->
            <label for="file">上传图片</label>
            <div class="upimgbox upimgbox3">
                <div class="uploadImgBtn">
                    <input id="pic0" class="uploadImg" type="file" name="file" multiple >
                </div>
                <div id="perBox0"></div>
            </div>
            <!--上传图片 -->
            <br><br>

            <label for="price">参考价格</label><input type="number" min="1" onkeyup="JDreg()" name="price" id="JDprice" placeholder="请输入参考价格">
            <br>
            <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
            <br><br>
            <div class="submitbox">
                <input type="submit" class="unpass" id="JDbtn" disabled>
            </div>
        </form>
        <!-- 酒店 -->
        <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="classid" class="fxid" value="2" id="JDdetail1" onkeyup="JDreg1()">

            <label for="JDname">酒店名称</label><input type="text" name="name" id="JDname1" onkeyup="JDreg1()" placeholder="请输入酒店名称">
            <label for="JDposition">酒店位置</label><input type="text" name='site' id="JDposition1" onkeyup="JDreg1()" placeholder="请输入酒店位置">
            <br><br>
            <label for="JDtype">酒店目的地</label>
            <select name="lxid" id="JDtype">
                @if(isset($Tclass[1]->dclass[0]))
                    @foreach($Tclass[1]->dclass as $k => $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                @else
                    <option value="0">请添加对应分类</option>
                @endif
            </select>
            <br><br>
            <label for="JDdetail">酒店描述</label><textarea name="des" id="JDdetail1" placeholder="请输入酒店描述" onkeyup="JDreg1()"></textarea>
           
                                <!-- Uedit -->
            <br><br>
                <div class="clearfloat" style="margin-bottom:20px;">
                    <label for="JDdetail">酒店详情</label>
                    <textarea name="text" id="editor" type="text/plain" style="width:912px;height:300px;float: right;"></textarea>
                        <!-- <button onclick="getContent()">获得内容</button> -->
                </div>
                    <!-- Uedit -->

            <!-- 上传图片 -->
            <label for="file">上传图片</label>
            <div class="upimgbox upimgbox3">
                <div class="uploadImgBtn">
                    <input id="pic1" class="uploadImg" type="file" name="file" multiple >
                </div>
                <div id="perBox1"></div>
            </div>
            <!--上传图片 -->
            <br><br>

            <label for="price">参考价格</label><input type="number" min="1" name="price" id="JDprice1" placeholder="请输入参考价格" onkeyup="JDreg1()">
            <br>
            <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
            <br><br>
            <div class="submitbox">
                <input type="submit" class="unpass" id="JDbtn1" disabled>
            </div>
        </form>
        <!-- 餐厅 -->
        <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="classid" class="fxid" value="3">

            <label for="JDname">餐厅名称</label><input type="text" name="name" id="JDname2" onkeyup="JDreg2()" placeholder="请输入餐厅名称">
            <label for="JDposition">餐厅位置</label><input type="text" name='site' id="JDposition2" onkeyup="JDreg2()" placeholder="请输入餐厅位置">
            <br><br>
            <label for="JDtype">餐厅目的地</label>
            <select name="lxid" id="JDtype">
                @if(isset($Tclass[2]->dclass[0]))

                    @foreach($Tclass[2]->dclass as $k => $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                @else
                    <option value="0">请添加对应分类</option>
                @endif
            </select>
            <br><br>
            <label for="JDdetail">餐厅描述</label><textarea name="des" id="JDdetail2" onkeyup="JDreg2()" placeholder="请输入餐厅描述"></textarea>
            <br><br>

            <!-- 上传图片 -->
            <label for="file">上传图片</label>
            <div class="upimgbox upimgbox3">
                <div class="uploadImgBtn">
                    <input id="pic2" class="uploadImg" type="file" name="file" multiple>
                </div>
                <div id="perBox2"></div>
            </div>
            <!--上传图片 -->

            <br><br>

            <label for="price">参考价格</label><input type="number" min="1" name="price" id="JDprice2" onkeyup="JDreg2()" placeholder="请输入参考价格">
            <br>
            <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
            <br><br>
            <div class="submitbox">
                <input type="submit" class="unpass" id="JDbtn2" disabled>
            </div>
        </form>
        <!-- 交通 -->
        <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="classid" class="fxid" value="4">

            <label for="JDname">交通起始站</label><input type="text" name="name" id="JDname3"  onkeyup="JDreg3()" placeholder="如：北京到上海">

            <label for="JDtype">交通类型</label>
            <select name="lxid" id="JDtype">
                @if(isset($Tclass[3]->dclass[0]))
                    @foreach($Tclass[3]->dclass as $k => $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                @else
                    <option value="0">请添加对应分类</option>
                @endif
            </select>
            <br><br>

            <label for="JDdetail">交通描述</label><textarea name="des" id="JDdetail2" onkeyup="JDreg3()" placeholder="请输入交通描述"></textarea>
            <br><br>

            <label for="price">参考价格</label><input type="number" min="1" name="price" id="JDprice3" onkeyup="JDreg3()" placeholder="请输入参考价格">

            <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
            <br><br>
            <div class="submitbox">
                <input type="submit" class="unpass" id="JDbtn3" disabled>
            </div>
        </form>
        <!-- 参考行程 -->
        <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="classid" class="fxid" value="5">

            <label for="JDname">参考行程名称</label><input type="text" name="name" id="JDname4" onkeyup="JDreg4()" placeholder="请输入参考行程名称">
            <label for="JDposition">参考行程位置</label><input type="text" name='site' id="JDposition4" onkeyup="JDreg4()" placeholder="请输入参考行程位置">
            <br><br>
            <label for="JDtype">参考行程目的地</label>
            <select name="lxid" id="JDtype">
                @if(isset($Tclass[4]->dclass[0]))
                    @foreach($Tclass[4]->dclass as $k => $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                @else
                    <option value="0">请添加对应分类</option>
                @endif
            </select>
            <br><br>
            <label for="JDdetail">参考行程描述</label><textarea name="des" id="JDdetail4" onkeyup="JDreg4()" placeholder="请输入参考行程描述"></textarea>
            <br><br>
            <!-- 上传图片 -->
            <label for="file">上传图片</label>
            <div class="upimgbox upimgbox3">
                <div class="uploadImgBtn">
                    <input id="pic3" class="uploadImg" type="file" name="file" multiple>
                </div>
                <div id="perBox3"></div>
            </div>
            <!--上传图片 -->
            <br><br>

            <label for="price">参考价格</label><input type="number" min="1" name="price" id="JDprice4" onkeyup="JDreg4()" placeholder="请输入参考价格">
            <br>
            <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
            <br><br>
            <div class="submitbox">
                <input type="submit" class="unpass" id="JDbtn4" disabled>
            </div>
        </form>
    </div>
    </div>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/ue/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ue/ueditor.all.js"></script>
@endsection
@section('script')
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    // Uedit

{{--        参考行程 --}}
    var pic3 = document.getElementById('pic3')
    var per3 = $('#perBox3');
    pic3.addEventListener('change', function () {
    var files1 = pic3.files;
    var len = files1.length;
    var perLen = $('#perBox3 .perBox').length
    if (perLen > 5) {
    alert('上传图片最多6张');
    return false;
    }
    if (len > 6) {
    alert('上传图片最多6张');
    return false;
    }

    if (len + perLen > 6) {
    alert('上传图片最多6张');
    return false;
    }

    $.each(files1, function (k, i) {
    var reader = new FileReader();
    reader.onload = function (e) {
    var data = e.target
    .result; // 'data:image/jpeg;base64,/9j/4AAQSk...(base64编码)...'
    per3.append("<div class='perBox'><img src='" + data +
                    "'/><input type='hidden' name='imgs[]' value='" + data +
                    "'/><b onclick='dele()'>×</b></div>")
    };
    // 以DataURL的形式读取文件:
    reader.readAsDataURL(i);
    })
    });
{{--        餐厅 --}}
var pic2 = document.getElementById('pic2')
var per2 = $('#perBox2');
pic2.addEventListener('change', function () {
    var files1 = pic2.files;
    var len = files1.length;
    var perLen = $('#perBox2 .perBox').length
    if (perLen > 5) {
        alert('上传图片最多6张');
        return false;
    }
    if (len > 6) {
        alert('上传图片最多6张');
        return false;
    }

    if (len + perLen > 6) {
        alert('上传图片最多6张');
        return false;
    }

    $.each(files1, function (k, i) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target
                .result; // 'data:image/jpeg;base64,/9j/4AAQSk...(base64编码)...'
            per2.append("<div class='perBox'><img src='" + data +
                "'/><input type='hidden' name='imgs[]' value='" + data +
                "'/><b onclick='dele()'>×</b></div>")
        };
        // 以DataURL的形式读取文件:
        reader.readAsDataURL(i);
    })
});


        {{--        酒店 --}}
var pic1 = document.getElementById('pic1')
var per1 = $('#perBox1');
pic1.addEventListener('change', function () {
    var files1 = pic1.files;
    var len = files1.length;
    var perLen = $('#perBox1 .perBox').length
    if (perLen > 5) {
        alert('上传图片最多6张');
        return false;
    }
    if (len > 6) {
        alert('上传图片最多6张');
        return false;
    }

    if (len + perLen > 6) {
        alert('上传图片最多6张');
        return false;
    }

    $.each(files1, function (k, i) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target
                .result; // 'data:image/jpeg;base64,/9j/4AAQSk...(base64编码)...'
            per1.append("<div class='perBox'><img src='" + data +
                "'/><input type='hidden' name='imgs[]' value='" + data +
                "'/><b onclick='dele()'>×</b></div>")
        };
        // 以DataURL的形式读取文件:
        reader.readAsDataURL(i);
    })
});
        {{--        酒店 --}}
var pic0 = document.getElementById('pic0')
var per0 = $('#perBox0');
pic0.addEventListener('change', function () {
    var files1 = pic0.files;
    var len = files1.length;
    var perLen = $('#perBox0 .perBox').length
    if (perLen > 5) {
        alert('上传图片最多6张');
        return false;
    }
    if (len > 6) {
        alert('上传图片最多6张');
        return false;
    }

    if (len + perLen > 6) {
        alert('上传图片最多6张');
        return false;
    }

    $.each(files1, function (k, i) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var data = e.target
                .result; // 'data:image/jpeg;base64,/9j/4AAQSk...(base64编码)...'
            per0.append("<div class='perBox'><img src='" + data +
                "'/><input type='hidden' name='imgs[]' value='" + data +
                "'/><b onclick='dele()'>×</b></div>")
        };
        // 以DataURL的形式读取文件:
        reader.readAsDataURL(i);
    })
});

    function dele() {
    var e = window.event.target;
    var child = e.parentNode;
    var parent = e.parentNode.parentNode;
    parent.removeChild(child);
    }


    // 点击添加带参数 截取参数 显示对应的元素
    function GoPage(v){
    console.log('ready');
    var li = $('.iconChange');//按钮
    var pages = $('.pages');//页面
    $.each(pages,function(key,item){
    item.style.display = 'none'
    })
    $.each(li,function(key,item){
    console.log(key,item);
    item.className='iconChange';
    });
    li[v].className='iconChange iconBg';
    pages[v].style.display = 'block'
    }
    var canshu = document.location.search.slice(-1);
    $(document).ready(GoPage(canshu));


    // 景点
    function JDreg() {
        var v0 = $('#JDname').val() !== '';
        var v1 = $('#JDposition').val() !== '';
        var v2 = $('#JDprice').val()  > 0;
        var v3 = $('#JDdetail').val() !== '';
        var btn = $('#JDbtn');
        // var v0 = inp[0].value !== '';
        // var v1 = inp[1].value !== '';
        console.log(v0 && v1 && v2);
        if (v0 && v1 && v2 && v3) {
        btn.addClass('pass');
        btn.removeClass('unpass');
        btn.attr('disabled',false);
        console.log('验证成功')
        } else {
        btn.addClass('unpass');
        btn.removeClass('pass');
        btn.attr('disabled',true);
        }
    }

    // 酒店
    function JDreg1() {
        var v0 = $('#JDname1').val() !== '';
        var v1 = $('#JDposition1').val() !== '';
        var v2 = $('#JDprice1').val()  > 0;
        var v3 = $('#JDdetail1').val() !== '';

        var btn = $('#JDbtn1');
        // var v0 = inp[0].value !== '';
        // var v1 = inp[1].value !== '';
        console.log(v0 && v1 && v2);
        if (v0 && v1 && v2 && v3) {
        btn.addClass('pass');
        btn.removeClass('unpass');
        btn.attr('disabled',false);
        console.log('验证成功')
        } else {
        btn.addClass('unpass');
        btn.removeClass('pass');
        btn.attr('disabled',true);
        }
    }
    // 餐厅
    function JDreg2() {
    var v0 = $('#JDname2').val() !== '';
    var v1 = $('#JDposition2').val() !== '';
    var v2 = $('#JDprice2').val()  > 0;
    var v3 = $('#JDdetail2').val() !== '';

    var btn = $('#JDbtn2');
    // var v0 = inp[0].value !== '';
    // var v1 = inp[1].value !== '';
    console.log(v0 && v1 && v2 && v3);
    if (v0 && v1 && v2 && v3) {
    btn.addClass('pass');
    btn.removeClass('unpass');
    btn.attr('disabled',false);
    console.log('验证成功')
    } else {
    btn.addClass('unpass');
    btn.removeClass('pass');
    btn.attr('disabled',true);
    }
    }
    // 交通
    function JDreg3() {
    var v0 = $('#JDname3').val() !== '';
    var v2 = $('#JDprice3').val() > 0;

    var btn = $('#JDbtn3');
    if (v0 && v2) {
    btn.addClass('pass');
    btn.removeClass('unpass');
    btn.attr('disabled',false);
    console.log('验证成功')
    } else {
    btn.addClass('unpass');
    btn.removeClass('pass');
    btn.attr('disabled',true);
    }
    }
    // 参考行程
    function JDreg4() {
    var v0 = $('#JDname4').val() !== '';
    var v1 = $('#JDposition4').val() !== '';
    var v2 = $('#JDprice4').val() > 0;
    var v3 = $('#JDdetail4').val() !== '';

    var btn = $('#JDbtn4');
    // var v0 = inp[0].value !== '';
    // var v1 = inp[1].value !== '';
    console.log(v0 && v1 && v2 && v3);
    if (v0 && v1 && v2 && v3) {
    btn.addClass('pass');
    btn.removeClass('unpass');
    btn.attr('disabled',false);
    console.log('验证成功')
    } else {
    btn.addClass('unpass');
    btn.removeClass('pass');
    btn.attr('disabled',true);
    }
    }







    $('#resource').addClass('active');

    $(function () {
    $('.iconChange').click(function(){
    })
    })
    // 切换tab
    // tab 切换
    function tabChange(btn,page) {
    var len = btn.length;
    for (var i = 0; i < len; i++) {
    btn[i].index = i;
    btn[i].onclick = function () {
    for (var j = 0; j < len; j++) {
    btn[j].className = 'iconChange';
    // console.log(page[j])
    page[j].style.display = 'none';
    }
    btn[this.index].className = 'iconChange iconBg';
    page[this.index].style.display = 'block';
    // console.log(iconChange[this.index].firstElementChild.src)
    }
    }

    }
    var pages = document.getElementsByClassName('pages');
    var btn = document.getElementsByClassName('iconChange');
    tabChange(btn,pages)



@endsection


