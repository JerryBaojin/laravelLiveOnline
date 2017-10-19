<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    public function index($id){
        //过滤$id
        if(!is_numeric($id) || strpos($id,'.') ) return view('error.error');
        $scenDeatails=DB::table('createscene')->where(['pid'=>$id])->first();

         if(empty($scenDeatails)){
             return view('error.error');
         }else{
           $re=explode('|||',$scenDeatails->rtmpUrl);
           $rtmpUrl=$re[0].explode('?',$re[1])[0];
             DB::table('createscene')->where(['pid'=>$id])->update([
                 'viewCount'=>++$scenDeatails->viewCount
             ]);
         }
        $dates=array(
            'scene'=>$scenDeatails->title,
           'id'=>$id,
           'rtmpUrl'=>$rtmpUrl
       );
         //pv+1

        return  view('front.live_Detail',$dates);
            //return $id;
        //dd($_ENV['SITENAME']);
    }
}
