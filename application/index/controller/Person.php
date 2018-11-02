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
                $keyarr=['discuss_id','content'];
                if(!$this->isarray($keyarr,$data)){
                    return send("缺少必要数据",'0');
                }
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
    public function subquest(){
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
                $keyarr=["title","content","video_id","video_type"];
                if(!$this->isarray($keyarr,$data)){
                    return send('缺少必要数据','0');
                }
                $type_name=config('video_type.'.$data['video_type']);
                if($type_name){
                    $video=Db::table('re_videotab')
                            ->where(['videotab_id'=>$data['video_id'],'videotab_status'=>'6'])
                            ->field('videotab_id,videotab_title')
                            ->find();
                    if($video){
                        $re=Db::table('re_discuss')
                                ->insert(['video_type'=>$data['video_type'],'video_id'=>$data['video_id'],'discuss_title'=>$data['title'],'user_id'=>$user['id'],'discuss_time'=>time(),'discuss_content'=>$data['content'],'video_title'=>$video['videotab_title'],'video_isover'=>'0']);
                        if($re){
                            return send('操作成功','1');
                        }else{
                            return send('操作失败','0');
                        }
                    }
                }
                
                
            }
            return send('操作失败','0');
        }
        
    }
    public function subnote(){
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
                $keyarr=["content","video_id","video_type"];
                if(!$this->isarray($keyarr,$data)){
                    return send('缺少必要数据','0');
                }
                $type_name=config('video_type.'.$data['video_type']);
                if($type_name){
                    $video=Db::table('re_videotab')
                            ->where(['videotab_id'=>$data['video_id'],'videotab_status'=>'6'])
                            ->field('videotab_id,videotab_title')
                            ->find();
                    if($video){
                        $re=Db::table('re_note')
                            ->insert(['video_type'=>$data['video_type'],'video_id'=>$data['video_id'],'user_id'=>$user['id'],'note_time'=>time(),'note_content'=>$data['content'],'video_title'=>$video['videotab_title'],'video_isover'=>'0']);
                        if($re){
                            return send('操作成功','1');
                        }else{
                            return send('操作失败','0');
                        }
                    }
                }
            }
            return send('操作失败','0');
        }
    }
    /**
     * [subassess description]
     * 评价功能的模块
     * @return [type] [description]
     */
    public function subassess(){
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
                $keyarr=["content","video_id","video_type","level"];
                if(!$this->isarray($keyarr,$data)){
                    return send('缺少必要数据','0');
                }
                $type_name=config('video_type.'.$data['video_type']);
                if($type_name){
                    $video=Db::table('re_videotab')
                            ->where(['videotab_id'=>$data['video_id'],'videotab_status'=>'6'])
                            ->field('videotab_id,videotab_title,videotab_assessnums,videotab_assessscore')
                            ->find();
                    if($video){
                        $assess=Db::table('re_assess')
                                ->where(['user_id'=>$user['id'],'video_id'=>$data['video_id'],'video_type'=>$data['video_type']])
                                ->field('assess_id')
                                ->find();
                        if(!$assess){
                            $re=Db::table('re_assess')
                                ->insert(['video_type'=>$data['video_type'],'video_id'=>$data['video_id'],'user_id'=>$user['id'],'assess_time'=>time(),'assess_content'=>$data['content'],'video_title'=>$video['videotab_title'],'video_isover'=>'0','assess_score'=>$data['level']]);
                            if($re){
                                $nums=$video['videotab_assessnums']+1;
                                $score=($video['videotab_assessnums']*$video['videotab_assessscore']+$data['level'])/$nums;
                                $score=round($score,2);
                                $re=Db::table('re_videotab')
                                    ->where(['videotab_id'=>$video['videotab_id']])
                                    ->update(['videotab_assessnums'=>$nums,'videotab_assessscore'=>$score]);
                                return send('操作成功','1');
                            }else{
                                return send('操作失败','0');
                            }
                        }
                    }
                }
            }
            return send('操作失败','0');
        }
    }
    public function viewtime(){
        if(request()->isPost()){
            $token=input('post.token');
            $user=cache($token);
            $re_user=Db::table('re_user')
                    ->where(['id'=>$user['id']])
                    ->field('viewtime')
                    ->find();
            $re=Db::table('re_user')
                ->update(['id'=>$user['id'],'viewtime'=>($re_user['viewtime']+120)]);
            if($re){
                return send('上报ok','1');
            }else{
                return send('上报error','1');
            }
        }
    }
    public function videotime(){
        if(request()->isPost()){
            $token=input('post.token');
            $user=cache($token);
            $re_user=Db::table('re_user')
                    ->where(['id'=>$user['id']])
                    ->field('videotime')
                    ->find();
            $re=Db::table('re_user')
                ->update(['id'=>$user['id'],'videotime'=>($re_user['videotime']+120)]);
            if($re){
                return send('上报ok','1');
            }else{
                return send('上报error','1');
            }
        }
    }
    public function videolist(){
        if(request()->isPost()){
            $token=input('post.token');
            $user=cache($token);

            $re_user=Db::table('re_user')
                    ->where(['id'=>$user['id']])
                    ->field('videotime')
                    ->find();
            $re=Db::table('re_user')
                ->update(['id'=>$user['id'],'videotime'=>($re_user['videotime']+120)]);
            if($re){
                return send('上报ok','1');
            }else{
                return send('上报error','1');
            }
    }
    private function ipcache($ip){
        return ;
    }
    private function isarray($keyarr,$arr){
        foreach ($keyarr as $value) {
            if(!array_key_exists($value, $arr)){
                return false;
            }
        }
        return true;
    }
}
