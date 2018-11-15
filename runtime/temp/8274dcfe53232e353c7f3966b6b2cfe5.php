<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\index\tab.html";i:1542186382;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>资源平台</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<script type="text/javascript" src="/resource/public/static/js/jquery.SuperSlide.2.1.1.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
<script src="/resource/public/static/layui/layui.js"></script>
</head>

<body class="backg_huibai">

<!-- 顶部 -->
<div class="width100 float_l height490 ">
	<div class="width100 float_l height80 line_hei80" style="box-shadow: 0px 0px 3px #ccc inset;background-color: #fff;position: fixed;z-index:999;">
        <div class="float_l">
            <div class="float_l margin_l20">
                <img src="/resource/public/static/img/logo.png">
            </div>
            <div class="float_l">
                <ul class="ul_li fon_siz16">
                    <li><a href="<?php echo url('Index/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo url('Index/index/tab'); ?>">点播</a></li>
                    <li><a href="<?php echo url('Index/live/live'); ?>">直播</a></li>
                    <li><a href="<?php echo url('Index/openclass/openclass'); ?>">公开课</a></li>
                    <li><a href="<?php echo url('Index/notice/notice'); ?>">公告</a></li>
                </ul>
            </div>
        </div>
        
        <div class="float_r">
            <div class="float_l top_input">
                <input class="posi_relative" type="text" name="" id="" placeholder="请输入想搜索的内容...">
                <img class="img_sousuo bianshou" src="/resource/public/static/img/uiz4.png">
            </div>
             <div class="float_l margin_l35" id='adminset' style="display: none;">
                <span>
                    <a href="<?php echo url('Index/admin/index'); ?>">
                    <i style="font-size: 22px;margin:10px 20px 10px 20px" class="layui-icon">&#xe716;</i>
                </a>
                </span>
            </div>
<div class="float_l margin_l35 margin_r40" id="loginoff" style="display: none;">
    <span class="loginfont" onclick="login();">登录</span>
</div>
<div class="float_l margin_l30 margin_r40" style="display: none;" id="loginon">
    <a href="<?php echo url('Index/person/mycollect'); ?>" id='userinfomess'>
        <img src="/resource/public/static/img/tx.jpg" style="width: 40px;height: 40px; border-radius: 100%;">
    </a>
    <div class="userinfo userinfo-hoverls" id="userinfoset">
        <div >
            <a href="<?php echo url('Index/person/mycollect'); ?>">
                <img src="/resource/public/static/img/tx.jpg" style="width: 72px;height: 72px;; border-radius: 100%;">
            </a>
            <span class="userinfo-name" id="user_name">大白菜111</span>
        </div>
        <div class="float_l">
            <a class="userlist" href="<?php echo url('Index/person/myvideo'); ?>">我的视频</a>
            <a class="userlist" href="<?php echo url('Index/person/mycollect'); ?>">我的收藏</a>
            <a class="userlist" href="<?php echo url('Index/person/note'); ?>">我的笔记</a>
        </div>
        <hr>
        <div class="exit"><a>安全退出</a></div>
    </div>
