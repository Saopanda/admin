<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>懒游星球-添加资源</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
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
            width: 220px;
            height: 40px;
            border: solid #efefef 2px;
            outline: none;
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
    </style>
</head>

<body class="clearfloat">
    <div class="nav fl">
        <div class="logo">
            <h1>懒游星球</h1>
            <span>A端管理系统</span>
        </div>
        <ul class="">
            <li class="clearfloat"><a href="/">首页</a></li>
            <li class="clearfloat"><a class="active" href="/resource">行程资源库</a></li>
            <li class="clearfloat"><a href="">商品行程</a></li>
            <li class="clearfloat"><a href="">订单列表</a></li>
            <li class="clearfloat"><a href="">分类管理</a></li>
            <li class="clearfloat"><a href="">用户管理</a></li>
        </ul>
    </div>
    <div class="content fl">
        <div class="header clearfloat">
            <ul class="fl clearfloat">
                <li><a href="/resource">资源库</a></li>
                <li><a class="active" href="">添加资源</a></li>
            </ul>
            <div class="user fr">
                <img class="user-avatar" src="../images/avatar.jpg" alt="user avatar">
                <span class="user-name">用户名</span>
                <span>【退出】</span>
            </div>
        </div>
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
                <label for="JDname">景点名称</label><input type="text" name="name" id="JDname" placeholder="请输入景点名称">
                <label for="JDposition">景点位置</label><input type="text" name='site' id="JDposition"
                    placeholder="请输入景点位置">
                <label for="JDtype">景点类型</label>
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
                <label for="JDdetail">景点描述</label><textarea name="des" id="JDdetail"
                    placeholder="请输入景点描述"></textarea>
                <br><br>

                    <label for="file">上传图片</label>
                    <div class="upimgbox upimgbox0">
                        <div class="uploadImgBtn" id="uploadImgBtn0">
                            <input class="uploadImg" type="file" name="imgs[]" multiple id="file">
                        </div>
                        <!-- 更改 per img -->
                        <div id="upimgperbox0"></div>
                        <!-- 更改 per img -->
                    </div>
                    <br><br>

                <label for="price">参考价格</label><input type="text" name="price" id="price" placeholder="请输入参考价格">
                <br>
                <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
                <br><br>
                <div class="submitbox">
                    <input type="submit"  id="submit">
                </div>
            </form>
            <!-- 酒店 -->
            <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="classid" class="fxid" value="1">

                <label for="JDname">酒店名称</label><input type="text" name="name" id="JDname" placeholder="请输入酒店名称">
                <label for="JDposition">酒店位置</label><input type="text" name='site' id="JDposition"
                    placeholder="请输入酒店位置">
                <label for="JDtype">酒店类型</label>
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
                <label for="JDdetail">酒店描述</label><textarea name="des" id="JDdetail"
                    placeholder="请输入酒店描述"></textarea>
                <br><br>

                    <label for="file">上传图片</label>
                    <div class="upimgbox upimgbox1">
                        <div class="uploadImgBtn" id="uploadImgBtn1">
                            <input class="uploadImg" type="file" name="imgs[]" multiple id="file">
                        </div>
                        <!-- 更改 per img -->
                        <div id="upimgperbox1"></div>
                        <!-- 更改 per img -->
                    </div>
                    <br><br>

                <label for="price">参考价格</label><input type="text" name="price" id="price" placeholder="请输入参考价格">
                <br>
                <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
                <br><br>
                <div class="submitbox">
                    <input type="submit"  id="submit">
                </div>
            </form>
             <!-- 餐厅 -->
             <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <input type="hidden" name="classid" class="fxid" value="1">

                 <label for="JDname">餐厅名称</label><input type="text" name="name" id="JDname" placeholder="请输入餐厅名称">
                    <label for="JDposition">餐厅位置</label><input type="text" name='site' id="JDposition"
                        placeholder="请输入餐厅位置">
                    <label for="JDtype">餐厅类型</label>
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
                    <label for="JDdetail">餐厅描述</label><textarea name="des" id="JDdetail"
                        placeholder="请输入餐厅描述"></textarea>
                    <br><br>
    
                    <label for="file">上传图片</label>
                    <div class="upimgbox upimgbox2">
                        <div class="uploadImgBtn" id="uploadImgBtn2">
                            <input class="uploadImg" type="file" name="imgs[]" multiple id="file">
                        </div>
                        <!-- 更改 per img -->
                        <div id="upimgperbox2"></div>
                        <!-- 更改 per img -->
                    </div>
                    <br><br>
    
                    <label for="price">参考价格</label><input type="text" name="price" id="price" placeholder="请输入参考价格">
                    <br>
                    <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
                    <br><br>
                    <div class="submitbox">
                        <input type="submit"  id="submit">
                    </div>
                </form>
                  <!-- 交通 -->
             <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <input type="hidden" name="classid" class="fxid" value="1">

                 <label for="JDname">交通起始站</label><input type="text" name="name" id="JDname" placeholder="如：北京到上海">
                    
                    <label for="price">参考价格</label><input type="text" name="price" id="price" placeholder="请输入参考价格">
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
                   
                    <br>
                    <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
                    <br><br>
                    <div class="submitbox">
                        <input type="submit"  id="submit">
                    </div>
                </form>
                 <!-- 参考行程 -->
             <form class="pages" action="/resource" method="post" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <input type="hidden" name="classid" class="fxid" value="1">

                 <label for="JDname">参考行程名称</label><input type="text" name="name" id="JDname" placeholder="请输入参考行程名称">
                    <label for="JDposition">参考行程位置</label><input type="text" name='site' id="JDposition"
                        placeholder="请输入参考行程位置">
                    <label for="JDtype">参考行程类型</label>
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
                    <label for="JDdetail">参考行程描述</label><textarea name="des" id="JDdetail"
                        placeholder="请输入参考行程描述"></textarea>
                    <br><br>
    
                    <label for="file">上传图片</label>
                    <div class="upimgbox upimgbox3">
                        <div class="uploadImgBtn" id="uploadImgBtn3">
                            <input class="uploadImg" type="file" name="imgs[]" multiple id="file">
                        </div>
                        <!-- 更改 per img -->
                        <div id="upimgperbox3"></div>
                        <!-- 更改 per img -->
                    </div>
                    <br><br>
    
                    <label for="price">参考价格</label><input type="text" name="price" id="price" placeholder="请输入参考价格">
                    <br>
                    <p class="ps"> *设置参考价格的资源添加到行程时会设置 <span>实时价格</span></p>
                    <br><br>
                    <div class="submitbox">
                        <input type="submit"  id="submit">
                    </div>
                </form>
           </div>
        </div>
    </div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/public.js"></script>
