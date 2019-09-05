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
 *  用户管理
 */
Route::get('/login','userController@login');
Route::post('/login','userController@login_do');

Route::get('/logout','userController@logout');

Route::get('/register','userController@register');


Route::group(['middleware'=>'admin'],function (){


    Route::get('/','indexController@index');

    /**
     * 资源库控制器
     */
    Route::resource('/resource','travelResourceController');

    /**
     * 资源库搜索
     *
     */
    Route::post('/R_search','travelResourceController@searchResource');


    /**
     * 商品控制器
     */

    Route::resource('/goods','travelGoodsController');
    Route::get('/goodsAdd_class','travelGoodsController@searchClass');      //  ajax 查找分类

    Route::get('/goods_poi/{gid}/create','travelGoodsController@poi_add');  //  商品添加页
    Route::post('/goods_poi/{gid}','travelGoodsController@poi_add_do');       //  添加第二日行程
    Route::get('/goods_poi/{gid}/last','travelGoodsController@good_addlast');       //  添加最后信息
    Route::post('/goods_poi/{gid}/last','travelGoodsController@good_addlast_do');       //  添加最后信息

    Route::get('/goods_poi/{id}/edit','travelGoodsController@poi_edit');        //  修改某日的点
    Route::put('/goods_poi/{id}/{gid}','travelGoodsController@poi_edit_do');        //  修改某日的点操作
    Route::delete('/goods_poi/{id}','travelGoodsController@poi_delete');        //  删除某一天

    Route::get('/goods/{id}/top','travelGoodsController@good_top');        //  精品行程


    /**
     * 订单控制器
     */

    Route::resource('/order','orderController');

    /**
     * 分类控制器
     */
    //  资源分类
    Route::resource('/travelclass','travelClassController');
    //  商品分类
    Route::resource('/goodclass','goodClassController');


    /**
     * 用户控制器
     */

    Route::resource('/user','userController');
    Route::get('/user/b/{id}','userController@baduser');
});
