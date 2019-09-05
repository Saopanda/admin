<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\travelclass;

class travelClassController extends Controller
{
    /**
     * 分类列表展示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '分类列表';
        $class = travelclass::with('dclass:id,name,classid')
            ->where(['classid'=>'0'])
            ->get();
        return view('travel.class.travellist',['class'=>$class,'title'=>$title]);
    }

    /**
     * 分类添加页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '分类添加';
        $class = travelclass::where(['classid'=>'0','status'=>'1'])
            ->select('id','classid','name')
            ->get();
        return view('travel.class.add',['class'=>$class,'title'=>$title]);
    }

    /**
     * 分类添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name','classid');
        if(!isset($data['name'])){
            return view('travel.error.401',['mes'=>'请输入名字']);

        }
        travelclass::insert($data);
        return redirect('/travelclass');
    }

    /**
     * 查找下级分类
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * 分类编辑
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = '分类编辑';
        $rs = travelclass::where('id',$id)
            ->select('id','name','classid')
            ->first();
        $class = travelclass::where(['classid'=>'0','status'=>'1'])
            ->select('id','classid','name')
            ->get();
        return view('travel.class.edit',['rs'=>$rs,'class'=>$class,'title'=>$title]);
    }

    /**
     * 分类编辑提交
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name','classid');
        travelclass::where('id',$id)
            ->update($data);
        return redirect('/travelclass');
    }

    /**
     * 分类删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rs = travelclass::find($id);
        if($rs->classid != 0){
            travelclass::where('id',$id)->delete();
        }
        return back();
    }
}
