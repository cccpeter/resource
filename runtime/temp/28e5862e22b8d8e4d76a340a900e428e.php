<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\index\video.html";i:1540288095;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>课程</title>
	<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
<style type="text/css">
	@media (max-width: 1500px) {    .layui-col-md12 { width: 1500px; }.width100{width: 1500px;}}
</style>
<script src="/resource/public/static/layui/layui.js"></script>
</head>
<body class="backg_huibai" style="overflow:auto">
<div class="width100 header" style="height: 60px;">
	<div class="layui-fluid">
		<div class="layui-row">
			<div class="layui-col-md12 float_l " >
				<ul>
					<li>
						<a href="<?php echo url('Index/index/course_detail'); ?>" class="last">
							<i class="layui-icon " style="font-size: 26px;">&#xe65c;</i>
						</a>
					</li>
					<li>
						<em class="videotitle">1-1 微服务架构特点</em>
					</li>
					<li>
						<a>
							<i class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67a;</i>-已收藏-
						</a>
					</li>
				</ul>
				<ul class="float_r">
					<li>
						<div class="course-top-search float_r" style="margin: 10px 20px 10px 20px;">
				            <div class=" search-area float_l" data-search="top-banner">
				                <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="搜索感兴趣的内容" type="text" autocomplete="off">
				                
				            </div>
				            <div class="showhide-search float_l" data-show="no"><i class="layui-icon">&#xe615;</i></div>
				        </div>
					</li>
					
					<li>

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
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="width100" style="background-color: #1C1F21;height: 803px;">
	<div class="float_l" style="height: 100%;width: 100%">
		<div class="course-sidebar-layout float_l" style="height: 100%;display: -webkit-flex; align-items: center;z-index: 10000;width:2%;margin-left: 1%;">
			<dl>
				<dd>
					<span class="requ"  onclick="req();"><i class="layui-icon">&#xe609;</i><br>讨论<br></span>
				</dd>
				<dd>
					<span onclick="wnote();"><i class="layui-icon">&#xe642;</i><br>笔记<br></span>
				</dd>
				<dd>
					 <span onclick="wassess();"><i class="layui-icon">&#xe66e;</i><br>评价</span>
				</dd>
			</dl>
		</div>
		<!-- 兼容直播和录播 -->
		<!-- <div id="video" class="float_l" style=" height:100%;  width: 95%;border-radius: 12px;margin-top: 10px;margin-bottom: 10px;">
			<video id="videothis" style="height:783px; width: 100%;background-color: #000000;  " poster="/resource/public/static/img/0.jpg" controls preload="auto"  data-setup="{}">
				<source src="rtmp://live.hkstv.hk.lxdns.com/live/hks" type="rtmp/flv"/>
				<source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
		    	<source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
		    	<source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
		        <p class="vjs-no-js"> To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a> </p>
			</video>
		</div> -->
		<div id="video" class="float_l" style=" height:100%;  width: 95%;border-radius: 12px;margin-top: 10px;margin-bottom: 10px;">
			<video id="myPlayer" style="width: 100%;height: 783px;" poster="" controls playsInline webkit-playsinline autoplay>
			    <!-- <source src="/resource/public/static/img/123.mp4" type="video/mp4" /> -->
			    <source src="rtmp://media3.sinovision.net:1935/live/livestream" type="rtmp/flv" />
			</video>
		</div>
		<div id='request' class="float_l request" style="display:none">
			<div class="quest float_l">提问题</div>
			<div class="close float_r"><i onclick="closereq();" class="layui-icon" style="font-size: 24px;font-color: #93999F">&#x1006;</i></div>
			<p style="height: 24px;"></p>
			<p style="height: 24px;"></p>

			<div ><input class="questtext" type="text" placeholder="请一句话说明你的问题"></div>
			<div><input class="questtextarea" type="textarea" name="" placeholder="请描述你问题的详情"></div>
			<p style="height: 24px;"></p>
			<div><a href="javascript:;" class="putqa-submit">提交</a></div>
		</div>
		<div id='note' class="float_l request" style="display:none">
			<div class="quest float_l">记笔记</div>
			<div class="close float_r"><i onclick="closenote();" class="layui-icon" style="font-size: 24px;font-color: #93999F">&#x1006;</i></div>
			<p style="height: 24px;"></p>
			<p style="height: 24px;"></p>

			<!-- <div ><input class="questtext" type="text" placeholder="请一句话说明你的问题"></div> -->
			<div><input class="questtextarea" type="textarea" name="" placeholder="请记录下你的笔记"></div>
			<p style="height: 24px;"></p>
			<div><a href="javascript:;" class="putqa-submit">提交</a></div>
		</div>
		<div id='assess' class="float_l request" style="display:none">
			<div class="quest float_l">评价</div>
			<div class="close float_r"><i onclick="closeassess();" class="layui-icon" style="font-size: 24px;font-color: #93999F">&#x1006;</i></div>
			<p style="height: 24px;"></p>
			<p style="height: 24px;"></p>

			<!-- <div ><input class="questtext" type="text" placeholder="请一句话说明你的问题"></div> -->
			评分：<div id="test1"></div><span id="level" style="font-size:15px;color: #F90;"></span>
			<div><input class="questtextarea" type="textarea" name="" placeholder="请写下你的评价"></div>
			<p style="height: 24px;"></p>
			<div><a href="javascript:;" class="putqa-submit">提交</a></div>
		</div>
	</div>
</div>
<div class="width100" style="background-color: #fff;box-shadow: 0 4px 8px 0 rgba(28,31,33,.1);height: 68px;z-index: 99">
	<div class="layui-fluid">
		<div class="layui-row">
			<div class="layui-col-md8 layui-col-md-offset3 float_l" >
				<ul class="menu">
					<li class="ison">讨论</li>
					<li>评价</li>
					<li>笔记</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div style="height: 7px;width: 100%;"></div>
