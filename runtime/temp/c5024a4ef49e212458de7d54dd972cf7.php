<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\phpStudy\PHPTutorial\WWW\web/application/admin\view\index\index.html";i:1537162431;}*/ ?>
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
    <link rel="stylesheet" href="/web/public/static/lib/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" href="/web/public/static/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" href="/web/public/static/css/base.css">

    <title>公共服务平台</title>
</head>
<style type="text/css">
.men-thumb-item:hover{
    background-color: rgba(255,255,255,.3);
    border-radius: 18px;
}

.body_bg{
            /*width:100%; */
            background:#3283AC url('/web/public/static/images/indexbg.webp') no-repeat center;
            background-attachment:fixed;
            background-size:100% 100%;
        }
    <?php if($index_show_num == '3'): ?>
    /*3列*/
    #slider-3{
        padding-left: 150px;padding-right: 150px;
    }
    @media (max-width: 992px){
            #slider-3{
                padding-left: 20px;padding-right: 20px;
            }
        }
    @media (max-width: 767px){
            #slider-3{
                padding-left: 0;padding-right: 0;
            }
        }
    <?php endif; if($index_show_num == '2'): ?>
    /*2列*/
    #slider-3{
        padding-left: 300px;padding-right: 300px;
    }
    @media (max-width: 992px){
            #slider-3{
                padding-left: 20px;padding-right: 20px;
            }
        }
    @media (max-width: 767px){
            #slider-3{
                padding-left: 0;padding-right: 0;
            }
        }
    <?php endif; if($index_show_num != '6'): ?>
    /*图片内边距*/
    .men-thumb-item img {
        transition: all 0.5s ease-out 0s;
        padding: 30px 60px 20px;
    }
    .product-men .men-pro-item img{
        border-radius: 70px;
    }
    @media (max-width: 1199px){
            .men-thumb-item img {
                transition: all 0.5s ease-out 0s;
                padding: 20px 30px 0px 30px;
            }
            .product-men .men-pro-item img{
                /*border-radius: 70px;*/
                border-radius: 40px;
            }
        }
    <?php else: ?>
    .men-thumb-item img {
        transition: all 0.5s ease-out 0s;
        padding: 30px 26px 20px;
    }
    .product-men .men-pro-item img{
        border-radius: 40px;
    }
    <?php endif; ?>
    

    .product-men .men-pro-item{
        border-radius: 20px;
    }

   /* <?php if($index_show_num != '6'): ?>
    .product-men .men-pro-item img{
        border-radius: 70px;
        border-radius: 40px;
    }
    <?php else: ?>
    .product-men .men-pro-item img{
        border-radius: 40px;
    }
    <?php endif; ?>*/
    .item-info-product a{
        /*cursor: default;*/
    }

