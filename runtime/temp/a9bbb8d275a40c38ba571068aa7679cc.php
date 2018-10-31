<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\login\index.html";i:1540892857;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>登陆-</title>
	<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
	<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
	<script src="/resource/public/static/layui/layui.js"></script>
	<style type="text/css">
		.password{
			height: 36px;
		    line-height: 36px;
		    background: #F3F5F6;
		    border-radius: 8px;
		    border: 0;
		    margin:25px 0px 10px 0px;
		}
		.search-info{
			padding: 0 16px;
		    color: #1C1F21;
		    height: 36px;
		    line-height: 36px;
		    background: 0 0;
		    font-size: 14px;
		    border: 0;
		}
		.auto-signin{
			color: #787d82;
			line-height: 36px;
			font-size: 12px;
			margin: 0px 10px 0px 10px;
			float: left;
		}
		.auto-signin input{
			margin-right: 10px;
    		vertical-align: -1px;
		}
		.login-button{
			cursor: pointer;
		    width: 250px;
		    text-align: center;
		    height: 40px;
		    line-height: 40px;
		    background-color: dodgerblue;
		    border-radius: 5px;
		    margin: 0 auto;
		    margin-top: 50px;
		    color: white;
		}
	</style>
</head>
<body>
	<form class="layui-form">
		<div class="width100">
			<div class="password width100 float_r">
			    <div class="search-area float_l" data-search="top-banner">
			        <input class="search-info" name="username" id="username" style="width: 310px;" data-suggest-trigger="suggest-trigger" placeholder="输入您的用户名" type="text" autocomplete="off" required  lay-verify="required">
			        
			    </div>
			</div>
			<div class="password width100 float_r">
			    <div class="search-area float_l" data-search="top-banner">
			        <input class="search-info " name="password" id="password" style="width: 310px;" data-suggest-trigger="suggest-trigger" placeholder="输入您的密码" type="password" autocomplete="off" required  lay-verify="required">
			        
			    </div>
			</div>
			<div class="layui-form-item float_l text_c">
			    <label class="auto-signin">七天自动登录</label>
			    <div class="layui-input-block" style="margin: 0px;">
			      <input type="checkbox" name="isseven" lay-skin="switch">
			    </div>
		  	</div>
			<div class="login-button" lay-submit lay-filter="formDemo">
				登录
			</div>
		</div>
	</form>
	<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
<script type="text/javascript">
	layui.use('form', function(){
  		var form = layui.form;
	  	//监听提交
	    form.on('submit(formDemo)', function(data){
	    	var username=$('#username').val();
	    	var password=$('#password').val();
	    	var url='<?php echo url("Index/Login/login"); ?>';
	    	var action='login';
	    	if (username == '') {
            	layer.msg('请输入用户名！', {icon: 5, shade: [0.3, '#393D49'], time: 1500});
	        } else if (password == '') {
	            layer.msg('请输入密码！', {icon: 5, shade: [0.3, '#393D49'], time: 1500});
	        } else if (password == '') {
	            layer.msg('请输入密码！', {icon: 5, shade: [0.3, '#393D49'], time: 1500});
	        } 

	        var data=JSON.stringify(data.field);
	        // alert(data);
	    	$.ajax({
			    url:url,
			    data:{'data':data,'action':action},
			    type:'post',
			    datatype:'json',
			    success : function(event){
			    	if(event['status']=='1'){
			    		//设置cookie
				    	setCookie('token',event['data']['token'],event['data']['token_time']);
				    	setCookie('token_time',event['data']['token_time'],event['data']['token_time']);
				    	setCookie('auth_level',event['data']['auth_level'],event['data']['token_time']);
				    	setCookie('username',event['data']['username'],event['data']['token_time']);
				    	// delCookie('token');删除cookie
				    	// alert(getCookie('token'))
				    	layer.msg("登录成功");
					    setTimeout(function(){
							var index = parent.layer.getFrameIndex(window.name);
							parent.layer.close(index);
							window.parent.location.reload(); //登录成功后重载父层
				        },1500);
				    }else{
				    	layer.msg(event['data']);
				    }
		    	}
		    });
		}); 
	});
</script>
</body>
</html>