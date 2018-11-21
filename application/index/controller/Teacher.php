<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Teacher extends Base{
    /**
     * 公共视频
     */
    public function publicvideo(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('publicvideo');
    }
    /**
     * 公共视频的数据
     */
    public function publicvideodata(){
        if(request()->isPost()){
            // if($_COOKIE){
                $token=input('post.token');
                $user=cache($token);
                $pagenow=input('post.pagenow')?input('post.pagenow'):1;//默认第一页。计算时候需要减一
                $pagesize=input('post.pagesize')?input('post.pagesize'):config('pagesize');//默认的数量，前端也需要改
                $table='re_videotab';
                $field="videotab_image,dev_mac,videotab_time,live_addr,live_name";
                $where='videotab_status = 1';
                $list=Db::query("select ".$field." from ".$table." LEFT JOIN re_device_live ON (re_videotab.dev_mac=re_device_live.live_mac) where ".$where." order by videotab_id desc limit ?,? "
                ,[($pagenow-1)*$pagesize,$pagesize]);
                $count=Db::table($table)->where($where)->count();
                if($list){
                    return ['data'=>$list,'status'=>'1','count'=>$count,'pagenow'=>$pagenow,'pagesize'=>$pagesize];
                }else{
                    return send('操作失败','0');
                }
                
            // }
        }
    }
    public function myvideo(){
        $action=request()->action();
        $this->assign('action',$action);
        return view('myvideo');
    }
    /**
     * 我的视频的数据
     */
    public function myvideodata(){
        if(request()->isPost()){
            $token=input('post.token')?input('post.token'):'0';
            $user=cache($token);
            $pagenow=input('post.pagenow')?input('post.pagenow'):1;//默认第一页。计算时候需要减一
            $pagesize=input('post.pagesize')?input('post.pagesize'):config('pagesize');//默认的数量，前端也需要改
            if($user){
                $table='re_videotab';
                $where=['user_id'=>$user['id']];
                $field="videotab_id,videotype_id,videotype_parentid,videotab_title,videotab_image,videotab_time";
                $list=Db::table($table)
                        ->where($where)
                        ->field($field)
                        ->limit(($pagenow-1)*$pagesize,$pagesize)
                        ->select();
                $count=Db::table($table)
                        ->where($where)
                        ->field($field)
                        ->count();
                foreach($list as &$values){
                    $values['videotab_time']=date('Y-m-d H:i',$values['videotab_time']);
                    $type_parent=$this->getvideotype('re_videotype',['videotype_id'=>$values['videotype_parentid']],'videotype_name');
                    $type_son=$this->getvideotype('re_videotype',['videotype_id'=>$values['videotype_id']],'videotype_name');
                    $values['video_parent']=$type_parent['videotype_name'];
                    $values['video_son']=$type_son['videotype_name'];
                    $wherecount=['video_type'=>'1','video_id'=>$values['videotab_id']];
                    $wherenote=['video_type'=>'1','video_id'=>$values['videotab_id'],'user_id'=>$user['id']];
                    $values['note_count']=$this->getnotecount($wherenote);
                    $values['assess_count']=$this->getassesscount($wherecount);
                    $values['discuss_count']=$this->getdiscusscount($wherecount);
                    $values['discuss_id']=$this->getdiscussid($wherecount);
                }
            }
            if($list){
                return ['data'=>$list,'status'=>'1','count'=>$count,'pagenow'=>$pagenow,'pagesize'=>$pagesize];
            }else{
                return send('操作失败','0');
            }
        }
    }
    /**
     * 获取笔记的条数
     */
    private function getvideotype($table,$where,$field){
        $video_type=Db::table($table)->where($where)->field($field)->find();
        return $video_type;
    }
    /**
     * 获取对应的笔记的条数
     */
    private function getnotecount($where){
        $count=Db::table('re_note')->where($where)->count();
        return $count;
    }
    /**
     * 获取评价的条数
     */
    private function getassesscount($where){
        $count=Db::table('re_assess')->where($where)->count();
        return $count;
    }
    /**
     * 获取讨论的条数
     */
    private function getdiscusscount($where){
        $count=Db::table('re_discuss')->where($where)->count();
        return $count;
    }
        /**
     * 获取讨论的id
     */
    private function getdiscussid($where){
        $discuss_id=Db::table('re_discuss')->where($where)->field('discuss_id')->find();
        return $discuss_id['discuss_id'];
    }
}