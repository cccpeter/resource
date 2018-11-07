<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\assesslist.html";i:1541559715;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>我来回答</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/user.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<script src="/resource/public/static/layui/layui.js"></script>
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
</head>
<body class="backg_qiangray">
<div class="width100">
	<div class="answer-bg">
		<?php if(is_array($assess) || $assess instanceof \think\Collection || $assess instanceof \think\Paginator): if( count($assess)==0 ) : echo "" ;else: foreach($assess as $key=>$vo): ?>
		<div class="course-description" style="min-height: 150px;color: #1c1f21;">
			<a class="float_l">
				<img src="/resource/public/static/img/touxiang.png" style="height: 48px;width: 48px;border-radius: 50%;">
			</a>
			<div class="assess-info float_l" style="cursor:pointer;margin-left: 10px;">
				<span class="username">
					<?php echo $vo['username']; ?>
				</span>
				<div class="user-score">
					<?php for($i=0;$i<(int)$vo['assess_score'];$i++){ ?>
					<i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
					<?php } ?>
					<?php echo $vo['assess_score']; ?>分
				</div>
				<p class="" style="margin-top: 10px;">
					<?php echo $vo['assess_content']; ?>
				</p>
				<span class="float_r time" >时间：<?php echo date('Y-m-d H:i',$vo['assess_time']); ?></span>
			</div>
			
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
</div>
</body>
</html>