<div class="width100 backg_qiangray">
	<div class="layui-row">
		<div class="content layui-col-md-offset3 layui-col-md5">
			<div class="course-description">
				<span class="course-title">第1章 内容简介</span><br>
				<?php for($i=0;$i<100;$i++){ ?>这课程很好啊
				<?php } ?>
			</div>
		</div>
		
	</div>
</div>

</body>
<div class="width100 height193 padding_t30">
	<div class="layui-row">
		<div class="layui-col-md-offset2 layui-col-md8">
			<div class="text_c" >
	            <a >关于我们</a>
	            <a style="margin-left: 20px;">企业合作</a>
	            <a style="margin-left: 20px;">联系我们</a>
	            <a style="margin-left: 20px;">意见反馈</a>
	            <a style="margin-left: 20px;">友情链接</a>
      		</div>
		</div>
		<div class="layui-col-md-offset2 layui-col-md8">
			<hr>
		</div>
		<div class="layui-col-md-offset2 layui-col-md8 text_c" style="font-size: 12px;color: #93999f;">
			© 2016 京ICP备13042132号
		</div>
	</div>
</div>
<!-- <div class="width100 float_l padding_t30 height193">
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
</div> -->

<script type="text/javascript">//讨论的弹出框
	layui.use('rate', function(){
	    var rate = layui.rate;
	   
	    //渲染
	    var ins1 = rate.render({
	    	elem: '#test1'  //绑定元素
	    	,choose: function(value){
	    		var n=parseInt(value);
	    		switch(n)
	    		{
	    			case 1: 
	    				$('#level').html('一般');
	    				break;
	    			case 2: 
	    				$('#level').html('良好');
	    				break;
	    			case 3: 
	    				$('#level').html('推荐');
	    				break;
	    			case 4: 
	    				$('#level').html('优秀');
	    				break;
	    			case 5: 
	    				$('#level').html('精品');
	    				break;

	    		}
			}
	    });
	  });
	function closereq(){
		var reqstatus=$('#request').attr('style');
		$('#request').attr('style','display:none');
		$('#video').attr('style','width:95%');
		$('embed').attr('style','width:100%');
	}
	function closenote(){
		var note=$('#note').attr('style');
		$('#note').attr('style','display:none');
		$('#video').attr('style','width:95%');
	}
	function closeassess(){
		var reqstatus=$('#assess').attr('style');
		$('#assess').attr('style','display:none');
		$('#video').attr('style','width:95%');
		$('embed').attr('style','width:100%');
	}
	function req(){
		var reqstatus=$('#request').attr('style');
		// alert(reqstatus);
		if(reqstatus=='display:block'){
			$('#request').attr('style','display:none');
			$('#video').attr('style','width:95%');
		}else{
			$('#request').attr('style','display:block');
			$('#note').attr('style','display:none');
			$('#assess').attr('style','display:none');
			$('#video').attr('style','width:77%');
			$('embed').attr('style','width:100%');
		}
		
	}
	
	function wnote(){
		var note=$('#note').attr('style');
		// alert(reqstatus);
		if(note=='display:block'){
			$('#note').attr('style','display:none');
			$('#video').attr('style','width:95%');
		}else{
			$('#note').attr('style','display:block');
			$('#assess').attr('style','display:none');
			$('#request').attr('style','display:none');
			$('#video').attr('style','width:77%');
			$('embed').attr('style','width:100%');
		}
	}
	function wassess(){
		var assess=$('#assess').attr('style');
		// alert(reqstatus);
		if(assess=='display:block'){
			$('#assess').attr('style','display:none');
			$('#video').attr('style','width:95%');
		}else{
			$('#assess').attr('style','display:block');
			$('#note').attr('style','display:none');
			$('#request').attr('style','display:none');
			$('#video').attr('style','width:77%');
			$('embed').attr('style','width:100%');
		}
	}
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
	//视频播放速度<button onclick="getPlaySpeed()" type="button">获取</button><button onclick="setPlaySpeed()">设置</button>
	// var video1 = document.getElementById("videothis");
	// function getPlaySpeed() {
 //         alert(video1.playbackRate);//获取视频/音频的播放速度
 //    }
 //      function setPlaySpeed() {
 //         video1.playbackRate=5;//设置视频/音频的播放速度
 //    }
</script>
<!-- video.js -->
<!-- <script src="/resource/public/static/lib/video/js/video.min.js"></script> 
<script src="/resource/public/static/lib/video/js/zh-CN.js"></script>
<script type="text/javascript">
		var myPlayer = videojs('videothis');
		videojs("videothis").ready(function(){
			var myPlayer = this;
			myPlayer.play();
		});
		  
</script>  -->
<!-- 窗口改变的事件触发 -->
<script type="text/javascript" src="/resource/public/static/lib/ckplayer1/ezuikit.js"></script>
<script type="text/javascript" src="/resource/public/static/lib/ckplayer1/hls.js"></script>
<script type="text/javascript" src="/resource/public/static/lib/ckplayer1/jsmpeg.min.js"></script>
<script type="text/javascript">
	window.onresize = function(){
		$('embed').attr('style','width:100%');
	}

    var player = new EZUIPlayer('myPlayer');
    player.on('error', function(){
        console.log('error');
    });
    player.on('play', function(){
        console.log('play');
    });
    player.on('pause', function(){
        console.log('pause');
    });
  //    function closelights(){
  //    	alert('关灯');
  //    	// $('.header').attr('style','background-color:#999');
  //    	// $('.search-area').attr('style','background-color:#999');
 	// }
  //    function openlights(){alert('开灯')}
</script>

</html>