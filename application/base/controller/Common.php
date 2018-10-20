<?php

namespace app\base\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\base\controller\Base;

class Common extends Base
{

    /**
     * @登录页面
     */
    public function login()
    {
        
        if (session('id')!='' || cookie('id')!='') {
            $this->redirect('base/Index/index');
        }

        $tip = '';

        //获取提交的数据
        $username = input('post.username');
        $password = input('post.password');
        $captcha = input('post.captcha');
        $online = input('post.online');
        $time = input('post.time');
        
        if (request()->isPost()) {

            //提交数据判断是否为空
            // if ($username == '' || $password == '' || $captcha == '') {
            if ($username == '' || $password == '' ) {
                $tip = '请输入完整信息！';
            } else {
                //匹配验证码
                // if (!captcha_check($captcha)) {
                if (0) {
                    $tip = '验证码不正确，请重新输入！';
                } else {
                    //要获取的字段
                    $field = 'id,username,en,auth_level';
                    //查询条件
                    $where = [
                        'username' => $username,
                        'password' => pwd_encrypt($password)
                    ];
                    
                    $result = db('permission')
                        ->field($field)
                        ->where($where)
                        ->find();

                    if ($result && $result['en']!='2') {
                            if($result['auth_level'] == '98' && $result['username']==DEBUG){
                                session('auth_level', $result['auth_level']);
                                session('id', $result['id']);
                                session('username', $result['username']);
                                $this->redirect('admin/Serverinfo/index');
                            }
                            //登录成功
                            if ($online == 'success' && $result['auth_level']!='98') {
                                    //cookie保存时间
                                    if ($time == '1') {
                                        $expire = 3600 * 24 * 7;
                                    } elseif ($time == '2') {
                                        $expire = 3600 * 24 * 15;
                                    } elseif ($time == '3') {
                                        $expire = 3600 * 24 * 30;
                                    }
                                    //设置cookie
                                    //出于安全考虑，将cookie的id加密存储
                                    $id = passport_encrypt($result['id']);
                                    cookie('id', $id, $expire);
                                }

                            //不同权限设置不同的session作用域，设置超级管理员的权限为99
                            if($result['username']==SUSER){
                                       session('auth_level', 99);
                                       
                                   }else{
                                       session('auth_level', $result['auth_level']);
                                   }
                                session('id', $result['id']);
                                session('username', $result['username']);
                                //判断属于的权限等级跳转至相应的模块
                        
                                $this->redirect('admin/Index/index');
                                

                                // $this->redirect('admin/Index/index');

                    }else if($result && $result['en']=='2'){
                        //如果账号无效，则跳出
                        $tip='帐号无法登陆，请联系管理员！';
                    } else {
                        $tip = '帐号或密码不正确,请重新输入！';
                    }
                }
            }
        }
        $this->getLocalSerinfo();
        $this->assign([
            'tip' => $tip,
            'username' => $username,
            'online' => $online,
            'time' => $time
        ]);
        return view('login');
    }
    /**
     * 获取页面必须信息
     */
    public function getLocalSerinfo(){
        $field = 'name';
        $local_info = Db::name('config_local')->field($field)->where('id=1')->find();
        $this->assign([
            'local_info' => $local_info
        ]);
    }
    /**
     * @退出登录
     */
    public function logout()
    {
        cookie('id', null);
        session(null);
        $this->redirect('base/common/login');
    }

    /**
     * @api 登录
     */
    public function api_login(){
        if(!request()->isGet())exit;
        $api_sign = new \app\common\lib\Apilogin;
        $api_info = $api_sign->api_login_check();
        if($api_info==false)$this->redirect('base/Common/logout');
        session('id', 999);
        session('username', $api_info['api_key']);
        session('auth_level', 1);
        session('api_auth',$api_info['api_key']);
        session('back_api_url',$api_info['back_api_url']);

        $this->redirect('admin/'.$api_info['controller'].'/'.$api_info['action']);
    }

}