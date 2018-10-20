<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:76:"D:\phpStudy\PHPTutorial\WWW\web/application/student\view\resource\index.html";i:1537172537;s:77:"D:\phpStudy\PHPTutorial\WWW\web\application\student\view\common\head_css.html";i:1535416609;s:73:"D:\phpStudy\PHPTutorial\WWW\web\application\student\view\common\head.html";i:1537165607;s:79:"D:\phpStudy\PHPTutorial\WWW\web\application\student\view\common\second_nav.html";i:1536889520;s:75:"D:\phpStudy\PHPTutorial\WWW\web\application\student\view\common\footer.html";i:1535416743;}*/ ?>
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
    <link rel="stylesheet" href="/web/public/static/lib/icheck/skins/square/blue.css"/>
    <link rel="stylesheet" href="/web/public/static/lib/icheck/skins/square/green.css"/>

<link rel="stylesheet" href="/web/public/static/lib/icheck/skins/flat/blue.css"/>
    <title><?php echo (isset($title) && ($title !== '')?$title:'公共服务平台'); ?></title>
</head>
<style type="text/css">
    td {
        font-size: 14px;
        font-weight: 500;
        color: #696c74;
    }
    th{
        font-size: 14px;
    }
    #table{
        border-radius: 10px;
        overflow:hidden;
    }
</style>
<body>
<!--头部-->
<style>
    /*侧栏格式化*/
    body, html {
        height: 100%;
        width: 100%;
        margin: 0px;
        background: #E2E2E2;
        /*background: #222D32;*/
    }

    /* Tooltip 容器 */
    .tooltip {
        white-space:nowrap; /*侧栏提示框不换行*/
        display: inline-block;
        font-size: 1.1em;
    }
    .nav_active{
        border-left: 2px solid #00FFFF;background-color:rgba(0,0,0,.3);
    }
</style>
<script type="text/javascript" src="/web/public/static/js/jquery.min.js"></script>
<script type="text/javascript">
    function link(){
        var url="<?php echo url('admin/Index/index'); ?>";
         location.href =url;
    }
</script>
<!--头部-->
<div >
    <div class="headerpanel" >
        <div class="logopanel" >
            <a href="<?php echo url('admin/Index/index'); ?>"><?php echo $local_info['name']; ?></a>
        </div>
        <!-- logopanel -->
        <div class="headerbar">
            <div class="header-right">
                <div class="cl" style="margin-top: 20px;">
                    <ul>
                        <li class="dropDown dropDown_hover" style="color: #fff;margin-right : 10px;">
                            <?php echo getUserType(AUTH_LEVEL_NOW,USERNAME); ?>
                        </li>
                        <li class="dropDown dropDown_hover" style="">
                            <a href="#" class="" style="font-size:1.2em;color: #fff;">
                                <?php echo USERNAME; ?>
                                <i class="Hui-iconfont">&#xe6d5;</i>
                            </a>
                            <ul class="dropDown-menu pull-right menu radius box-shadow">
                                <li><a href="#" onclick='logout("<?php echo url('Base/Common/logout'); ?>");'>退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--侧栏-->
