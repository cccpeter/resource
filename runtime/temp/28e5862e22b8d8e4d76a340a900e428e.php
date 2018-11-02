<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\index\video.html";i:1541152296;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>课程</title>
	<script type="text/javascript" src="/resource/public/static/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="/resource/public/static/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/muke.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/layui/css/layui.css">
<link rel="stylesheet" type="text/css" href="/resource/public/static/css/course.css">
<script type="text/javascript" src="/resource/public/static/js/cookie.js"></script>
<style type="text/css">
	@media (max-width: 1500px) {    .layui-col-md12 { width: 1500px; }.width100{width: 1500px;}}
</style>
<script src="/resource/public/static/layui/layui.js"></script>
</head>
<body class="backg_huibai" style="overflow:auto">
<div class="width100 header" style="height: 60px;">
	<div class="layui-fluid">
		<div class="layui-row">
			<div class="layui-col-md12 float_l " >
				<ul>
					<li>
						<a href="<?php echo url('Index/index/course_detail',['videotab_id'=>$video['videotab_id']]); ?>" class="last">
							<i class="layui-icon " style="font-size: 26px;">&#xe65c;</i>
						</a>
					</li>
					<li>
						<em class="videotitle"><?php echo $video['videotab_title']; ?></em>
					</li>
					<li>
						<?php if(($video['is_collect'] == 0)): ?>
				<div id="clickcollect" style="cursor: pointer;" onclick="collectchoose('0',<?php echo $video['video_type']; ?>,<?php echo $video['videotab_id']; ?>);">
					<i id="collect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67b;</i>-收藏-
				</div>
				<?php else: ?>
				<div id="clickcollect" style="cursor: pointer;" onclick="collectchoose('1',<?php echo $video['video_type']; ?>,<?php echo $video['videotab_id']; ?>);">
					<i id="oncollect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67a;</i>-已收藏-
				</div>
				<?php endif; ?>
					</li>
				</ul>
				<ul class="float_r">
					<li>
						<div class="course-top-search float_r" style="margin: 10px 20px 10px 20px;">
				            <div class=" search-area float_l" data-search="top-banner">
				                <input class="search-input" data-suggest-trigger="suggest-trigger" placeholder="搜索感兴趣的内容" type="text" autocomplete="off">
				                
				            </div>
				            <div class="showhide-search float_l" data-show="no"><i class="layui-icon">&#xe615;</i></div>
				        </div>
					</li>
					
					<li>

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
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="width100" style="background-color: #1C1F21;height: 803px;">
	<div class="float_l" style="height: 100%;width: 100%">
		<div class="course-sidebar-layout float_l" style="height: 100%;display: -webkit-flex; align-items: center;z-index: 10000;width:2%;margin-left: 1%;">
			<dl>
				<dd>
					<span class="requ"  onclick="req();"><i class="layui-icon">&#xe609;</i><br>讨论<br></span>
				</dd>
				<dd>
					<span onclick="wnote();"><i class="layui-icon">&#xe642;</i><br>笔记<br></span>
				</dd>
				<dd>
					 <span onclick="wassess();"><i class="layui-icon">&#xe66e;</i><br>评价</span>
				</dd>
			</dl>
		</div>
		<!-- 兼容直播和录播 -->
		<!-- <div id="video" class="float_l" style=" height:100%;  width: 95%;border-radius: 12px;margin-top: 10px;margin-bottom: 10px;">
			<video id="videothis" style="height:783px; width: 100%;background-color: #000000;  " poster="/resource/public/static/img/0.jpg" controls preload="auto"  data-setup="{}">
				<source src="rtmp://live.hkstv.hk.lxdns.com/live/hks" type="rtmp/flv"/>
				<source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
		    	<source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
		    	<source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
		        <p class="vjs-no-js"> To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a> </p>
			</video>
		</div> -->
		
		<div id='request' class="float_l request" style="display:none">
			<div class="quest float_l">提问题</div>
			<div class="close float_r"><i onclick="closereq();" class="layui-icon" style="font-size: 24px;font-color: #93999F">&#x1006;</i></div>
			<p style="height: 24px;"></p>
			<p style="height: 24px;"></p>

			<div ><input class="questtext" type="text" placeholder="请一句话说明你的问题" id="questtitle"></div>
			<div><input class="questtextarea" type="textarea" name="" placeholder="请描述你问题的详情" id="questcontent"></div>
			<p style="height: 24px;"></p>
			<div><a  onclick="subquest(<?php echo $video['videotab_id']; ?>);" class="putqa-submit">提交</a></div>
		</div>
		<div id='note' class="float_l request" style="display:none">
			<div class="quest float_l">记笔记</div>
			<div class="close float_r"><i onclick="closenote();" class="layui-icon" style="font-size: 24px;font-color: #93999F">&#x1006;</i></div>
			<p style="height: 24px;"></p>
			<p style="height: 24px;"></p>
			<div><input class="questtextarea" type="textarea" id="notecontent" name="" placeholder="请记录下你的笔记"></div>
			<p style="height: 24px;"></p>
			<div><a onclick="subnote(<?php echo $video['videotab_id']; ?>);" class="putqa-submit">提交</a></div>
		</div>
		<div id='assess' class="float_l request" style="display:none">
			<div class="quest float_l">评价</div>
			<div class="close float_r"><i onclick="closeassess();" class="layui-icon" style="font-size: 24px;font-color: #93999F">&#x1006;</i></div>
			<p style="height: 24px;"></p>
			<p style="height: 24px;"></p>
			评分：<div id="test1"></div><span id="level" style="font-size:15px;color: #F90;" value=""></span>
			<div><input class="questtextarea" id="assesscontent" type="textarea" name="" placeholder="请写下你的评价"></div>
			<p style="height: 24px;"></p>
			<div><a onclick="subassess(<?php echo $video['videotab_id']; ?>);" class="putqa-submit">提交</a></div>
		</div>
		<div id="video" class="float_l" style=" height:100%;  width: 95%;border-radius: 12px;margin-top: 10px;margin-bottom: 10px;">
			<video id="myPlayer" style="width: 100%;height: 783px;" poster="" controls playsInline webkit-playsinline autoplay controlslist="nodownload">		
				<!-- 如果是点播数据库的路径为：static后的路径 -->
				<!-- 如果是直播数据库的路径为：整个rtmp流的路径 -->
				<?php if(($video['video_type'] == 1)): ?>
			    <source src="/resource/public/static/<?php echo $video['videotab_stream']; ?>" type="video/mp4" />
			    <?php else: ?>
			    <source src="<?php echo $video['videotab_stream']; ?>" type="rtmp/flv" />
			    <?php endif; ?>
			</video>
		</div>
	</div>
