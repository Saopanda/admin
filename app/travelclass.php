<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelclass extends Model
{
    //  绑定数据表
    protected $table = 'travelclass';

    protected $fillable = ['name','classid','status'];

    //  附加主级所含的下级分类数据
    public function dclass(){

        return $this->hasMany('App\travelclass','classid','id');
    }


}
