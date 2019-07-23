<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});


/**
 * 资源库控制器
 */
Route::resource('/resource','travelResourceController');

/**
 * 商品控制器
 */

Route::resource('/goods','travelGoodsController');
Route::get('/goods_poi/{gid}/create','travelGoodsController@poi_add');  //  资源点添加页
Route::get('/goodsAdd_class','travelGoodsController@searchClass');      //  ajax 查找分类
Route::post('/goods_poi/{gid}','travelGoodsController@poi_add');        //  添加第二日行程


/**
 * 分类控制器
 */
Route::resource('/travelclass','travelClassController');