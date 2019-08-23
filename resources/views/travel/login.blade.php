<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>懒游星球-登录</title>
    <style>
        body {
            min-width: 960px;
            text-align: center;
            background: #90b6f2 url('/images/login/bg.png') no-repeat 100%;
        }

        .login-box {
            position: relative;
            width: 866px;
            margin: auto;
            padding: 30px;
            margin-top: 10%;
            height: 250px;
            background: url('/images/login/small_bg.png') no-repeat 100%;
            background-size: 866px 338px;
        }

        .login-box .title {
            position: absolute;
            top: 30%;
            left: 18%;
            color: #fff;
        }

        .login-box .box {
            position: absolute;
            right: 100px;
            top: -40px;
            width: 290px;
            height: 340px;
            background: #fff;
            padding: 30px;
            text-align: left;
        }

        .box p {
            display: block;
            margin-bottom: 30px;
        }

        .box .center {
            text-align: center;
        }

        .box input {
            width: 92%;
            height: 30px;
            padding: 5px 10px;
            font-size: 16px;
            border: 1px solid #AEB0B1;
        }

        .box input:focus {
            outline: none;
            border: 1px solid #1497E4;

        }

        .box strong {
            display: block;
            font-size: 23px;
            color: #1497E4;
            margin-bottom: 30px;
        }

        .box button {
            width: 190px;
            height: 40px;
            line-height: 40px;
            color: #fff;
            border: none;
            border-radius: 20px;
            outline: none;
        }

        .unpass {
            background: #AEB0B1;
            cursor: not-allowed;
        }

        .pass {
            background: #1497E4;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="title">
            <h2>欢迎登录 </h2>
            <h3>懒游旅行管理系统</h3>
        </div>
        <form action="/login" method="post" class="box" autocomplete="off">
            {{csrf_field()}}
            <strong>登陆</strong>
            <p><input onkeyup="reg()" name="name" type="text" placeholder="用户名/手机号/邮箱" value=""></p>
            <p><input onkeyup="reg()" type="password" name="passwd" placeholder="密码" value=""></p>
            <p class="center"><button id="submit" type="submit" class="unpass" disabled='true'>登陆</button></p>
            <p style="text-align: center;color: #F44336;">@if(session('mes')) {{session('mes')}}@endif</p>

        </form>
    </div>


</body>
<script>
    window.onload=function(){
        var inp = document.getElementsByTagName('input');
        var sbt = document.getElementById('submit');
        var len = inp.length;
        reg()
    }
    var inp = document.getElementsByTagName('input');
    var sbt = document.getElementById('submit');
    var len = inp.length;

    function reg() {
        var v0 = inp[0].value !== '';
        var v1 = inp[1].value !== '';
        console.log(v0,v1);
        if (v0 && v1) {
            sbt.className = 'pass';
            sbt.disabled = false;
        } else {
            sbt.className = 'unpass';
            sbt.disabled = true;
        }
    }
</script>

</html>