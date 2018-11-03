<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\person\course_answer.html";i:1540967839;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>我来回答</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/user.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
</head>
<body class="backg_qiangray">
<div class="width100">
	<div class="content-answer width100" style="min-height: 458px;">
		<div class="qa-header width100">
		<img class="user-header" src="//img.mukewang.com/user/5458501000018e5802200220-40-40.jpg" width="40" height="40">
		<span class="user-name" id="username"></span>

	</div>
	<div class="js-qa-content width100">
		<textarea style="width: 550px;height: 200px;" id="answercall" placeholder="请输入你的答案"></textarea>
	</div>
	<button class="layui-btn layui-btn-radius layui-btn-normal" style="margin-left: 470px;" onclick="myanswer()">我来回答</button> 
	</div>
	
</div>
</body>
<script type="text/javascript" src="/resource/public/static/layui/layui.js"></script>
<script type="text/javascript">//讨论的弹出框
	var discuss_id="<?php echo $discuss_id; ?>";
	var url="<?php echo url('Index/person/course_answer'); ?>";
	var username=getCookie('username');
	$('#username').html(username);
	layui.use('layer', function(){
	  	var layer = layui.layer;
	});
	function myanswer(){
		var content=$('#answercall').val();
		var token=getCookie('token');
		var data={};
		data['discuss_id']=discuss_id;
		data['content']=content;
		data=JSON.stringify(data);
		if(token!=''){
			$.ajax({
			    url:url,
			    data:{'data':data,'token':token},
			    type:'post',
			    datatype:'json',
			    success : function(event){
			    	if(event.status=='1'){
			    		layer.msg('回答成功');
			    		setTimeout(function(){
							var index = parent.layer.getFrameIndex(window.name);
							parent.layer.close(index);
							window.parent.location.reload(); //登录成功后重载父层
				        },1500);
			    	}else{
			    		layer.msg('回答失败');
			    	}
		    	}
		    });
		}else{
			layer.msg('您还未登录');
			setTimeout(function(){
				var index = parent.layer.getFrameIndex(window.name);
				parent.layer.close(index);
				window.parent.location.reload(); //登录成功后重载父层
	        },1500);
		}
	}
</script>
</html>