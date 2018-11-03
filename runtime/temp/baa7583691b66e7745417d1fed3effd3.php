<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\admin\index.html";i:1540273869;s:79:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\headcss.html";i:1541148116;s:76:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\head.html";i:1540524789;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
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

<style type="text/css">
	@media (max-width: 1500px) {
	    .layui-col-md12 { 
	    	width: 1500px;
	    }
	    .width100{
	    	width: 1500px;
	    }
	}
</style>
<div style="height: 80px;"></div>
<div class="width100 float_l">
	<div class="settings-cont float_l">
		<div class="admin-left float_l">
			<div class="avator-wapper">
				<div class="avator-mode">
					<img class="avator-img" src="https://img.mukewang.com/5333a17a0001592502000200-200-200.jpg" data-portrait="5333a17a0001592502000200" width="92" height="92">
				</div>
				<div class="des-mode">
					<p>admin</p>
				</div>
			</div>
			<div class="list-wapper">
				<h2>系统设置</h2>
				<hr>
			</div>
			<ul class="admin-menu">
				<li>
					<a class="menu-ison">用户管理&nbsp;&nbsp;&nbsp;&nbsp;-></a>
				</li>
				<li>
					<a class="menu-list">设备管理</a>
				</li>
				<li>
					<a class="menu-list">点播管理</a>
				</li>
				<li>
					<a class="menu-list">直播管理</a>
				</li>
				<li>
					<a class="menu-list">公开课管理</a>
				</li>
				<li>
					<a class="menu-list">类别管理</a>
				</li>
				<li>
					<a class="menu-list">公共视频管理</a>
				</li>
			</ul>
		</div>
		<div class="admin-right float_l">
			<h4>用户列表</h4>
			<table id="demo" lay-filter="test"></table>
			</table>
		</div>
	</div>
	
</div>
</body>
<script>
	//数据表格
layui.use('table', function(){
  var table = layui.table;
  
  //第一个实例
  // table.render({
  //   elem: '#demo'
  //   ,height: 500
  //   ,defaultToolbar:['filter']
  //   ,url: '<?php echo url("Index/admin/getuser"); ?>' //数据接口
  //   ,page: true //开启分页
  //   ,cols: [[ //表头
  //     {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
  //     ,{field: 'username', title: '用户名', width:80}
  //     ,{field: 'auth_level', title: '权限等级', width:120, sort: true}
  //     ,{field: 'en', title: '状态', width:80} 
      
  //   ]]
  // });
  
});
</script>
<script>
	$('#heade').attr('style','position:static');
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