<div class="nav-lta nav-lta-mini" id="nav_id" style="z-index: 100;position: absolute;">
    <ul style="padding-top: 62px;">
        <li class="nav-lta-item" id="nav-control">
            <a id="menuToggle" class="menutoggle" style="cursor: pointer;" onclick='link();'>
                <i class="Hui-iconfont Hui-iconfont-menu" style="font-size: 1.5em;color: gray;"></i>
            </a>
        </li>
        <?php if(session('api_auth', '', 'base_') == ''): foreach($nav_info as $v): ?>
         <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == $v['controller']): ?>nav_active<?php endif; ?>">
            <a href="<?php if($v['is_external'] == 1): ?><?php echo url('admin/Externallink/external_jump','jid='.$v['id']); else: ?><?php echo url($v['module'].'/'.$v['controller'].'/'.$v['action']); endif; ?>" data-toggle="tooltip" data-placement="right" title="" target="<?php if($v['open_target'] != '0'): ?>_blank<?php endif; ?>">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;"><?php if($v['nav_pic'] != ''): ?><?php echo $v['nav_pic']; else: ?>&#xe66b;<?php endif; ?></i>
                <span><?php echo $v['title']; ?></span>
            </a>
        </li>
        <?php endforeach; ?>
        <!-- <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == 'Serverinfo'): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url('admin/serverinfo/index'); ?>" data-toggle="tooltip" data-placement="right" title="服务器信息" style="">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;">&#xe62e;</i>
                <span>服务器信息</span>
            </a>
        </li> -->
        <?php else: ?>
        
        <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == $api_info['controller']): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url($api_info['module'].'/'.$api_info['controller'].'/'.$api_info['action']); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $api_info['title']; ?>" >
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;"><?php if($api_info['nav_pic'] != ''): ?><?php echo $api_info['nav_pic']; else: ?>&#xe66b;<?php endif; ?></i>
                <span><?php echo $api_info['title']; ?></span>
            </a>
        </li>
        
        <?php endif; ?>

        
        
       <!--  <?php if(AUTH_LEVEL_NOW != 98): ?>
        <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == 'Article'): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url('admin/article/article_list'); ?>" data-toggle="tooltip" data-placement="right" title="发布规则" style="">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;">&#xe692;</i>
                <span>发布规则</span>
            </a>
        </li>

        <?php if(session('username', '', 'base_') != \think\Config::get('conf.xxfb')): ?>

        <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == 'Logmanage'): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url('admin/Logmanage/log_list'); ?>" data-toggle="tooltip" data-placement="right" title="日志管理" style="">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;">&#xe623;</i>
                <span>日志管理</span>
            </a>
        </li>
        <?php if(AUTH_LEVEL_NOW == 99 || AUTH_LEVEL_NOW == 1): ?>
        <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == 'Filemanage'): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url('admin/Filemanage/file_list'); ?>" data-toggle="tooltip" data-placement="right" title="文件管理" style="">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;">&#xe63e;</i>
                <span>文件管理</span>
            </a>
        </li>
        <?php endif; endif; endif; if(session('username', '', 'base_') != \think\Config::get('conf.xxfb')): if(AUTH_LEVEL_NOW == 1 || AUTH_LEVEL_NOW == 99): ?>
        <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == 'Sysconfig'): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url('admin/Sysconfig/member_list'); ?>" data-toggle="tooltip" data-placement="right" title="系统配置">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;">&#xe61d;</i>
                <span>系统配置</span>
            </a>
        </li>

        <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == 'Inspection'): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url('admin/inspection/remote_list'); ?>" data-toggle="tooltip" data-placement="right" title="电子巡课">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;">&#xe727;</i>
                <span>电子巡课</span>
            </a>
        </li>
        <?php endif; endif; if(session('username', '', 'base_') != \think\Config::get('conf.xxfb')): ?>
        <li class="nav-lta-item <?php if(\think\Request::instance()->controller() == 'Serverinfo'): ?>nav_active<?php endif; ?>">
            <a href="<?php echo url('admin/serverinfo/index'); ?>" data-toggle="tooltip" data-placement="right" title="服务器信息" style="">
                <i class="Hui-iconfont" style="display: inline;float: left;font-size: 1.2em;">&#xe62e;</i>
                <span>服务器信息</span>
            </a>
        </li>
        <?php endif; ?> -->
       
        
        
    </ul>
</div>


<!--主体-->
<div class="page-content text-nowrap">
    <section class="Hui-article-box" style="margin-top: 20px;">
        <nav class="breadcrumb">
            <i class="Hui-iconfont"></i>
            <?php if(session('back_api_url', '', 'base_')): ?>
            <a href="<?php echo session('back_api_url', '', 'base_'); ?>" class="maincolor">首页</a>
            <?php else: ?>
            <a href="#" onclick='redirect_self("<?php echo url('admin/Index/index'); ?>")' class="maincolor">首页<?php echo session('back_api_url', '', 'base_'); ?></a>
            <?php endif; ?>
            <span class="c-999 en">&gt;</span>
            <span class="c-666">权限管理</span>
            <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
               href="javascript:location.replace(location.href);" title="刷新">
                <i class="Hui-iconfont">&#xe68f;</i>
            </a>
        </nav>

        <div class="Hui-article" style="background-color: <?php echo BG_COLOR; ?>;">
            <article class="cl" style="height: 100%; background-color: <?php echo BG_COLOR; ?>;">
                <table class="table" style="height: 100%;">
                    <tr>
                        <style>
    /* nav */
/*.nav-second{height: 100%;background: #f5f5ff;}
.nav-second a{display: block;overflow: hidden;line-height: 46px;max-height: 46px;color: #000050;text-align: center;}
.nav-second-item>a:hover{color: #FFF;background:rgba(0,0,0,.3);}*/