</div>
<script>
var loginframe='<?php echo url("Index/Login/index"); ?>';
layui.use('layer', function(){}); 
//奇葩的问题。
  function login(){
    var w = window.width, h, url = loginframe;
        w='360px';
        h='370px';

        var iframe = layer.open({
            type: 2,
            title: '登录-',
            skin: '',
            area: [w, h],
            content: [url,'no'],
            success: function(layero){
                if(window.ios){
                    $(layero).addClass("scroll-wrapper");//苹果 iframe 滚动条失效解决方式
                }
            },
            maxmin: false,
            full: function() { //点击最大化后的回调函数
                // // console.log(‘这个是点击最大化后的回调函数出发‘);
                $('.layui-layer-iframe').css('overflow','');
            },
            min: function() { //点击最小化后的回调函数
                // console.log(‘这个是点击最小化后的回调函数出发‘);
                $('.layui-layer-iframe').css('overflow','');
            },
            restore: function() { //点击还原后的回调函数
                // console.log(‘这个是点击还原后的回调函数出发‘);
                $('.layui-layer-iframe').css('overflow','');
            },
            // end: function(){ 
            //   //右上角关闭回调，无论是关闭的回调还是登录的回调都会刷新页面
              
            //   //return false 开启该代码可禁止点击该按钮关闭
            //   location.href = "";
            // },
        });
  }
    var token=getCookie('token');
    var username=getCookie('username');
    var auth_level=getCookie('auth_level');
    if(token!=''||username!=''){
        // cookie存在
        $('#user_name').html(username);
        $('#loginoff').attr('style','display:none');
        $('#loginon').attr('style','block');
        if(auth_level>2){
            $('#adminset').attr('style','display:none');
        }else{
            $('#adminset').attr('style','display:block');
        }
    }else{
        $('#loginoff').attr('style','display:block');
    }
</script>
        </div>
	</div>
</div>
<!-- <div class="list-color"></div> -->
<!-- 轮播图 -->

<div class="list-color"></div>
<div style="height: 80px;"></div>
<div class="width100 float_l margin_t-405 margin_b40">
	<div class="width_1200 margin_auto">
    	<div class="width100 float_l height460 posi_relative" style="box-shadow:0 7px 7px rgba(0, 0, 0, 0.3); border-radius: 8px;">
        	<div class="width80 float_r">
                <div class="layui-carousel float_l" id="test1" lay-filter="demo" style="border-radius: 1%;box-shadow: rgba(0, 0, 0, 0.3) 0px 5px 5px;">
                    <div carousel-item style="border-radius: 0% 1% 1% 0%;">
                      <div><img src="/resource/public/static/img/1.jpg" style="height: 460px;width: 100%;"></div>
                       <div><img src="/resource/public/static/img/0.jpg" style="height: 460px;width: 100%;"></div>
                        <div><img src="/resource/public/static/img/1.jpg" style="height: 460px;width: 100%;"></div>
                         <div><img src="/resource/public/static/img/0.jpg" style="height: 460px;width: 100%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="width20 float_l height460 posi_absolute backg_jqian padding_t5 bianshou" style="border-radius: 8px 0px 0px 8px;background-color:#2b333b;">
                <div class="width100 float_l tab_qiehuan">
                <!-- 类别开始 -->
                <?php if(is_array($videotype) || $videotype instanceof \think\Collection || $videotype instanceof \think\Paginator): if( count($videotype)==0 ) : echo "" ;else: foreach($videotype as $key=>$vo): ?>
                <div class="width100 float_l tab_qiehuan ">
                	<div class="width100 float_l text_c height64 line_hei64 color_white bianhuabeijing backg_jqian padding_lr20" style="background-color: #2b333b">
                        <div class="width100 float_l text_l height64 line_hei64 color_white border_b_baise fon_siz14">
                            <span style="padding-left: 15px;color: rgba(255,255,255,.6);"><?php echo $vo['videotype_name']; ?></span>
                            <span class="float_r" style="color: rgba(255,255,255,.5);font-size: 14px;">></span>
                        </div>
                    </div>
                    <div class="width_700 float_l lunbofenlei dis_none"  style="z-index: 10;">
                    	<div class="width100 float_l padding40">
                        	<div class="width100 float_l margin_b40">
                            	<span class="width100 color_shenred fon_siz14 float_l margin_b20">分类目录</span>
                                <ul class="width100 ul_lis float_l">
                                  <?php if(is_array($vo['videotype_son']) || $vo['videotype_son'] instanceof \think\Collection || $vo['videotype_son'] instanceof \think\Paginator): if( count($vo['videotype_son'])==0 ) : echo "" ;else: foreach($vo['videotype_son'] as $key=>$it): ?>
                                	<li><a href="<?php echo url('index/index/course_list',['videotype_id'=>$vo['videotype_id'],'son_id'=>$it['videotype_id'],'level_id'=>'0','is_mesh'=>'1','is_tab'=>1]); ?>"><?php echo $it['videotype_name']; ?></a></li>
                                  <li>/</li>
                                  <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                        <!-- 视频栏目 俩个并列视频 -->
                        <span class="width100 color_shenred fon_siz14 margin_b20" style="margin-left:40px; ">最新视频</span>
                        <div class="recomment-box" style="background-color: #fff;width: 100%">
                          <?php if(is_array($vo['video']) || $vo['video'] instanceof \think\Collection || $vo['video'] instanceof \think\Paginator): if( count($vo['video'])==0 ) : echo "" ;else: foreach($vo['video'] as $key=>$vi): ?>
                           <div class="card" >
                            <a href="<?php echo url('Index/index/course_detail',['videotab_id'=>$vi['videotab_id']]); ?>" target="_blank" title="<?php echo $vi['videotab_title']; ?>" class="clearfix">
                            <img src="/resource/<?php echo $vi['videotab_image']; ?>" class="l">
                            <div class="course-card">
                                <h3 class="course-card-name"><?php echo cutstr($vi['videotab_title'],0,20,'...') ?></h3>       
                                    <div class="course-card-price">
                                      <i class="layui-icon">&#xe770;</i>
                                    </div>
                                    <div class="course-card-dot">·</div>
                                    <div class="course-card-info "><?php echo $vi['username']; ?> </div>
                                    <div class="course-card-price">
                                      <i class="layui-icon"> &#xe62a;</i>
                                    </div>
                                    <div class="course-card-dot ">·</div>
                                    <div class="course-card-info ">
                                    <i class="icon-set_sns"></i>
                                    <?php if(($vi['videotab_level'] == 1)): ?>
                                      简单
                                    <?php elseif($vi['videotab_level'] == 2): ?>
                                      一般
                                    <?php else: ?> 
                                      复杂
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                          
                        </div>
                    </div>
                </div>   
              <?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- 类别结束 -->
            </div>
            
        </div>
    </div>
