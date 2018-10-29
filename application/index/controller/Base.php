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
	 * 判断用户状态权限的前置函数
	 * @param string $token
	 */
    
    public function __construct(){
        parent::__construct();//继承父类的构造器
    	$ctl = request()->controller();// 获得模块的控制器和方法
        $navctl=$this->getnav($ctl);
        if($navctl!=''){//控制器存在权限
        	if($navctl['nav_isshow']!='1'){
        		$this->redirect('Index/index/index');
        	}
        	// 获取token
        	$user=$this->getusertoken();
        	if($user){
        		if($navctl['nav_auth']<$user['auth_level']){//权限不够
        			$this->redirect('Index/index/index');
        		}
                if($user['en']=='02'){
                    $this->redirect('Index/index/index');
                }
        	}else{//token在缓存中失效，需要重新登录
        		$this->redirect('Index/index/index');
        	}
        	// dump($user);die;
        }
    }
    private function getnav($ctl){//获取控制器缓存，需要处理缓存过期，返回页面权限和是否展示
    	$nav=cache($ctl);
    	if($nav){
    		return $nav;
    	}else{
    		$nav=Db::table('re_nav')->where(['nav_controller'=>$ctl])->field('nav_isshow,nav_auth')->find();
    		if($nav){
    			cache($ctl,$nav,'7200');
    		}
    	}
    	return $nav;
    }
    private function getusertoken(){//获取用户token缓存，无需处理缓存过期
    	$token='';
    	$posttoken=input('post.token');//通过post中的token
    	if($posttoken!=''){
    		$token=$posttoken;
    	}
        $gettoken=input('get.token');//获取get中的token
        if($gettoken!=''){
    		$token=$gettoken;
    	}
        $cookietoken=cookie('token');//通过cookie中的token
        if($cookietoken!=''){
    		$token=$cookietoken;
    	}
    	$user=cache($token);
    	return $user;
    }
}