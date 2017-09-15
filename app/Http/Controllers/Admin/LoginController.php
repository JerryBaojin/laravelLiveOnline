<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.login.index');
    }

    public function check()
    {
        $input = Input::all();
        $username = $input['logname'];
        $pwd = $input['logpass'];

        $table = DB::table('admin')->where(['name' => $username])->first();
     if (empty($table)) {
            return back() ->with('errorname', '用户名不存在!');
        } elseif (Crypt::decrypt($table->password) != $pwd) {
            return back() -> with('errorpwd', '密码错误!');
        }else{
        $time= date('Y-m-d H:i:s',time());

            DB::table('admin')->update(['login_at'=>$time,'remember_token'=>$input['_token']]);
            session(['user'=>$username]);
            return redirect('admin');
        }


    }
}
