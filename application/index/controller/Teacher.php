<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Teacher extends Base{

    public function publicvideo(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('publicvideo');
    }
    public function myvideo(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('myvideo');
    }
}