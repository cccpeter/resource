<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\index\test.html";i:1537254039;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title><script type="text/javascript" src="/resource/public/static/js/jquery.min.js"></script>
</head>
<body>
<form action="<?php echo url('Index/index/test'); ?>" id="form_login" method="post" enctype="multipart/form-data">
                    <input type="number" name="sdf" max="2" min="0" value="2">
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <input type="file" name="files" multiple>
                    <input type="submit" id="form" value="提交">
                    </form>
</body>

</html>