</div>
<script>
	$('.tab_qiehuan').hover(function(){
         $(this).children(".bianhuabeijing").css("background-color","#8a8f93").next().css("display","block")
	},function(){
    	 $(this).children(".bianhuabeijing").css("background-color","#2b333b").next().css("display","none")
	});
</script>

<script type="text/javascript">
	jQuery(".focusBox").slide({ mainCell:".pic",effect:"left", autoPlay:true, delayTime:500});
</script>

<!-- 实战推荐 -->
<div class="width100 float_l margin_b40">
	<div class="width_1200 margin_auto">
    
    	<div class="width100 float_l margin_b20 margin_t15">
        	<div class="text_c">
            	<h3 style="font-size: 23px;color: #07111B;margin:0px auto;"><i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i> 最／新／上／传 <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i></h3>
            </div>
            <!-- <div class="float_r bianshou" style="margin-right: 10px;">
            	<span>更多></span>
            </div> -->
        </div>
        
        <div class="width100 float_l">
        	<?php if(is_array($newvideo) || $newvideo instanceof \think\Collection || $newvideo instanceof \think\Paginator): if( count($newvideo)==0 ) : echo "" ;else: foreach($newvideo as $key=>$vo): ?>
             <div class="course_block" >
                <div>
                  <img class="course_img" src="/resource/<?php echo $vo['videotab_image']; ?>">
                </div>
                <div class="course-card-content"><!--课程内容-->
                  <h3 class="text_c course_h3"><?php echo cutstr($vo['videotab_title'],0,20,'...') ?></h3>
                </div>
              <div class="course-card-bottom">
                <div class="course-card-info">
                  <span class="course-text" style="color: #ff9900;">
                    <i class="layui-icon">&#xe60b;</i>
                    <?php echo $vo['parent_name']; ?>
                    <?php echo $vo['son_name']; ?>
                  </span>
                  <br>
                  <span class="course-text">
                    <i class="layui-icon">&#xe770;</i><?php echo $vo['username']; ?>
                  </span>
                  <span class="course-text">
                    <i class="layui-icon"> &#xe62a;</i>
                     <?php if(($vo['videotab_level'] == 1)): ?>
                                      简单
                      <?php elseif($vo['videotab_level'] == 2): ?>
                        一般
                      <?php else: ?> 
                        复杂
                      <?php endif; ?>
                  </span>
                  <span class="course-star-box">
                    <?php for($i=0;$i<(int)$vo['videotab_assessscore'];$i++){ ?>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <?php } ?>
                  </span>
                </div>
                <div style="font-size: 12px;color: #4D555D;padding: 2%">上传时间：<span style="color: #93999F;margin-right: 5px;"><?php echo date('Y-m-d',$vo['videotab_releasetime']) ?></span>
                播放量：<span style="color: #93999F;"><?php echo $vo['videotab_views']; ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        
    </div>
