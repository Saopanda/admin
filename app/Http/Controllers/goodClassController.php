<?php

namespace App\Http\Controllers;

use App\goodclass;
use Illuminate\Http\Request;

class goodClassController extends Controller
{
    /**
     * 分类列表展示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '分类列表';
        $class = goodclass::with('dclass:id,name,classid')
            ->where(['classid'=>'0'])
            ->get();
        return view('travel.class.goodlist',['class'=>$class,'title'=>$title]);
    }






}
