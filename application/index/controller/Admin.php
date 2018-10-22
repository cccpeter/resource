<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Admin extends Base
{

    public function index()
    {
        return view('index');
    }
    public function getuser(){
        $userlist=db('user')->select();
        return send($userlist,'0');
    }

}
