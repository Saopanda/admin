<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $title = '首页';
        return view('travel.index',['title'=>'首页']);
    }


}
