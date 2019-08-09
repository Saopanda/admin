<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\admin_group;
use App\admin_user;

class userController extends Controller
{

    public function login()
    {
        return view('travel.login');
    }

    public function login_do(Request $request)
    {
        $name = $request->input('name');
        $passwd = $request->input('passwd');
        $user = DB::table('admin_user')
            ->where('name',$name)
            ->orWhere('phone',$name)
            ->orWhere('email',$name)
            ->first();
        if(is_null($user)){
            return back()->with(['mes'=>'登录失败']);
        }
        if($user->status != '1'){
            return back()->with(['mes'=>'账户被禁用']);
        }
        $rs = Hash::check($passwd,$user->passwd);
        if($rs){
            session(['admin_userid'=>$user->id]);
            return redirect('/');
        }else{
            return back()->with(['mes'=>'登录失败']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_userid');
        return  redirect('/login')->with(['mes'=>'退出成功']);
    }

    public function register(Request $request)
    {
        $data = $request->only('name','phone','email','passwd');
        $data['passwd'] = Hash::make($data['passwd']);

        DB::table('admin_user')->insertGetid($data);
    }

    /**
     * 用户列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        $title = '用户管理';
        $users = admin_user::with('groupinfo:id,name')
            ->select('id','name','phone','des','group','status')
            ->get();
        return view('travel.user.list',['title'=>$title,'users'=>$users]);
    }

    /**
     * 添加用户
     *
     */
    public function create()
    {
        $title = '用户添加';
        $group = admin_group::
            select('id','name')
            ->get();

        return view('travel.user.add',['title'=>$title,'group'=>$group]);
    }

    /**
     * 添加操作
     */
    public function store(Request $request)
    {
        $data = $request->only('name','phone','email','group','des');
        $passwd = $request->input('passwd');
        $count  = admin_user::where('name',$data['name'])->count();
        if($count > 0){
            return back()->with(['mes'=>'用户名重名']);
        }
        if($passwd){
            $data['passwd'] = Hash::make($passwd);
            $data['status'] = 1;
            admin_user::insert($data);
            return redirect('/user')->with(['mes'=>'添加成功']);
        }
        return back()->with(['mes'=>'添加失败']);
    }


    /**
     * 用户编辑
     */
    public function edit($id)
    {
        $title = '用户修改';
        $group = admin_group::
        select('id','name')
            ->get();

        $user_info = admin_user::where('id',$id)->first();
        return view('travel.user.edit',['title'=>$title,'user_info'=>$user_info,'group'=>$group]);
    }

    /**
     *
     * 用户编辑操作
     *
     */

    public function update(Request $request,$id)
    {
        $data = $request->only('name','phone','email','group','des');
        $passwd = $request->input('passwd');
        $count  = admin_user::where('name',$data['name'])->count();
        if($count > 1){
            return back()->with(['mes'=>'用户名重名']);
        }
        if($passwd){
            $data['passwd'] = Hash::make($passwd);
        }
        admin_user::where('id',$id)->update($data);
        return redirect('/user')->with(['mes'=>'修改成功']);
    }

    /**
     * 用户禁用
     */
    public function baduser($id)
    {
        $rs = admin_user::where('id',$id)
            ->select('group','status')
            ->first();
        if(isset($rs->group)){
            if($rs->group == '1'){
                return back()->with(['mes'=>'无法禁用超级管理员']);
            }
            if($rs->status == '1'){
                $res = admin_user::where('id',$id)
                    ->update(['status'=>'0']);
                if($res){
                    return back()->with(['mes'=>'禁用成功']);
                }
            }elseif($rs->status == '0'){
                $res = admin_user::where('id',$id)
                    ->update(['status'=>'1']);
                if($res){
                    return back()->with(['mes'=>'启用成功']);
                }
            }
        }
        return back()->with(['mes'=>'操作失败']);

    }

    /**
     * 用户删除
     */
    public function destroy($id)
    {

    }

}