</style>
<body class="body_bg">
<div>
    <div class="headerpanel">
        <div class="logopanel">
            <a href="<?php echo url('admin/Index/index'); ?>" style="color: #09c;font-size: 15px;font-weight: 600;"><?php echo $local_info['name']; ?></a>
        </div>
        <!-- logopanel -->
        <div class="headerbar">
            <div class="header-right">
                <div class="cl" style="margin-top: 20px;">
                    <ul>
                        <li class="dropDown dropDown_hover" style="color: #fff;margin-right: 10px;">
                            <?php echo getUserType(AUTH_LEVEL_NOW,USERNAME); ?>
                        </li>
                        <li class="dropDown dropDown_hover" >
                            <a href="#" class="" style="font-size:1.2em;color: white;">
                                <?php echo USERNAME; ?>
                                <i class="Hui-iconfont">&#xe6d5;</i>
                            </a>
                            <ul class="dropDown-menu pull-right menu radius box-shadow">
                                <li><a href="#" onclick='logout("<?php echo url('admin/Base/Common/logout'); ?>");'>退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" >
    <div id="slider-3" style="padding-top: 90px;">
        <div class="slider">
            <div class="bd2">
                <ul>
                    <li>
                        
                        <?php foreach($nav_info as $v): ?>
                         <div class="<?php if($index_show_num == '6'): ?>col-sm-2<?php endif; if($index_show_num == '2'): ?>col-sm-6<?php endif; if($index_show_num == '3'): ?>col-sm-4<?php endif; if($index_show_num == '4'): ?>col-sm-3<?php endif; ?> col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item" onclick='
                                <?php if($v['open_target'] == '0'): ?>
                                location="<?php if($v['is_external'] == 1): ?><?php echo url('admin/Externallink/external_jump','jid='.$v['id']); else: ?><?php echo url($v['module'].'/'.$v['controller'].'/'.$v['action']); endif; ?>"
                                <?php else: ?>
                                window.open("<?php if($v['is_external'] == 1): ?><?php echo url('admin/Externallink/external_jump','jid='.$v['id']); else: ?><?php echo url($v['module'].'/'.$v['controller'].'/'.$v['action']); endif; ?>")
                                <?php endif; ?>
                                '>

                                    <img src="/web/public/static/images/<?php if($v['is_external'] == 1|| $v['images'] == ""): ?>frendlink.webp<?php else: ?><?php echo $v['images']; endif; ?>" alt="" class="pro-image-front" >
                                    <img src="/web/public/static/images/<?php if($v['is_external'] == 1 || $v['images'] == ""): ?>frendlink.webp<?php else: ?><?php echo $v['images']; endif; ?>" alt="" class="pro-image-back">
                                    <!-- <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php if($v['is_external'] == 1): ?><?php echo url('admin/Externallink/external_jump','jid='.$v['id']); else: ?><?php echo url('admin/'.$v['controller'].'/'.$v['action']); endif; ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="<?php if($v['is_external'] == 1): ?><?php echo url('admin/Externallink/external_jump','jid='.$v['id']); else: ?><?php echo url($v['module'].'/'.$v['controller'].'/'.$v['action']); endif; ?>" class="item_add single-item hvr-outline-out button2"><?php echo $v['title']; ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!-- <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/article.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/article.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Article/article_list'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">信息发布</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/rizhi.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/rizhi.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Logmanage/log_list'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">日志记录</a>
                                </div>
                            </div>
                        </div>
                               
                        <?php if(AUTH_LEVEL_NOW == 1 || AUTH_LEVEL_NOW == 99): ?>
                        <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/file2.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/file2.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Filemanage/file_list'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">文件管理</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; if(AUTH_LEVEL_NOW == 1 || AUTH_LEVEL_NOW == 99): ?>
                        <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    
                                    <img src="/web/public/static/images/sysconfig2.webp" alt="" class="pro-image-front" >
                                    <img src="/web/public/static/images/sysconfig2.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Sysconfig/member_list'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">系统配置</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/shuju.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/shuju.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">远程互动</a>
                                </div>
                            </div>
                        </div>
                        <?php if(AUTH_LEVEL_NOW == '1' || AUTH_LEVEL_NOW == '99'): ?>
                        <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/bp.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/bp.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Frendlink/dzbp_jump'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">电子班牌</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/jw.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/jw.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Frendlink/jwkq_jump'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">考勤系统</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/remote.jpg" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/remote.jpg" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Inspection/remote_list'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">电子巡课</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/frendlink.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/frendlink.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Frendlink/show_frendlink'); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">友情链接</a>
                                </div>
                            </div>
                        </div> -->
                       <!--  <div class="col-sm-3 col-xs-12 product-men">
                            <div class="men-pro-item" style="background-color: #fff">
                                <div class="men-thumb-item">
                                    <img style="" src="/web/public/static/images/sysconfig.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/sysconfig.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="<?php echo url('admin/Control/show_list',['selected'=>'所有设备','state'=>'1']); ?>" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span></span></h4>
                                    <a href="<?php echo url('admin/Control/show_list',['selected'=>'所有设备','state'=>'1']); ?>" class="item_add single-item hvr-outline-out button2">中控设备</a>
                                </div>
                            </div>
                        </div> -->

                        
                       <!--  <div class="col-sm-4 col-xs-12 product-men">
                            <div class="men-pro-item">
                                <div class="men-thumb-item">
                                    <img src="/web/public/static/images/sysconfig.webp" alt="" class="pro-image-front">
                                    <img src="/web/public/static/images/sysconfig.webp" alt="" class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="#" class="link-product-add-cart">点击进入</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><span>软件设置</span></h4>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">设置</a>
                                </div> -->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
           <!--  <div style="position:relative;margin-top: 45px;">
                <ol class="hd cl dots">
                    <li>1</li>
                    <li class="active">2</li>
                    <li>3</li>
                </ol>
            </div> -->
        </div>
    </div>

</div>
</body>
<script type="text/javascript" src="/web/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/web/public/static/lib/layer/layer.js"></script>
<script type="text/javascript" src="/web/public/static/lib/SuperSlide/jquery.SuperSlide.2.1.js"></script>
<script type="text/javascript" src="/web/public/static/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="/web/public/static/js/base.js"></script>
<script>
    $(function () {
        // $("#slider-3 .slider").slide({
        //     mainCell: ".bd2 ul",
        //     titCell: ".hd li",
        //     trigger: "click",
        //     effect: "leftLoop",
        //     autoPlay: false,
        //     delayTime: 700,
        //     interTime: 7000,
        //     pnLoop: false,
        //     titOnClassName: "active"
        // });

        // var i=0,time,sum=0;
        // time = sessionStorage.getItem('time');
        // if(time == '' || time == null){
        //     sessionStorage.setItem('time',0);
        // }
        // setInterval(function(){
        //     i++;
        //     console.log(i);
        //     if (i == 10) {
        //         time = parseInt(sessionStorage.getItem('time'));
        //         if(time == 60){
                    
        //         }

        //         sum = time+i;
        //         sessionStorage.setItem('time',sum);
        //         i = 0;
        //     }
        // }, 1000);




        // clearInterval(time);
        // if(typeof(Worker) !== "undefined") {
        //         // w = new SharedWorker("/web/public/static/js/demo.js");
        //         // // console.log('2222');
        //         // w.onmessage=function(event){
        //         //     console.log(event.data);
        //         // };
        //         // 
        //         // 
        //         console.log('555');

        //         var worker = new SharedWorker("/web/public/static/js/demo.js");
        //         worker.port.addEventListener('message', function(e){
        //             console.log(e.data);
        //         }, false);
        //         worker.port.start();
        //         worker.port.postMessage(1000);
        // }

    });
</script>
</html>