<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;
use think\Cache;
class Index extends Base
{

    public function index()
    {
        return view('index');
    }
    public function tab(){//点播的首页
        // 加载类目
        $videotype=$this->getvideotype();
        foreach ($videotype as &$value) {
            $value['video']=Db::table('re_videotab')
                ->where(['videotype_parentid'=>$value['videotype_id'],'videotab_status'=>'6'])
                ->alias('a')
                ->join('re_user u','a.user_id = u.id')
                ->field('videotab_title,username,videotab_level,videotab_image,videotab_id')
                ->order('videotab_releasetime desc')
                ->limit(4)
                ->select();
        }
        // 最新上传的前五条
        $where=['videotab_status'=>'6'];
        $newvideo=$this->getvideo($where,'5','videotab_releasetime');
        $newvideo=$this->gettypeson($videotype,$newvideo);
        // 近期热播前五条
        $hotvideo=$this->getvideo($where,'5','videotab_views');
        $hotvideo=$this->gettypeson($videotype,$hotvideo);
        //高分视频前四条
        $topvideo=$this->getvideo($where,'4','videotab_assessscore');
        $topvideo=$this->gettypeson($videotype,$topvideo);
        // 推荐视频前四条
        $where=['videotab_status'=>'6','videotab_recommend'=>'1'];
        $recommend=$this->getvideo($where,'5','videotab_releasetime');
        $recommend=$this->gettypeson($videotype,$recommend);
        // dump($topvideo);
        $this->assign('videotype',$videotype);
        $this->assign('newvideo',$newvideo);
        $this->assign('hotvideo',$hotvideo);
        $this->assign('topvideo',$topvideo);
        $this->assign('recommend',$recommend);
        return view("tab");
    }
    // 点播类型的缓存获取
    private function getvideotype(){
        // 获取
        $videotypecache=cache('videotypecache');
        if(!$videotypecache){//缓存不存在
            $videotype_parent=Db::table('re_videotype')->where(['videotype_parent'=>'0'])->order('videotype_sort desc')->select();
                    $size=sizeof($videotype_parent);
            for($i=0;$i<$size;$i++){
                $videotype_parent[$i]['videotype_son']=Db::table('re_videotype')->where(['videotype_parent'=>$videotype_parent[$i]['videotype_id']])->order('videotype_level desc')->select();
            }
            // 写缓存
            cache('videotypecache',$videotype_parent);
            $videotypecache=$videotype_parent;
        }
        
        return $videotypecache;
    }
    // 获取子类别的名称
    /**
     * 获取归属类别的名称
     * $videotype videotype所有类别的名称
     * $video  目标转化数组
     * @return 转化数组
     */
    private function gettypeson($videotype,$video){
        foreach ($videotype as $type){
            foreach ($video as &$value){
                if($type['videotype_id']==$value['videotype_parentid']){
                    $value['parent_name']=$type['videotype_name'];
                    foreach ($type['videotype_son'] as $sontype) {
                        if($sontype['videotype_id']==$value['videotype_id']){
                            $value['son_name']=$sontype['videotype_name'];
                        }
                    }
                }
            }
        }
        return $video;
    }
    /**
     * 获取video的列表
     * @param [type] $[name] [<description>]
     * @return [type] [description]
     */
    private function getvideo($where,$limit,$order_field){
        $video=Db::table('re_videotab')
            ->where($where)
            ->alias('a')
            ->join('re_user u','a.user_id = u.id')
            ->field('username,videotab_level,videotab_image,videotab_id,videotab_title,videotab_assessscore,videotab_releasetime,videotab_views,videotype_id,videotype_parentid')
            ->order($order_field.' desc')
            ->limit($limit)
            ->select();
        return $video;
    }   
    public function course_detail(){
        return view("course_detail");
    }
    public function course_list(){
        return view("course_list");
    }
    public function video(){
        return view("video");
    }
    //php性能测试的代码
    // function test(){
    //     xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
    //     $data = xhprof_disable();
    //     //$_SERVER['XHPROF_ROOT_PATH'] 这就是第三步添加的那个环境变量
    //     include_once $_SERVER['XHPROF_ROOT_PATH'] . "xhprof_lib/utils/xhprof_lib.php";
    //     include_once $_SERVER['XHPROF_ROOT_PATH'] . "xhprof_lib/utils/xhprof_runs.php";
    //     $x = new XHProfRuns_Default();

    //     //拼接文件名
    //     $xhprofFilename = date('Ymd_His');

    //     //print_r($data);die;//此处的打印数据看起来非常不直观，所以需要安装yum install graphviz 图形化界面显示,更直观
    //     $x->save_run($data, $xhprofFilename);
    // }
    

}
