<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\openclass\openclass.html";i:1539853596;s:79:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\headcss.html";i:1540015743;s:76:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\head.html";i:1540344610;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
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

<div style="height: 80px;"></div>
<div class="layui-fluid " >
	<div class="layui-row">
		<div class="layui-col-md10 layui-col-md-offset1">
			<!-- 搜索框 -->
			<div class="logo-course float_l">
				<img style="width: 140px;height: 60" src="/resource/public/static/img/logo-course.png">
				<img style="width: 96px;height: 60px;" src="/resource/public/static/img/course-top.png">
			</div>
			<div class="course-top-search float_r">
	            <div class="search-area float_l" data-search="top-banner">
	                <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="搜索感兴趣的内容" type="text" autocomplete="off">
	                
	            </div>
	            <div class="showhide-search float_l" data-show="no"><i class="layui-icon">&#xe615;</i></div>
	        </div>
	        <hr style="margin-bottom: 0px;margin-top: 0px;">
	        <div>
	        	<div class="course-type">
	        		<div class="sp">
	        			<span>一级类目:</span>
	        		</div>
	        		<div class="bd">
	        		<ul>
	        			<a class="ison" href="javascript(0):;">全部</a>
	        			<?php for($i=0;$i<5;$i++){ ?>
	        			<li>
	        				<a href="javascript(0):;">前沿技术</a>
	        			</li>
	        			<?php } ?>
	        		</ul>
	        		</div>
	        	</div>
	        	<hr class="layui-bg-gray" style="margin-bottom: 0px;margin-top: 0px;">
	        	<div class="course-type">
	        		<div class="sp">
	        			<span>一级类目:</span>
	        		</div>
	        		<div class="bd">
	        		<ul>
	        			<a class="ison" href="javascript(0):;">全部</a>
	        			<?php for($i=0;$i<5;$i++){ ?>
	        			<li>
	        				<a href="javascript(0):;">前沿技术</a>
	        			</li>
	        			<?php } ?>
	        		</ul>
	        		</div>
	        	</div>
	        	<hr class="layui-bg-gray" style="margin-bottom: 0px;margin-top: 0px;">
	        	<div class="course-type">
	        		<div class="sp">
	        			<span>难度:</span>
	        		</div>
	        		<div class="bd">
	        		<ul>
	        			<a class="ison" href="javascript(0):;">全部</a>
	        			<li>
	        				<a href="javascript(0):;">容易</a>
	        			</li>
	        			<li>
	        				<a href="javascript(0):;">一般</a>
	        			</li>
	        			<li>
	        				<a href="javascript(0):;">较难</a>
	        			</li>
	        		</ul>
	        		</div>
	        	</div>
	        </div>
		</div>
	</div>
</div>
<div class="backg_qiangray" style="box-shadow: 0px 1px 3px #ccc inset;">
	<div class="layui-fluid" >
		<div class="layui-row">
			<div class="layui-col-md10 layui-col-md-offset1 float_l" style="margin-top:32px;">
		<?php for($i=0;$i<30;$i++){ ?>
             <div class="course_block" onclick="link();">
                <div>
                  <img class="course_img" src="/resource/public/static/img/59b8a486000107fb05400300.jpg">
                </div>
                <div class="course-card-content"><!--课程内容-->
                  <h3 class="text_c course_h3">全网最热Python3入门+进阶 更快上手实际开发</h3>
                </div>
              <div class="course-card-bottom">
                <div class="course-card-info">
                  <span class="course-text">实战</span>
                  <span class="course-text">初级</span>
                  <span class="course-text">
                    <i class="layui-icon">&#xe770;</i>5850</span>
                  <span class="course-star-box">
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                  </span>
                </div>
                <div style="font-size: 12px;color: #4D555D;padding: 2%">￥366.00
                </div>
              </div>
            </div>
            <?php } ?>
			</div>
			<div class="layui-col-md-offset1 layui-col-md10 text_c" id="test1"></div>
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
<script>
//分页用tp5中带的render()分页即可
layui.use('laypage', function(){
  var laypage = layui.laypage;
  
  //执行一个laypage实例
  laypage.render({
    elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
    ,count: 50 //数据总数，从服务端得到
    ,first:'1'
    ,limit:30
    ,last:'100'
    ,jump: function(obj, first){
	    //obj包含了当前分页的所有参数，比如：
	    console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
	    console.log(obj.limit); //得到每页显示的条数
	    //首次不执行
	    if(!first){
	      //do something
	    }
	}
});
});
</script>
<script type="text/javascript">
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
  function link(){
  	// alert('321');
  	window.location.href='http://localhost/resource/index.php/course_detail.html';
  }
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
</style>
</html>