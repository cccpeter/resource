<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\mycollect.html";i:1539853615;s:79:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\headcss.html";i:1540015743;s:76:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\head.html";i:1540177796;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540173754;}*/ ?>
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
                    <li><a href="<?php echo url('Index/index/tab'); ?>">首页</a></li>
                    <li><a href="<?php echo url('Index/index/index'); ?>">点播</a></li>
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

<div class="list-color width100" style="background-image: url(/resource/public/static/img/test.png);top:150px;position: absolute;top: 50px;height: 180px;z-index: -1;background-size:cover; ">
</div>
<div style="height: 80px;"></div>
<!-- 个人资料 -->
<div class="width100 float_l" style="height: 180px;">
	<div class="user-bg">
		<div class="user-pic">
			<img class="headerimg" src="http://img2.mukewang.com/545865da00012e6402200220-140-140.jpg">
		</div>
		<div class="user-info-right">
			大白菜管理员
		</div>
		<div class="item-follows">
			<ul>
				<li>
					<em>24H</em>
					<span>在线时长</span>
				</li>
				<li>
					<em>410</em>
					<span>收藏</span>
				</li>
				<li>
					<em>100</em>
					<span>观看次数</span>
				</li>
				

			</ul>
		</div>
	</div>
</div>
<div class="width100 float_l">
	<div class="wrap">
		<div class="slider float_l">
			<ul>
				<li>
					<a href="<?php echo url('Index/person/mycollect'); ?>" class="actived">
		            	<i class="layui-icon" style="font-size: 20px;color: #fff;line-height: 48px;">&#xe600;</i><span style="margin-left: 15px;">收藏夹</span><b class="icon-drop_right"></b>
		            </a>
				</li>
				<li>
					<a href="<?php echo url('Index/person/userinfo'); ?>" class="active">
		            	<i class="layui-icon" style="font-size: 20px;color: #787d82;line-height: 48px;">&#xe60e;</i><span style="margin-left: 15px;">历史观看</span><b class="icon-drop_right"></b>
		            </a>
		        </li>
		        <li>
					<a href="<?php echo url('Index/person/myvideo'); ?>" class="active">
		            	<i class="layui-icon" style="font-size: 20px;color: #787d82;line-height: 48px;">&#xe6ed;</i><span style="margin-left: 15px;">我的视频</span><b class="icon-drop_right"></b>
		            </a>
				</li>
				<li>
					<a href="<?php echo url('Index/person/publicvideo'); ?>" class="active">
		            	<i class="layui-icon" style="font-size: 20px;color: #787d82;line-height: 48px;">&#xe681;</i><span style="margin-left: 15px;">公共视频</span><b class="icon-drop_right"></b>
		            </a>
				</li>
				<li>
					<a href="<?php echo url('Index/person/note'); ?>" class="active">
		            	<i class="layui-icon" style="font-size: 20px;color: #787d82;line-height: 48px;">&#xe642;</i><span style="margin-left: 15px;">我的笔记</span><b class="icon-drop_right"></b>
		            </a>
				</li>
				<li>
					<a href="<?php echo url('Index/person/myassess'); ?>" class="active">
		            	<i class="layui-icon" style="font-size: 20px;color: #787d82;line-height: 48px;">&#xe66e;</i><span style="margin-left: 15px;">我的评价</span><b class="icon-drop_right"></b>
		            </a>
				</li>
				<li>
					<a href="<?php echo url('Index/person/myrequest'); ?>" class="active">
		            	<i class="layui-icon" style="font-size: 20px;color: #787d82;line-height: 48px;">&#xe609;</i><span style="margin-left: 15px;">我的讨论</span><b class="icon-drop_right"></b>
		            </a>
				</li>
			</ul>
		</div>
		<form class="layui-form">
		<div class="my-space-course float_l">
			<div class="course-tab float_l" >
				<!-- <a>历史观看</a> -->
				<div class="layui-input-block float_r" style="margin-top: 10px;">
			      <select name="coursetype" lay-verify="required" lay-filter="search_type">
			        <option value="3">全部视频</option>
			        <option value="0">点播视频</option>
			        <option value="1">直播视频</option>
			        <option value="2">公开课视频</option>
			      </select>
			    </div>
			</div>
			
			<div class="course-list">
				<?php for($i=0;$i<15;$i++){ ?>
				<div class="clearfix float_l">
					<img class="float_l" src="https://img3.sycdn.imooc.com/5b9a01a40001fe1805400300-240-135.jpg">
					<div class="clearfix-title float_l">
						<h3 class="float_l">Spring Boot 2.0深度实践之系列总览</h3>
						<span class="course-content">视频分类：点播视频</span><br>
						<span class="course-content">一级类目 / 二级类目 / 三级类目</span>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作者:<span class="course-content">大白菜</span>
						<br>
						<br>
						<a class="titletab">我的笔记 (2)</a>
						<a class="titletab">讨论 (3)</a>
						<a class="titletab3">评价 (3)</a>
						<a class="study float_r" href="">学习啊</a>
					</div>
					
				</div>
				<hr>
				<?php } ?>
			</div>
		</div>	
	</form>	
	</div>
	
</div>
<!-- <div class="width100" style="height: 1000px;background-color: #000;"></div> -->
<!-- 页脚 -->

</body>

<script>
//注意：导航 依赖 element 模块，否则无法进行功能性操作
layui.use('element', function(){
  var element = layui.element;
  
  //…
});
//渲染form表单（下拉框）
layui.use('form', function(){
  var form = layui.form;
   form.on('select(search_type)', function(data){
   	var n=parseInt(data.value);
    switch(n)
	{
	case 0:
	   alert('点播视频');
	   break;
	case 1:
		alert('直播视频');
	   break;
    case 2:
        alert('公开课视频');
        break;
    case 3:
    	alert('全部视频');
    	break;
	default:
	 	break;
	}
  });
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
</script>
</html>