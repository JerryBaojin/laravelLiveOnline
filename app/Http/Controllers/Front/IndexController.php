<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index($id){
            return $id;
        dd($_ENV['SITENAME']);
    }
}
