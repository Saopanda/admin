<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class good_days extends Model
{
    protected $table = 'good_days';
    protected $fillable = ['goodid','day','price','comment','dess'];

    //  获取每一天下的资源详情
    public function day_resource()
    {
        return $this->hasMany('App\day_resource','goodday_id','id');
    }
}
