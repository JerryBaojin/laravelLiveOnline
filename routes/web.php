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
Route::group(['middleware' => ['web'],'prefix'=>'admin'], function () {
    //Route::get('/', 'Home\IndexController@index');
    //Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
    //Route::get('/a/{art_id}', 'Home\IndexController@article');
    Route::get('/login', 'Admin\LoginController@index');
    Route::post('/login', 'Admin\LoginController@check');
  //  Route::get('admin/code', 'Admin\LoginController@code');
});


Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {

    Route::get('/', 'IndexController@index');
});

/*
Route::get('/','HomeController@index');*/