</div>

<!-- 免费好课 -->
<div class="width100 float_l margin_b40">
	<div class="width_1200 margin_auto">
    
    	<div class="width100 float_l margin_b20">
            <div class="text_c">
                <h3 style="font-size: 23px;color: #07111B;margin:0px auto;"><i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe67a;</i> 热／播／排／行 <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe67a;</i></h3>
            </div>
            <!-- <div class="float_r bianshou" style="margin-right: 10px;">
                <span>更多></span>
            </div> -->
        </div>
        
        <div class="width100 float_l">
        	<?php if(is_array($hotvideo) || $hotvideo instanceof \think\Collection || $hotvideo instanceof \think\Paginator): if( count($hotvideo)==0 ) : echo "" ;else: foreach($hotvideo as $key=>$vo): ?>
             <div class="course_block" >
                <div>
                  <img class="course_img" src="/resource/<?php echo $vo['videotab_image']; ?>">
                </div>
                <div class="course-card-content"><!--课程内容-->
                  <h3 class="text_c course_h3"><?php echo cutstr($vo['videotab_title'],0,20,'...') ?></h3>
                </div>
              <div class="course-card-bottom">
                <div class="course-card-info">
                  <span class="course-text" style="color: #ff9900;">
                    <i class="layui-icon">&#xe60b;</i>
                    <?php echo $vo['parent_name']; ?>
                    <?php echo $vo['son_name']; ?>
                  </span>
                  <br>
                  <span class="course-text">
                    <i class="layui-icon">&#xe770;</i><?php echo $vo['username']; ?>
                  </span>
                  <span class="course-text">
                    <i class="layui-icon"> &#xe62a;</i>
                     <?php if(($vo['videotab_level'] == 1)): ?>
                        简单
                      <?php elseif($vo['videotab_level'] == 2): ?>
                        一般
                      <?php else: ?> 
                        复杂
                      <?php endif; ?>
                  </span>
                  <span class="course-star-box">
                    <?php for($i=0;$i<(int)$vo['videotab_assessscore'];$i++){ ?>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <?php } ?>
                  </span>
                </div>
                <div style="font-size: 12px;color: #4D555D;padding: 2%">上传时间：<span style="color: #93999F;margin-right: 5px;"><?php echo date('Y-m-d',$vo['videotab_releasetime']) ?></span>
                播放量：<span style="color: #93999F;"><?php echo $vo['videotab_views']; ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        
    </div>
</div>

