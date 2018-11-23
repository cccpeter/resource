<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"D:\phpStudy\PHPTutorial\WWW\resource/application/index\view\index\index.html";i:1540344558;s:79:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\headcss.html";i:1541148116;s:76:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\head.html";i:1542853237;s:81:"D:\phpStudy\PHPTutorial\WWW\resource\application\index\view\common\userlogin.html";i:1540259706;}*/ ?>
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

<div class="list-color"></div>
<div style="height: 80px;"></div>
  <div class="layui-row">
    <div class="layui-col-md-offset2">
      <div class="layui-carousel float_l height500" id="test1" lay-filter="demo" style="border-radius: 1%;box-shadow:0 5px 5px rgba(0, 0, 0, 0.3);position: relative;">
        <div carousel-item style="border-radius: 1%;">
          <div><img src="/resource/public/static/img/1.jpg" style="height: 450px;width: 100%;"></div>
          <div><img src="/resource/public/static/img/0.jpg" style="height: 450px;width: 100%;"></div>
          <div><img src="/resource/public/static/img/1.jpg" style="height: 450px;width: 100%;"></div>
          <div><img src="/resource/public/static/img/0.jpg" style="height: 450px;width: 100%;"></div>
          <div><img src="/resource/public/static/img/1.jpg" style="height: 450px;width: 100%;"></div>
          <div><img src="/resource/public/static/img/0.jpg" style="height: 450px;width: 100%;"></div>
        </div>
      </div>
    </div>
</div>
<!-- 条目中可以是任意内容，如：<img src=""> -->
<div class="layui-row layui-col-md12" >
    <h3 class="text_c " style="margin-bottom: 20px;margin-top: 10px;">
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe67a;</i>
    <em>精</em>／
    <em>选</em>／
    <em>直</em>／
    <em>播</em>／
    <em>课</em>
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe67a;</i>
    
  </h3>
  <!-- <div class="layui-col-md-offset2"> --><div class="layui-col-md2">&nbsp;</div>
      <div class="live-schedule-screen layui-col-md4">
        <img id="course_images_change" class="screen-img layui-col-md12" style="border-radius:2% 0% 0% 2%;" alt="课程封面" title="课程封面" onerror="this.src=&#39;//9.url.cn/edu/edu_modules/edu-ui/img/nohash/img-err2.png&#39;;this.onerror=null;" src="https://10.url.cn/qqcourse_logo_ng/ajNVdqHZLLCdNBr520kvPNGcNy5abHtFGrib57XbXBzJC0erlj61zlYF99iat74wyU4ZlibC630eTY/510">
        <div class="screen-bd" data-taid="2609291416679155">
          </div>
      </div>

      <div class="live-schedule-list layui-col-md4" style="overflow-y: auto;">
      <!-- 拉table做下拉 -->
      <table class="layui-table" row="text"  lay-skin="line" style="background-color: #dedede;margin-top: 0px;margin-bottom: 0px;border: 0px;">
        <tr class="info_tr" data-img="/resource/public/static/img/59b8a486000107fb05400300.jpg" data-title="title">
          <td style="height: 48px;">
            <div class=list-block-n> </div>
            <div class="axis"></div>
            <div class="item-time-point-n"></div>
            <div class="item-time-y" >直播中</div>
            <div class="item-info item-name-y">【齐论】新品如何短时间流量及订单飞涨</div>
        </td>
        </tr>
       
        <tr class="info_tr" data-img="https://10.url.cn/qqcourse_logo_ng/ajNVdqHZLLCdNBr520kvPNGcNy5abHtFGrib57XbXBzJC0erlj61zlYF99iat74wyU4ZlibC630eTY/510" data-title="title">
          <td style="height: 48px;">
           <div class=list-block-n> </div>
            <div class="axis"></div>
            <div class="item-time-point-n"></div>
            <div class="item-time-y" >直播中</div>
            <div class="item-info item-name-y" style="color: #23b8ff">【齐论】新品如何短时间流量及订单飞涨</div>
        </td>
        </tr>
        <tr class="info_tr" data-img="/resource/public/static/img/59b8a486000107fb05400300.jpg" data-title="title">
          <td style="height: 48px;">
            <div class=list-block-n> </div>
            <div class="axis"></div>
            <div class="item-time-point-n"></div>
            <div class="item-time-y" >直播中</div>
            <div class="item-info item-name-y" style="color: #23b8ff">【齐论】新品如何短时间流量及订单飞涨</div>
        </td>
        </tr>
        <tr class="info_tr">
          <td style="height: 48px;">
          <div class=list-block-n> </div>
            <div class="axis"></div>
            <div class="item-time-point-n"></div>
            <div class="item-time" >19:30</div>
            <div class="item-info item-name" >【齐论】新品如何短时间流量及订单飞涨</div>
        </td>
        </tr>
        <tr class="info_tr">
          <td style="height: 48px;">
          <div class=list-block-n> </div>
            <div class="axis"></div>
            <div class="item-time-point-n"></div>
            <div class="item-time" >19:30</div>
            <div class="item-info item-name" >【齐论】新品如何短时间流量及订单飞涨</div>
        </td>
        </tr>
      </table>
      <div class="nano-pane"><div class="nano-slider" style="height: 239px; transform: translate(0px, 109px);"></div></div>
    </div>
  <!-- </div> -->
  <div class="layui-row layui-col-md12 " style="height: 30px;"> </div>
