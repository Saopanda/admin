<?php

namespace App\Http\Controllers;

use App\travelclass;
use App\travelresource;
use Illuminate\Http\Request;
use App\travelgoods;

class travelGoodsController extends Controller
{
    /**
     * 商品列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = '行程列表';
        $limit1 = $request->input('limit1','0');
        $limit2 = $request->input('limit2','0');
        $goods = travelgoods::where('status','1')
            ->select('name','days','price','price_sel','id');

        if($limit2 != 0){
            $goods = $goods->where('price','>=',$limit1*10000)->where('price','<',$limit2*10000);
        }

        $goods = $goods->paginate(10);
        return view('travel.goods.list',['goods'=>$goods,'limit1'=>$limit1,'limit2'=>$limit2,'title'=>$title]);
    }

    /**
     * 行程添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '行程添加';
        return view('travel.goods.add',['title'=>$title]);
    }

    /**
     * 添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name','start_date','days','price','price_sel');
        if(!is_null($request->banner)){
            //  进行上传图片动作
            $img = asset('storage/'.$request->banner->store('images'));
            $data['banner'] = json_encode($img);
        }
        $rs = travelgoods::create($data);
        return redirect('/goods_poi/'.$rs->id.'/create');
    }

    /**
     * 资源分类查找
     */
    public function searchClass(Request $request)
    {
        //  大分类 id
        $classid = $request->input('classid','1');
        $res['class'] = travelclass::with('dclass:id,name,classid')
            ->where('id',$classid)
            ->select('id','name','classid')
            ->first();
        //  类型  id
        $lxid = $request->input('lxid',$res['class']->dclass[0]->id);
        $res['poi'] = travelresource::where(['lxid'=>$lxid,'status'=>'1'])
            ->select('name','imgs','des','price')
            ->get();
        foreach($res['poi'] as $k=>&$v){
            $v->imgs = json_decode($v->imgs)[0];
        }
        return $res;
    }


    /**
     * 资源点添加
     */
    public function poi_add(Request $request)
    {
        $data = $request->data('comment','lxid','price');
        return view('travel.goods.addpoi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
