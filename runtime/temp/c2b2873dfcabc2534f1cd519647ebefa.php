<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\index\course_list.html";i:1540542328;s:79:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\headcss.html";i:1540015743;s:76:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\head.html";i:1540524789;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>资源平台</title>
<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/user.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<!-- <link href="/resource/public/static/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" /> -->
<script type="text/javascript" src="/resource/public/static/js/jquery.SuperSlide.2.1.1.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<script src="/resource/public/static/layui/layui.js"></script>
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
<!-- <style type="text/css">
  @media (max-width: 1500px) {    .layui-fluid { width: 1500px; }.width100{width: 1500px;}}
</style> -->
</head>
<body class="backg_huibai">
<!-- 顶部 -->
<div class="width100 float_l height150" id="heade" style="position: fixed; top:0;left:0;z-index:50;">
  <div class="width100 float_l height80 line_hei80" style="background-color: #fff; opacity:1;box-shadow: 0px 0px 3px #ccc inset;">

        <div class="float_l">
            <div class="float_l margin_l20">
                <img src="/resource/public/static/img/logo.png">
            </div>
            <div class="float_l">
                <ul class="ul_li fon_siz16">
                    <li><a href="<?php echo url('Index/index/index'); ?>">首页</a></li>
                    <li><a href="<?php echo url('Index/index/tab'); ?>">点播</a></li>
                    <li><a href="<?php echo url('Index/live/live'); ?>">直播</a></li>
                    <li><a href="<?php echo url('Index/openclass/openclass'); ?>">公开课</a></li>
                    <li><a href="<?php echo url('Index/notice/notice'); ?>">公告</a></li>
                </ul>
            </div>
        </div>
        
        <div class="float_r">
            <div class="float_l top_input">
                <input class="posi_relative" type="text" name="" id="" placeholder="请输入想搜索的内容...">
                <i class="layui-icon" id="searchicon" style="cursor: pointer;">&#xe615;</i>
            </div>
          
 <div class="float_l margin_l35" id='adminset' style="display: none;">
                <span>
                    <a href="<?php echo url('Index/admin/index'); ?>">
                    <i style="font-size: 22px;margin:10px 20px 10px 20px" class="layui-icon">&#xe716;</i>
                </a>
                </span>
            </div>
<div class="float_l margin_l35 margin_r40" id="loginoff" style="display: none;">
    <span class="loginfont" onclick="login();">登录</span>
</div>
<div class="float_l margin_l30 margin_r40" style="display: none;" id="loginon">
    <a href="<?php echo url('Index/person/mycollect'); ?>" id='userinfomess'>
        <img src="/resource/public/static/img/tx.jpg" style="width: 40px;height: 40px; border-radius: 100%;">
    </a>
    <div class="userinfo userinfo-hoverls" id="userinfoset">
        <div >
            <a href="<?php echo url('Index/person/mycollect'); ?>">
                <img src="/resource/public/static/img/tx.jpg" style="width: 72px;height: 72px;; border-radius: 100%;">
            </a>
            <span class="userinfo-name" id="user_name">大白菜111</span>
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
<script>
var loginframe='<?php echo url("Index/Login/index"); ?>';
layui.use('layer', function(){}); 
//奇葩的问题。
  function login(){
    var w = window.width, h, url = loginframe;
        w='360px';
        h='370px';

        var iframe = layer.open({
            type: 2,
            title: '登录-',
            skin: '',
            area: [w, h],
            content: [url,'no'],
            success: function(layero){
                if(window.ios){
                    $(layero).addClass("scroll-wrapper");//苹果 iframe 滚动条失效解决方式
                }
            },
            maxmin: false,
            full: function() { //点击最大化后的回调函数
                // // console.log(‘这个是点击最大化后的回调函数出发‘);
                $('.layui-layer-iframe').css('overflow','');
            },
            min: function() { //点击最小化后的回调函数
                // console.log(‘这个是点击最小化后的回调函数出发‘);
                $('.layui-layer-iframe').css('overflow','');
            },
            restore: function() { //点击还原后的回调函数
                // console.log(‘这个是点击还原后的回调函数出发‘);
                $('.layui-layer-iframe').css('overflow','');
            },
            // end: function(){ 
            //   //右上角关闭回调，无论是关闭的回调还是登录的回调都会刷新页面
              
            //   //return false 开启该代码可禁止点击该按钮关闭
            //   location.href = "";
            // },
        });
  }
    var token=getCookie('token');
    var username=getCookie('username');
    var auth_level=getCookie('auth_level');
    if(token!=''||username!=''){
        // cookie存在
        $('#user_name').html(username);
        $('#loginoff').attr('style','display:none');
        $('#loginon').attr('style','block');
        if(auth_level>2){
            $('#adminset').attr('style','display:none');
        }else{
            $('#adminset').attr('style','display:block');
        }
    }else{
        $('#loginoff').attr('style','display:block');
    }
