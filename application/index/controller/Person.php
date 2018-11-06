<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Person extends Base
{

    public function userinfo(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('userinfo');
    }
    public function note(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('note');
    }
    public function mycollect(){
        // $this->getpage('re_uservideo','0','5');
        $action=request()->action();
        $this->assign('action',$action);
        return view('mycollect');
    }
    public function mycollectdata(){
        if(request()->isPost()){
            // if($_COOKIE){
                $token=input('post.token');
                $user=cache($token);
                $pagenow=input('post.pagenow')?input('post.pagenow'):1;//默认第一页。计算时候需要减一
                $pagesize=input('post.pagesize')?input('post.pagesize'):2;
                $video_type=input('post.video_type')?input('post.video_type'):'1';//默认为点播视频
                $table='re_collect';
                switch($video_type){
                    case 1:
                    $list=$this->getpage($table,$pagenow-1,$pagesize,$user['id'],$video_type);
                    $where=['user_id'=>$user['id']];
                    $count=$this->getcount($table,$where);
                    foreach($list as &$values){
                        $values['collect_time']=date('Y-m-d H:i',$values['collect_time']);
                        $where=['videotab_id'=>$values['video_id']];
                        $field=['videotype_id,videotype_parentid,videotab_level,videotab_title,videotab_image,username'];
                        $video=$this->getvideo('re_videotab',$where,$field);
                        if($video){
                            $values['user_name']=$video['username'];
                            $values['video_title']=$video['videotab_title'];
                            $values['video_image']=$video['videotab_image'];
                            $type_parent=$this->getvideotype('re_videotype',['videotype_id'=>$video['videotype_parentid']],'videotype_name');
                            $type_son=$this->getvideotype('re_videotype',['videotype_id'=>$video['videotype_id']],'videotype_name');
                            $values['video_parent']=$type_parent['videotype_name'];
                            $values['video_son']=$type_son['videotype_name'];
                            $wherecount=['video_type'=>'1','video_id'=>$values['video_id']];
                            $wherenote=['video_type'=>'1','video_id'=>$values['video_id'],'user_id'=>$user['id']];
                            $values['note_count']=$this->getnotecount($wherenote);
                            $values['assess_count']=$this->getassesscount($wherecount);
                            $values['disscuss_count']=$this->getdiscusscount($wherecount);
                            $values['video_type']="点播视频";
                        }
                    }
                    break;
                    case 2:
                    break;
                    case 3:
                    break;
                    default:
                    break;
                }
                // $uservideo=Db::table('re_uservideo')
                //         ->where(['user_id'=>$user['id']])
                //         ->paginate(10)
                //         ->
                if($list){
                    return ['data'=>$list,'status'=>'1','count'=>$count,'pagenow'=>$pagenow,'pagesize'=>$pagesize];
                }else{
                    return send('操作失败','0');
                }
                
            // }
        }
        return send('操作失败了！','0');
    }
    private function getpage($table,$pagenow,$pagesize,$user_id,$video_type){
        // SELECT * FROM product WHERE ID > =(select id from product limit 866613, 1) limit 20 limit的优化方法
        $list=Db::query("select collect_time,collect_isover,video_id from ".$table." where user_id =? AND video_type=? limit ?,? ",[$user_id,$video_type,$pagenow*$pagesize,$pagesize]);
        return $list;
    }
    private function getvideo($table,$where,$field){
        $video=Db::table($table)->where($where)->alias('a')->join('re_user u','a.user_id=u.id')->field($field)->find();
        return $video;
    }
    private function getcount($table,$where){
        $count=Db::table($table)->where($where)->count();
        return $count;
    }
    private function getvideotype($table,$where,$field){
        $video_type=Db::table($table)->where($where)->field($field)->find();
        return $video_type;
    }
    private function getnotecount($where){
        $count=Db::table('re_note')->where($where)->count();
        return $count;
    }
    private function getassesscount($where){
        $count=Db::table('re_assess')->where($where)->count();
        return $count;
    }
    private function getdiscusscount($where){
        $count=Db::table('re_discuss')->where($where)->count();
        return $count;
    }
    public function myassess(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('myassess');
    }
    public function myvideo(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('myvideo');
    }
    public function publicvideo(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('publicvideo');
    }
    public function myrequest(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('myrequest');
    }
    public function menu(){
        if(request()->isPost()){
            $token=input('post.token');
            $user=cache($token);
            // dump($user);
            $auth=$user['auth_level'];
            $usermenu=array();
            if($auth<4){
                //1-3
                $menu[0]=config('person_menu');
                $menu[1]=config('teacher_menu');
                $menu[2]=config('senior_menu');
                foreach($menu as $keys=>$values){
                    foreach($values as $key=>$value){
                        $usermenu["".$key.""]=$value;
                    }
                }
            }else if($auth<7&&$auth>3){
                //4-6
                $menu[0]=config('person_menu');
                $menu[1]=config('teacher_menu');
                foreach($menu as $keys=>$values){
                    foreach($values as $key=>$value){
                        $usermenu["".$key.""]=$value;
                    }
                }
            }else if($auth==7){
                //等于7
                $menu[0]=config('person_menu');
                foreach($menu as $keys=>$values){
                    foreach($values as $key=>$value){
                        $usermenu["".$key.""]=$value;
                    }
                }
            }
            if($usermenu){
                // dump($usermenu);
                return send($usermenu,'1');
            }else{
                return send('你这操作又秀了','0');
            }
            
        }
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
    /**
     * 上报在线时长每2分钟一次
     */
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
    /**
     * 上报观看视频的时长每俩分钟上报一次
     */
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
                return send('上报error','0');
            }
        }
    }
    /**
     * 上报最近的浏览记录
     * 点击视频后5s上报一次
     */
    public function videolist(){
        if(request()->isPost()){
            $token=input('post.token');
            $video_type=input('post.video_type');
            $video_id=input('post.video_id');
            $user=cache($token);
            if(!($video_type!=''&&$video_id!='')){
                return send('数据不完整','0');
            }
            switch($video_type){
                case 1:
                    $video=Db::table('re_videotab')
                            ->where(['videotab_id'=>$video_id])
                            ->field('videotab_id')
                            ->find();
                break;
                case 2:
                    $video=Db::table('re_livetab')
                            ->where(['livetab_id'=>$video_id])
                            ->field('livetab_id')
                            ->find();
                break;
                case 3:
                    $video=Db::table('re_opentab')
                            ->where(['opentab_id'=>$video_id])
                            ->field('opentab_id')
                            ->find();
                break;
                default:
                $video=false;
                break;
            }
            if($video){
                $uservideo=Db::table('re_uservideo')
                        ->where([
                            'user_id'=>$user['id'],
                            'video_id'=>$video_id,
                            'video_type'=>$video_type
                        ])
                        ->field('uservideo_id')
                        ->find();
                if($uservideo){
                    $re=Db::table('re_uservideo')
                        ->update([
                            'uservideo_id'=>$uservideo['uservideo_id'],
                            'uservideo_time'=>time()
                        ]);
                }else{
                    $re=Db::table('re_uservideo')
                            ->insert([
                                'user_id'=>$user['id'],
                                'uservideo_time'=>time(),
                                'video_id'=>$video_id,
                                'video_type'=>$video_type
                            ]);
                }
                if($re){
                    return send('上报ok','1');
                }else{
                    return send('上报error','0');
                }
            }
            return send('上报error','0');
        }
    }
    public function perpub(){
        if(request()->isPost()){
            $token=input('post.token');
            if($token){
                $user=cache($token);
                if($user){
                    //缓存中的数据不是实时的
                    $usernow=Db::table('re_user')
                            ->where(['id'=>$user['id'],'en'=>'01'])
                            ->field('viewtime,videotime')
                            ->find();
                    $collect=Db::table('re_collect')
                            ->where(['user_id'=>$user['id']])
                            ->count();
                    $usernow['collect']=$collect;
                    if($usernow){
                        return send($usernow,'1');
                    }else{
                        return send('操作失败了','0');
                    }
                }
            }
            return send('操作失败了','0');
        }
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
