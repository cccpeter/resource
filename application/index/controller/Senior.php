<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Senior extends Base{

    public function audit(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('audit');
    }
}