</script>
        </div>
  </div>
</div>

<div style="height: 80px;"></div>
<div class="layui-fluid">
	<div class="layui-row">
		<div class="layui-col-md10 layui-col-md-offset1">
			<!-- 搜索框 -->
			<div class="logo-course float_l">
				<img style="width: 140px;height: 60" src="/resource/public/static/img/logo-course.png">
				<img style="width: 96px;height: 60px;" src="/resource/public/static/img/course-top.png">
			</div>
	        <hr style="margin-bottom: 0px;margin-top: 0px;">
	        <div>
	        	<div class="course-type">
	        		<div class="sp">
	        			<span>父级类目:</span>
	        		</div>
	        		<div class="bd">
	        		<ul>
	        			<?php if(is_array($videotype_parent) || $videotype_parent instanceof \think\Collection || $videotype_parent instanceof \think\Paginator): if( count($videotype_parent)==0 ) : echo "" ;else: foreach($videotype_parent as $key=>$vo): ?>
	        			<!-- <a class="ison" href="javascript(0):;">全部</a> -->
	        			<?php if(($vo['is_on'] == 1)): ?>
	                        <li>
		        				<a class="ison" onclick="typeparent(<?php echo $vo['videotype_id']; ?>);"><?php echo $vo['videotype_name']; ?></a>
		        			</li>  
                        <?php else: ?> 
                          <li>
	        					<a onclick="typeparent(<?php echo $vo['videotype_id']; ?>);"><?php echo $vo['videotype_name']; ?></a>
	        				</li>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        		</ul>
	        		</div>
	        	</div>
	        	<hr class="layui-bg-gray" style="margin-bottom: 0px;margin-top: 0px;">
	        	<div class="course-type">
	        		<div class="sp">
	        			<span>子级类目:</span>
	        		</div>
	        		<div class="bd">
	        		<ul>
	        			<?php if(is_array($videotype_son) || $videotype_son instanceof \think\Collection || $videotype_son instanceof \think\Paginator): if( count($videotype_son)==0 ) : echo "" ;else: foreach($videotype_son as $key=>$vo): ?>
	        			<!-- <a class="ison" href="javascript(0):;">全部</a> -->
	        			<?php if(($vo['is_on'] == 1)): ?>
	                        <li>
		        				<a class="ison" onclick="typeson(<?php echo $vo['son_id']; ?>,<?php echo $vo['is_mesh']; ?>);"><?php echo $vo['son_name']; ?></a>
		        			</li>  
                        <?php else: ?> 
                          <li>
	        					<a onclick="typeson(<?php echo $vo['son_id']; ?>,<?php echo $vo['is_mesh']; ?>);"><?php echo $vo['son_name']; ?></a>
	        				</li>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        		</ul>
	        		</div>
	        	</div>
	        	<hr class="layui-bg-gray" style="margin-bottom: 0px;margin-top: 0px;">
	        	<div class="course-type">
	        		<div class="sp">
	        			<span>难度:</span>
	        		</div>
	        		<div class="bd">
	        		<ul>
	        			<?php if(is_array($level) || $level instanceof \think\Collection || $level instanceof \think\Paginator): if( count($level)==0 ) : echo "" ;else: foreach($level as $key=>$vo): if(($vo['is_on'] == 1)): ?>
	                        <li>
		        				<a class="ison"  onclick="typelevel(<?php echo $vo['level_id']; ?>);"><?php echo $vo['level_name']; ?></a>
		        			</li>  
                        <?php else: ?> 
                          <li>
	        					<a onclick="typelevel(<?php echo $vo['level_id']; ?>);"><?php echo $vo['level_name']; ?></a>
	        				</li>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        		</ul>
	        		</div>
	        	</div>
	        </div>
		</div>
	</div>
