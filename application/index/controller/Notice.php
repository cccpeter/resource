<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Notice extends Controller
{

    public function notice(){
        return view('notice');
    }
}
