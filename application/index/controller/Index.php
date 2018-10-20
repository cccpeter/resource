<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Index extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function tab(){
        return view("tab");
    }
    public function course_detail(){
        return view("course_detail");
    }
    public function course_list(){
        return view("course_list");
    }
    public function video(){
        return view("video");
    }
    //php性能测试的代码
    function test(){
        xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
        $data = xhprof_disable();
        //$_SERVER['XHPROF_ROOT_PATH'] 这就是第三步添加的那个环境变量
        include_once $_SERVER['XHPROF_ROOT_PATH'] . "xhprof_lib/utils/xhprof_lib.php";
        include_once $_SERVER['XHPROF_ROOT_PATH'] . "xhprof_lib/utils/xhprof_runs.php";
        $x = new XHProfRuns_Default();

        //拼接文件名
        $xhprofFilename = date('Ymd_His');

        //print_r($data);die;//此处的打印数据看起来非常不直观，所以需要安装yum install graphviz 图形化界面显示,更直观
        $x->save_run($data, $xhprofFilename);
    }
    

}
