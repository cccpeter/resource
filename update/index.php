<?php 
    header("Content-type=text/html;charset=utf-8");

    if($_POST){
        $username = md5('lt-a'.$_POST['username']);
        $password = md5('pwd-secret'.$_POST['password']);
        if($username=='4117d323424ccf7d701d63c08bf5f46b'&&$password=='78e8a6dfa25e17d430bac227bf0fe122'){
            session_start();
            $_SESSION['debug']=1;
            
            echo '<script>alert("登录成功！");location="update.php"</script>';
        }else{
            echo '<script>alert("账号或密码错误");location=""</script>';
        }
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>update</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />  
</head>
<body >
    <form action="" method="post" >
    <div class="main">
        <div class="mainin">
            <h1 style="font-size: 25px;">update</h1>
            <div class="mainin1">
                <ul style="background-color: #eee;border-radius: 10px;">
                    <li><span>用户名：</span><input name="username" type="text" id="loginName" placeholder="登录名" class="SearchKeyword"></li>
                    <li><span>密码：</span><input type="password" name="password" id="Possword" placeholder="密码"/ class="SearchKeyword2"></li>
                    <li ><button class="tijiao" style="background-color: #E66B1A;border-radius: 10px;">提交</button></li>
                </ul>
            </div>
          
        </div>
    </div>
<div id="POPLoading" class="cssPOPLoading">
    <div style=" height:110px; border-bottom:1px solid #9a9a9a">
        <div class="showMessge"></div>
    </div>
    <div style=" line-height:40px; font-size:14px; letter-spacing:1px;">
        <input type="submit"  value="确定">
    </div>
</div>
</form>

</body>
</html>
