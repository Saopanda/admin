@extends('travel.layouts.index')
@section('style')
    form {
    width: 80%;
    margin: auto;
    text-align: left;
    }

    form p {
    margin-bottom: 13px;
    }

    form label {
    display: inline-block;
    width: 80px;
    text-align: right;
    }

    form input {
    margin-left: 3px;
    padding: 8px 33px 8px 10px;
    }


    form #addType {
    width: 100%;
    padding: 10px 0;
    color: blue;
    font-size: 14px;
    text-align: center;
    cursor: pointer;
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
    width: 85%;
    height: 100px;
    outline: none;
    resize: none;
    vertical-align: top;
    padding: 5px;
    }

    form .pw {
    text-align: center;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    }

    input[type="number"] {
    -moz-appearance: textfield;
    }
@endsection

@section('toplist')
    <li><a href="javascript:history.back(-1)">用户列表</a></li>
    <li><a class="active">用户添加</a></li>
@endsection
@section('main')
    <div class="main fl clearfloat">
        <h2>添加用户</h2>
        <form action="/user/{{$user_info->id}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            <p><label for="name">用户名称：</label><input onkeyup="addUserReg()" id="name"  name="name" value="{{$user_info->name}}" type="text" placeholder="请输入用户名称"></p>
            <p> <label for="">手机号：</label><input onkeyup="addUserReg()" id="phone" name="phone" value="{{$user_info->phone}}" type="number" placeholder="请输入手机号"></p>
            <p><label for="">邮箱地址：</label><input onkeyup="addUserReg()" id="email" name="email" value="{{$user_info->email}}" type="email" placeholder="请输入邮箱地址"></p>
            <p> <label for="">密码：</label><input onkeyup="addUserReg()" id="passwd" name="passwd" type="password" placeholder="请输入新密码"></p>
            <p>
                <label for="type">类型：</label>
                <select name="group" id="">
                    @foreach($group as $v)
                        <option @if($v->id == $user_info->group) selected @endif value="{{$v->id}}">{{$v->name}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="">备注：</label>
                <textarea name="des" placeholder="请输入备注信息">{{$user_info->des}}</textarea>
            </p>
            <!-- <p>
                <label for="">权限管理：</label>
                <textarea></textarea>
            </p> -->

            <p class="center"><button type="submit" id="btn" class="blue-btn unpass">完成添加</button></p>
        </form>
    </div>

@endsection

@section('script')
    $('#user').addClass('active');
    function addUserReg() {
    var v0 = $('#name').val() !== '';
    var v1 = $('#phone').val() !== '';
    var v2 = $('#email').val() !== '';
    var v3 = $('#psd').val() !== '';
    var btn = $('#btn');

    console.log(v0 && v1 && v2 && v3);
    if (v0 && v1 && v2 && v3) {
    btn.addClass('pass');
    btn.removeClass('unpass');
    btn.attr('disabled', false);
    console.log('验证成功')
    } else {
    btn.addClass('unpass');
    btn.removeClass('pass');
    btn.attr('disabled', true);
    }
    }
@endsection