<!-- java 工程师 -->
<div class="width100 float_l backg_qiangray padding_b45">
	<div class="width_1200 margin_auto">
    	<div class=" width_224  float_l img_backg11 margin_r20" style="height: 364px;border-radius: 12px;">
        	<div class="width100 float_l padding_lr20 color_white fon_siz32 b_weight700 margin_t10">
            	<span>推荐<br>视频</span>
            </div>
            <div class="width100 float_l padding_lr20 color_white fon_siz16 margin_t30 jiantoubianhua bianshou">
            	<span>推荐<span class="margin_l5 wobianhua">></span></span>
            </div>
			<!-- <div class="width100 float_l padding_lr20 fon_siz12 bianshou line_hei26 color_blue wobeijingguosa margin_t120">
            	<a>jQuery源码探索之旅</a>
                <a>高德开发者必由之路——JS API篇</a>
                <a>教你HTML5开发爱心鱼游戏</a>
            </div> -->
        </div>
        <div class="width_712 float_l margin_r20">
        	<div class=" width_712 float_l height172 kaishimeiyou img_backg10 text-center line_hei172 margin_b20"  style="border-radius: 12px;">
            	<span class="fon_siz20 color_white b_weight700">精品视频推荐</span>
            </div>
            
            <div class="width_1200 float_l margin_r20">
              <?php if(is_array($recommend) || $recommend instanceof \think\Collection || $recommend instanceof \think\Paginator): if( count($recommend)==0 ) : echo "" ;else: foreach($recommend as $key=>$vo): ?>
            <div class="width_224 height172 float_l margin_r20 border_shadow jingguoxianshi over_pos bianshou"  style="border-radius: 12px;">
            	<div class="width100 float_l img_100 z_inx_1">
                	<img src="/resource/<?php echo $vo['videotab_image']; ?>">
                </div>
                <div class="img_backg2 donghua">
                    <span class="margin_t15 float_l "><?php echo cutstr($vo['videotab_title'],0,20,'...') ?></span>
                    <span class="float_l fon_siz12 line_hei16 color_gray margin_t5 posi_relative ">
                  <!-- 至少需要15个字，最高只显示到35个字 -->
                    <?php echo cutstr($vo['videotab_content'],0,30,'...') ?></span>
                </div>
                <div class="width100 float_l padding_lr20 height48 fon_siz12 line_hei48 z_inx_3 posi_relative backg_white">
                    <span class="float_l" style="color:#ff9900">
                      <i class="layui-icon">&#xe60b;</i>
                      <?php echo $vo['parent_name']; ?>
                      <?php echo $vo['son_name']; ?>
                    </span>
                    <span class="float_r color_gray"><?php echo $vo['username']; ?></span>
            	</div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
           
        </div>
    </div>
</div>


<div class="width100 float_l padding_b45 backg_qiangray">
    <div class="width100 float_l padding_t45">
        <div class="width_1200 margin_auto">
            <div class="width100 float_l">
            
                <div class=" width_224 height172 float_l img_backg14 " style="height: 256px;border-radius: 12px;">
                    <div class="width100 float_l padding_lr20 color_white fon_siz32 b_weight700 margin_t10">
                        <span>高分<br>视频</span>
                    </div>
                    <div class="width100 float_l padding_lr20 color_white fon_siz16 margin_t30 jiantoubianhua bianshou">
                        <span>高分<span class="margin_l5 wobianhua">></span></span>
                    </div>
                </div>  
                <?php if(is_array($topvideo) || $topvideo instanceof \think\Collection || $topvideo instanceof \think\Paginator): if( count($topvideo)==0 ) : echo "" ;else: foreach($topvideo as $key=>$vo): ?>
             <div class="course_block width_224" >
                <div>
                  <img class="course_img" src="/resource/<?php echo $vo['videotab_image']; ?>">
                </div>
                <div class="course-card-content"><!--课程内容-->
                  <h3 class="text_c course_h3"><?php echo cutstr($vo['videotab_title'],0,20,'...') ?></h3>
                </div>
              <div class="course-card-bottom">
                <div class="course-card-info">
                  <span class="course-text" style="color: #ff9900;">
                    <i class="layui-icon">&#xe60b;</i>
                    <?php echo $vo['parent_name']; ?>
                    <?php echo $vo['son_name']; ?>
                  </span>
                  <br>
                  <span class="course-text">
                    <i class="layui-icon">&#xe770;</i><?php echo $vo['username']; ?>
                  </span>
                  <span class="course-text">
                    <i class="layui-icon"> &#xe62a;</i>
                     <?php if(($vo['videotab_level'] == 1)): ?>
                        简单
                      <?php elseif($vo['videotab_level'] == 2): ?>
                        一般
                      <?php else: ?> 
                        复杂
                      <?php endif; ?>
                  </span>
                  <span class="course-star-box">
                    <?php for($i=0;$i<(int)$vo['videotab_assessscore'];$i++){ ?>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <?php } ?>
                  </span>
                </div>
                <div style="font-size: 12px;color: #4D555D;padding: 2%">上传时间：<span style="color: #93999F;margin-right: 5px;"><?php echo date('Y-m-d',$vo['videotab_releasetime']) ?></span>
                播放量：<span style="color: #93999F;"><?php echo $vo['videotab_views']; ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
                
            </div>
            
        </div>
    </div>     
