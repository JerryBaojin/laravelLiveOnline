<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SceneController extends Controller
{
    public function  index(){

    }
    public function SceneAdd(Request $request){
    $image=$request->file('image');
        if ($image->isValid()){
            $type=$image->getClientOriginalExtension();//扩展名
            $original=$image->getRealPath();//临时绝对路径
            $filename=date('His').'-'.uniqid().".".$type;
           $path=$image->move(base_path().'/public/uploads',$filename);
            $path= 'uploads/'.$filename;
        }
        $dates=$request->input();

    $rtmpUrl="rtmp://220.166.83.187:1935/live/|||".uniqid()."?pass=njrb";
        //处理字段
        $insertStatus=DB::table('createscene')->insert(['title'=>$dates['topic'],'content'=>$dates['remark'],'coverPic'=>$path,'type'=>$dates['type'],'rtmpUrl'=>$rtmpUrl,'createAt'=>date('Y-m-d H:i',time())]);
       if ($insertStatus){
           return 1;
       }else{
           return 0;
       }
    }
    public function getScenelist(Request $request){
          if ($request->input('act')=='getList'){
              $re=DB::table('createscene')->get();
         return json_encode($re);
          }
    }
}
