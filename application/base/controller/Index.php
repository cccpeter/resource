<?php

namespace app\base\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{

    //初始化（用于判断用户是否登录，然后跳转到相应的模块）
    public function __construct()
    {
        parent::__construct();

        if (!session('id')) {
            //获取cookie
            $id = cookie('id');

            if ($id) {  //如果cookie的id存在，则解密id
                $id = passport_decrypt($id);

                //查询数据库是否有此条记录，如果有就获取信息，没有则跳转到登录界面
                $permission = db('permission')
                    ->field('id,username,auth_level')
                    ->where('id', $id)
                    ->find();
                if ($permission) {
                    //重新从数据库中获取auth_level的值，防止cookie保存的auth_level被拦截后修改
                    $auth_level = $permission['auth_level'];

                    //设置session
                    if($permission['username'] == SUSER){
                        session('auth_level', 99);
                    }else{
                        session('auth_level', $auth_level);
                    }
                    
                    session('id', $permission['id']);
                    session('username', $permission['username']);
                    
                    //跳转页面
                    $this->redirect('admin/Index/index');

                } else {
                    $this->redirect('base/Common/login');
                }
            } else {
                $this->redirect('base/Common/login');
            }
        } else {
            
            $this->redirect('admin/Index/index');

        }
    }

}