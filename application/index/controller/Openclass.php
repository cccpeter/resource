<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Openclass extends Controller
{
    public function openclass(){
        return view('openclass');
    }
}