</div>
<div class="layui-row layui-col-md12 backg_qiangray" style="box-shadow: 0px 0px 1px #ccc inset;" >
<!--   <h2 class="text_c" style="margin-bottom: 20px;margin-top: 10px;">精选直播课</h2> -->
  <h3 class="text_c " style="margin-bottom: 20px;margin-top: 10px;">
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i>
    <em>热</em>／
    <em>门</em>／
    <em>视</em>／
    <em>频</em>
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i>
    
  </h3>
    <div class="layui-col-md2">&nbsp;</div>
    <!-- 课程块 -->
    <div class="height500 layui-col-md8 float_l">
      <?php for($i=0;$i<10;$i++){ ?>
      <div class="course_block" >
        <div>
          <img class="course_img" src="/resource/public/static/img/59b8a486000107fb05400300.jpg">
        </div>
        <div class="course-card-content"><!--课程内容-->
          <h3 class="text_c course_h3">全网最热Python3入门+进阶 更快上手实际开发</h3>
        </div>
      <div class="course-card-bottom">
        <div class="course-card-info">
          <span class="course-text">实战</span>
          <span class="course-text">初级</span>
          <span class="course-text">
            <i class="layui-icon">&#xe770;</i>5850</span>
          <span class="course-star-box">
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
          </span>
        </div>
        <div style="font-size: 12px;color: #4D555D;padding: 2%">￥366.00
        </div>
      </div>
    </div>
    <?php } ?>
      

    </div>
     <div class="layui-row layui-col-md12 backg_qiangray" style="height: 30px;"> </div>
</div>
<div class="layui-row layui-col-md12 " style="box-shadow: 0px 0px 1px #ccc inset;" >
<!--   <h2 class="text_c" style="margin-bottom: 20px;margin-top: 10px;">精选直播课</h2> -->
  <h3 class="text_c " style="margin-bottom: 20px;margin-top: 10px;">
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i>
    <em>最</em>／
    <em>新</em>／
    <em>上</em>／
    <em>传</em>
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i>
    
  </h3>
    <div class="layui-col-md2">&nbsp;</div>
    <!-- 课程块 -->
    <div class="height500 layui-col-md8 float_l">
      <?php for($i=0;$i<5;$i++){ ?>
      <div class="course_block" >
        <div >
          <img class="course_img" src="/resource/public/static/img/59b8a486000107fb05400300.jpg">
        </div>
        <div class="course-card-content"><!--课程内容-->
          <h3 class="text_c course_h3">全网最热Python3入门+进阶 更快上手实际开发</h3>
        </div>
      <div class="course-card-bottom">
        <div class="course-card-info">
          <span class="course-text">实战</span>
          <span class="course-text">初级</span>
          <span class="course-text">
            <i class="layui-icon">&#xe770;</i>5850</span>
          <span class="course-star-box">
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
          </span>
        </div>
        <div style="font-size: 12px;color: #4D555D;padding: 2%">￥366.00
        </div>
      </div>
    </div>
    <?php } ?>
      

    </div>
     <div class="layui-row layui-col-md12 " style="height: 30px;"> </div>
</div>
<div class="layui-row layui-col-md12 backg_qiangray" style="box-shadow: 0px 0px 1px #ccc inset;" >
<!--   <h2 class="text_c" style="margin-bottom: 20px;margin-top: 10px;">精选直播课</h2> -->
  <h3 class="text_c " style="margin-bottom: 20px;margin-top: 10px;">
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i>
    <em>公</em>／
    <em>开</em>／
    <em>课</em>
    <i class="layui-icon" style="font-size: 23px;color: #f4757c">&#xe756;</i>
    
  </h3>
<div class="layui-row" style="margin:0px 0px 12px 18px;">
  <div class="layui-col-md-offset2 layui-col-md4" style="padding-left: 25px;"> 
    <div class="layui-row grid-demo " >
      <div class="layui-col-md-offset1 layui-col-md10" style="background: url(/resource/public/static/img/title1.jpg);height: 108px;border-radius: 25px;">
        <h3 class="ellipsis text_c">打开Spring Boot学习的最佳方式<p class="ellipsis1 text_c">直击Spring Boot框架核心，颠覆Java企业应用开发</p></h3>
        
      </div>
    </div>
    
  </div>

  <div class="layui-col-md4" style="padding-left: 25px;" > 
    <div class="layui-row grid-demo " >
      <div class="layui-col-md10" style="background: url(/resource/public/static/img/title2.jpg);height: 108px;border-radius: 16px;">
        <h3 class="ellipsis text_c">打开Spring Boot学习的最佳方式</h3>
        <p class="ellipsis1 text_c">直击Spring Boot框架核心，颠覆Java企业应用开发</p>
      </div>
    </div>
    
  </div>
