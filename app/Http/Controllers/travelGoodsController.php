<?php

namespace App\Http\Controllers;

use App\travelclass;
use App\travelresource;
use Illuminate\Http\Request;
use App\travelgoods;
use App\good_days;
use App\day_resource;
use App\goodclass;

class travelGoodsController extends Controller
{

    /**
     *  加精
     */
    public function good_top($id)
    {
        $is_top = travelgoods::where('id',$id)->value('is_top');
        if($is_top == 0){
            travelgoods::where('id',$id)->update(['is_top'=>1]);
        }else{
            travelgoods::where('id',$id)->update(['is_top'=>0]);
        }
        return back();

    }

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
        $goods = travelgoods::with('classInfo:id,classid,name')
            ->select('name','days','price','price_sel','id','start_date','classid','status','is_top');

        if($limit2 != 0){
            $goods = $goods->where('price','>=',$limit1*10000)->where('price','<',$limit2*10000);
        }
        $goods = $goods->paginate(13);

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
        $goodclass = goodclass::where('status','1')->get();
        return view('travel.goods.add',['title'=>$title,'goodclass'=>$goodclass]);
    }

    /**
     * 添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name','start_date','days','classid');
        if(!isset($data['name']) || !isset($data['start_date']) &&!isset($data['days']) &&!isset($data['classid'])){
            return view('travel.error.401',['mes'=>'请完整输入表单']);
        }
        if(!is_null($request->banner)){
            //  进行上传图片动作
            $name = substr(uniqid(),7,6);
            $img = asset('storage/'.$request->banner->storeAs('images',$name.'.'.$request->banner->extension()));
            $data['banner'] = json_encode($img);
        }else{
            return view('travel.error.401',['mes'=>'请上传banner图']);
        }
        $data['status'] = 0;
        $rs = travelgoods::create($data);
        return redirect('/goods_poi/'.$rs->id.'/create');
    }

    /**
     * 资源分类查找   AJAX
     */
    public function searchClass(Request $request)
    {
        //  大分类 id
        $classid = $request->input('classid','1');
        //  查询小分类
        $res['class'] = travelclass::with('dclass:id,name,classid')
            ->where('id',$classid)
            ->select('id','name','classid')
            ->first();
        //  类型  id
        $lxid = $request->input('lxid',$res['class']->dclass[0]->id);
        //  查询小类型下的信息
        $res['poi'] = travelresource::where(['lxid'=>$lxid,'status'=>'1'])
            ->select('name','imgs','des','price','id')
            ->get();
        foreach($res['poi'] as $k=>&$v){
            $v->imgs = json_decode($v->imgs)[0];
        }
        return $res;
    }


    /**
     * 商品的每日添加页
     */
    public function poi_add(Request $request,$gid)
    {
        $title = '行程添加';

        $count = good_days::where('goodid',$gid)->groupby('day')->select('day')->get();
        $count = count($count);
        return view('travel.goods.addpoi',['gid'=>$gid,'count'=>$count,'title'=>$title]);
    }

    /**
     * 商品每日的添加操作
     * @param Request $request
     */
    public function poi_add_do(Request $request,$gid)
    {

        $last = $request->input('last','0');

        $data['day'] = good_days::where('goodid',$gid)->orderby('day','desc')->value('day');
        $data['comment'] = $request->input('comment');
        $data['goodid'] = $gid;
        $data['dess'] = $request->input('dess');
        if(is_null($data['comment'])){
            return view('travel.error.401',['mes'=>'请输入每日概括']);

        }
        if(!isset($request->resourceid)){
            return view('travel.error.401',['mes'=>'请添加资源']);

        }

        if(is_null($data['day'])){
            $data['day'] = 1;
        }else{
            $data['day']++;
        }
        $price = 0;
        $good_day = good_days::create($data);
        foreach($request->resourceid as $k => $v){
            $resource[$k]['resource_id'] = $v;
            $resource[$k]['price'] = $request->price[$k];
            $resource[$k]['goodday_id'] = $good_day->id;
            $resource[$k]['goodid'] = $gid;
            $price += $request->price[$k];
        }
        good_days::where('id',$good_day->id)->update(['price'=>$price]);
        day_resource::insert($resource);
        if($last == '0'){
            return redirect('goods_poi/'.$gid.'/create');
        }else{
            $des = travelgoods::where('id',$gid)->value('des');
            if(is_null($des)){
                return redirect('goods_poi/'.$gid.'/last');
            }else{
                return redirect('goods/'.$gid);
            }
        }
    }

    /**
     * 添加最后信息页
     * @param $gid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function good_addlast($gid,$in=0)
    {
        $title = '行程添加';
        $res = day_resource::with(['resource_info:id,lxid,classid,name','resource_info.lxinfo:id,name'])
            ->where('goodid',$gid)
            ->select('goodday_id','resource_id','goodid','price')
            ->get();
        $price = 0;
        $jiudian = [];
        foreach ($res as $k =>$v){
            if(isset($v->resource_info)){
                if($v->resource_info->classid == 2){
                    array_push($jiudian,$v->resource_info);
                }
            }
            $price += $v->price;
        }
        travelgoods::where('id',$gid)->update(['price'=>$price]);
        $goods = travelgoods::where('id',$gid)->select('price_sel','des')->first();
        if($in != 0){
            $data['res'] = $res;
            $data['jiudian'] = $jiudian;
            return $data;
        }
        return view('travel.goods.goodlast',['goods'=>$goods,'title'=>$title,'res'=>$res,'price'=>$price,'jiudian'=>$jiudian,'gid'=>$gid]);
    }

    /**
     * 最后信息添加操作
     * @param Request $request
     * @param $gid
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function good_addlast_do(Request $request,$gid)
    {
        $data = $request->only('price_sel','des');
        if(!isset($data['price_sel']) || !isset($data['des'])){

            return view('travel.error.401',['mes'=>'请输入指导价和须知']);
        }

        $data['status'] = 1;
        travelgoods::where('id',$gid)->update($data);
        return redirect('/goods/'.$gid);
    }


    /**
     * 商品详情页
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = '行程详情';
        $rs = travelgoods::with([
            'good_days'=>function($query){
                return $query->orderby('day')->select('id','goodid','day','price','comment','dess');
            },
            'good_days.day_resource'=>function($query){
                return $query->select('goodday_id','resource_id');
            },
            'good_days.day_resource.resource_info'=>function($query){
                return $query->select('id','name','site','des','imgs','classid');
            },
            'good_days.day_resource.resource_info.classinfo'=>function($query){
                return $query->select('id','name','icon');
            }
            ])
            ->where('id',$id)
            ->select('id','name','banner','start_date','days','price','price_sel','des')
            ->first();
        $rs->banner = json_decode($rs->banner);
        $data = $this->good_addlast($id,1);
        return view('travel.goods.info',['rs'=>$rs,'title'=>$title,'data'=>$data]);
    }

    /**
     *  修改
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = '行程编辑';
        $rs = travelgoods::where('id',$id)
            ->select('id','name','start_date','days','banner','price_sel','classid')
            ->first();
        $goodclass = goodclass::where('status','1')->get();

        $rs->banner = json_decode($rs->banner);
        return view('travel.goods.edit',['title'=>$title,'rs'=>$rs,'goodclass'=>$goodclass]);
    }

    /**
     *  修改行程
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name','start_date','days','price_sel','classid');
        if(!isset($data['price_sel']) || !isset($data['name']) || !isset($data['start_date']) || !isset($data['days'])){
            return view('travel.error.401',['mes'=>'请不要留空']);
        }
        if(!is_null($request->banner)){
            //  进行上传图片动作
            $name = substr(uniqid(),7,6);
            $img = asset('storage/'.$request->banner->storeAs('images',$name.'.'.$request->banner->extension()));
            $data['banner'] = json_encode($img);
        }
        travelgoods::where('id',$id)
            ->update($data);
        return redirect('/goods/'.$id);
    }

    /**
     * 某一点的编辑页
     * @param $id
     */
    public function poi_edit($id)
    {
        $title = '修改一日行程';
        $rs = day_resource::with(['resource_info:id,name,site,des,imgs'])
            ->where('goodday_id',$id)
            ->select('id','resource_id','price')
            ->get();
        $res = good_days::where('id',$id)
            ->select('comment','dess','goodid')
            ->first();
        return view('travel.goods.editpoi',['id'=>$id,'title'=>$title,'rs'=>$rs,'res'=>$res]);
    }

    /**
     *  某一点的编辑操作页
     */
    public function poi_edit_do(Request $request,$id,$gid)
    {

        $data = $request->only('comment','dess');

        $data['price'] = 0;
        day_resource::where('goodday_id',$id)->delete();
        foreach($request->resourceid as $k => $v){
            $resource[$k]['resource_id'] = $v;
            $resource[$k]['price'] = $request->price[$k];
            $resource[$k]['goodday_id'] = $id;
            $resource[$k]['goodid'] = $gid;
            $data['price'] += $request->price[$k];
        }


        good_days::where('id',$id)->update($data);
        day_resource::insert($resource);
        $allprice = day_resource::where('goodid',$gid)->selectraw('sum(price) as prices')->first();
        travelgoods::where('id',$gid)->update(['price'=>$allprice->prices]);
        return redirect('goods/'.$gid);

    }

    /**
     * 删除某天
     */
    public function poi_delete($id)
    {
        good_days::where('id',$id)->delete();
        day_resource::where('goodday_id',$id)->delete();
        return back();
    }

    /**
     *  删除制作的行程
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        good_days::where('goodid',$id)->delete();
        day_resource::where('goodid',$id)->delete();
        travelgoods::where('id',$id)->delete();
        return redirect('/goods');
    }
}
