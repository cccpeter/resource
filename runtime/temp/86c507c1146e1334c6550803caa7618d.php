<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:81:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\myrequest.html";i:1542620423;s:79:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\headcss.html";i:1541148116;s:76:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\head.html";i:1540524789;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;s:78:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\perpub.html";i:1541489699;}*/ ?>
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

<div class="list-color width100" style="background-image: url(/resource/public/static/img/test.png);top:150px;position: absolute;top: 50px;height: 180px;z-index: -1;background-size:cover; ">
</div>
<div style="height: 80px;"></div>
<!-- 个人资料 -->
<div class="width100 float_l" style="height: 180px;">
	<div class="user-bg">
		<div class="user-pic">
			<img class="headerimg" src="/resource/public/static/img/tx.jpg">
		</div>
		<div class="user-info-right" id="username">
			
		</div>
		<div class="item-follows">
			<ul>
				<li>
					<em id="viewtime"></em>
					<span>在线时长</span>
				</li>
				<li>
					<em id="collect"></em>
					<span>收藏</span>
				</li>
				<li>
					<em id="videotime"></em>
					<span>观看时长</span>
				</li>
				

			</ul>
		</div>
	</div>
</div>
<div class="width100 float_l">
	<div class="wrap">
		<div class="slider float_l">
			<ul id="menu">
			</ul>
		</div>
<script>
var token=getCookie('token');
getdata();
getmenu();
//获取菜单数据
function getmenu(){
	var url=getRootPath()+'/index.php/Index/person/menu';
	var menuurl=getRootPath()+'/index.php/';
	var action="<?php echo $action; ?>";
	// alert(action);
	var html='';
	if(token){
		$.ajax({
			url:url,
			type:'post',
			dataType:'json',
			data:{'token':token},
			success:function(e){
				if(e.status=='1'){
					for(var item in e.data){
						// alert(item);
						// alert(e.data[item]);
						// var arr=e.data[item].replace('\/','/');
						// alert(e.data[item]);
						var arr=e.data[item].split(':');
						//有就返回无就返回null
						if(arr[0].indexOf(action)>-1){
							exc="actived";
							color='#fff;';
						}else{
							exc="active";
							color='#787d82;'
						}
						var menu=menuurl+arr[0];
						// alert(menu);
						html+='<li><a href="'+menu+'"class="'+exc+'"><i class=layui-icon style="font-size: 20px;color:'+color+'line-height: 48px;">'+arr[1]+'</i><span style="margin-left: 15px;">'+item+'</span><b class=icon-drop_right></b></a></li>';
					}
					// alert(html);
					$('#menu').html(html);
				}else{
					console.log("操作失败");
				}
			}
		});
	}
}
//获取页面三个基本数据
function getdata(){
	$('#username').html(getCookie('username'));
	var url=getRootPath()+"/index.php/Index/person/perpub";
	// alert(url);
	if(token){
		$.ajax({
			url:url,
			type:'post',
			dataType:'json',
			data:{'token':token},
			success:function(e){
				if(e.status=='1'){
					$('#viewtime').html(timehour(e.data.viewtime)+'H');
					$('#videotime').html(timehour(e.data.videotime)+'H');
					$('#collect').html(e.data.collect);
				}else{
					alert('你的网络炸了还是你的操作秀了？');
				}
			}
		})
	}
}
function timehour(second){
		second=second/3600;
		return parseInt(second*100)/100;
	}
</script>


		<form class="layui-form">
		<div class="my-space-course float_l">
			<div class="course-tab float_l" >
				<!-- <a>历史观看</a> -->
				<div class="layui-input-block float_r" style="margin-top: 10px;">
			      <select name="coursetype" lay-verify="required" lay-filter="search_type">
			        <option value="1">点播视频</option>
			        <option value="2">直播视频</option>
			        <option value="3">公开课视频</option>
			      </select>
			    </div>
			</div>
			<div class="course-list" id="list" style="min-height:250px;"></div>
			<center><div id="test1"></div></center>
		</div>	
	</form>	
	</div>
	
</div>
<!-- <div class="width100" style="height: 1000px;background-color: #000;"></div> -->
<!-- 页脚 -->

