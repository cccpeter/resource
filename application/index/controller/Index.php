<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;
use think\Cache;
class Index extends Controller
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
        cache('videotypecache',NULL);
        // 最新上传的前五条
        $newvideo=Db::table('re_videotab')
            ->where(['videotab_status'=>'6'])
            ->alias('a')
            ->join('re_user u','a.user_id = u.id')
            ->field('username,videotab_level,videotab_image,videotab_id,videotab_title,videotab_assessscore,videotab_releasetime,videotab_views')
            ->order('videotab_releasetime desc')
            ->limit(5)
            ->select();
        // dump($newvideo);
        // 近期热播
        $hotvideo=Db::table('re_videotab')
            ->where(['videotab_status'=>'6'])
            ->alias('a')
            ->join('re_user u','a.user_id = u.id')
            ->field('username,videotab_level,videotab_image,videotab_id,videotab_title,videotab_assessscore,videotab_releasetime,videotab_views')
            ->order('videotab_views desc')
            ->limit(5)
            ->select();
        //高分视频
        $topvideo=Db::table('re_videotab')
            ->where(['videotab_status'=>'6'])
            ->alias('a')
            ->join('re_user u','a.user_id = u.id')
            ->field('username,videotab_level,videotab_image,videotab_id,videotab_title,videotab_assessscore,videotab_releasetime,videotab_views,videotype_id,videotype_parentid')
            ->order('videotab_assessscore desc')
            ->limit(4)
            ->select();
        foreach ($videotype as $type){
            foreach ($topvideo as &$value){
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
        // dump($topvideo);
        $this->assign('videotype',$videotype);
        $this->assign('newvideo',$newvideo);
        $this->assign('hotvideo',$hotvideo);
        $this->assign('topvideo',$topvideo);
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
     * @param  所有类别的名称
     * @param  目标转化数组
     * @return 转化数组
     */
    private function gettypeson($videotype,$video){
        foreach ($videotype as $type){
            foreach ($topvideo as &$value){
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
