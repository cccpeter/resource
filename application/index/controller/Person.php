<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Person extends Base
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
    /**
     * 课程收藏的异步请求
     * @return [type] [description]
     */
    public function coursecollect(){
        // 是否为post请求
        if(request()->isPost()){
            $re='';
            $data=input('post.data');
            $token=input('post.token');
            $data=isset($data)?json_decode($data):false;
            if($data){
                foreach ($data as $key=>$value){
                    $arr["".$key.""]=$value;
                }
                $data=$arr;
                $video=$this->isexist($data['videotype'],$data['video_id'],'6');
                if($video){
                    $user=cache($token);
                    if($data['choose']=='0'){//收藏
                        $collect['collect_time']=time();
                        $collect['video_id']=$data['video_id'];
                        $collect['video_type']=$data['videotype'];
                        $collect['user_id']=$user['id'];
                        $isex=Db::table('re_collect')
                                ->where(['video_id'=>$data['video_id'],'video_type'=>$data['videotype'],'user_id'=>$user['id']])
                                ->find();
                        if(!$isex){
                            $re=Db::table('re_collect')
                                ->insert($collect);
                        }else{
                            $re=true;
                        }
                    }else{//取消收藏
                        $collect['video_id']=$data['video_id'];
                        $collect['video_type']=$data['videotype'];
                        $collect['user_id']=$user['id'];
                        $re=Db::table('re_collect')
                                ->where($collect)
                                ->delete();
                    }
                }
            }else{
                return send('操作失败','0');
            }
            if($re){
                return send('操作成功','1');
            }else{
                return send('操作失败','0');
            }
        }
    }
    private function isexist($videtype,$video_id,$status){
        switch ($videtype) {
            case '1'://点播
                $re=Db::table('re_videotab')
                    ->where(['videotab_id'=>$video_id,'videotab_status'=>$status])
                    ->field('videotab_id')
                    ->find();
                break;
            // case '2'://直播
            //     $re=Db::table('re_livetab')
            //         ->where(['livetab_id'=>$video_id,'videotab_status'=>$status])
            //         ->field('videotab_id')
            //         ->find();
            //     break;
            // case '3'://公开课
            //     $re=Db::table('re_videotab')
            //         ->where(['videotab_id'=>$video_id,'videotab_status'=>$status])
            //         ->field('videotab_id')
            //         ->find();
            //     break;
            default:
                $re=false;
                break;
        }
        return $re;
    }
    // 课程讨论中的回答iframe页面
    // 未登录用户是进入不了的
    public function course_answer(){
         if(request()->isPost()){
            $re='';
            $data=input('post.data');
            $token=input('post.token');
            $user=cache($token);
            $data=isset($data)?json_decode($data):false;
            if($data){
                foreach ($data as $key=>$value){
                    $arr["".$key.""]=$value;
                }
                $data=$arr;
                $re=Db::table('re_discusscall')
                    ->insert(['discuss_id'=>$data['discuss_id'],'user_id'=>$user['id'],'discusscall_time'=>time(),'discusscall_content'=>$data['content']]);
                if($re){
                    return send('操作成功','1');
                }else{
                    return send('操作失败','0');
                }
            }
            return send('操作失败','0');
        }
        $discuss_id=input('get.discuss_id');
        if($discuss_id){
            $this->assign('discuss_id',$discuss_id);
        }
        return view('course_answer');
    }
    public function course_answerlist(){
        $discuss_id=input('get.discuss_id');
        if($discuss_id){
            $discuss=Db::table('re_discuss')
                    ->where(['discuss_id'=>$discuss_id,'video_type'=>'1','video_isover'=>'0'])
                    ->alias('a')
                    ->join('re_user u','a.user_id=u.id')
                    ->field('discuss_id,discuss_title,discuss_title,discuss_time,username,discuss_content')
                    ->find();
            $discusscall=Db::table('re_discusscall')
                    ->where(['discuss_id'=>$discuss_id])
                    ->alias('a')
                    ->join('re_user u','a.user_id=u.id')
                    ->field('username,discusscall_content,discusscall_time')
                    ->order('discusscall_id desc')
                    ->select();
            $discuss['discusscall']=$discusscall;
            $discuss['discuss_num']=sizeof($discusscall);
            // dump($discuss);
            $this->assign('discuss',$discuss);
        }
        return view('course_answerlist');
    }
}