</body>

<script>
	// 初始化页面
	var pagesize=10;//每页的数量
		var pagenow=1;//当前页
		var video_type=1;
		if(getPar('video_type')){
			video_type=getPar('video_type');
		}
		video_type=parseInt(video_type);
		switch(video_type){
			case 1:
				var html='';
				html+='<option value="1" selected>点播视频</option><option value="2">直播视频</option><option value="3">公开课视频</option>';
				$('#type').html(html);
			break;
			case 2:
				var html='';
				html+='<option value="2" selected>直播视频</option><option value="1">点播视频</option><option value="3">公开课视频</option>';
				$('#type').html(html);
			break;
			case 3:
				var html='';
				html+='<option value="3" selected>公开课视频</option><option value="1"  >点播视频</option><option value="2">直播视频</option>';
				$('#type').html(html);
			break;
			default:
			var html='';
				html+='<option value="1" selected>点播视频</option><option value="2">直播视频</option><option value="3">公开课视频</option>';
				$('#type').html(html);
			break;
		}
		//视频分类
		window.onload=function(){
			getpage();
			getvideotype();
		}
		// layui的分页组件应该，先ajax请求过去后再初始化组件
		function getpage(){
			layui.use("laypage", function(){
				var laypage = layui.laypage;
				//执行一个laypage实例
				var url="<?php echo url('Index/person/discussdata'); ?>";
				var videourl=getRootPath()+'/video';
				var token=getCookie("token");
				$.ajax({
					url:url,
					type:"post",
					dataType:"json",
					data:{"token":token,"video_type":video_type,"pagenow":pagenow,"pagesize":pagesize},
					success:function(e){
						if(e.status=='1'){
							if(e.data!=''){
								var html='';
								for(var item in e.data){
									var imageurl=getRootPath()+'/';
									html+='<div id="discussid'+e.data[item].discuss_id+'"><div class="clearfix float_l"><div class="clearfix-note float_l"><i class="layui-icon float_l" style="font-size: 24px;color: rgba(240,20,20,.6);margin-right: 20px;">&#xe6ed;</i><h3 class="float_l">'
									+e.data[item].video_title+
									'</h3><span class="course-content" style="font-size:16px;"></span><br><span class="course-content" style="margin-left: 45px;">'
									+'分类：'+e.data[item].video_parent+'/'+ e.data[item].video_son+
									'</span><span class="course-content" style="margin-left: 12px;">作者：'
									+e.data[item].user_name+'<span class="course-content" style="margin-left: 12px;">讨论时间：'+e.data[item].discuss_time+'</span>'+
									'</span><div class="course-description" style="min-height: 100px;color: #1c1f21; box-shadow: 0px 4px 8px 3px rgba(28,31,33,.2);"><p class="">'
									+e.data[item].discuss_content+
									'</p><a class="layui-btn layui-btn-sm layui-btn-radius layui-btn-warm float_r" style="margin-left:10px;" onclick="deldiscuss('
									+e.data[item].video_id+','+video_type+
									','+e.data[item].discuss_id+')">删除讨论</a><a class="layui-btn layui-btn-sm layui-btn-radius float_r" href="'
									+videourl+'?video_id='+e.data[item].video_id+
									'&video_type='+video_type+'">观看视频</a></div></div></div><hr></div>';
								}
								$('#list').html(html);
								laypage.render({
								elem: "test1"
								,count: e.count
								,limit:e.pagesize
								,jump: function(obj, first){
									if(!first){
										pagesize=obj.limit;//前端设置页数量
										pagenow=obj.curr;//前端设置当前页
										$.ajax({
											url:url,
											type:"post",
											dataType:"json",
											data:{"token":token,"pagenow":obj.curr,"pagesize":obj.limit,'video_type':video_type},
											success:function(e){
												if(e.status!='0'){
												var html='';
												for(var item in e.data){
													console.log(e.data[item])
													var imageurl=getRootPath()+'/';
													html+='<div id="discussid'+e.data[item].discuss_id+'"><div class="clearfix float_l"><div class="clearfix-note float_l"><i class="layui-icon float_l" style="font-size: 24px;color: rgba(240,20,20,.6);margin-right: 20px;">&#xe6ed;</i><h3 class="float_l">'
													+e.data[item].video_title+
													'</h3><span class="course-content"style="font-size:16px;"></span><br><span class="course-content" style="margin-left: 45px;">'
													+'分类：'+e.data[item].video_parent+'/'+ e.data[item].video_son+
													'</span><span class="course-content" style="margin-left: 12px;">作者：'
													+e.data[item].user_name+'<span class="course-content" style="margin-left: 12px;">讨论时间：'+e.data[item].discuss_time+'</span>'+
													'</span><div class="course-description" style="min-height: 100px;color: #1c1f21; box-shadow: 0px 4px 8px 3px rgba(28,31,33,.2);"><p class="">'
													+e.data[item].discuss_content+
													'</p><a class="layui-btn layui-btn-sm layui-btn-radius layui-btn-warm float_r" style="margin-left:10px;" onclick="deldiscuss('
													+e.data[item].video_id+','+video_type+
													','+e.data[item].discuss_id+')">删除讨论</a><a class="layui-btn layui-btn-sm layui-btn-radius float_r" href="'
													+videourl+'?video_id='+e.data[item].video_id+
													'&video_type='+video_type+'">观看视频</a></div></div></div><hr></div>';
												}
												$('#list').html(html);
											}else{
												// $('#test1').html("<p class='no-course-helper' style='text-align:center'><span>下页暂时无记录！</span></p>");
											}
											}
										});
									}else{
										// alert("首页")不做处理
									}
								}
							});
							}else{
								//暂无数据
								$('#test1').html("<p class='no-course-helper' style='text-align:center'><span>暂时无记录！</span></p>");
							}
						}else{
								//暂无数据
								$('#test1').html("<p class='no-course-helper' style='text-align:center'><span>暂时无记录！</span></p>");
							}
					}
				})
				
			});
		}
	
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
	//获取网站参数
	function getPar(par){
				//获取当前URL
				var local_url = document.location.href; 
				//获取要取得的get参数位置
				var get = local_url.indexOf(par +"=");
				if(get == -1){
						return false;   
				}   
				//截取字符串
				var get_par = local_url.slice(par.length + get + 1);    
				//判断截取后的字符串是否还有其他get参数
				var nextPar = get_par.indexOf("&");
				if(nextPar != -1){
						get_par = get_par.slice(0, nextPar);
				}
				return get_par;
		}
		function getvideotype(){
		//注意：导航 依赖 element 模块，否则无法进行功能性操作
		layui.use("element", function(){
			var element = layui.element;
		});
		//渲染form表单（下拉框）
		layui.use("form", function(){
			var form = layui.form;
			form.on("select(search_type)", function(data){
				var n=parseInt(data.value);
				switch(n)
					{
					case 1:
					var url=getRootPath()+'/index/person/myrequest?video_type=1';
						location.href=url;
						break;
					case 2:
						var url=getRootPath()+'/index/person/myrequest?video_type=2';
						location.href=url;
						break;
						case 3:
						var url=getRootPath()+'/index/person/myrequest?video_type=3';
						location.href=url;
							break;
					default:
						break;
					}
			});
		});
	}
	/**
 *删除讨论
	*/
		 function deldiscuss(video_id,video_type,discuss_id){
		var token=getCookie('token');
		var url=getRootPath()+'/index/person/deldiscuss';
		if(video_id!=''&&video_type!=''&&token!=''&&discuss_id!=''){
			$.ajax({
				url:url,
				type:'post',
				dataType:'json',
				data:{'token':token,'video_id':video_id,'video_type':video_type,'discuss_id':discuss_id},
				success:function(e){
					var tab='discussid';
					tab+=discuss_id;
					// alert(tab);
					if(e.status=='1'){
						layer.msg('删除成功');
						$("#"+tab+"").fadeTo("slow", 0.01, function(){
						$(this).slideUp("slow", function() {
							$(this).remove();
						});
					});
					}else{
						layer.msg('该讨论并不存在');
					}
				}
			});
		}else{
			layer.msg('您还未登录');
		}
	}
	</script>
</html>