</div>




<!-- 页脚 -->
<div class="width100 float_l padding_t30 height193">
	<div class="width_1200 margin_auto">
    	<!-- <div class="width100 float_l text_c margin_b30">
        	<a class="img_backg5" href="#"></a>
            <a class="img_backg6 posi_relative wexinmaxianshi" href="#"><i class="weixinweima dis_none"><img src="/resource/public/static/img/idx-btm.png"></i></a>
            <a class="img_backg7" href="#"></a>
            <a class="img_backg8" href="#"></a>
        </div> -->
        <div class="width100 float_l text_c yejiao color_gray">
            <a>关于我们</a>
            <a>联系我们</a>
            <a>意见反馈</a>
            <a>友情链接</a>
    	</div>
        <div class="width100 float_l text_c border_t margin_t20 padding_t20 color_gray fon_siz12">
        	<span>© 2016  京ICP备13042132号</span>
        </div>
    </div>
</div>



</body>
<style type="text/css">
  

  .list-color{
    background-image: url("/resource/public/static/img/title1.jpg");
    height: 100px;
    opacity: 0.3;
    filter:blur(180px);
    top:150px;
    width: 100%;
    position: absolute;
    top: 10px;
    width: 100%;
    height: 200px;
    filter:blur(100px);
    z-index: -1
}

</style>
<script>
layui.use('carousel', function(){
  var carousel = layui.carousel;
  //建造实例
  carousel.render({
    elem: '#test1',
    width: '100%',
    adim:"fade",
    arrow: 'always',
    height:'460px',
    anim:'fade',
  });
});

layui.use('carousel', function(){
 var carousel = layui.carousel;
 // alert(carousel)
//监听轮播切换事件
carousel.on('change(demo)', function(obj){
    // console.log(obj.index); //当前条目的索引
    // console.log(obj.prevIndex); //上一个条目的索引
    // console.log(obj.item); //当前条目的元素对象
    // alert(obj.index);
    if(obj.index=='1'){
      $('.list-color').attr('style','background-image: url("/resource/public/static/img/title1.jpg");height: 100px;opacity: 0.3;filter:blur(180px);top:150px;width: 100%;position: absolute;top: 10px;width: 100%;height: 200px;filter:blur(100px);z-index: -1');
      // alert($('.list-color').attr('style'));
    }else if(obj.index=='2'){
      $('.list-color').attr('style','background-image: url("/resource/public/static/img/title2.jpg");height: 100px;opacity: 0.3;filter:blur(180px);top:150px;width: 100%;position: absolute;top: 10px;width: 100%;height: 200px;filter:blur(100px);z-index: -1');
      // alert($('.list-color').attr('style'));
    }else{
      $('.list-color').attr('style','background-image: url("/resource/public/static/img/0.jpg");height: 100px;opacity: 0.3;filter:blur(180px);top:150px;width: 100%;position: absolute;top: 10px;width: 100%;height: 200px;filter:blur(100px);z-index: -1');
    }
    
  });
});


