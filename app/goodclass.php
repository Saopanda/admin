<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class goodclass extends Model
{
    protected $table = 'goodclass';

    public $timestamps = false;

    //  附加主级所含的下级分类数据
    public function dclass()
    {
        return $this->hasMany('App\goodclass','classid','id');
    }

}
