<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\course_answerlist.html";i:1540892421;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>我来回答</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/user.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<script src="/resource/public/static/layui/layui.js"></script>
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
</head>
<body class="backg_qiangray">
<div class="width100">
	<div class="answer-bg">
		<div class="qa-header width100">
			<img class="user-header" src="//img.mukewang.com/user/5458501000018e5802200220-40-40.jpg" width="40" height="40">
			<span class="user-name"><?php echo $discuss['username']; ?></span>
		</div>
		<div class="width100 qa-content">
			<h1>
				<?php echo $discuss['discuss_title']; ?>
			</h1>
		</div>
		<div class="js-qa-content width100">
			<?php echo $discuss['discuss_title']; ?>
		</div>
		<div class="user-time">
			回答：<?php echo $discuss['discuss_num']; ?> 发布时间：<?php  echo date("Y-m-d H:i", $discuss['discuss_time']); ?>
		</div>
		<hr>
		<?php if(!$discuss['discusscall']){echo "<p class='no-course-helper' style='text-align:center'><span>暂时无评论！</span></p>";} if(is_array($discuss['discusscall']) || $discuss['discusscall'] instanceof \think\Collection || $discuss['discusscall'] instanceof \think\Paginator): if( count($discuss['discusscall'])==0 ) : echo "" ;else: foreach($discuss['discusscall'] as $key=>$vo): ?>
		<div class="content-answer width100" style="margin-top: 15px;">
			<div class="qa-header width100">
			<img class="user-header" src="//img.mukewang.com/user/5458501000018e5802200220-40-40.jpg" width="40" height="40">
			<span class="user-name"><?php echo $vo['username']; ?></span>

		</div>
		<!-- <div class="width100 qa-content">
			<h1>
				晚上大白菜晚上大白
			</h1>
		</div> -->
		<div class="js-qa-content width100">
			<?php echo $vo['discusscall_content']; ?>
		</div>
			<div class="user-time">
				时间：<?php  echo date("Y-m-d H:i", $vo['discusscall_time']); ?>
			</div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
</div>
</body>
</html>