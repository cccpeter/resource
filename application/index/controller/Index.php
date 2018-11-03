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
     * 获取视频归属类别的名称
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
    /**
     * 课程类别筛选逻辑
     * [course_list description]
     * @return [type] [description]
     */
    public function course_list(){
        $search=input('get.search');
        $videotype_id=input('get.videotype_id');
        $level_id=input('get.level_id');
        $son_id=input('get.son_id');
        $is_mesh=input('get.is_mesh');
        $is_tab=input('get.is_tab');
        // cache('videotypecache',NULL);
        // dump($resultwhere);
        // dump($resultwhere);
        // $video=Db::table('re_videotab')->where($resultwhere)->select();
        // 从点播进入六年级英语
        // ?videotype_id=6&son_id=10&level_id=0&is_mesh=1&is_tab=1
        // 切换二年级英语
        // ?videotype_id=2&level_id=0&son_id=10&is_mesh=1
        // if($is_tab=='1'){
        $re_name=Db::table('re_videotype')->where(['videotype_id'=>$son_id])->field('videotype_name')->order('videotype_sort desc')->find();
        $re_id=Db::table('re_videotype')->where(['videotype_name'=>$re_name['videotype_name']])->field('videotype_id')->order('videotype_sort desc')->find();
        $son_id=$re_id['videotype_id'];
            // dump($re_id);
        // }
        $where=array();//定义搜索数组
        if($videotype_id==''){
            $videotype_id='0';
        }
        if($son_id==''){
            $son_id='0';
        }
        $whereson_id=array();
        if($is_mesh=='1'){//子类出现重复
            $videoname=Db::table('re_videotype')
                ->where(['videotype_id'=>$son_id])
                ->field('videotype_name')
                ->find();
            $videotype_sonid=Db::table('re_videotype')
                ->where(['videotype_name'=>$videoname['videotype_name']])
                ->field('videotype_id,videotype_parent')
                ->select();
                $n=0;
            foreach ($videotype_sonid as $value) {
                // 如果传回的父类的id对应子类中父类id的则该子类视频存在
                if($videotype_id!='0'){
                    if($value['videotype_parent']==$videotype_id){
                        $whereson_id[$n]['videotype_id']=$value['videotype_id'];
                        $n++;
                    }
                }else{
                    $whereson_id[$n]['videotype_id']=$value['videotype_id'];
                    $n++;
                }
            }
            $wherein='';
            foreach ($whereson_id as $value) {
                $wherein=$wherein.$value['videotype_id'].',';
            }
            $whereson_id=substr($wherein, 0,strlen($wherein)-1);
            
        }else{//子类不重复
            $parent_id=Db::table('re_videotype')
                ->where(['videotype_id'=>$son_id])
                ->field('videotype_parent')
                ->find();
            
            if($videotype_id!='0'){
                // 如果父id不为全部时
                if($parent_id['videotype_parent']==$videotype_id){
                // 如果二类的父类id对应了父类id
                    $where['videotype_id']=$son_id;
                }
            }else{
                $where['videotype_id']=$son_id;
            }
            if($where){
                $whereson_id=$where['videotype_id'];
            }else{
                $whereson_id='';
            }
        }
        // dump($where);
        // dump($whereson_id);//son如果等于0则为全部，目标id为1,3,8,9,12这样为一个son的所有数组where('id','in','1,3,8');
        $resultwhere='';
        if($son_id=='0'){
            // dump($videotype_id);
            if($videotype_id=='0'){
                $resultwhere='';
            }else{
                $resultwhere='videotype_parentid='.$videotype_id;
            }
        }else{
            if($whereson_id==''){
                // dump('类别不存在');
                $this->assign('isview','');
                $this->assign('video','');
                $type=$this->gettypeison($videotype_id,$son_id,$level_id);
                $this->assign('videotype_parent',$type['parent']);
                $this->assign('videotype_son',$type['son']);
                $this->assign('level',$type['level']);
                return view("course_list");
            }
            $resultwhere='videotype_id in ('.$whereson_id.')';
        }
        if($son_id!='0'||$videotype_id!='0'){
            if(!$level_id=='0'){
                //防止sql注入
                $resultwhere.=' AND videotab_level="'.$level_id.'"';
            }
        }else{
            if(!$level_id=='0'){
                //防止sql注入
                $resultwhere.='videotab_level="'.$level_id.'"';
            }
        }
        
        // $video=$this->getvideo($resultwhere,'30','videotab_id');
        $field="username,videotab_level,videotab_image,videotab_id,videotab_title,videotab_assessscore,videotab_releasetime,videotab_views";
        // dump($resultwhere);
        @$video=Db::table('re_videotab')
            ->alias('a')
            ->join('re_user u','a.user_id = u.id')
            ->where($resultwhere)
            ->field($field)
            ->order('videotab_id desc')
            ->paginate('2');
        if($level_id==''){
            $level_id='0';
        }
        if($video->items()){
            $isview='1';
        }else{
            $isview='';
        }
        $this->assign('isview',$isview);
        $this->assign('video',$video);
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
        // dump($videotype_parent);die;
        return $type;
    }
    private function gettype($type_id){
        $videotype=$this->getvideotype();
        foreach ($videotype as $value) {
            if($value['videotype_id']==$type_id){
                return $value;
            }
            if($value['videotype_son']!=''){
                foreach ($value['videotype_son'] as $value_son) {
                    if($value_son['videotype_id']==$type_id){
                        return $value_son;
                    }
                }
            }
        }
        return false;
    }
    // 课程详情的头部数据
    private function course(){
        $videotab_id=input('get.videotab_id');
        $user='';
        if($_COOKIE){
            $token=$_COOKIE['token'];
            $user=cache($token);
        }
        $field="videotab_id,videotype_id,videotype_parentid,videotab_level,videotab_title,videotab_views,videotab_assessnums,videotab_assessscore,videotab_content,user_id,videotab_resource,videotab_mustknown,username";
        $videotab=Db::table('re_videotab')
            ->where(['videotab_id'=>$videotab_id,'videotab_status'=>'6'])
            ->alias('a')
            ->join('re_user u','a.user_id = u.id')
            ->field($field)
            ->find();
        if($videotab){
            $videotype=config('videotype.videotab');
            if($user){
                $iscollect=Db::table('re_collect')
                    ->where(['video_type'=>$videotype,'video_id'=>$videotab_id,'user_id'=>$user['id']])
                    ->field('collect_id')
                    ->find();
                    // dump($videotab['user_id']);
                if($iscollect){
                    $videotab['iscollect']='1';
                }else{
                    $videotab['iscollect']='0';
                }
            }else{
                $videotab['iscollect']='0';
            }
            if($videotab){
                $parent=$this->gettype($videotab['videotype_parentid']);
                $son=$this->gettype($videotab['videotype_id']);
                $videotab['parent_name']=$parent['videotype_name'];
                $videotab['son_name']=$son['videotype_name'];
            }else{
                // $this->redirect('Index/index/error404');
                // return;
                return false;
            }
            $videotab['video_type']=config('videotype.videotab');
            return $videotab;
        }else{
            return false;
        }
    }
    // 课程详情
    public function course_detail(){
        $videotab=$this->course();
        if($videotab){
            $this->assign('videotab',$videotab);
        }else{
            $this->redirect('Index/index/error404');
        }
        return view("course_detail");
    }
    // 课程资源/作业
    public function course_resource(){
        $videotab=$this->course();
        if($videotab){
            $this->assign('videotab',$videotab);
        }else{
            $this->redirect('Index/index/error404');
        }
        return view('course_resource');
    }
    // 课程评价
    public function course_assess(){
        $videotab=$this->course();
        $assess=$this->getassess($videotab['videotab_id']);
        // dump($assess);
        if($videotab){
            if($assess){
                $this->assign('assess',$assess);
            }else{
                $this->assign('assess','0');
            }
            $this->assign('videotab',$videotab);
        }else{
            $this->redirect('Index/index/error404');
        }
        return view('course_assess');
    }
    // 课程讨论
    public function course_discuss(){
        $videotab=$this->course();
        $discuss=$this->getdiscuss($videotab['videotab_id']);
        // dump($assess);
        if($videotab){
            if($discuss){
                $this->assign('discuss',$discuss);
            }else{
                $this->assign('discuss','0');
            }
            $this->assign('videotab',$videotab);
        }else{
            $this->redirect('Index/index/error404');
        }
        return view('course_discuss');
    }
    /**
     * 获取评论列表
     * @param  [type] $videotab_id [description]
     * @return [type]              [description]
     */
    private function getassess($videotab_id){
        $assess=Db::table('re_assess')
                ->where(['video_id'=>$videotab_id,'video_isover'=>'0','video_type'=>'1'])
                ->alias('a')
                ->join('re_user u','a.user_id = u.id')
                ->field('assess_time,assess_content,username,assess_score,video_id,video_title')
                ->paginate(10);
        return $assess;
    }
    private function getdiscuss($videotab_id){
        $discuss=Db::table('re_discuss')
                ->where(['video_id'=>$videotab_id,'video_type'=>'1','video_isover'=>'0'])
                ->alias('a')
                ->join('re_user u','a.user_id=u.id')
                ->field('discuss_id,discuss_title,discuss_title,discuss_time,username,discuss_content')
                ->order('discuss_id desc')
                ->select();
        foreach ($discuss as &$value) {
            # code...可以优化代码
            $discusscall=Db::table('re_discusscall')
                ->where(['discuss_id'=>$value['discuss_id']])
                ->alias('a')
                ->join('re_user u','a.user_id=u.id')
                ->field('username,discusscall_time,discusscall_content')
                ->select();
            if($discusscall){
                $value['discusscall']=$discusscall;
                $value['discusscall_num']=sizeof($discusscall);
            }else{
                $value['discusscall_num']=0;
            }
        }
        // dump($discuss);
        return $discuss;
    }
    /**
     * [getnote description]
     * @param  [type] $videotab_id [description]
     * @param  [type] $video_type  [description]
     * @return [type]              [description]
     */
    private function getnote($videotab_id,$video_type){
        $user='';
        if($_COOKIE){
            $token=$_COOKIE['token'];
            $user=cache($token);
        }
        if($user){
            $note=Db::table('re_note')
                    ->where(['video_id'=>$videotab_id,'video_type'=>$video_type,'user_id'=>$user['id']])
                    ->alias('a')
                    ->join('re_user u','a.user_id=u.id')
                    ->field('note_content,note_time,username')
                    ->order('note_id desc')
                    ->select();
            return $note;
        }else{
            return false;
        }
    }
    public function video(){
        $video_type=input('get.video_type');
        $video_id=input('get.video_id');
        if($video_type==''||$video_id==''){
            $this->redirect('Index/index/error404');
            return;
        }
        $video=$this->getvideotab($video_type,$video_id);
        $video['video_type']=$video_type;
        //讨论列表
        $discuss=$this->getdiscuss($video_id);
        if($discuss){
            $this->assign('discuss',$discuss);
        }else{
            $this->assign('discuss','0');
        }
        // 评价列表
        $assess=$this->getassess($video_id);
        if($assess){
            $this->assign('assess',$assess);
        }else{
            $this->assign('assess','0');
        }
        // 笔记列表
        $note=$this->getnote($video_id,$video_type);
        if($note){
            $this->assign('note',$note);
        }else{
            $this->assign('note','0');
        }
        // dump($video);
        $this->assign('video',$video);
        return view("video");
    }
    /**
     * [getvideotab description]
     * @param  [type] $videotype [description]
     * @param  [type] $video_id  [description]
     * @return [type]            [description]
     */
    private function getvideotab($video_type,$video_id){
        $user='';
        if($_COOKIE){
            $token=$_COOKIE['token'];
            $user=cache($token);
        }
        switch ($video_type) {
            case '1':
                $video=Db::table('re_videotab')
                    ->where(['videotab_id'=>$video_id])
                    ->field('videotab_id,videotab_title,videotab_stream,videotab_assessscore,videotab_assessnums')
                    ->find();
                if(!$video){
                    $this->redirect('Index/index/error404');
                    return;
                }
                if($user){
                    $collect=Db::table('re_collect')
                        ->where(['video_id'=>$video['videotab_id'],'video_type'=>'1','user_id'=>$user['id']])
                        ->find();
                        // dump($collect);
                    if($collect){//已经收藏
                        $video['is_collect']='1';
                        $video['video_type']=$video_type;
                    }else{
                        $video['is_collect']='0';
                        $video['video_type']=$video_type;
                    }
                }else{
                    $video['is_collect']='0';
                    $video['video_type']=$video_type;
                }
                break;
            case '2':
                $video=Db::table('re_videotab')
                    ->where(['videotab_id'=>$video_id])
                    ->field('videotab_id,videotab_title,videotab_stream,videotab_assessscore,videotab_assessnums')
                    ->find();
                if(!$video){
                    $this->redirect('Index/index/error404');
                    return;
                }
                if($user){
                    $collect=Db::table('re_collect')
                        ->where(['video_id'=>$video['videotab_id'],'video_type'=>'1','user_id'=>$user['id']])
                        ->find();
                        // dump($collect);
                    if($collect){//已经收藏
                        $video['is_collect']='1';
                        $video['video_type']=$video_type;
                    }else{
                        $video['is_collect']='0';
                        $video['video_type']=$video_type;
                    }
                }else{
                    $video['is_collect']='0';
                    $video['video_type']=$video_type;
                }
                break;
            case '3':
                $video="";
                $video['video_type']='3';
                break;
            default:
                $video="";
                $video['video_type']='';
                break;
        }
        return $video;
    }
    public function clickvideo(){
        if(request()->isPost()){
            $video_id=input('post.video_id');
            $video_type=input('post.video_type');
            if($video_id!=''&&$video_type!=''){
                switch($video_type){
                    case 1:
                        $video=Db::table('re_videotab')
                                ->where(['videotab_id'=>$video_id])
                                ->field('videotab_id,videotab_views')
                                ->find();
                    break;
                    case 2:
                        $video=Db::table('re_livetab')
                                ->where(['livetab_id'=>$video_id])
                                ->field('livetab_id,livetab_views')
                                ->find();
                        break;
                    case 3:
                        $video=Db::table('re_opentab')
                                ->where(['opentab_id'=>$video_id])
                                ->field('opentab_id,opentab_views')
                                ->find();
                        break;
                    default:
                    $video=false;
                    break;
                }
                if($video){
                    switch($video_type){
                        case 1:
                            $re=Db::table('re_videotab')
                                    ->update(['videotab_id'=>$video_id,'videotab_views'=>($video['videotab_views']+1)]);
                                    
                        break;
                        case 2:
                            $re=Db::table('re_livetab')
                                    ->update(['livetab_id'=>$video_id,'livetab_views'=>($video['livetab_views']++)]);
                            break;
                        case 3:
                            $re=Db::table('re_opentab')
                                    ->update(['opentab_id'=>$video_id,'opentab_views'=>($video['opentab_views']++)]);
                            break;
                        default:
                        $re=false;
                        break;
                    }
                    if($re){
                        return send('上报ok','1');
                    }else{
                        return send('上报error','0');
                    }
                }
            }

        }
    }
    public function error404(){
        return view('error404');
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