</script>
<script type="text/javascript">
layui.use('table', function(){
  var table = layui.table;
  table.render({ //其它参数在此省略
    skin: 'line' //行边框风格
    ,even: true //开启隔行背景
    ,size: 'lg' //小尺寸的表格
  }); 
});
//监听行单击事件
$('table tr').hover(function(){
  var img = $(this).attr('data-img');
  var title = $(this).attr('data-title');
  $('#course_images_change').attr('src',img);
  // $('tr .item-time-point-n').attr('class','item-time-point');
  // $(this).attr('class','item-time-point')
  var jj=$(this).children('td').children('div');
  jj.each(function () {
    // alert($(this).attr('class'));
    if($(this).attr('class')=='item-time-point-n'){
      $(this).attr('class','item-time-point');
    }
    if($(this).attr('class')=='list-block-n'){
      $(this).attr('class','list-block-y');
    }
    if($(this).attr('class')=='item-time'){
      $(this).attr('class','item-time-y1');
    }
    
    if($(this).attr('class')=='item-info item-name'){
      $(this).attr('class','item-info item-name-y1');
    }
  });
  // 
},
  function(){
    var jj=$(this).children('td').children('div');
    jj.each(function () {
      if($(this).attr('class')=='item-time-point'){
        $(this).attr('class','item-time-point-n');
      }
      if($(this).attr('class')=='list-block-y'){
        $(this).attr('class','list-block-n');
      }
      if($(this).attr('class')=='item-time-y1'){
        $(this).attr('class','item-time');
      }
      if($(this).attr('class')=='item-info item-name-y1'){
      $(this).attr('class','item-info item-name');
    }
    });
  });
  // 课程模块的hover事件
  $('.course_block').hover(function(){

    var div=$(this).children('div');
    div.each(function () {
      // alert($(this).attr('class'));
      if($(this).attr('class')=='course-card-content'){
        $(this).children('h3').attr('style','color:red');
      }
    });
  },
  function(){
    var div=$(this).children('div');
    div.each(function () {
      // alert($(this).attr('class'));
      if($(this).attr('class')=='course-card-content'){
        $(this).children('h3').attr('style','color:#07111B');
      }
    });
  })
  $('#userinfomess').hover(function(){
        $('#userinfoset').attr('class','userinfo');
      },
      function(){
        // $('#userinfoset').attr('class','userinfo userinfo-hoverls');
      })
    $('#userinfoset').hover(function(){

    },function(){
        $('#userinfoset').attr('class','userinfo userinfo-hoverls');
      }
    )
</script>
<style type="text/css">
.course_block img:hover{
  -webkit-transform:scale(1.1); /*Webkit: Scale up image to 1.2x original size*/
  -moz-transform:scale(1.1); /*Mozilla scale version*/
  -o-transform:scale(1.1); /*Opera scale version*/
  box-shadow:0px 0px 30px gray; /*CSS3 shadow: 30px blurred shadow all around image*/
  -webkit-box-shadow:0px 0px 30px gray; /*Safari shadow version*/
  -moz-box-shadow:0px 0px 30px gray; /*Mozilla shadow version*/
  opacity: 1;

}

.course-card-content h3:hover{
  color: red;
}
</style>
<style type="text/css">
  

  .list-color{
    background-image: url("/resource/public/static/img/title1.jpg");
    height: 100px;
    opacity: 0.3;
    filter:blur(180px);
    top:150px;
    width: 100%;
    position: absolute;
    top: 10px;
    width: 100%;
    height: 200px;
    filter:blur(100px);
    z-index: -1
}
.course_block{
    /*background-color: red;*/
    height: 256px;
    width: 220px;
    float: left;
    margin: 0px 0px 12px 18px;
}
.course_img{
    width: 220px;
    height: 120px;
    /*position: relative;*/
    border-radius:10px;
}
</style>
</html>














