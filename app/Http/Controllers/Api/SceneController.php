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
            echo 'uploads/'.$filename;
        }
        $dates=$request->input();

    $rtmpUrl="rtmp://220.166.83.187:1935";
        //处理字段
        DB::table('createscene')->insert(['title'=>$dates['topic'],'centent'=>$dates['remark'],'type'=>$dates['type'],]);
    }
}