</div>
<div class="width100" style="background-color: #fff;box-shadow: 0 4px 8px 0 rgba(28,31,33,.1);height: 68px;z-index: 99">
	<div class="layui-fluid">
		<div class="layui-row">
			<div class="layui-col-md8 layui-col-md-offset3 float_l" >
				<ul id="tab" class="menu">
					<li class="ison">讨论</li>
					<li class="">评价</li>
					<li class="">笔记</li>
				</ul> 
			</div>
		</div>
	</div>
</div>
<div style="height: 7px;width: 100%;"></div>
<div class="width100 backg_qiangray">
	<div id="tab-item" class="layui-row">
		<div class="content layui-col-md-offset3 layui-col-md5" style="display: block;;">
			<?php if(!$discuss){echo "<p class='no-course-helper' style='text-align:center'><span>暂时无讨论！</span></p>";} if(is_array($discuss) || $discuss instanceof \think\Collection || $discuss instanceof \think\Paginator): if( count($discuss)==0 ) : echo "" ;else: foreach($discuss as $key=>$vo): ?>
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
		<div class="content layui-col-md-offset3 layui-col-md5" style="display:none;">
			<div class="evaluation-info">
				<div class="score float_l">综合得分</div>
				<div class="evaluation-score float_l"><?php echo $video['videotab_assessscore']; ?></div>
				<div class="float_l star-box">
					<?php for($i=0;$i<(int)$video['videotab_assessscore'];$i++){ ?>
                    <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
                    <?php } ?>
				</div>
				<div class="peoplenum float_l">评价总人数：</div>
				<span class="nums float_l"><?php echo $video['videotab_assessnums']; ?></span>
				<div class="peoplenum float_l">评价总分：</div>
				<span class="nums float_l"><?php echo $video['videotab_assessnums']*$video['videotab_assessscore']; ?></span>
			</div>
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
		<div class="content layui-col-md-offset3 layui-col-md5" style="display: none">
			<!-- <div class="course-description"> -->
			<?php if(!$note){echo "<p class='no-course-helper' style='text-align:center'><span>暂时无笔记！</span></p>";} if(is_array($note) || $note instanceof \think\Collection || $note instanceof \think\Paginator): if( count($note)==0 ) : echo "" ;else: foreach($note as $key=>$vo): ?>
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
			<!-- </div> -->
		</div>
		
	</div>
