<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
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
        $id=Input::get('id');//对应的id
          if ($request->input('act')=='getList'){
              $re=DB::table('createscene')->orderby('setTop','desc')->get();
             return json_encode($re);
          }elseif ($request->input('act')=='setTop'){
            //setTop 选找出最大数，然后+1
              $maxSet=DB::table('createscene')->max('setTop');
              if(DB::table('createscene')->where('id',$id)->update(['setTop'=>++$maxSet])){
                  return 1;
              }else{
                  return 0;
              }
          }elseif($request->input('act')=='cancelTop'){
              if(DB::table('createscene')->where('id',$id)->update(['settop'=>0])){
                  return 1;
              }else{
                  return 0;
              }
          }elseif($request->input('act')=='end'){
              if(DB::table('createscene')->where('id',$id)->update(['status'=>0])){
                  return 1;
              }else{
                  return 0;
              }
          }elseif($request->input('act')=='pushLive'){
              if(DB::table('createscene')->where('id',$id)->update(['status'=>16])){
                  return 1;
              }else{
                  return 0;
              }
          }elseif($request->input('act')=='pushLive'){
              if(DB::table('createscene')->where('id',$id)->update(['status'=>16])){
                  return 1;
              }else{
                  return 0;
              }
          }elseif($request->input('del')=='del'){
              //9.26 删除场景  暂时未能处理
              /*
              if(DB::table('createscene')->where('id',$id)->update(['status'=>16])){
                  return 1;
              }else{
                  return 0;
              }*/
          }
    }
    public function getDetails(Request $request)
    {
        $id=$request->input('id');
        if($request->input('act')=='getDetail'){
            $res=DB::table('createscene')->where('id',$id)->get();
            return json_encode($res);
        }
    }
}
