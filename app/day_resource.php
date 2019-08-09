<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class day_resource extends Model
{
    protected $fillable = ['goodday_id','resource_id','price'];


    //  查找资源详情
    public function resource_info()
    {
        return $this->belongsTo('App\travelresource','resource_id','id');
    }

    //  查找所属日行程的详情
    public function goodday_info()
    {
        return $this->belongsTo('App\good_days','goodday_id','id');
    }
}