.nav-second{height: 100%;background: #eee;}
.nav-second a{display: block;overflow: hidden;line-height: 46px;max-height: 46px;color: #696c7f;
    /*text-align: center;*/
    font-weight: normal;font-size: 14px;}
/*控制列表二级菜单*/
.nav-second-item ul{
    /*display: none;*/
    /*background: #fff;*/
    text-align: left;
    text-indent: 28px;
}
.nav-second-item ul a{
    height: 30px;
    line-height: 30px;
}
.nav-second-item.nav-second-show ul{display: block;}
.nav-second .nav-second-icon{font-size: 20px;position: absolute;margin-left:-1px;}
/* 此处修改导航图标 可自定义iconfont 替换*/
/*.icon_1::after{content: "\e62b";}
.icon_2::after{content: "\e669";}
.icon_3::after{content: "\e61d";}*/
/*---------------------*/
/*.nav-second-more{float:right;margin-right: 20px;font-size: 12px;transition: transform .3s;}*/
/* 此处为导航右侧箭头 如果自定义iconfont 也需要替换*/
.nav-second-item>a:hover{color: blue;
    /*font-weight: bold;*/
    /*background:rgba(0,0,0,.3);*/
}
/*左侧激活时样式*/
.active-nav-sec{color: #fff!important;background:rgba(0,0,0,.3);border-radius: 5px;}

/*左侧控制发布列表指向时样式*/
.nav-second-item ul a:hover{
    color: #226DDD;
    font-weight: bold;

}
/*左侧控制发布列表选中时样式*/
.dev_select{
    color: green!important;
    font-weight: bold!important;

}
</style>
    <td style="width: 9%; border-right: 2px solid #F5F5F5;padding: 0;height: 100%">
        <div class="nav-second">
            <div class="nav-second-top">
                <div id="mini" style="border-bottom:1px solid rgba(255,255,255,.1);margin-bottom: 20px;"></div>
            </div>
            <ul >
                <!-- 规则发布 -->
                <?php if(\think\Request::instance()->controller() == 'Article'): ?>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/article/article_list'); ?>" class="<?php if(\think\Request::instance()->action() == 'article_list'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;发布规则列表&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/article/article_control','state_net=01'); ?>" class="<?php if(\think\Request::instance()->action() == 'article_control'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;设备控制列表&ensp;<i class="Hui-iconfont">&#xe6d5;</i>&ensp;</a>
                    <?php if(\think\Request::instance()->action() == 'article_control'): ?>
                    <ul style="width: 200px;">
                        <li id="all_dev_nav"><a class="<?php if(\think\Request::instance()->get('selected') == ''): ?>dev_select<?php endif; ?>" href="<?php echo url('admin/article/article_control','state_net=al'); ?>"><?php if(\think\Request::instance()->get('selected') == ''): ?><i class="Hui-iconfont">&#xe67a;</i><?php endif; ?>所有设备 (<?php echo $device_count_online; ?>/<?php echo $device_count_sum; ?>)</a></li>
                    </ul>
                    <ul id="dev_nav_info" class="">
                        <?php foreach($addr_select as $v): ?>
                            <li><a class="<?php if(\think\Request::instance()->get('selected') == $v['addr_all']): ?>dev_select<?php endif; ?>" href='<?php echo url("admin/Article/article_control","$url_get&state_net=01&selected=".urlencode($v['addr'])); ?>' data-title="<?php echo $v['addr']; ?>" ><?php if(\think\Request::instance()->get('selected') ==  $v['addr_all']): ?><i class="Hui-iconfont">&#xe67a;</i><?php endif; ?><?php echo $v['addr']; ?> (<?php echo $v['online']; ?>/<?php echo $v['sum']; ?>)</a></li>
                         <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </li>
                
                <?php endif; ?>
                <!-- 配置修改 -->
                <?php if(\think\Request::instance()->controller() == 'Sysconfig'): ?>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/member_list'); ?>" class="<?php if(\think\Request::instance()->action() == 'member_list'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;权限管理&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/sys_time'); ?>" class="<?php if(\think\Request::instance()->action() == 'sys_time'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;系统时间&ensp;&ensp;</a>
                </li>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/system_edit'); ?>" class="<?php if(\think\Request::instance()->action() == 'system_edit'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;系统操作&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/net_learn'); ?>" class="<?php if(\think\Request::instance()->action() == 'net_learn' || \think\Request::instance()->action() == 'sp_control_learn' || \think\Request::instance()->action() == 'threshold_check'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;终端配置&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/description_files'); ?>" class="<?php if(\think\Request::instance()->action() == 'description_files'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;产品说明书&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/local_terminal_edit'); ?>" class="<?php if(\think\Request::instance()->action() == 'local_terminal_edit'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;服务器配置&ensp;&ensp;</a>
                </li>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/rtmp_agent_server_list','type=3'); ?>" class="<?php if(\think\Request::instance()->action() == 'rtmp_agent_server_list'&& \think\Request::instance()->param('type') == '3'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;远程服务器&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/index_edit'); ?>" class="<?php if(\think\Request::instance()->action() == 'index_edit'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;首页列表设置&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/rtmp_server_edit',['type'=>'1','sid'=>'1']); ?>" class="<?php if(\think\Request::instance()->action() == 'rtmp_server_edit' && \think\Request::instance()->param('type') == '1'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;RTMP主服务器&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/rtmp_agent_server_list','type=2'); ?>" class="<?php if(\think\Request::instance()->action() == 'rtmp_agent_server_list'&& \think\Request::instance()->param('type') == '2'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;RTMP代理服务器&ensp;&ensp;</a>
                </li>
                

                <?php endif; ?>
                <!-- 日志管理 -->
                <?php if(\think\Request::instance()->controller() == 'Logmanage'): ?>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Logmanage/log_list'); ?>" class="<?php if(\think\Request::instance()->action() == 'log_list'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;日志管理&ensp;&ensp;</a>
                </li>
                <?php endif; ?>
                <!-- 文件管理 -->
                <?php if(\think\Request::instance()->controller() == 'Filemanage'): ?>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/filemanage/file_list'); ?>" class="<?php echo \think\Request::instance()->action()=='file_list'?'active-nav-sec':''; ?>">&ensp;&ensp;文件管理&ensp;&ensp;</a>
                </li>
                <?php endif; ?>
                
                
                <!-- 远程巡视 -->
                <?php if(\think\Request::instance()->controller() == 'Inspection'): ?>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Inspection/remote_list'); ?>" class="<?php echo \think\Request::instance()->action()=='remote_list'?'active-nav-sec':''; ?>">&ensp;&ensp;巡视列表&ensp;&ensp;</a>
                </li>
                <?php endif; ?>

                <!-- debug -->
                <?php if(\think\Request::instance()->controller() == 'Debug'): ?>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/aid_reset'); ?>" class="<?php if(\think\Request::instance()->action() == 'aid_reset'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;重置AID&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/db_change'); ?>" class="<?php if(\think\Request::instance()->action() == 'db_change'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;数据库切换&ensp;&ensp;</a>
                </li>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/dev_reset'); ?>" class="<?php if(\think\Request::instance()->action() == 'dev_reset'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;恢复出厂设置&ensp;&ensp;</a>
                </li>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/index_colnum'); ?>" class="<?php if(\think\Request::instance()->action() == 'index_colnum'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;设置首页显示&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/pwd_reset'); ?>" class="<?php if(\think\Request::instance()->action() == 'pwd_reset'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;admin密码重置&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/description_files_manage'); ?>" class="<?php if(\think\Request::instance()->action() == 'description_files_manage'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;产品说明书管理&ensp;&ensp;</a>
                </li>
                 <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/qrcode'); ?>" class="<?php if(\think\Request::instance()->action() == 'qrcode'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;生成APP下载二维码&ensp;&ensp;</a>
                </li>
                <?php endif; ?>
                <!-- 数据分析 -->
                <?php if(\think\Request::instance()->controller() == 'Dataanalysis'): ?>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Dataanalysis/show_analysis_energy'); ?>" class="<?php echo \think\Request::instance()->action()=='show_analysis_energy'?'active-nav-sec':''; ?>">&ensp;&ensp;功耗数据分析&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Dataanalysis/show_analysis'); ?>" class="<?php echo \think\Request::instance()->action()=='show_analysis'?'active-nav-sec':''; ?>">&ensp;&ensp;报修数据分析&ensp;&ensp;</a>
                </li>
                <?php endif; ?>
                <!-- 直播平台 -->
                <?php if(\think\Request::instance()->controller() == 'Live'): ?>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Live/article_list'); ?>" class="<?php echo \think\Request::instance()->action()=='article_list'?'active-nav-sec':''; ?>">&ensp;&ensp;直播规则列表&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Live/article_control','state_net=01'); ?>" class="<?php echo \think\Request::instance()->action()=='article_control'?'active-nav-sec':''; ?>">&ensp;&ensp;设备控制列表&ensp;&ensp;</a>
                    <?php if(\think\Request::instance()->action() == 'article_control'): ?>
                    <ul style="width: 200px;">
                        <li id="all_dev_nav"><a class="<?php if(\think\Request::instance()->get('selected') == ''): ?>dev_select<?php endif; ?>" href="<?php echo url('admin/Live/article_control','state_net=al'); ?>"><?php if(\think\Request::instance()->get('selected') == ''): ?><i class="Hui-iconfont">&#xe67a;</i><?php endif; ?>所有设备 (<?php echo $device_count_online; ?>/<?php echo $device_count_sum; ?>)</a></li>
                    </ul>
                    <ul id="dev_nav_info" class="">
                        <?php foreach($addr_select as $v): ?>
                            <li><a class="<?php if(\think\Request::instance()->get('selected') == $v['addr_all']): ?>dev_select<?php endif; ?>" href='<?php echo url("admin/Live/article_control","$url_get&state_net=01&selected=".urlencode($v['addr'])); ?>' data-title="<?php echo $v['addr']; ?>" ><?php if(\think\Request::instance()->get('selected') ==  $v['addr_all']): ?><i class="Hui-iconfont">&#xe67a;</i><?php endif; ?><?php echo $v['addr']; ?> (<?php echo $v['online']; ?>/<?php echo $v['sum']; ?>)</a></li>
                         <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endif; ?>
                <!-- 54564 -->

               <!--  <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/article/article_list'); ?>" class="<?php if(\think\Request::instance()->action() == 'article_list'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;发布列表&ensp;&ensp;</a>
                </li>
            
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Article/article_add',['type'=>'1','file_type'=>'1']); ?>" class="<?php if(\think\Request::instance()->action() == 'article_add'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;信息发布&ensp;&ensp;</a>
                </li>

               <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/article/article_control','state_net=al'); ?>" class="<?php if(\think\Request::instance()->action() == 'article_control'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;控制列表&ensp;<i class="Hui-iconfont">&#xe6d5;</i>&ensp;</a>
               
                    <ul class="">
                        <li><a class="<?php if(\think\Request::instance()->get('selected') == ''): ?>dev_select<?php endif; ?>" href="<?php echo url('admin/article/article_control','state_net=al'); ?>"><?php if(\think\Request::instance()->get('selected') == ''): ?><i class="Hui-iconfont">&#xe67a;</i><?php endif; ?>所有设备</a></li>
                    </ul>
                    
                </li>

                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Member/member_list'); ?>" class="<?php if(\think\Request::instance()->action() == 'member_list'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;权限管理&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/sys_time'); ?>" class="<?php if(\think\Request::instance()->action() == 'sys_time'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;系统时间&ensp;&ensp;</a>
                </li>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/system_edit'); ?>" class="<?php if(\think\Request::instance()->action() == 'system_edit'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;系统操作&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysdebug/net_learn'); ?>" class="<?php if(\think\Request::instance()->controller() == 'Sysdebug'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;终端配置&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/local_terminal_edit'); ?>" class="<?php if(\think\Request::instance()->action() == 'local_terminal_edit'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;服务器配置&ensp;&ensp;</a>
                </li>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/rtmp_agent_server_list','type=3'); ?>" class="<?php if(\think\Request::instance()->action() == 'rtmp_agent_server_list'&& \think\Request::instance()->param('type') == '3'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;远程服务器&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/rtmp_server_edit',['type'=>'1','sid'=>'1']); ?>" class="<?php if(\think\Request::instance()->action() == 'rtmp_server_edit' && \think\Request::instance()->param('type') == '1'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;RTMP主服务器&ensp;&ensp;</a>
                </li>
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Sysconfig/rtmp_agent_server_list','type=2'); ?>" class="<?php if(\think\Request::instance()->action() == 'rtmp_agent_server_list'&& \think\Request::instance()->param('type') == '2'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;RTMP代理服务器&ensp;&ensp;</a>
                </li>
           
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Logmanage/log_list'); ?>" class="<?php if(\think\Request::instance()->action() == 'log_list'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;日志管理&ensp;&ensp;</a>
                </li>
          
               
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/filemanage/file_list'); ?>" class="<?php if(\think\Request::instance()->action() == 'file_list'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;文件管理&ensp;&ensp;</a>
                </li>
                
                <li class="nav-second-item" >
                    <a  href="<?php echo url('admin/Debug/index'); ?>" class="<?php if(\think\Request::instance()->action() == 'index'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;Debug&ensp;&ensp;</a>
                </li>
               -->




               <!--  <li class="nav-second-item" >
                        <a  href="" class="<?php if(\think\Request::instance()->action() == '1'): ?>active-nav-sec<?php endif; ?>">&ensp;&ensp;设备信息&ensp;&ensp;</a>
                </li> -->
                 <!--    <li class="nav-second-item">
                        <a href="<?php echo url('admin/Article/article_add',['type'=>'1']); ?>" class="">即时发布</a>
                    </li> -->

               <!--  <li class="nav-second-item nav-second-show">
                    <a href="javascript:;">网站配置><i class="my-icon nav-second-more"></i></a>
                    <ul class="">
                        <li><a href="javascript:;">网站设置</a></li>
                        <li><a href="javascript:;">友情链接</a></li>
                        <li><a href="javascript:;">分类管理</a></li>
                        <li><a href="javascript:;">系统日志</a></li>
                    </ul>
                </li>
                <li class="nav-second-item">
                    <a href="javascript:;">文章管理><i class="my-icon nav-second-more"></i></a>
                    <ul>
                        <li><a href="javascript:;">站内新闻</a></li>
                        <li><a href="javascript:;">站内公告</a></li>
                        <li><a href="javascript:;">登录日志</a></li>
                    </ul>
                </li>
                <li class="nav-second-item">
                    <a href="javascript:;">订单管理><i class="my-icon nav-second-more"></i></a>
                    <ul>
                        <li><a href="javascript:;">订单列表</a></li>
                        <li><a href="javascript:;">打个酱油</a></li>
                        <li><a href="javascript:;">也打酱油</a></li>
                    </ul>
                </li> -->

            </ul>
        </div>

     </td>  

                    
<!-- <script type="text/javascript">
    // nav收缩展开
    $('.nav-second-item>a').on('click',function(){
        if (!$('.nav-second').hasClass('nav-second-mini')) {
            if ($(this).next().css('display') == "none") {
                //展开未展开
                $(this).next('ul').slideDown(1);
                $(this).parent('li').addClass('nav-second-show')
            }else{
                //收缩已展开
                $(this).next('ul').slideUp(1);
            }
        }
    });

</script> -->

                        <td class="va-t">
                            
                            <div class="page-container">
                                <div>
                                <a href="<?php echo url('admin/Sysconfig/member_add'); ?>" class="btn btn-success" style="margin-bottom: 15px;border-radius: 5px;"><i class="Hui-iconfont"></i>新增权限</a>
                                </div>
                                <div style="overflow:auto;">
                                        <table id="table"
                                               class="table table-border table-bordered table-bg table-hover radius table-striped text-nowrap"  style="">
                                            <thead class="text-c">
                                            <tr>
                                                <th style="width: 150px;">编号</th>
                                                <th>用户名</th>
                                                <th>状态</th>
                                                <th>用户类型</th>
                                                <th style="width: 100px;">编辑</th>
                                                <th style="width: 100px;">删除</th>
                                            </tr>
                                            </thead>

                                            <tbody class="text-c" id="t_body">
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                <div class="mt-20">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </article>
        </div>
    </section>
</div>

</body>
<script type="text/javascript" src="/web/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/web/public/static/lib/layer/layer.js"></script>
<script type="text/javascript" src="/web/public/static/lib/icheck/icheck.min.js"></script>
<script type="text/javascript" src="/web/public/static/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="/web/public/static/js/base.js"></script>

<script type="text/javascript">
    //删除按钮
    function del_user(uid,username) {
        
        layer.confirm('您确定删除该用户？', {
            title: "提示",
            btn: ['确定', '取消']
        }, function () {
            $.ajax({
                url:"<?php echo url('admin/Sysconfig/member_del'); ?>",
                data: {did:uid,username:username},
                dataType:'json',
                type:'post',
                success : function(res){
                    if(res.status==1){
                        layer.msg(res.message, {icon: 6, shade: [0.3, '#393D49'], time: 1500});

                        if($('#t_body').find('tr').length<=1){
                            setTimeout(function(){
                                location.href = "?page="+'<?php echo \think\Request::instance()->get('page')-1; ?>';
                            },1300) 
                        }else{
                           setTimeout(function(){
                                location.href = "";
                            },1300) 
                        }
                        
                    }else{
                        layer.msg(res.message, {icon: 5, shade: [0.3, '#393D49'], time: 1500});
                        return false;
                    }
                },
                error:function(){
                    console.log('参数错误！！！');
                }
            })
        });
    }


</script>

</html>