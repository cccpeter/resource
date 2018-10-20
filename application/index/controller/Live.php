<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Live extends Controller
{

    public function live(){
        return view('live');
    }
}