</div>
    <div class="layui-col-md2">&nbsp;</div>
    <!-- 课程块 -->
    <div class="height500 layui-col-md8 float_l">
      <?php for($i=0;$i<5;$i++){ ?>
      <div class="course_block" >
        <div >
          <img class="course_img" src="/resource/public/static/img/59b8a486000107fb05400300.jpg">
        </div>
        <div class="course-card-content"><!--课程内容-->
          <h3 class="text_c course_h3">全网最热Python3入门+进阶 更快上手实际开发</h3>
        </div>
      <div class="course-card-bottom">
        <div class="course-card-info">
          <span class="course-text">实战</span>
          <span class="course-text">初级</span>
          <span class="course-text">
            <i class="layui-icon">&#xe770;</i>5850</span>
          <span class="course-star-box">
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
            <i class="layui-icon" style="color: #ff9900;font-size: 7px;">&#xe67a;</i>
          </span>
        </div>
        <div style="font-size: 12px;color: #4D555D;padding: 2%">￥366.00
        </div>
      </div>
    </div>
    <?php } ?>
      

    </div>
     <div class="layui-row layui-col-md12 " style="height: 30px;"> </div>
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
<!-- <script src="/resource/public/static/layui/layui.js"></script> -->
<script>
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
layui.use('carousel', function(){
  var carousel = layui.carousel;
  //建造实例
  carousel.render({
    elem: '#test1',
    width: '80%',
    adim:"fade",
    arrow: 'always',
    height:'450px',
    anim:'fade',
  });
});

layui.use('carousel', function(){
 var carousel = layui.carousel;
 // alert(carousel)
//监听轮播切换事件
carousel.on('change(demo)', function(obj){
    // console.log(obj.index); //当前条目的索引
    // console.log(obj.prevIndex); //上一个条目的索引
    // console.log(obj.item); //当前条目的元素对象
    // alert(obj.index);
    if(obj.index=='1'){
      $('.list-color').attr('style','background-image: url("/resource/public/static/img/title1.jpg");height: 100px;opacity: 0.3;filter:blur(180px);top:150px;width: 100%;position: absolute;top: 10px;width: 100%;height: 200px;filter:blur(100px);z-index: -1');
      // alert($('.list-color').attr('style'));
    }else if(obj.index=='2'){
      $('.list-color').attr('style','background-image: url("/resource/public/static/img/title2.jpg");height: 100px;opacity: 0.3;filter:blur(180px);top:150px;width: 100%;position: absolute;top: 10px;width: 100%;height: 200px;filter:blur(100px);z-index: -1');
      // alert($('.list-color').attr('style'));
    }else{
      $('.list-color').attr('style','background-image: url("/resource/public/static/img/0.jpg");height: 100px;opacity: 0.3;filter:blur(180px);top:150px;width: 100%;position: absolute;top: 10px;width: 100%;height: 200px;filter:blur(100px);z-index: -1');
    }
    
  });
});

</script>
<script type="text/javascript">
layui.use('table', function(){
  var table = layui.table;
  table.render({ //其它参数在此省略
    skin: 'line' //行边框风格
    ,even: true //开启隔行背景
    ,size: 'lg' //小尺寸的表格
  }); 
});
//监听行单击事件
$('table tr').hover(function(){
  var img = $(this).attr('data-img');
  var title = $(this).attr('data-title');
  $('#course_images_change').attr('src',img);
  // $('tr .item-time-point-n').attr('class','item-time-point');
  // $(this).attr('class','item-time-point')
  var jj=$(this).children('td').children('div');
  jj.each(function () {
    // alert($(this).attr('class'));
    if($(this).attr('class')=='item-time-point-n'){
      $(this).attr('class','item-time-point');
    }
    if($(this).attr('class')=='list-block-n'){
      $(this).attr('class','list-block-y');
    }
    if($(this).attr('class')=='item-time'){
      $(this).attr('class','item-time-y1');
    }
    
    if($(this).attr('class')=='item-info item-name'){
      $(this).attr('class','item-info item-name-y1');
    }
  });
  // 
},
  function(){
    var jj=$(this).children('td').children('div');
    jj.each(function () {
      if($(this).attr('class')=='item-time-point'){
        $(this).attr('class','item-time-point-n');
      }
      if($(this).attr('class')=='list-block-y'){
        $(this).attr('class','list-block-n');
      }
      if($(this).attr('class')=='item-time-y1'){
        $(this).attr('class','item-time');
      }
      if($(this).attr('class')=='item-info item-name-y1'){
      $(this).attr('class','item-info item-name');
    }
    });
  });
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

.course-card-content h3:hover{
  color: red;
}
</style>
<style type="text/css">
  

  .list-color{
    background-image: url("/resource/public/static/img/title1.jpg");
    height: 100px;
    opacity: 0.3;
    filter:blur(180px);
    top:150px;
    width: 100%;
    position: absolute;
    top: 10px;
    width: 100%;
    height: 200px;
    filter:blur(100px);
    z-index: -1
}

</style>
</body>
</html>