<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\note.html";i:1539756887;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>我的</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<script src="/resource/public/static/layui/layui.js"></script>
<style type="text/css">
  @media (max-width: 1200px) {
    .layui-fluid { 
    	width: 1200px; 
    }
    .width100{
    	width: 1200px;
    	}
   	}
</style>
</head>
<body class="backg_huibai">
<div class="width100 float_l height150" style="position: absolute; top:0;left:0;z-index:50;">
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
          
            <div class="float_l margin_l35">
                <a href="">
							<i style="font-size: 22px;margin:10px 20px 10px 20px" class="layui-icon">&#xe63a;</i>
						</a>
            </div>
            <div class="float_l margin_l30 margin_r40">
                <a href="<?php echo url('Index/person/mycollect'); ?>" id='userinfomess'>
					<img src="/resource/public/static/img/tx.jpg" style="width: 40px;height: 40px;; border-radius: 100%;">
				</a>
				<div class="userinfo userinfo-hoverls" id="userinfoset">
					<div >
						<a href="<?php echo url('Index/person/mycollect'); ?>">
							<img src="/resource/public/static/img/tx.jpg" style="width: 72px;height: 72px;; border-radius: 100%;">
						</a>
						<span class="userinfo-name">大白菜111</span>
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
					<span>学习时长</span>
				</li>
				<li>
					<em>410</em>
					<span>收藏</span>
				</li>
				<li>
					<em>100</em>
					<span>观看次数</span>
				</li>
				<li>
					<em>100000</em>
					<span>关注</span>
				</li>
				<li>
					<em>10000</em>
					<span>粉丝</span>
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
					<a href="<?php echo url('Index/person/mycollect'); ?>" class="active">
		            	<i class="layui-icon">&#xe600;</i><span style="margin-left: 15px;">收藏夹</span><b class="icon-drop_right"></b>
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
					<a href="<?php echo url('Index/person/note'); ?>" class="actived">
		            	<i class="layui-icon" style="font-size: 20px;color: #fff;line-height: 48px;">&#xe642;</i><span style="margin-left: 15px;">我的笔记</span><b class="icon-drop_right"></b>
		            </a>
				</li>
				<li>
					<a href="<?php echo url('Index/person/myassess'); ?>" class="active">
		            	<i class="layui-icon" style="font-size: 20px;color: #787d82;line-height: 48px;">&#xe66e;</i><span style="margin-left: 15px;">我的评价</span><b class="icon-drop_right"></b>
		            </a>
				</li>
				<li>
					<a href="<?php echo url('Index/person/request'); ?>" class="active">
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
					<div class="clearfix-note float_l">
						<i class="layui-icon float_l" style="font-size: 24px;color: rgba(240,20,20,.6);margin-right: 20px;">&#xe6ed;</i>
						<h3 class="float_l">Spring Boot 2.0深度实践之系列总览</h3>
						<span class="course-content">视频分类：点播视频</span><br>
						<span class="course-content" style="margin-left: 45px;">一级类目 / 二级类目 / 三级类目</span>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作者:<span class="course-content">大白菜</span>
						<br>
						<br>
						<span >还有最后一章就学完了，先来评价一下，本门课程对于新手来说涉及到的知识点确实挺多的，帮我巩固了SSM的知识，也快速知道了springboot的用法，同时还学会了阿里云的部署，老师的手记很方便。不过个人觉得有一点瑕疵，微信这几小节讲得不够深入，其实还是希望能带着敲的。因为之前没有接触过微信相关的开发，不过整体来说，作为刚学习完SSM框架的在校大学生 作为第一个实战课程 ，还是收获满满，给翔仔老师点赞。还有最后一章就学完了，先来评价一下，本门课程对于新手来说涉及到的知识点确实挺多的，帮我巩固了SSM的知识，也快速知道了springboot的用法，同时还学会了阿里云的部署，老师的手记很方便。不过个人觉得有一点瑕疵，微信这几小节讲得不够深入，其实还是希望能带着敲的。因为之前没有接触过微信相关的开发，不过整体来说，作为刚学习完SSM框架的在校大学生 作为第一个实战课程 ，还是收获满满，给翔仔老师点赞。还有最后一章就学完了，先来评价一下，本门课程对于新手来说涉及到的知识点确实挺多的，帮我巩固了SSM的知识，也快速知道了springboot的用法，同时还学会了阿里云的部署，老师的手记很方便。不过个人觉得有一点瑕疵，微信这几小节讲得不够深入，其实还是希望能带着敲的。因为之前没有接触过微信相关的开发，不过整体来说，作为刚学习完SSM框架的在校大学生 作为第一个实战课程 ，还是收获满满，给翔仔老师点赞。</span>
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
