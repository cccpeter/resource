<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\PHPTutorial\WWW\web/application/base\view\common\login.html";i:1537146711;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="/web/public/static/lib/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" href="/web/public/static/lib/h-ui.admin/css/H-ui.login.css"/>
    <link rel="stylesheet" href="/web/public/static/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" href="/web/public/static/lib/icheck/skins/flat/blue.css"/>
    <title>登录 - </title>
</head>
<body onkeypress="press(event)">
<div class="header" style="background-color: #4474BB;height: 44px;"><span style="font-size: 20px;"><?php echo $local_info['name']; ?></span></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox" style="height: 300px;">
        <form class="form form-horizontal" action="" id="form_login" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont" style="color: #33AECC">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="username" name="username" value="<?php echo $username; ?>" type="text" placeholder="请输入用户名"
                           class="input-text size-L" autocomplete="off" style="border-radius: 5px;">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont" style="color: #33AECC">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="password" name="password" value="" type="password" placeholder="请输入密码"
                           class="input-text size-L" autocomplete="off" style="border-radius: 5px;">
                </div>
            </div>
            <!-- <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input class="input-text size-L" id="captcha" name="captcha" type="text" placeholder="请输入验证码"
                           style="width:150px;" autocomplete="off">
                    <img src="" id="captcha_img" style="cursor:pointer" alt="看不清，请换一张" title="看不清，请换一张">
                </div>
            </div> -->
            <div class="row cl" style="margin-top: 35px;">
                <div class="formControls col-xs-8 col-xs-offset-3" >
                    <label for="online">
                        <input type="checkbox" name="online" id="online" value="success" <?php if($online == 'success'): ?>checked<?php endif; ?>>
                    </label>
                    <span style="margin: 10px;">
                        <select class="select-box radius size-L select" style="width: 20%;" name="time">
                            <option value="1" <?php if($time == '1'): ?>selected<?php endif; ?>>7天</option>
                            <option value="2" <?php if($time == '2'): ?>selected<?php endif; ?>>15天</option>
                            <option value="3" <?php if($time == '3'): ?>selected<?php endif; ?>>30天</option>
                        </select>
                        </span>
                    <span style="margin-left:5px;font-size: 1.2em;color:#fff">记住密码</span>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input style="background-color: #0099FF;border: none;border-radius: 7px;" id="login" type="button" class="btn btn-success radius size-L"
                           value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                </div>
            </div>
        </form>
    </div>
    <div style="width: 400px;height: 400px; position: absolute; position: absolute;right: 0px;bottom: 0px;">
        <img style="position: absolute;right: 20px;bottom: 100px;" src="/web/public/static/images/qrandroid.png">
        <img style="position: absolute;right: 20px;bottom: 300px;" src="/web/public/static/images/qrios.png">
    </div>
</div>
<div class="footer hidden-xs"  style="background-color: #4474BB;height: 44px;padding: 0;"></div>
</body>
<script type="text/javascript" src="/web/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/layer/layer.js"></script>
<script type="text/javascript" src="/web/public/static/lib/icheck/icheck.min.js"></script>
<script>
    $(function () {
        $('#online').iCheck({
            checkboxClass: 'icheckbox_flat-blue'
        });
    });
    /**
     * @不使用ajax提交，保证安全问题
     * @因为涉及太多权限和目录
     */
    $('#login').click(doSubmit = function () {
        var username = $('#username').val(),
            password = $('#password').val(),
            captcha = $('#captcha').val();

        if (username == '') {
            layer.msg('请输入用户名！', {icon: 5, shade: [0.3, '#393D49'], time: 1500});
        } else if (password == '') {
            layer.msg('请输入密码！', {icon: 5, shade: [0.3, '#393D49'], time: 1500});
        } 
        // else if (captcha == '') {
        //     layer.msg('请输入验证码！', {icon: 5, shade: [0.3, '#393D49'], time: 1500});
        // } 
        else {
            $('#form_login').submit();
        }
    });

    $('#captcha_img').click(function () {
        
        $('#captcha_img').attr('src', "<?php echo captcha_src(); ?>?id="+Math.random()*1000);
    });

    //回车键提交表单
    function press(e) {
        var currKey = 0, ee = e || event;
        currKey = e.keyCode || e.which || e.charCode;
        var keyName = String.fromCharCode(currKey);
        if (currKey == 13) {
            doSubmit();
        }
    }

    window.onload = function () {
        if ("<?php echo $tip; ?>" != '') {
            layer.msg("<?php echo $tip; ?>", {icon: 5, shade: [0.3, '#393D49'], time: 1500});
        }
    };

</script>
</html>