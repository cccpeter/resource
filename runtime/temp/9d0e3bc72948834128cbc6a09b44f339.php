<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\index\course_detail.html";i:1541043759;s:79:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\headcss.html";i:1540015743;s:76:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\head.html";i:1540524789;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>资源平台</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/user.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<!-- <link href="/resource/public/static/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" /> -->
<script type="text/javascript" src="/resource/public/static/js/jquery.SuperSlide.2.1.1.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<script src="/resource/public/static/layui/layui.js"></script>
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
<!-- <style type="text/css">
  @media (max-width: 1500px) {    .layui-fluid { width: 1500px; }.width100{width: 1500px;}}
</style> -->
</head>
<body class="backg_huibai">
<!-- 顶部 -->
<div class="width100 float_l height150" id="heade" style="position: fixed; top:0;left:0;z-index:50;">
  <div class="width100 float_l height80 line_hei80" style="background-color: #fff; opacity:1;box-shadow: 0px 0px 3px #ccc inset;">

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
                <i class="layui-icon" id="searchicon" style="cursor: pointer;">&#xe615;</i>
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

<div class="list-color"></div>
<div style="height: 80px;"></div>
<div class="layui-fluid">
	<div class="layui-row">
		<div class="layui-col-md8 layui-col-md-offset2 ">
			<div class="path">
				<span class="layui-breadcrumb" lay-separator="\">
				  <a href="<?php echo url('Index/index/tab'); ?>">点播</a>
				  <a href="<?php echo url('Index/index/course_list',['videotype_id'=>$videotab['videotype_parentid'],'son_id'=>'0','level_id'=>'0','is_mesh'=>'1','is_tab'=>1]); ?>"><?php echo $videotab['parent_name']; ?></a>
				  <a href="<?php echo url('Index/index/course_list',['videotype_id'=>$videotab['videotype_parentid'],'son_id'=>$videotab['videotype_id'],'level_id'=>'0','is_mesh'=>'1','is_tab'=>1]); ?>"><?php echo $videotab['son_name']; ?></a>
				  <a href="">
				  <?php echo cutstr($videotab['videotab_title'],0,5,'...') ?></a>
				</span>
			</div>
			<div class="title float_l">
				<?php echo cutstr($videotab['videotab_title'],0,10,'...') ?>
				
			</div>
			<div class="static-item float_l">
				<?php if(($videotab['iscollect'] == 0)): ?>
				<div id="clickcollect" style="cursor: pointer;" onclick="collectchoose('0',<?php echo $videotab['video_type']; ?>,<?php echo $videotab['videotab_id']; ?>);">
					<i id="collect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67b;</i>-收藏-
				</div>
				<?php else: ?>
				<div id="clickcollect" style="cursor: pointer;" onclick="collectchoose('1',<?php echo $videotab['video_type']; ?>,<?php echo $videotab['videotab_id']; ?>);">
					<i id="oncollect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67a;</i>-已收藏-
				</div>
				<?php endif; ?>
			</div>
			<div class="float_l width100 " style="margin-bottom: 20px;">
				<div class="info float_l" >
					<img class="image " src="/resource/public/static/img/touxiang.png">
					<span class="name "><?php echo $videotab['username']; ?></span><br>
					<span class="work ">上传者</span>
				</div>
				<div class="static-item float_l">
					-难度：<?php if(($videotab['videotab_level'] == 1)): ?>
                      简单-
                    <?php elseif($videotab['videotab_level'] == 2): ?>
                      一般-
                    <?php else: ?> 
                      复杂-
                    <?php endif; ?>
				</div>
				
				<div class="static-item float_l">
					-观看次数：<?php echo $videotab['videotab_views']; ?>-
				</div>
				<div class="static-item float_l">
					-评价人数：<?php echo $videotab['videotab_assessnums']; ?>-
				</div>
				<div class="static-item float_l">
					-综合评分：<?php echo $videotab['videotab_assessscore']; ?>-
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="width100" style="background-color: #fff;box-shadow: 0 4px 8px 0 rgba(28,31,33,.1);height: 68px;z-index: 99">
	<div class="layui-fluid">
		<div class="layui-row">
			<div class="layui-col-md8 layui-col-md-offset2 float_l" >
				<ul class="menu">
					<a href="<?php echo url('Index/index/course_detail',['videotab_id'=>$videotab['videotab_id']]); ?>"><li class="ison" style="cursor: pointer;">课程简介</li></a>
					<a href="<?php echo url('Index/index/course_resource',['videotab_id'=>$videotab['videotab_id']]); ?>"><li style="cursor: pointer;">课程资源/作业</li></a>
					<a href="<?php echo url('Index/index/course_discuss',['videotab_id'=>$videotab['videotab_id']]); ?>"><li style="cursor: pointer;">课堂讨论</li></a>
					<a href="<?php echo url('Index/index/course_assess',['videotab_id'=>$videotab['videotab_id']]); ?>"><li style="cursor: pointer;">课程评价</li></a>
				</ul>
			</div>
		</div>
	</div>
