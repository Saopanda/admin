<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>懒游星球-{{$title}}</title>
    <link rel="stylesheet" href="/css/style.css">
    <style>
        @section('style')
        @show
    </style>
</head>
<body class="clearfloat">

@include('travel.layouts.class')

<div class="content fl">
    <div class="header clearfloat">
        <ul class="fl clearfloat">
        @section('toplist')
            <li><a class="active" href="">分类管理列表</a></li>
            <li><a href=""></a></li>
        @show
        </ul>
        <div class="user fr">
            <img class="user-avatar" src="/images/avatar.jpg" alt="user avatar">
            <span class="user-name">用户名</span>
            <a href="/logout" style="color: #fff;"><span>【退出】</span></a>
        </div>
    </div>
    @section('main')
    @show

</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/public.js"></script>
<script>

    @section('script')
    @show
    @if(!is_null(session('mes')))
    $(function () {
        alert('{{session('mes')}}')
        location.href = ''
    })
    @endif
</script>


</html>



























