<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelgoods extends Model
{
    //  绑定数据表
    protected $table = 'travelgoods';

    protected $fillable = ['name','banner','status','start_date','days','price','price_sel'];

    //  查询该行程下的日程
    public function good_days()
    {
        return $this->hasMany('App\good_days','goodid','id');
    }
}
