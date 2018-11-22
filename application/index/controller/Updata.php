<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Updata extends Base{
    public function updatafile(){
        return view('updatafile');
    }
}