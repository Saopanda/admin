<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin_user extends Model
{
    protected $table = 'admin_user';

    public $timestamps = false;

    public function groupinfo(){
        return $this->belongsTo('App\admin_group','group','id');
    }

}