</div>

</body>
<div class="width100 height193 padding_t30">
	<div class="layui-row">
		<div class="layui-col-md-offset2 layui-col-md8">
			<div class="text_c" >
	            <a >关于我们</a>
	            <a style="margin-left: 20px;">企业合作</a>
	            <a style="margin-left: 20px;">联系我们</a>
	            <a style="margin-left: 20px;">意见反馈</a>
	            <a style="margin-left: 20px;">友情链接</a>
      		</div>
		</div>
		<div class="layui-col-md-offset2 layui-col-md8">
			<hr>
		</div>
		<div class="layui-col-md-offset2 layui-col-md8 text_c" style="font-size: 12px;color: #93999f;">
			© 2016 京ICP备13042132号
		</div>
	</div>
</div>
<style type="text/css">
	.no-course-helper{
	font-size: 24px;
    font-weight: 300;
    color: #93999f;
    line-height: 24px;
    min-height: 150px;
}
</style>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>  
<script>
	//上报观看视频的时间
 
token=getCookie('token');
if(token){
	url=getRootPath()+"/index.php/Index/person/videolist";
	line=window.location.href;
	var regex=new RegExp("\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}");
	var localip = line.match(regex); 
	$.ajax({
		url:url,
		data:{'token':token,'video_id':<?php echo $video['videotab_id']; ?>},
		type:'post',
		datatype:'json',
		success:function(event){

		}
	});
	
}
setInterval('time1()',5000);
	setInterval('time()',5000);

function time1(){
  token=getCookie('token');
  if(token){
      var videotime=getCookie('videotime');
      if(videotime){
        if(parseInt(videotime)>90){
        //如果viewtime等于120则发请求给服务器
          setCookie('videotime','0','100');
          url=getRootPath()+"/index.php/Index/person/videotime";
          $.ajax({
            url:url,
            data:{'token':token},
            type:'post',
              datatype:'json',
              success:function(event){
                // if(event.status=='1'){
                //  alert('上报成功');
                // }else{
                //  alert('上报失败');
                // }
              }
          })
        }else{
          setCookie('videotime',parseInt(videotime)+5,'100');
        }
      }else{
        setCookie('videotime','0','100');
        // alert('初始化cookie');
      }
    }
}

	// alert(tablist[i].className);onclick为异步监控，先注册后回调。
	// tab选项卡切换，切换的时刻可以做异步处理，防止刷新页面影响视频观看中断
 window.onload = function() {
 	var tablist=$('#tab').children('li');
 	var tabitemlist=$('#tab-item').children('div');
 	for(var i=0;i<tablist.length;i++){
 		tablist[i].index=i;
 		tablist[i].onclick=function(){
 			for(var j=0;j<tabitemlist.length;j++){
 				if(this.index==j){
 					this.className="ison";
 					tabitemlist[j].style.display="block";
 				}else{
 					tablist[j].className="";
 					tabitemlist[j].style.display="none";
 				}
 			}
 		}
 	}
 }

 	// 未收藏的hover事件
