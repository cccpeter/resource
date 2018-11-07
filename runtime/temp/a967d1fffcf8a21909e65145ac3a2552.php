<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\discusslist.html";i:1541560002;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>讨论</title>
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
<div class="width100 layui-row">
	<div class="answer-bg ">
		<?php if(is_array($discuss) || $discuss instanceof \think\Collection || $discuss instanceof \think\Paginator): if( count($discuss)==0 ) : echo "" ;else: foreach($discuss as $key=>$vo): ?>
		<div class="course-description" style="min-height: 150px;color: #1c1f21;">
				<div class="layui-col-md2">
					<a class="float_l">
						<img src="/resource/public/static/img/touxiang.png" style="height: 48px;width: 48px;border-radius: 50%;">
					</a>
					<div class="assess-info" style="height:100%;cursor:pointer;margin-left: 10px;">
						<span class="username float_l">
							<?php echo $vo['username']; ?>
						</span>
						
					</div>
				</div>
				<div class="layui-col-md10">
					<p class="discuss-title">
						<?php echo $vo['discuss_title']; ?>
                    </p>
					<p class="" style="margin-top: 10px;">
						<?php echo $vo['discuss_content']; ?>
					</p>
					<span class="float_r time" >
						<a style="color: #1E9FFF;" onclick="discusscall('<?php echo $vo['discuss_id']; ?>','<?php echo $vo['discuss_title']; ?>');">回答：<?php echo $vo['discusscall_num']; ?>  </a> 发布时间：<?php echo date('Y-m-d H:i',$vo['discuss_time']); ?>
						<button class="layui-btn layui-btn-radius layui-btn-normal" style="margin-left: 15px;" onclick="answer('<?php echo $vo['discuss_id']; ?>','<?php echo $vo['discuss_title']; ?>');">我来回答</button>
					</span>
					
				</div>
			</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
</div>
<script>
	layui.use('layer', function(){}); 
	function answer(discuss_id,title){
		var url="<?php echo url('Index/person/course_answer'); ?>";
		url+='?discuss_id='+discuss_id;
		layer.open({
			type:2,
			title:title,
			content:url,
			width:"500px",
			area: ['700px', '500px'],
		});
	}
	function discusscall(discuss_id,title){
		var url="<?php echo url('Index/person/course_answerlist'); ?>";
		url+='?discuss_id='+discuss_id;
		layer.open({
			type: 2, 
			title:title,
			content: url,
			area: ['900px', '600px'],
		}); 
	}
</script>
</body>
</html>