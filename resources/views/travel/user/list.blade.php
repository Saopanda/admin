@extends('travel.layouts.index')
@section('style')
    .table-list li {
    float: left;
    padding: 2px 8px;
    margin: 0 7px;
    text-align: center;
    border-radius: 10px;
    background: #f2f2f2;
    color: #7D7D7D;
    border: solid #f2f2f2 1px;
    cursor: pointer;
    }

    .table-list li:hover {
    border: solid #1497E4 1px;
    background: #fff;
    }

    .table-list li img {
    width: 20px;
    vertical-align: middle;
    }

    .table-list .iconBg {
    color: #fff;
    background: #1497E4 !important;
    }

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

    .main input {
    width: 200px;
    border: none;
    padding: 10px 0 6px 8px;
    background: #fff;
    border-bottom: solid 1px #e5e5e5;
    }

    .main .search {
    margin-right: 180px;
    }

    .main .search i {
    display: inline-block;
    width: 18px;
    margin-left: -35px;
    cursor: pointer;
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
    width: 60px;
    height: 25px;
    line-height: 25px;
    border-radius: 5px;
    }

    .main .modify {
    background: #90C400;
    }

    .main .delete {
    background: #D24726;
    }

    .main .checkbox {
    width: 20px;
    }

    .main table button {
    cursor: pointer;
    }
@endsection

@section('toplist')
    <li><a href="/user" class="active">用户列表</a></li>
@endsection
@section('main')

    <div class="main fl clearfloat">
        <div class="table-list clearfloat">

            <a href="/user/create" class="fr">添加</a>
        </div>

        <table border="0" cellpadding="3" cellspacing="1" bgcolor="#fff">
            <thead>
            <tr>
                <td>ID</td>
                <td>账户名</td>
                <td>所属组</td>
                <td>电话</td>
                <td>备注</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $k=>$v)
            <tr>
                <td>
                    <input class="checkbox" type="checkbox" name="" id="">
                    <span>{{$v->id}}</span>
                </td>
                <td>{{$v->name}}</td>
                <td>{{$v->groupinfo->name}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->des}}</td>
                <td>@if($v->status != '1') 禁用 @else 激活 @endif</td>
                <td>
                    <a href="/user/{{$v->id}}/edit" class="modify">修改</a>
                    <a href="/user/b/{{$v->id}}" class="delete">禁用</a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <!-- 分页 -->

    </div>
@endsection

@section('script')

    $('#user').addClass('active');
@endsection