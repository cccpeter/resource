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
}