<script>
    $(function () {
        $('.iconChange').click(function(){
            var classid = $(this).attr('data-classid')
            $('.fxid').val(classid)
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



    // 上传图片
    // 参考：https://blog.csdn.net/weixin_42225141/article/details/80343812

    // 景点
    var parent0 = document.getElementsByClassName("upimgbox0")[0];
    var child0 = document.getElementById("upimgperbox0");
    $("#uploadImgBtn0").click(perImg(parent0, child0));
    // 酒店
    var parent1 = document.getElementsByClassName("upimgbox0")[0];
    var child1 = document.getElementById("upimgperbox1");
    $("#uploadImgBtn1").click(perImg(parent1, child1));
    // 餐厅
    var parent2 = document.getElementsByClassName("upimgbox0")[0];
    var child2 = document.getElementById("upimgperbox2");
    $("#uploadImgBtn2").click(perImg(parent2, child2));
    // 行程
    var parent3 = document.getElementsByClassName("upimgbox0")[0];
    var child3 = document.getElementById("upimgperbox3");
    $("#uploadImgBtn3").click(perImg(parent3, child3));




    function perImg(parent, child) {
        // 参数： parent child 
        /*
        1、先获取input标签
        2、给input标签绑定change事件
        3、把图片回显
         */
        var $input = $("#file");
        // console.log($input)
        //            2、给input标签绑定change事件
        $input.on("change", function () {
            /*将子元素从父元素中删除*/
            if (child.children.length !== 0) {
                // parent.removeChild(child);
                child.innerHTML = ''
            }
            // console.log(this)
            //补充说明：因为我们给input标签设置multiple属性，因此一次可以上传多个文件
            //获取选择图片的个数
            var files = this.files;
            var length = files.length;
            if (length > 6) {
                alert('上传图片最多6张');
                return false;
            }
            // console.log("选择了" + length + "张图片");
            //3、回显
            $.each(files, function (key, value) {
                //每次都只会遍历一个图片数据
                var div = document.createElement("div"),
                    img = document.createElement("img");
                // upimgbox = document.getElementById('upimgperbox0')
                div.className = "pic";

                var fr = new FileReader();
                fr.onload = function () {
                    img.src = this.result;
                    div.appendChild(img);
                    child.appendChild(div);
                }
                fr.readAsDataURL(value);
            });



        })
        //4、我们把当前input标签的id属性remove
        $input.removeAttr("id");
    }
</script>

</html>