<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\notelist.html";i:1541559994;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>我的笔记</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/user.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<script src="/resource/public/static/layui/layui.js"></script>
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
</head>
<body class="backg_qiangray">
<div class="width100">
	<div class="answer-bg">
		<?php if(is_array($notelist) || $notelist instanceof \think\Collection || $notelist instanceof \think\Paginator): if( count($notelist)==0 ) : echo "" ;else: foreach($notelist as $key=>$vo): ?>
		<div class="course-description" style="min-height: 150px;color: #1c1f21;">
				<a class="float_l">
					<img src="/resource/public/static/img/touxiang.png" style="height: 48px;width: 48px;border-radius: 50%;">
				</a>
				<div class="assess-info float_l" style="cursor:pointer;margin-left: 10px;">
					<span class="username">
						<?php echo $vo['username']; ?>
					</span>
					<p class="" style="margin-top: 10px;">
						<?php echo $vo['note_content']; ?>
					</p>
					<span class="float_r time" >时间：<?php echo date('Y-m-d H:i',$vo['note_time']); ?></span>
				</div>
	            
			</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
</div>
</body>
</html>