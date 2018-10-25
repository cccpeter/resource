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
            ->field('username,videotab_level,videotab_image,videotab_id,videotab_title,videotab_assessscore,videotab_releasetime,videotab_views,videotype_id,videotype_parentid,videotab_content')
            ->order($order_field.' desc')
            ->limit($limit)
            ->select();
        return $video;
    }   
    public function course_detail(){
        return view("course_detail");
    }
    /**
     * 课程类别的页面
     * [course_list description]
     * @return [type] [description]
     */
    public function course_list(){
        // cache('videotypecache',NULL);
        // $videotype_id=input('get.videotype_id');
        $search=input('get.search');
        $videotype_id=input('get.videotype_id');
        $level_id=input('get.level_id');
        $son_id=input('get.son_id');
        $is_mesh=input('get.is_mesh');
        if($videotype_id==''){
            $videotype_id='0';
        }
        if($son_id==''){
            $son_id='0';
        }
        if($is_mesh=='1'){//子类出现重复
            $videoname=Db::table('re_videotype')
                ->where(['videotype_id'=>$videotype_id])
                ->field('videotype_name')
                ->find();
            $videotype_aid=Db::table('re_videotype')
                ->where(['videotype_name'=>$videoname['videotype_name']])
                ->field('videotype_id')
                ->select();
            dump($videotype_aid);
        }
        if($level_id==''){
            $level_id='0';
        }

        $type=$this->gettypeison($videotype_id,$son_id,$level_id);
        $this->assign('videotype_parent',$type['parent']);
        $this->assign('videotype_son',$type['son']);
        $this->assign('level',$type['level']);
        return view("course_list");
    }
    /**
     * [gettypeison description]
     * @param  [type] $parent_id [description]
     * @param  [type] $son_id    [description]
     * @param  [type] $level_id  [description]
     * @return [type] type       类别的数组
     */
    private function gettypeison($parent_id,$son_id,$level_id){
        $videotype=$this->getvideotype();
        $videotype_parent[0]['videotype_name']='全部';
        $videotype_parent[0]['videotype_id']='0';
        $videotype_parent[0]['is_on']='0';
        $videotype_son[0]['son_id']='0'; 
        $videotype_son[0]['son_name']='全部'; 
        $videotype_son[0]['is_on']='0'; 
        $videotype_son[0]['is_mesh']='0'; 
        $son_name[0]='全部';// 全部这个类别是不予许加入类别中的，系统设置需要过滤下
        $p=1;
        $s=1;
        foreach ($videotype as $value) {
            $videotype_parent[$p]=$value;
            $videotype_parent[$p]['is_on']='0';
            if($value['videotype_son']!=''){
                foreach ($value['videotype_son'] as $sonvalue) {
                    if(!in_array($sonvalue['videotype_name'],$son_name)){
                        $son_name[$s]=$sonvalue['videotype_name'];
                        $videotype_son[$s]['son_name']=$sonvalue['videotype_name'];
                        $videotype_son[$s]['son_id']=$sonvalue['videotype_id']; 
                        $videotype_son[$s]['is_on']='0'; 
                        $videotype_son[$s]['is_mesh']='0'; //0不是合并项
                        $s++;
                    }else{
                        $key=array_search($sonvalue['videotype_name'],$son_name);//会返回键值
                        $videotype_son[$key]['is_mesh']='1';
                    }
                }
            }
            $p++;
        }
        $level[0]['level_id']='0';
        $level[0]['level_name']='全部';
        $level[0]['is_on']='0';
        $level[1]['level_id']='1';
        $level[1]['level_name']='容易';
        $level[1]['is_on']='0';
        $level[2]['level_id']='2';
        $level[2]['level_name']='一般';
        $level[2]['is_on']='0';
        $level[3]['level_id']='3';
        $level[3]['level_name']='较难';
        $level[3]['is_on']='0';
        foreach ($videotype_parent as &$value) {
            if($value['videotype_id']==$parent_id){
                $value['is_on']='1';
            }
        }
        foreach ($videotype_son as &$value) {
            if($value['son_id']==$son_id){
                $value['is_on']='1';
            }
        }
        foreach ($level as &$value) {
            if($value['level_id']==$level_id){
                $value['is_on']='1';
            }
        }
        $type['parent']=$videotype_parent;
        $type['son']=$videotype_son;
        $type['level']=$level;
        dump($videotype_parent);die;
        return $type;
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