function collectchoose(choose,videotype,video_id){
	var token=getCookie('token');
	// alert('token:'+token);
	var url="<?php echo url('Index/person/coursecollect'); ?>";
	var data={};
		data['choose']=choose;
		data['videotype']=videotype;
		data['video_id']=video_id;
		data=JSON.stringify(data);
		// {"token":"96bebf18c3a102c494f1e8f8a9d471e1","choose":"0","videotype":1,"video_id":4}
		if(token!=''){
			$.ajax({
			    url:url,
			    data:{'data':data,'token':token},
			    type:'post',
			    datatype:'json',
			    success : function(event){
			    	// layer.msg(event.data);
			    	if(choose=='0'){
						$('#clickcollect').html('<i id="oncollect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67a;</i>-已收藏-');
						$('#clickcollect').attr('onclick','collectchoose(1,'+videotype+','+video_id+')');
						layer.msg('收藏成功');
					}else if(choose=='1'){
						$('#clickcollect').html('<i id="collect" class="layui-icon" style="font-size: 25px;margin-left: 50px;">&#xe67b;</i>-收藏-');
						$('#clickcollect').attr('onclick','collectchoose(0,'+videotype+','+video_id+')');
						layer.msg('取消收藏成功');
					}
			    }
			});
		}else{
			layer.msg('收藏失败，您还未登录哦');
		}
	}

	// 讨论列表和我要回答
	var token=getCookie('token');
	function discusscall(discuss_id,title){
		var url="<?php echo url('Index/person/course_answerlist'); ?>";
		url+='?discuss_id='+discuss_id;
		if(token!=''){
			layer.open({
				type: 2, 
				title:title,
				content: url,
				area: ['900px', '600px'],
			}); 
		}else{
			layer.msg('您还未登录');
		}
	}
	function answer(discuss_id,title){
		var url="<?php echo url('Index/person/course_answer'); ?>";
		url+='?discuss_id='+discuss_id;
		if(token!=''){
			layer.open({
				type:2,
				title:title,
				content:url,
				width:"500px",
				area: ['700px', '500px'],
			});
		}else{
			layer.msg('您还未登录');
		}

	}
	/**
	 * 提交讨论的表单
	 * @param  {[type]} video_id [description]
	 * @return {[type]}          [description]
	 */
	function subquest(video_id){
		var token=getCookie('token');
		var title=$('#questtitle').val();
		var content=$('#questcontent').val();
		var data={};
		var url="<?php echo url('Index/person/subquest'); ?>";
		if(title==''||content==''){
			layer.msg('请补充完整问题', {icon: 5});
			return false;
		}
		if(token!=''){
			data['title']=title;
			data['content']=content;
			data['video_id']=video_id;
			data['video_type']="<?php echo $video['video_type']; ?>";
			data=JSON.stringify(data);
			$.ajax({
				url:url,
			    data:{'data':data,'token':token},
			    type:'post',
			    datatype:'json',
			    success:function(event){
			    	if(event.status=='1'){
			    		layer.msg('提交成功',{icon:6});
			    	}else{
			    		layer.msg('提交失败，你的网络异常',{icon:6});
			    	}
			    }
			});

		}else{
			layer.msg('您还未登录哦，请先登录', {icon: 5});
		}
	}
	/**
	 * 提交笔记的内容
	 */
	function subnote(video_id){
		var token=getCookie('token');
		var content=$('#notecontent').val();
		data={};
		var url="<?php echo url('Index/person/subnote'); ?>";
		if(content==''){
			layer.msg('请补充笔记的内容');
			return false;
		}
		if(token!=''){
			data['content']=content;
			data['video_id']=video_id;
			data['video_type']="<?php echo $video['video_type']; ?>";
			data=JSON.stringify(data);
			$.ajax({
				url:url,
				data:{'data':data,'token':token},
				type:'post',
				datatype:'json',
				success:function(event){
					if(event.status=='1'){
						layer.msg('操作成功',{icon:6});
					}else{
						layer.msg('操作失败',{icon:5});
					}
				}
			});
		}else{
			layer.msg('您还未登录哦，请先登录');
		}
	}
	function subassess(video_id){
		var token=getCookie('token');
		var content=$('#assesscontent').val();
		var level=$('#level').val();
		data={};
		var url="<?php echo url('Index/person/subassess'); ?>";
		if(content==''||level==''){
			layer.msg('请补充评价的内容');
			return false;
		}
		if(token!=''){
			data['content']=content;
			data['level']=level;
			data['video_id']=video_id;
			data['video_type']="<?php echo $video['video_type']; ?>";
			data=JSON.stringify(data);
			$.ajax({
				url:url,
				data:{'data':data,'token':token},
				type:'post',
				datatype:'json',
				success:function(event){
					if(event.status=='1'){
						layer.msg('操作成功',{icon:6});
					}else{
						layer.msg('您已经评价过了，请勿重复评价',{icon:5});
					}
				}
			});
		}else{
			layer.msg('您还未登录哦，请先登录');
		}
	}
