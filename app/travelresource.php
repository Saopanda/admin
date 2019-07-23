<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelresource extends Model
{

    protected $table = 'travelresource';

    protected $fillable = ['name','classid','site','des','imgs','price','status','lxid'];

    //  分类详情
    public function classinfo(){

        return $this->belongsTo('App\travelClass','classid','id');
    }






}
