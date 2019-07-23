<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelresource extends Model
{

    protected $table = 'travelresource';

    protected $fillable = ['name','classid','site','des','imgs','price','status','lxid'];

    //  获取资源所属上级分类信息
    public function classinfo(){

        return $this->belongsTo('App\travelclass','classid','id');
    }

    //  获取资源目前子分类信息
    public function lxinfo(){
        return $this->belongsTo('App\travelclass','lxid','id');
    }




}