</script>
<script type="text/javascript">//讨论的弹出框
	layui.use('rate', function(){
	    var rate = layui.rate;
	    //渲染
	    var ins1 = rate.render({
	    	elem: '#test1'  //绑定元素
	    	,choose: function(value){
	    		var n=parseInt(value);
	    		switch(n)
	    		{
	    			case 1: 
	    				$('#level').html('一般');
	    				$('#level').val('1');
	    				break;
	    			case 2: 
	    				$('#level').html('良好');
	    				$('#level').val('2');
	    				break;
	    			case 3: 
	    				$('#level').html('推荐');
	    				$('#level').val('3');
	    				break;
	    			case 4: 
	    				$('#level').html('优秀');
	    				$('#level').val('4');
	    				break;
	    			case 5: 
	    				$('#level').html('精品');
	    				$('#level').val('5');
	    				break;
	    		}
			}
	    });
	  });
	function closereq(){
		var reqstatus=$('#request').attr('style');
		$('#request').attr('style','display:none');
		$('#video').attr('style','width:95%');
		$('embed').attr('style','width:100%');
	}
	function closenote(){
		var note=$('#note').attr('style');
		$('#note').attr('style','display:none');
		$('#video').attr('style','width:95%');
	}
	function closeassess(){
		var reqstatus=$('#assess').attr('style');
		$('#assess').attr('style','display:none');
		$('#video').attr('style','width:95%');
		$('embed').attr('style','width:100%');
	}
	function req(){
		var reqstatus=$('#request').attr('style');
		// alert(reqstatus);
		if(reqstatus=='display:block'){
			$('#request').attr('style','display:none');
			$('#video').attr('style','width:95%');
		}else{
			$('#request').attr('style','display:block');
			$('#note').attr('style','display:none');
			$('#assess').attr('style','display:none');
			$('#video').attr('style','width:77%');
			$('embed').attr('style','width:100%');
		}
		
	}
	
	function wnote(){
		var note=$('#note').attr('style');
		// alert(reqstatus);
		if(note=='display:block'){
			$('#note').attr('style','display:none');
			$('#video').attr('style','width:95%');
		}else{
			$('#note').attr('style','display:block');
			$('#assess').attr('style','display:none');
			$('#request').attr('style','display:none');
			$('#video').attr('style','width:77%');
			$('embed').attr('style','width:100%');
		}
	}
	function wassess(){
		var assess=$('#assess').attr('style');
		// alert(reqstatus);
		if(assess=='display:block'){
			$('#assess').attr('style','display:none');
			$('#video').attr('style','width:95%');
		}else{
			$('#assess').attr('style','display:block');
			$('#note').attr('style','display:none');
			$('#request').attr('style','display:none');
			$('#video').attr('style','width:77%');
			$('embed').attr('style','width:100%');
		}
	}
	$('#userinfomess').hover(function(){
	    $('#userinfoset').attr('class','userinfo');
	  },
	  function(){
	    // $('#userinfoset').attr('class','userinfo userinfo-hoverls');
	  })
	$('#userinfoset').hover(function(){

	},function(){
	    $('#userinfoset').attr('class','userinfo userinfo-hoverls');
	  }
	)
	//视频播放速度<button onclick="getPlaySpeed()" type="button">获取</button><button onclick="setPlaySpeed()">设置</button>
	// var video1 = document.getElementById("videothis");
	// function getPlaySpeed() {
 //         alert(video1.playbackRate);//获取视频/音频的播放速度
 //    }
 //      function setPlaySpeed() {
 //         video1.playbackRate=5;//设置视频/音频的播放速度
 //    }
</script>
<!-- video.js -->
<!-- <script src="/resource/public/static/lib/video/js/video.min.js"></script> 
<script src="/resource/public/static/lib/video/js/zh-CN.js"></script>
<script type="text/javascript">
		var myPlayer = videojs('videothis');
		videojs("videothis").ready(function(){
			var myPlayer = this;
			myPlayer.play();
		});
		  
</script>  -->
<!-- 窗口改变的事件触发 -->
<script type="text/javascript" src="/resource/public/static/lib/ckplayer1/ezuikit.js"></script>
<script type="text/javascript" src="/resource/public/static/lib/ckplayer1/hls.js"></script>
<script type="text/javascript" src="/resource/public/static/lib/ckplayer1/jsmpeg.min.js"></script>
<script type="text/javascript">
	window.onresize = function(){
		$('embed').attr('style','width:100%');
	}

    var player = new EZUIPlayer('myPlayer');
    $('#myPlayer').bind('contextmenu',function() { return false; });
    player.on('error', function(){
        console.log('error');
    });
    player.on('play', function(){
        console.log('play');
    });
    player.on('pause', function(){
        console.log('pause');
    });
  //    function closelights(){
  //    	alert('关灯');
  //    	// $('.header').attr('style','background-color:#999');
  //    	// $('.search-area').attr('style','background-color:#999');
 	// }
  //    function openlights(){alert('开灯')}
</script>

</html>