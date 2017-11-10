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
//前台播放
Route::group(['middleware' => ['web'],'prefix'=>'scen','namespace'=>'Front'], function () {
    Route::any('/{id}','IndexController@index');
});
Route::get('/test','Front\IndexController@test');
Route::get('/',function (){
    return view('error.error');
});


Route::group(['middleware' => ['web'],'prefix'=>'Api','namespace'=>'Api'], function () {
    Route::post('/sceneAdd','SceneController@SceneAdd');
    Route::post('/scenelist','SceneController@getScenelist');
    Route::post('/getDetails','SceneController@getDetails');
    Route::post('/changePwd','SceneController@changePwd');
    Route::post('/addUser','SceneController@addUser');
    Route::post('/getAUser','SceneController@getAUser');
    Route::post('/setAUser','SceneController@setAUser');
    Route::post('/editScene','SceneController@editScene');
    Route::post('/DeleteUser','SceneController@DeleteUser');
    Route::post('/makerepot','SceneController@makeReport');
    Route::post('/logout','SceneController@logout');
    Route::post('/makeremake','SceneController@makeremake');
    Route::post('/editReport','SceneController@editReport');
    Route::post('/makeComments','SceneController@makeComments');
    Route::post('/signedCommits','SceneController@signedCommits');
    Route::post('/getCount','SceneController@getCount');
});

Route::group(['middleware' => ['web'],'prefix'=>'admin'], function () {

    Route::get('/login', 'Admin\LoginController@index');
    Route::post('/login', 'Admin\LoginController@check');
  //  Route::get('admin/code', 'Admin\LoginController@code');
});


Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
          Route::get('/', 'IndexController@index');
        Route::group(['prefix'=>'scene'],function(){
            Route::get('/scenelist',function(){
                return view('admin.scene.scenlist');
            });
            Route::get('/reportlist',function(){
                return view('admin.scene.reportlist');
            });
            Route::get('/comment',function(){
                return view('admin.scene.comment');
            });
            Route::get('/showscene',function(){
                return view('admin.scene.showscene');
            });
            Route::get('/sceneadd',function(){
                return view('admin.scene.sceneadd');
            });
            Route::get('/scenDetails',function(){
                return view('admin.scene.scenDetails');
            });
            Route::get('/showscenelist',function(){
                return view('admin.scene.showscenelist');
            });
        });
        Route::group(['prefix'=>'user'],function (){
            Route::get('/info',function(){
                return view('admin.user.info');
            });

            Route::get('/pwd',function(){
                return view('admin.user.pwd');
            });
        });
        Route::group(['prefix'=>'org'],function (){
            Route::get('/accedit',function(){
                return view('admin.org.accedit');
            });
            Route::get('/info',function(){
                return view('admin.org.info');
            });
            Route::get('/userlist',function(){
                return view('admin.org.userlist');
            });
            Route::get('/acclist',function(){
                return view('admin.org.acclist');
            });
        });
        Route::group(['prefix'=>'count'],function(){
            Route::get('/list',function(){
                return view('admin.count.list');
            });
            Route::get('/general',function(){
                return view('admin.count.general');
            });

            });
});