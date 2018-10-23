<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;
use think\Cache;

class Login extends Controller
{

    public function index()
    {
        return view('index');
    }
    /**
     * login登录接口
     * @param [string] $[data] [<description>]
     * @param [string] $[action] [<actiong=login为系统内网页登录>]
     * @return [string] $data+$status [<description>]
     */
    public function login(){
    	$data=input('post.data');
    	$action=input('post.action');
    	$data=json_decode($data);
    	if($action!=''){
	    	if($action=='login'){
	    		if($data!=''){
		    		foreach ($data as $key=>$value){
		    			$arr["".$key.""]=$value;
		    		}
		    		if(!array_key_exists('username',$arr)){
		    			return send('请填完整数据再提交','0');
		    		}else{
		    			$find['username']=$arr['username'];
		    		}
		    		if(!array_key_exists('password',$arr)){
		    			return send('请填完整数据再提交','0');
		    		}else{
		    			$find['password']=$arr['password'];
		    		}
		    		if(array_key_exists('isseven',$arr)){
		    			$cachetime=644800;
		    		}else{
		    			$cachetime=86400;
		    		}
		    		// 数据库采用单例连接单例需要配置表前缀，因为需要兼容mysql和sqlite
		    		$userdb=Db::table('re_user');
					$user=$userdb->where($find)->find();
					if($user){
						if($user['en']=='02'){
							return send('该用户以被锁定，请联系管理员','0');
						}
						$token=pwd_encrypt($user['id'].','.time());
						cache($token,$user,$cachetime);
						// echo $cachetime;
						// var_dump('cache的值:'.$token);
						// var_dump(cache('4b790beb314f5beb8797a4fed4226cef'));
						$msg['token']=$token;
						$msg['token_time']=$cachetime;
						$msg['username']=$user['username'];
						$msg['auth_level']=$user['auth_level'];
						return send($msg,'1');
					}else{
						$msg="账号或者密码错误";
						return send($msg,'0');
					}
				}else{
					return send('请填完整数据再提交','0');
				}

	    	}else{
	    		return send('请填完整数据再提交','0');
	    	}
	    }else{
	    	return send('请填完整数据再提交','0');
	    }
    }

}
