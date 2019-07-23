
@extends('travel.layouts.index')
@section('style')
.main .table-list a {
    display: inline-block;
    text-align: center;
    width: 120px;
    height: 40px;
    line-height: 40px;
    background: rgba(249, 143, 21, 1);
    border-radius: 10px;
    border: none;
    cursor: pointer;
    color: #fff;
    margin-right: 20px;
}
.main table {
    text-align: center;
    margin-top: 20px;
    width: 100%;
    /* border-top-left-radius: 10px;
    border-top-right-radius: 10px; */
}
.main td {
    height: 40px;
}

.main thead {
    color: #fff;
    background: rgba(20, 151, 228, 1);
}

.main tbody {
    background: #eef2fe;
    color: #646363;
}

.main button {
    font-size: 13px;
    color: #fff;
    border: none;
    padding: 2px 10px;
    line-height: 25px;
    border-radius: 5px;
}

.main .modify {
    background: #90C400;
}

.main .delete {
    background: #D24726;
}

.main .ljfx {
    background: #F98F15;
}

.main .ewmfx {
    background: #F98F15;
}

.main .downfile {
    background: #17A9FF;
}

.main .checkbox {
    width: 20px;
}
form{
    display: inline-block;
}
.main table button {
    cursor: pointer;
}
@endsection


@section('main')
<div class="main fl clearfloat">
    <div class="table-list clearfloat">
        <a href="/travelclass/create" class="fr">添加</a>
    </div>
    <table border="0" cellpadding="3" cellspacing="1" bgcolor="#fff">
        <thead>
        <tr>
            <td>ID</td>
            <td>资源名称</td>
            <td>所属分类</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($class as $k=>$v)
            <tr style="background-color: #dddddd">
                <td>
                    <input class="checkbox" type="checkbox" name="" id="">
                    <span>{{$v->id}}</span>
                </td>
                <td class="pl70">{{$v->name}}   ∨</td>
                <td class="pl70">@if($v->classid == 0)|-顶级 @endif</td>
                <td>
                </td>
            </tr>
            @if(!is_null($v->dclass))
                @foreach($v->dclass as $kk =>$vv)
                    <tr style="background: #f2f8fd;">
                        <td>
                            <input class="checkbox" type="checkbox" name="" id="">
                            <span>{{$vv->id}}</span>
                        </td>
                        <td class="pl70">{{$v->name}} => {{$vv->name}}</td>
                        <td class="pl70">|--{{$v->name}}</td>
                        <td>
                            <a href="/travelclass/{{$vv->id}}/edit" class="modify">修改</a>
                            <form action="/travelclass/{{$vv->id}}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button class="delete">删除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('toplist')
<li><a class="active" href="">分类管理列表</a></li>
<li><a href=""></a></li>
@endsection

@section('script')
    $('#class').addClass('active');
@endsection