<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelgoods extends Model
{
    //  绑定数据表
    protected $table = 'travelgoods';

    protected $fillable = ['name','banner','status','start_date','days','price','price_sel'];

}
