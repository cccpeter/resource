<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Person extends Controller
{

    public function userinfo(){
        return view('userinfo');
    }
    public function note(){
        return view('note');
    }
    public function mycollect(){
        return view('mycollect');
    }
    public function myassess(){
        return view('myassess');
    }
    public function myvideo(){
        return view('myvideo');
    }
    public function publicvideo(){
        return view('publicvideo');
    }
    public function myrequest(){
        return view('myrequest');
    }
}