</div>
<div style="height: 7px;width: 100%;"></div>
<div class="width100 backg_qiangray">
	<div class="layui-row" style="min-height: 290px;">
		<div class="content layui-col-md-offset2 layui-col-md5">
			<div class="course-description" style="min-height: 190px;">
				<span class="course-title">简介</span><br>
				<?php if($videotab['videotab_content']==''): ?>
				<?php echo $videotab['videotab_title']; ?><br>
				暂时无内容
				<?php else: ?>
				<?php echo $videotab['videotab_title']; ?><br>
				<?php echo $videotab['videotab_content']; endif; ?>
			</div>
		</div>
		<div class="course-learn layui-col-md2">
			<dt class="course-known">课程须知</dt>
			<dd class="course-known"><?php echo $videotab['videotab_mustknown']; ?></dd>
			<!-- <dt class="course-known">你能学到的</dt>
			<dd class="course-known"></dd> -->
			<a class="startlearn" href="<?php echo url('Index/index/video',['video_id'=>$videotab['videotab_id'],'video_type'=>'1']); ?>">开始学习</a>
			<!-- <dt class="course-known">课程须知</dt>
			<dd  class="course-known">1.你需要掌握html+css样式基础知识
			2.有一定的前端实际开发经验</dd>
			<dt  class="course-known">课程须知</dt>
			<dd class="course-known">1.你需要掌握html+css样式基础知识
			2.有一定的前端实际开发经验</dd>
			<dt class="course-known">课程须知</dt>
			<dd class="course-known">1.你需要掌握html+css样式基础知识
			2.有一定的前端实际开发经验</dd> -->
			
		</div>
	</div>
</div>

<!-- 页脚 -->
<div class="width100 float_l padding_t30 height193">
  <div class="width_1200 margin_auto">
        <div class="width100 float_l text_c yejiao color_gray" >
            <a>关于我们</a>
            <a>企业合作</a>
            <a>联系我们</a>
            <a>意见反馈</a>
            <a>友情链接</a>
      	</div>
        <div class="width100 float_l text_c border_t margin_t20 padding_t20 color_gray fon_siz12">
          	<span>© 2016   京ICP备13042132号</span>
        </div>
    </div>
</div>

</body>
<style type="text/css">

  .list-color{
    background-image: url("/resource/public/static/img/test.png");
    height: 200px;
    /*opacity: 0.8;*/
    /*filter:blur(180px);*/
    top:150px;
    width: 100%;
    position: absolute;
    top: 50px;
    width: 100%;
    height: 280px;
    /*filter:blur(50px);*/
    z-index: -1;
    background-size:cover; 
}

</style>
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
<script>
//注意：导航 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
  
  //…
});
$('#userinfomess').hover(function(){
	    $('#userinfoset').attr('class','userinfo');
	  },
	  function(){})
	$('#userinfoset').hover(function(){

	},function(){
	    $('#userinfoset').attr('class','userinfo userinfo-hoverls');
	  }
	)
	// alert("页面加载完成====》onload");
	// 未收藏的hover事件


function collectchoose(choose,videotype,video_id){
	var token=getCookie('token');
	// alert('token:'+token);
	var url="<?php echo url('Index/person/coursecollect'); ?>";
	var data={};
		data['choose']=choose;
		data['videotype']=videotype;
		data['video_id']=video_id;
		data=JSON.stringify(data);
		// {"token":"96bebf18c3a102c494f1e8f8a9d471e1","choose":"0","videotype":1,"video_id":4}
		if(token!=''){
			$.ajax({
			    url:url,
			    data:{'data':data,'token':token},
			    type:'post',
			    datatype:'json',
			    success : function(event){
			    	// layer.msg(event.data);
			    	if(choose=='0'){
						$('#clickcollect').html('<i id="oncollect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67a;</i>-已收藏-');
						$('#clickcollect').attr('onclick','collectchoose(1,'+videotype+','+video_id+')');
						layer.msg('收藏成功');
					}else if(choose=='1'){
						$('#clickcollect').html('<i id="collect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67b;</i>-收藏-');
						$('#clickcollect').attr('onclick','collectchoose(0,'+videotype+','+video_id+')');
						layer.msg('取消收藏成功');
					}
			    }
			});
		}else{
			layer.msg('收藏失败，您还未登录哦');
		}
	}
	// $('#collect').hover(function(){
	// 	$('#collect').attr('class','layui-icon collect-n');
	// 	// alert('收藏的悬浮');
	// },
	// 	function(){
	// 		$('#collect').attr('class','layui-icon');
	// 	}
	// );
	// $('#oncollect').hover(function(){
	// 	$('#oncollect').attr('class','layui-icon collect-y');
	// },
	// 	function(){
	// 	$('#oncollect').attr('class','layui-icon');
	// 	}
	// );
</script>
</html>