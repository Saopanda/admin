<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>懒游星球-401</title>
<style>
    *{
        padding: 0;margin: 0;
    }
div{
    width: 300px;
    height: 100px;
    position: relative;
    top: 43vh;
    margin: 0 auto;
    text-align: center;
}
button{
    width: 139px;
    height: 42px;
    background: rgba(23, 169, 255, 1);
    border-radius: 6px;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    border: none;
    outline: none;
}
</style>
</head>

<body>
    <div>
        <h2>{{$mes}}</h2><br>
        <p><span id="time">3</span> 秒后返回上一页</p>
        <br>
        <button>立即返回上一页</button>
    </div>
    <script>
        var btn = document.getElementsByTagName('button')[0];
        var time = document.getElementById('time');
        var i=2;
        btn.onclick=function(){
            history.go(-1);
        }
        setInterval(function() {
            time.innerHTML= ''+i--;
            if(i == -1){
                history.go(-1);
            }
        }, 1000);
    </script>
</body>
</html>