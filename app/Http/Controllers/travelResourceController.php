<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\travelclass;
use App\travelresource;

class travelResourceController extends Controller
{
    /**
     * 资源列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = '资源列表';
        //  获取主分类id
        $classid = $request->input('classid','1');
        $Tclass = travelclass::
            where(['classid'=>'0','status'=>'1'])
            ->select('id','name','classid','icon')
            ->get();

        $resource = travelresource::
            with('lxinfo:id,classid,name')
            ->where(['classid'=>$classid,'status'=>'1'])
            ->select('id','classid','name','site','des','price','lxid')
            ->paginate(13);
        return view('travel.resource.list',['Tclass'=>$Tclass,'resource'=>$resource,'classid'=>$classid,'title'=>$title]);
    }

    /**
     * 添加资源页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '资源添加';

        $Tclass = travelclass::with([
            'dclass:id,name,classid',
            // 'dclass.dclass:id,name,classid'
            ])
            ->where(['classid'=>'0','status'=>'1'])
            ->select('id','name','classid','icon')
            ->get();
        return view('travel.resource.add',['Tclass'=>$Tclass,'title'=>$title]);
    }

    /**
     * 添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  筛选需要的数据
        $data = $request->only('name','site','lxid','des','price','classid');
        if(!is_null($request->imgs)){
            //  进行上传图片动作
            foreach($request->imgs as $k => $v){
                $img[$k] = $this->base64_image_content($v,'storage/images');

//                $name = substr(uniqid(),7,6);
//                 $v->storeAs('images/'.date('Y-m-d'),$name.'.'.$v->extension());
            }
            $data['imgs'] = json_encode($img);
        }

        if($data['classid'] == '4'){
            $data['imgs'] = json_encode(['/traffic.jpg']);
            $data['des'] = '';
        }
        //  数据库添加操作
        $data['status'] = '1';
        travelresource::create($data);
        return redirect('/resource?classid='.$data['classid']);
    }

    /* base64格式编码转换为图片并保存对应文件夹 */
    protected function base64_image_content($base64_image_content,$path){
        //匹配出图片的格式
        if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = $path."/".date('Ymd',time())."/";
            if(!file_exists($new_file)){
    //            dd($new_file);
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file,0775,true);
            }
            $new_file = $new_file.substr(uniqid(),7,6).".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                return '/'.$new_file;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    /**
     * 查找大分类下的资源
     *  AJAX
     */
    public function searchResource(Request $request)
    {
        $value = $request->only('value','classid');
        $res = travelresource::where(['classid'=>$value['classid'],'status'=>'1'])
            ->where('name','like','%'.$value['value'].'%')
            ->get();
        return $res;
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
     * 编辑资源点
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = '资源编辑';
        $res = travelresource::with('classinfo:id,name,icon')
            ->where('id',$id)
            ->select('id','classid','name','site','des','imgs','price','lxid')
            ->first();
        $imgs = json_decode($res->imgs);
        $res->imgs = $imgs;
        //  读取景点类型
        $res->lxinfo = travelclass::where('classid',$res->classid)
            ->get();
        return view('travel.resource.edit',['res'=>$res,'title'=>$title]);
    }

    /**
     * 提交编辑资源
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name','site','lxid','des','price','classid');
        if(!is_null($request->imgs)){
            //  进行上传图片动作
            foreach($request->imgs as $k => $v){
                $img[$k] = $this->base64_image_content($v,'storage/images');

//                $name = substr(uniqid(),7,6);
//                $img[$k] = $v->storeAs('images/'.date('Y-m-d'),$name.'.'.$v->extension());
            }
            $data['imgs'] = json_encode($img);
        }
        if($data['classid'] == '4'){
            $data['imgs'] = json_encode(['/traffic.jpg']);
            $data['des'] = '';

        }
        //  数据库添加操作
        $data['status'] = '1';
        travelresource::where('id',$id)->update($data);
        return redirect('/resource');
    }

    /**
     * 删除资源点
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        travelresource::where('id',$id)->delete();
        return back();
    }
}
