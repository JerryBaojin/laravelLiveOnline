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


Route::group(['middleware'=>['web'],'prefix'=>'admin','namespace'=>'Admin'], function () {
        Route::group(['prefix'=>'scene'],function(){
            Route::get('/scenelist',function(){
                return view('admin.scene.scenlist');
            });
            Route::get('/reportlist',function(){
                return view('admin.scene.reportlist');
            });
        });


    Route::get('/comment',function(){
        return view('admin.scene.comment');
    });
    Route::get('/sceneadd',function(){
        return view('admin.scene.sceneadd');
    });
    Route::get('/scenlist',function(){
        return view('admin.scene.scenlist');
    });
    Route::get('/showscenelist',function(){
        return view('admin.scene.showscenelist');
    });
/*
    Route::get('/info',function(){
        return view('admin.org.info');
    });
    Route::get('/acclist',function(){
        return view('admin.org.acclist');
    });
    Route::get('/userlist',function(){
        return view('admin.org.userlist');
    });
    Route::get('/scenlist',function(){
        return view('admin.user.info');
    });
    Route::get('/acclist',function(){
        return view('admin.user.pwd');
    });
    Route::get('/general',function(){
        return view('admin.count.general');
    });
    Route::get('/list',function(){
        return view('admin.count.list');
    });
*/
    Route::get('/', 'IndexController@index');
});

/*
Route::get('/','HomeController@index');*/