</div>
<div class="backg_qiangray" style="box-shadow: 0px 1px 3px #ccc inset;">
	<div class="layui-fluid" style="min-height: 360px;">
		<div class="layui-row">
			<div class="layui-col-md10 layui-col-md-offset1 float_l" style="margin-top:32px;">
		<?php if(is_array($video) || $video instanceof \think\Collection || $video instanceof \think\Paginator): if( count($video)==0 ) : echo "" ;else: foreach($video as $key=>$vo): ?>
             <div class="course_block" onclick="link(<?php echo $vo['videotab_id']; ?>);">
                <div>
                  <img class="course_img" src="/resource/<?php echo $vo['videotab_image']; ?>">
                </div>
                <div class="course-card-content"><!--课程内容-->
                  <h3 class="text_c course_h3"><?php echo cutstr($vo['videotab_title'],0,20,'...') ?></h3>
                </div>
              <div class="course-card-bottom">
                <div class="course-card-info">
                  <span class="course-text"> 
                  	<i class="layui-icon">&#xe770;</i>
                  </span>
                  <span class="course-text">
					<?php echo $vo['username']; ?>
                  </span>
                  <span class="course-text">
                    <i class="layui-icon"> &#xe62a;</i>
                     <?php if(($vo['videotab_level'] == 1)): ?>
                        简单
                      <?php elseif($vo['videotab_level'] == 2): ?>
                        一般
                      <?php else: ?> 
                        复杂
                      <?php endif; ?>
                    
                  <span class="course-star-box">
                   <?php for($i=0;$i<(int)$vo['videotab_assessscore'];$i++){ ?>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <?php } ?>
                  </span>
                </div>
                <div style="font-size: 12px;color: #4D555D;padding: 2%">
                	上传时间：<span style="color: #93999F;margin-right: 5px;"><?php echo date('Y-m-d',$vo['videotab_releasetime']) ?></span>
                播放量：<span style="color: #93999F;"><?php echo $vo['videotab_views']; ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; if(!$video){echo "<p class='no-course-helper' style='text-align:center'><span>精彩课程制作中，敬请期待！</span></p>";} ?>
			</div>
			<div class="layui-col-md-offset1 layui-col-md10 text_c" id="test1"><?php if($video){ ?><?php echo $video->render(); } ?></div>
		</div>
	</div>
</div>
<!-- 页脚 -->
<div class="width100 float_l padding_t30 height193">
  <div class="width_1200 margin_auto">
     
        <div class="width100 float_l text_c yejiao color_gray" >
            <a>关于我们</a>
            <a>企业合作</a>
            <a>联系我们</a>
            <a>意见反馈</a>
            <a>友情链接</a>
      </div>
        <div class="width100 float_l text_c border_t margin_t20 padding_t20 color_gray fon_siz12">
          <span>© 2016   京ICP备13042132号</span>
        </div>
    </div>
</div>
</body>
<script>
//分页用tp5中带的render()分页即可
// layui.use('laypage', function(){
//   var laypage = layui.laypage;
  
