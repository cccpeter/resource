<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
class Base extends Controller
{
	/**
	 * [__construct ]
	 * 判断访问能不能浏览
	 * 应该先判断该访问有没有权限
	 * 
	 * 如果访问没有权限则重定向
	 * 如果有权限则判断
	 */
	public function __construct()
    {

        parent::__construct();
        $posttoken=input('post.token');
        $gettoken=input('get.token');//获取请求中的token
        $token=cookie('token');//读取cookie中的token
        if($posttoken!=''){
        	$user=$this->getusertoken($posttoken);
        }else if($gettoken!=''){
        	$user=$this->getusertoken($gettoken);
        }else{
        	return send('缺少必要参数','0');
        }
        if($user){
        	// 获得模块的控制器和方法
        	$ctl = request()->controller();
        	$act = request()->action();
        	$nav_isshow = Db::table('re_nav')->field('nav_id')->where(['nav_controller'=>$ctl,'nav_isshow'=>0])->find();
        	if($nav_isshow)$this->redirect('Index/Index/index');
        	$auth=Db::table('re_nav')->field('nav_auth')->where(['nav_controller'=>$ctl])->find();
        	if($auth!=''){//控制器存在。当不存在的控制器操作默认不拦截
	        	if($auth['nav_auth']>=$user['auth_level']){//权限足够可以访问

	        	}else{//权限不足不可访问
	        		$this->redirect('Index/Index/index');
	        	}
	        }
        }else{
        	// exit('缺少');
        	return send('缺少必要参数','0');
        }
    }
    private function getusertoken($token){
    	$user=cache($token);
    	return $user;
    }
}