//   //执行一个laypage实例
//   laypage.render({
//     elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
//     ,count: 50 //数据总数，从服务端得到
//     ,first:'1'
//     ,limit:30
//     ,last:'100'
//     ,jump: function(obj, first){
// 	    //obj包含了当前分页的所有参数，比如：
// 	    console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
// 	    console.log(obj.limit); //得到每页显示的条数
// 	    //首次不执行
// 	    if(!first){
// 	      //do something
// 	    }
// 	}
// });
// });
</script>
<script type="text/javascript">
	  // 课程模块的hover事件
  $('.course_block').hover(function(){

    var div=$(this).children('div');
    div.each(function () {
      // alert($(this).attr('class'));
      if($(this).attr('class')=='course-card-content'){
        $(this).children('h3').attr('style','color:red');
      }
    });
  },
  function(){
    var div=$(this).children('div');
    div.each(function () {
      // alert($(this).attr('class'));
      if($(this).attr('class')=='course-card-content'){
        $(this).children('h3').attr('style','color:#07111B');
      }
    });
  })
  function link($videotab_id){
  	// alert('321');
  	window.location.href='http://localhost/resource/index.php/course_detail?videotab_id='+$videotab_id;
  }
  $('#userinfomess').hover(function(){
    $('#userinfoset').attr('class','userinfo');
	  },
	  function(){})
	$('#userinfoset').hover(function(){

	},function(){
	    $('#userinfoset').attr('class','userinfo userinfo-hoverls');
	  }
	)
	$('#searchicon').hover(function(){
		$('#searchicon').attr('style','font-size:26px;color:#333;cursor: pointer;')
	},
		function(){
			$('#searchicon').attr('style','color:#93999F;cursor: pointer;')
		}
	);
	// //搜索代码
	// function typesearch(){
	// 	var searchkey=$('#searchkey').val();
	// 	var url="<?php echo url('Index/index/course_list'); ?>";
	// 	var videotype_id,search,level_id,is_mesh,son_id;
	// 	if(!getPar('level_id')){
	// 		level_id='0';//获取难度id
	// 	}else{
	// 		level_id=getPar('level_id');
	// 	}
	// 	if(!getPar('videotype_id')){
	// 		videotype_id='0';//获取难度id
	// 	}else{
	// 		videotype_id=getPar('videotype_id');
	// 	}
	// 	if(!getPar('is_mesh')){
	// 		is_mesh='0';//获取是否子类重复
	// 	}else{
	// 		is_mesh=getPar('is_mesh');
	// 	}
	// 	if(!getPar('son_id')){
	// 		son_id='0';//获取是否子类重复
	// 	}else{
	// 		son_id=getPar('son_id');
	// 	}
	// 	url=url+"?videotype_id="+videotype_id+"&level_id="+level_id+"&son_id="+son_id+"&is_mesh="+is_mesh;
	// 	location.href=url;
	// }
	function typeparent(parent_id){
		var url="<?php echo url('Index/index/course_list'); ?>";
		var videotype_id,search,level_id,is_mesh,son_id;
		videotype_id=parent_id;//获取菜单的id,不分父子节点
		if(!getPar('search')){
			search='';//获取搜索关键词
		}else{
			search=getPar('search');
		}
		if(!getPar('level_id')){
			level_id='0';//获取难度id
		}else{
			level_id=getPar('level_id');
		}
		if(!getPar('is_mesh')){
			is_mesh='0';//获取是否子类重复
		}else{
			is_mesh=getPar('is_mesh');
		}
		if(!getPar('son_id')){
			son_id='0';//获取是否子类重复
		}else{
			son_id=getPar('son_id');
		}
		url=url+"?videotype_id="+videotype_id+"&level_id="+level_id+"&son_id="+son_id+"&is_mesh="+is_mesh;
		location.href=url;
	}
	function typeson(son_id,is_mesh){
		var url="<?php echo url('Index/index/course_list'); ?>";
		var videotype_id,search,level_id,is_mesh,son_id;
		if(!getPar('videotype_id')){
			videotype_id='';//获取搜索关键词
		}else{
			videotype_id=getPar('videotype_id');
		}
		if(!getPar('search')){
			search='';//获取搜索关键词
		}else{
			search=getPar('search');
		}
		if(!getPar('level_id')){
			level_id='0';//获取难度id
		}else{
			level_id=getPar('level_id');
		}
		url=url+"?videotype_id="+videotype_id+"&level_id="+level_id+"&son_id="+son_id+"&is_mesh="+is_mesh;
		location.href=url;
	}
	function typelevel(level_id){
		var url="<?php echo url('Index/index/course_list'); ?>";
		var videotype_id,search,level_id,is_mesh,son_id;
		if(!getPar('search')){
			search='';//获取搜索关键词
		}else{
			search=getPar('search');
		}
		if(!getPar('videotype_id')){
			videotype_id='';
		}else{
			videotype_id=getPar('videotype_id');
		}
		if(!getPar('is_mesh')){
			is_mesh='0';//获取是否子类重复
		}else{
			is_mesh=getPar('is_mesh');
		}
		if(!getPar('son_id')){
			son_id='0';//获取是否子类重复
		}else{
			son_id=getPar('son_id');
		}
		url=url+"?videotype_id="+videotype_id+"&level_id="+level_id+"&son_id="+son_id+"&is_mesh="+is_mesh;
		location.href=url;
	}
	function getPar(par){
	    //获取当前URL
	    var local_url = document.location.href; 
	    //获取要取得的get参数位置
	    var get = local_url.indexOf(par +"=");
	    if(get == -1){
	        return false;   
	    }   
	    //截取字符串
	    var get_par = local_url.slice(par.length + get + 1);    
	    //判断截取后的字符串是否还有其他get参数
	    var nextPar = get_par.indexOf("&");
	    if(nextPar != -1){
	        get_par = get_par.slice(0, nextPar);
	    }
	    return get_par;
	}
</script>
<style type="text/css">
.course_block img:hover{
	-webkit-transform:scale(1.1); /*Webkit: Scale up image to 1.2x original size*/
	-moz-transform:scale(1.1); /*Mozilla scale version*/
	-o-transform:scale(1.1); /*Opera scale version*/
	box-shadow:0px 0px 30px gray; /*CSS3 shadow: 30px blurred shadow all around image*/
	-webkit-box-shadow:0px 0px 30px gray; /*Safari shadow version*/
	-moz-box-shadow:0px 0px 30px gray; /*Mozilla shadow version*/
	opacity: 1;

}
.no-course-helper{
	font-size: 24px;
    font-weight: 300;
    color: #93999f;
    line-height: 24px;
}
.course-card-content h3:hover{
  	color: red;
}

</style>
</style>
</html>