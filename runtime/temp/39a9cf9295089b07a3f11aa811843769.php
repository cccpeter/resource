<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"D:\phpStudy\PHPTutorial\WWW\web/application/admin\view\repair\show_list.html";i:1537170063;s:75:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\head_css.html";i:1535416609;s:71:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\head.html";i:1537165607;s:73:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\footer.html";i:1535416743;}*/ ?>
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
<body>
    <style>
        .layui-layer-iframe{
            border-radius: 15px!important;
            overflow: hidden;!important;
        }

        /*.offline{*/
            /*background-color: #FFD8D8 !important;*/
        /*}*/

        .tr_offline td{
            background-color: #FFD8D8 !important;
        }

        .panel-custom {
            border-color: #C9DEF2
        }

        .panel-custom > .panel-header {
            border-color: #C9DEF2;
            background-color: #C9DEF2;
            color: #272822
        }
        .menu_dropdown_device,article table tr td,article table tr th{
            font-size: 14px;
        }
        /*苹果手机滚动条兼容*/
        .scroll-wrapper {
            -webkit-overflow-scrolling: touch;
            overflow-y: scroll;
            overflow-x: scroll;
        }
    </style>
<!--
    ws只接收自己的数据
-->

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
<input type="hidden" id="online_state_time">
<input type="hidden" id="police_state_time">
<div class="page-content">
    <section class="Hui-article-box" style="margin-top: 20px;">
        <nav class="breadcrumb">
            <i class="Hui-iconfont"></i>
            <?php if(session('back_api_url', '', 'base_')): ?>
            <a href="<?php echo session('back_api_url', '', 'base_'); ?>" class="maincolor">首页</a>
            <?php else: ?>
            <a href="#" onclick='redirect_self("<?php echo url('admin/Index/index'); ?>")' class="maincolor">首页<?php echo session('back_api_url', '', 'base_'); ?></a>
            <?php endif; ?>
            <span class="c-999 en">&gt;</span>
            <span class="c-666">运维管理</span>
        </nav>

        <div class="Hui-article">
            <article class="cl" style="height: 100%;">
                <table class="table" style="height: 100%;">
                    <tr>
                        <td style="width: 120px;padding: 0;" class="va-t">
                            <aside class="Hui-aside" style="position: relative;width: 215px;height:100%;margin-top: -44px;">
                                <div class="menu_dropdown_device" >
                                    <dl id="menu-comments">
                                        <dt class="selected">
                                            <span id="sum" style="<?php if($selected == '所有设备'): ?>color: green; font-weight:bold<?php endif; ?>" onclick="menuClick('所有设备','all');"><?php if($selected == '所有设备'): ?><i class="Hui-iconfont">&#xe67a;</i><?php endif; ?>&nbsp;所有设备&nbsp;(<?php echo $device_count_online; ?>/<?php echo $device_count_sum; ?>)</span>
                                        </dt>
                                        <dd style="display: block;">
                                            <ul id="addr_select">
                                                <?php foreach($addr_select as $v): 
                                                    if(mb_strlen($v['addr'],'utf-8') > 6){
                                                        $addr_length = mb_substr($v['addr'],0,6,'utf-8').'...';
                                                        $title_state = 'success';
                                                    }else{
                                                        $addr_length = $v['addr'];
                                                        $title_state = 'error';
                                                    }
                                                 ?>
                                                <li><a data-href="#" <?php if($title_state == 'success'): ?>title="<?php echo $v['addr']; ?>"<?php endif; ?> style="<?php if($v['addr'] == $selected): ?>color: green; font-weight:bold<?php endif; ?>" onclick='menuClick("<?php echo urlencode($v['addr']); ?>","01")' data-title="<?php echo $v['addr']; ?>" href="javascript:void(0)"><?php if($v['addr'] == $selected): ?><i class="Hui-iconfont">&#xe67a;</i>&nbsp;<?php endif; ?><?php echo $addr_length; ?>&nbsp;(<?php echo $v['online']; ?>/<?php echo $v['sum']; ?>)</a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </dd>
                                    </dl>
                                </div>
                            </aside>
                        </td>
                        <td class="va-t" style="background-color: <?php echo BG_COLOR; ?>;">
                            <div class="page-container">
                                <div class="cl">
                                    <div class="col-xs-12" id="police_state" style="padding: 0;">
                                        <!--<div class="panel panel-custom radius" style="margin-bottom: 20px;">-->
                                            <!--<div class="panel-header">报警设备</div>-->
                                            <!--<div class="panel-body">面板内容</div>-->
                                        <!--</div>-->
                                    </div>
                                    <!--<div class="col-xs-4" id="police_state">-->
                                        <!--<div class="marquee">-->
                                            <!--<div>-->
                                                <!--<p id="police">报警</p>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    <!--</div>-->

                                    <div class="col-xs-4 col-xs-offset-4 text-c">
                                        <form method="get">
                                            <input type="hidden" id="selected" name="selected" value="<?php echo $selected; ?>"/>
                                            <input type="hidden" id="bad_device" name="bad_device" value="<?php echo $bad_device; ?>"/>
                                            <input type="hidden" id="state_net" name="state_net" value="<?php echo $state_net; ?>"/>
                                            <input type="hidden" id="page_nub_add" name="page_nub" value="<?php echo $page_nub; ?>"/>
                                            <input id="search" type="search" name="search" placeholder=" 位置 | 名称 | ip" class="input-text search_input radius" value="<?php echo $search; ?>" autocomplete="off">
                                            <button name="" id="" class="btn btn-success radius" type="submit">
                                                <i class="Hui-iconfont">&#xe665;</i> 模糊查询
                                            </button>
                                        </form>
                                        <input id="item" type="hidden" value="<?php echo $item; ?>">
                                        <input id="sort" type="hidden" value="<?php echo $sort; ?>">
                                        <input id="page" type="hidden" value="<?php echo $page; ?>">
                                    </div>

                                    <!--<div class="col-xs-4" id="server_state">-->
                                        <!--<div class="marquee radius">-->
                                            <!--<div>-->
                                                <!--<p>已掉线</p>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                </div>

                                <div class="cl pd-5 bg-1 bk-gray mt-10 radius">
                                    <div class="open_down">
                                        <span class="l">
                                            <b style="margin-right: 10px;">
                                                显示
                                                <span class="select-box" style="width: 70px;">
                                                    <select class="select" id="page_nub">
                                                        <?php foreach($page_limit as $v): ?>
                                                            <option value="<?php echo $v; ?>" <?php if($page_nub == $v): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </span>
                                                条数据
                                            </b>
                                            <b style="margin-left: 10px;">
                                                <label style="cursor:pointer;"><input type="radio" <?php if($state_net == '01'): ?>checked<?php endif; ?> name="state_net" id="online" value="1">在线</label>
                                                <label style="cursor:pointer;"><input type="radio" <?php if($state_net == '02'): ?>checked<?php endif; ?> name="state_net" id="offline" value="2">离线</label>
                                            </b>
                                            <b style="margin-left: 20px;">报修设备</b>
                                            <span class="select-box" style="width: 90px;">
                                                <select class="select" id="bad_device_select">
                                                    <option value="无" <?php if($bad_device == '无'): ?>selected<?php endif; ?>>空</option>
                                                    <option value="全部" <?php if($bad_device == '全部'): ?>selected<?php endif; ?>>全部</option>
                                                    <option value="投影机" <?php if($bad_device == '投影机'): ?>selected<?php endif; ?>>投影机</option>
                                                    <option value="电脑" <?php if($bad_device == '电脑'): ?>selected<?php endif; ?>>电脑</option>
                                                    <option value="中控" <?php if($bad_device == '中控'): ?>selected<?php endif; ?>>中控</option>
                                                    <option value="多媒体" <?php if($bad_device == '多媒体'): ?>selected<?php endif; ?>>多媒体</option>
                                                    <option value="其他" <?php if($bad_device == '其他'): ?>selected<?php endif; ?>>其他</option>
                                                </select>
                                            </span>
                                            <a class="btn btn-success radius r" style="line-height:1.6em;margin-left:20px"
                                               href="javascript:location.replace(location.href);" title="刷新">
                                                <i class="Hui-iconfont">&#xe68f;</i>&nbsp;刷新&nbsp;/&nbsp;F5
                                            </a>
                                        </span>
                                        <span class="r">
                                            <?php if(AUTH_LEVEL_NOW != '3'): ?>
                                            <button class="btn btn-primary radius" onclick="sys_doedit('410D')">
                                                <i class="Hui-iconfont">&#xe6e6;</i> 一键开机
                                            </button>
                                            <button class="btn btn-danger radius" onclick="sys_doedit('410E')">
                                                <i class="Hui-iconfont">&#xe726;</i> 一键关机
                                            </button>
                                            <button class="btn btn-secondary radius" id="aidall" >全选</button>
                                            <button class="btn btn-secondary radius" id="aidnot" ">全不选</button>
                                            <button class="btn btn-secondary radius" id="aidreverse" >反选</button>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-20">
                                    <div style="overflow:auto;">
                                        <table id="table" class="table table-border table-bordered table-bg table-hover radius table-striped text-nowrap table-radius">
                                            <thead class="text-c">
                                            <tr>
                                                <th>选择</th>
                                                <th>序号</th>
                                                <th>操作</th>
                                                <th>
                                                    <a title="排序" onclick="order('addr')" href="#">位置
                                                        <?php if($item == 'addr'): if($sort == 'asc'): ?>
                                                                <img src="/web/public/static/images/sort_asc.png">
                                                            <?php else: ?>
                                                                <img src="/web/public/static/images/sort_desc.png">
                                                            <?php endif; else: ?>
                                                            <img src="/web/public/static/images/sort_both.png">
                                                        <?php endif; ?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a title="排序" onclick="order('name')" href="#">名称
                                                        <?php if($item == 'name'): if($sort == 'asc'): ?>
                                                                <img src="/web/public/static/images/sort_asc.png">
                                                            <?php else: ?>
                                                                <img src="/web/public/static/images/sort_desc.png">
                                                            <?php endif; else: ?>
                                                            <img src="/web/public/static/images/sort_both.png">
                                                        <?php endif; ?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a title="排序" onclick="order('use_nub')" href="#">使用次数
                                                        <?php if($item == 'use_nub'): if($sort == 'asc'): ?>
                                                                <img src="/web/public/static/images/sort_asc.png">
                                                            <?php else: ?>
                                                                <img src="/web/public/static/images/sort_desc.png">
                                                            <?php endif; else: ?>
                                                            <img src="/web/public/static/images/sort_both.png">
                                                        <?php endif; ?>
                                                    </a>
                                                </th>
                                                <th>
                                                    <a title="排序" onclick="order('use_time')" href="#">使用时间
                                                        <?php if($item == 'use_time'): if($sort == 'asc'): ?>
                                                            <img src="/web/public/static/images/sort_asc.png">
                                                            <?php else: ?>
                                                            <img src="/web/public/static/images/sort_desc.png">
                                                            <?php endif; else: ?>
                                                        <img src="/web/public/static/images/sort_both.png">
                                                        <?php endif; ?>
                                                    </a>
                                                </th>
                                                <th>在线状态</th>
                                                <th>系统状态</th>
                                                <th>授权状态</th>
                                                <th><?php echo config('conf.dev1'); ?></th>
                                                <th><?php echo config('conf.dev2'); ?></th>
                                                <th><?php echo config('conf.dev3'); ?></th>
                                                <th><?php echo config('conf.dev4'); ?></th>
                                                <th><?php echo config('conf.dev5'); ?></th>
                                                <th>报警</th>
                                                <th>IP</th>
                                                <th>MAC</th>
                                                <th>版本</th>
                                                <th>终端信息</th>
                                            </tr>
                                            </thead>

                                            <tbody class="text-c" id="tbody">
                                            <?php if(!(empty($device_info) || (($device_info instanceof \think\Collection || $device_info instanceof \think\Paginator ) && $device_info->isEmpty()))): foreach($device_info as $k=>$v): ?>
                                            <tr <?php if($v['state_net'] == '02'): ?>class="tr_offline"<?php endif; ?>>
                                                <input type="hidden" name="mac[]" data-police="<?php echo $v['police']; ?>" value="<?php echo $v['mac']; ?>" />
                                                <td><input type="checkbox" name="ids[]" data-mac="<?php echo $v['mac']; ?>" value="<?php echo $v['id']; ?>"></td>
                                                <td><input type="hidden" value="<?php echo $v['id']; ?>"><?php  echo (($page-1)*$page_nub+($k+1));  ?></td>
                                                <td>
                                                    <div <?php if($auth_display != 'block'): ?>title="没有权限"<?php endif; ?>>
                                                        <button style="height:28px;" <?php if($auth_display == 'block'): ?>onclick="iframe(this,'<?php echo $v["id"]; ?>','<?php echo $v["mac"]; ?>','<?php echo $v["addr"]; ?>','<?php echo $v['name']; ?>','<?php echo ip_hex($v['ip']); ?>')"<?php endif; ?> class="btn btn-primary size-MINI radius <?php if($auth_display != 'block'): ?>disabled<?php endif; ?>" type="button">
                                                        <i class="Hui-iconfont">&#xe6e6;</i> 控制
                                                        </button>
                                                    </div>
                                                </td>
                                                <td><?php echo $v['addr']; ?></td>
                                                <td><?php echo $v['name']; ?></td>
                                                <td><?php echo $v['use_nub']; ?></td>
                                                <td><?php echo $v['use_time']; ?></td>
                                                <td>
                                                    <?php if($v['state_net'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['state_net'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php else: ?> 无
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php switch($v['state_dev']): case "01": ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php break; case "02": ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php break; case "03": ?>
                                                    <b style="color: green;">开机中</b>
                                                    <?php break; case "04": ?>
                                                    <b style="color: red;">关机中</b>
                                                    <?php break; case "05": ?>
                                                    <b style="color: #D5912B;">检测中</b>
                                                    <?php break; endswitch; ?>
                                                </td>
                                                <td>
                                                    <?php if($v['dev_en'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['dev_en'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php else: ?>
                                                    无
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($v['dev2_state'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['dev2_state'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php else: ?>
                                                    无
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($v['dev1_state'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['dev1_state'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php else: ?>
                                                    无
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($v['dev4_state'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['dev4_state'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php else: ?>
                                                    无
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($v['dev3_state'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['dev3_state'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php else: ?>
                                                    无
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($v['dev5_state'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['dev5_state'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php else: ?>
                                                    无
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($v['police'] == '01'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php elseif($v['police'] == '02'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php else: ?>
                                                    无
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo ip_hex($v['ip']) ?></td>
                                                <td><?php echo get_macstr($v['mac']); ?></td>
                                                <td><?php echo $v['version']; ?></td>
                                                <td><?php echo $v['note_info']; ?></td>
                                            </tr>
                                            <?php endforeach; else: ?>
                                            <tr>
                                                <td colspan="21"><span style="color: red;">没有数据...</span></td>
                                            </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <div style="margin-top: 10px;"></div>
                                    </div>
                                    <div class="radius" id="render" style="float: left;"><?php echo $device_info->render(); ?></div>
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
<!--js部-->
<script type="text/javascript" src="/web/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/web/public/static/lib/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/web/public/static/lib/layer/layer.js"></script>
<script type="text/javascript" src="/web/public/static/lib/icheck/icheck.min.js"></script>
<script type="text/javascript" src="/web/public/static/js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="/web/public/static/js/base.js"></script>


<script>
    $(function () {
        icheck_init();
        checkPlatform()
        $('#page_nub').change(function () {
            var value = $(this).val();
            location.href = "<?php echo url('admin/Repair/show_list'); ?>?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&search=<?php echo $search; ?>&bad_device=<?php echo $bad_device; ?>&page_nub=" + value;
        });
        $('#bad_device_select').change(function () {
            var value = $(this).val();
            location.href = "<?php echo url('admin/Repair/show_list'); ?>?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&search=<?php echo $search; ?>&page_nub=<?php echo $page_nub; ?>&bad_device="+ value;
        });
        // speed_type(2);

        // var timestamp = Date.parse(new Date());
        // $('#online_state_time').val(timestamp);
        // $('#police_state_time').val(timestamp);
    });

    function checkPlatform(){
        window.ios = false;
        if(/(iPhone|iPad|iPod|iOS)/i.test(navigator.userAgent)){
            window.ios = true;
        }
    }
    
    aid_allcheck_bind()
    /*AID全选，反选，全不选*/
    function aid_allcheck_bind(){
        //全选
        $("#aidall").click(function(){
            ids_selectAll("[name='ids[]']")
        });
        //全不选
        $("#aidnot").click(function(){
            ids_unSelect("[name='ids[]']")
        });
        //反选
        $("#aidreverse").click(function(){
            ids_reverse("[name='ids[]']")
        });
    }

    // setInterval(function () {
    //     var now = Date.parse(new Date());
    //     var online_state_time = $('#online_state_time').val();
    //     var police_state_time = $('#police_state_time').val();

    //     if((now-online_state_time) > 5000){
    //         var server_state = $('#server_state');
    //         var server_state_length = server_state.html();

    //         if(server_state_length == ''){  //在线转为离线
    //             if(!(selected == '所有设备' && state_net == '02')) {
    //                 ws.send('1');
    //                 location.href = "<?php echo url('admin/Repair/show_list'); ?>?selected=所有设备&state_net=02&page_nub="+page_nub;
    //             }else{
    //                 server_state.html('已下线');
    //             }
    //         }
    //     }
    //     if((now-police_state_time) > 5000){
    //         $('#police').html('');
    //     }
    // },1000);



    function icheck_init() {
        $('input').iCheck({
            radioClass: 'iradio_square-green',
            checkboxClass: 'icheckbox_flat-blue',
        });

        $('#online').on('ifChecked', function (event) {
            location.href = "<?php echo url('admin/Repair/show_list',['selected'=>$selected,'bad_device'=>$bad_device,'state_net'=>'01','page_nub'=>$page_nub]); ?>";
        });

        $('#offline').on('ifChecked', function (event) {
            location.href = "<?php echo url('admin/Repair/show_list',['selected'=>$selected,'bad_device'=>$bad_device,'state_net'=>'02','page_nub'=>$page_nub]); ?>";
        });
    }

    function menuClick(name, state_net) {
        location.href = "<?php echo url('admin/Repair/show_list'); ?>?selected=" + name + "&state_net=" + state_net;
    }

    function all_open() {
        var index = layer.confirm('确定要开启所有系统吗？', {
            title: '一键开机',
            btn: ['确定', '取消']
        }, function () {
            var mac;
            $('input:checkbox[name="ids[]"]:checked').each(function () {
                mac = $(this).attr('data-mac');
                $.ajax({
                    url: "<?php echo url('admin/Base/send_code'); ?>",
                    data: {
                        mac: mac,
                        code: '',
                        fun: ''
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function (re) {
                    }
                });
            });
            layer.close(index);
        });
    }

    function all_down() {
        var index = layer.confirm('确定要关闭所有系统吗？', {
            title: '一键关机',
            btn: ['确定', '取消']
        }, function () {
            var mac;
            $('input:checkbox[name="ids[]"]:checked').each(function () {
                mac = $(this).attr('data-mac');
                $.ajax({
                    url: "<?php echo url('admin/Base/send_code'); ?>",
                    data: {
                        mac: mac,
                        code: '',
                        fun: ''
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function (re) {
                    }
                });
            });
            layer.close(index);
        });
    }

    <?php if($auth_display != 'disabled'): ?>
    function iframe(e, id, mac, addr, name, ip) {
        var w = window.width, h, url = "<?php echo url('admin/Repair/edit'); ?>?id=" + id + "&mac=" + mac;
        var title = '报修设备控制  （'+addr+' -- '+name+' -- '+ip +'）';

        if (w > 768 && w < 1350) {
            w = '60%';
            h = '75%';
        } 
        else if(w < 768){
            w = w - 20;
            w = w + 'px';
            h = '80%';
        }else {
            w = '50%';
            h = '60%';
        }
        var iframe = layer.open({
            type: 2,
            title: title,
            skin: '',
            area: [w, h],
            content: url,
            success: function(layero){
                if(window.ios){x
                    $(layero).addClass("scroll-wrapper");//苹果 iframe 滚动条失效解决方式
                }
            },
            maxmin: true,
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
            // ,
            // cancel: function (index) {
            //     $.ajax({
            //         url: "<?php echo url('admin/Base/cancel_speed'); ?>",
            //         data: {speed: '1000'},
            //         dataType: 'json',
            //         type: 'post'
            //     });
            // }
        });
    }
    <?php endif; ?>
    ///
    
    //var index = layer.open();
    //layer.close(layer.index);
    function order(item){
        location.href = "<?php echo url('admin/Repair/show_list'); ?>?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&item=" + item + "&sort=<?php echo $sort; ?>&bad_device=<?php echo $bad_device; ?>&search=<?php echo $search; ?>&page_nub=<?php echo $page_nub; ?>";
    }
$(document).ready(
   function(){
    document.onkeydown = function(){
    var oEvent = window.event;
    if (oEvent && oEvent.keyCode==27) {
        layer.closeAll();
    }
  }
});


        ajax_show_control()
        //刷新页面显示
        function ajax_show_control(){
            var mac_str = ''
            $("[name='mac[]']").each(function(){
                mac_str += $(this).val()+','
            })
            var url = "<?php echo url('admin/Repair/show_list'); ?>"+"?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&item=<?php echo $item; ?>&bad_device=<?php echo $bad_device; ?>&sort=<?php echo $sort; ?>&search=<?php echo $search; ?>&page_nub=<?php echo $page_nub; ?>&active=ajax_show&page=<?php echo $page; ?>&mac_str="+mac_str
            $.ajax({
                url:url,
                data:'1',
                type:'post',
                datatype:'json',
                success : function(event){
                    re = event
                    // console.log(re.result_police)
                    $('#render').html(re.page_show)
                     //                     /**********************左侧菜单栏 start**************************/
                    var addr_select = re.addr_select;
                    var device_count_online = re.device_count_online;
                    var device_count_sum = re.device_count_sum;

                    var selected = $('#selected').val();

                    var sum_html;
                    if (selected == '所有设备') {
                        sum_html = '<i class="Hui-iconfont">&#xe67a;</i>&nbsp;所有设备&nbsp;(' + device_count_online + '/' + device_count_sum + ')';
                    } else {
                        sum_html = '&nbsp;所有设备&nbsp;(' + device_count_online + '/' + device_count_sum + ')';
                    }

                    $('#sum').html(sum_html);

                    var addr_select_html = '';

                    for (var i in addr_select) {
                        var addr_length, title_state;
                        if (addr_select[i]['addr'].length > 6) {
                            addr_length = addr_select[i]['addr'].substr(0, 6) + '...';
                            title_state = 'success';
                        } else {
                            addr_length = addr_select[i]['addr'];
                            title_state = 'error';
                        }
                        addr_select_html += '<li><a data-href="#" ';
                        if (title_state == 'success') {
                            addr_select_html += 'title=\'' + addr_select[i]['addr'] + '\'';
                        }
                        if (addr_select[i]['addr'] == selected) {
                            addr_select_html += ' style="color: green; font-weight:bold" ';
                        }
                        addr_select_html += 'onclick=\'menuClick("' + addr_select[i]['addr_urlcode'] + '","01")\'';
                        addr_select_html += ' data-title="' + addr_select[i]['addr'] + '" href="javascript:void(0)">';
                        if (addr_select[i]['addr'] == selected) {
                            addr_select_html += '<i class="Hui-iconfont">&#xe67a;</i>&nbsp;';
                        }
                        addr_select_html += addr_length + '&nbsp;(' + addr_select[i]['online'] + '/' + addr_select[i]['sum'] + ')';
                        addr_select_html += '</a></li>';

                        $('#addr_select').html(addr_select_html);
                    }
            //                     /**********************左侧菜单栏 end**************************/

             //                     /**********************更新 start**************************/
                    if(mac_str.length > 0){
                        var result_update = re.result_update.data;


                        $("[name='mac[]']").each(function (i) {
                            var e = $(this);
                            // console.log(result_update)
                            for (var i in result_update) {
                                if (result_update[i]['mac'] == e.val()) {
                                    var td = e.parent().find('td');
                                    var html_7, html_8, html_9, html_10, html_11, html_12, html_13, html_14, html_15;

                                    if (result_update[i]['state_net'] == '01') {
                                        html_7 = '<img src="/web/public/static/images/success.png" />';
                                        e.parent().removeClass('tr_offline');
                                    } else if (result_update[i]['state_net'] == '02') {
                                        html_7 = '<img src="/web/public/static/images/error.png" />';
                                        e.parent().addClass('tr_offline');
                                    }
                                    switch (result_update[i]['state_dev']){
                                        case '01':
                                            html_8 = '<img src="/web/public/static/images/success.png" />';
                                            break;
                                        case '02':
                                            html_8 = '<img src="/web/public/static/images/error.png" />';
                                            break;
                                        case '03':
                                            html_8 = '<b style="color: green;">开机中</b>';
                                            break;
                                        case '04':
                                            html_8 = '<b style="color: red;">关机中</b>';
                                            break;
                                        case '05':
                                            html_8 = '<b style="color: #D5912B;">检测中</b>';
                                            break;
                                    }

                                    if (result_update[i]['dev_en'] == '01') {
                                        html_9 = '<img src="/web/public/static/images/success.png" />';
                                    } else if (result_update[i]['dev_en'] == '02') {
                                        html_9 = '<img src="/web/public/static/images/error.png" />';
                                    }else{
                                        html_9 = '无'
                                    }

                                    if (result_update[i]['dev2_state'] == '01') {
                                        html_10 = '<img src="/web/public/static/images/success.png" />';
                                    } else if (result_update[i]['dev2_state'] == '02') {
                                        html_10 = '<img src="/web/public/static/images/error.png" />';
                                    }else{
                                        html_10 = '无'
                                    }
                                    if (result_update[i]['dev1_state'] == '01') {
                                        html_11 = '<img src="/web/public/static/images/success.png" />';
                                    } else if (result_update[i]['dev1_state'] == '02') {
                                        html_11 = '<img src="/web/public/static/images/error.png" />';
                                    }else{
                                        html_11 = '无'
                                    }
                                    if (result_update[i]['dev4_state'] == '01') {
                                        html_12 = '<img src="/web/public/static/images/success.png" />';
                                    } else if (result_update[i]['dev4_state'] == '02') {
                                        html_12 = '<img src="/web/public/static/images/error.png" />';
                                    }else{
                                        html_12 = '无'
                                    }
                                    if (result_update[i]['dev3_state'] == '01') {
                                        html_13 = '<img src="/web/public/static/images/success.png" />';
                                    } else if (result_update[i]['dev3_state'] == '02') {
                                        html_13 = '<img src="/web/public/static/images/error.png" />';
                                    }else{
                                        html_13 = '无'
                                    }
                                    if (result_update[i]['dev5_state'] == '01') {
                                        html_14 = '<img src="/web/public/static/images/success.png" />';
                                    } else if ((result_update[i]['dev5_state'] == '02')) {
                                        html_14 = '<img src="/web/public/static/images/error.png" />';
                                    }else{
                                        html_14 = '无'
                                    }

                                    if (result_update[i]['police'] == '01') {
                                        html_15 = '<img src="/web/public/static/images/error.png" />';
                                    } else if (result_update[i]['police'] == '02') {
                                        html_15 = '<img src="/web/public/static/images/success.png" />';
                                    }else{
                                        html_15 = '无'
                                    }

                                    td.eq(3).html(result_update[i]['addr']);
                                    td.eq(4).html(result_update[i]['name']);
                                    td.eq(5).html(result_update[i]['use_nub']);
                                    td.eq(6).html(result_update[i]['use_time']);
                                    td.eq(7).html(html_7);
                                    td.eq(8).html(html_8);
                                    td.eq(9).html(html_9);
                                    td.eq(10).html(html_10);
                                    td.eq(11).html(html_11);
                                    td.eq(12).html(html_12);
                                    td.eq(13).html(html_13);
                                    td.eq(14).html(html_14);
                                    td.eq(15).html(html_15);
                                    // td.eq(16).html(result_update[i]['ip']);
                                    td.eq(18).html(result_update[i]['version']);
                                    td.eq(19).html(result_update[i]['note_info']);
                                }
                            }
                        });
                    }

            //                     /**********************更新 end**************************/

            //                     /**********************添加 start**************************/
                    var page_nub = $('#page_nub_add').val();
                    var mac_length = $("[name='mac[]']").length;
                    // console.log(re.device_info_nub)
                    // console.log(mac_length)

                    if(mac_length < re.device_info_nub){
                        // console.log('aa');
                        var device_info = re.device_info_add.data;

                        if (device_info != '') {
                            var auth_display = re.auth_display;
                            var html = '';

                            for (var i in device_info) {
                                var order_nub = mac_length + parseInt(i) + 1;
                                if (device_info[i]['state_net'] == '01') {
                                    html += '<tr>';
                                } else if (device_info[i]['state_net'] == '02') {
                                    html += '<tr class="tr_offline">';
                                }

                                html += '<input type="hidden" name="mac[]" data-police="' + device_info[i]['police'] + '" value="' + device_info[i]['mac'] + '">';
                                html += '<td><input type="checkbox" name="ids[]" value="' + device_info[i]['id'] + '" data-mac="' + device_info[i]['mac'] + '"></td>';
                                html += '<td><input type="hidden" value="' + device_info[i]['id'] + '">' + order_nub + '</td>';

                                html += '<td>';
                                html += '<div';
                                if (auth_display != 'block') {
                                    html += ' title="没有权限"';
                                }
                                html += '>';
                                html += '<button style="height:28px;"';
                                if (auth_display == 'block') {
                                    html += ' onclick="iframe(this,\'' + device_info[i]['id'] + '\',\'' + device_info[i]['mac'] + '\',\'' + device_info[i]['addr'] + '\',\'' + device_info[i]['name'] + '\',\'' + device_info[i]['ip'] + '\')"';
                                }
                                html += ' class="btn btn-primary size-MINI radius ';
                                if (auth_display != 'block') {
                                    html += 'disabled';
                                }
                                html += '"';
                                html += ' type="button">';
                                html += '<i class="Hui-iconfont">&#xe6e6;</i> 控制';
                                html += '</button>';
                                html += '</div>'
                                html += '</td>';

                                html += '<td>' + device_info[i]['addr'] + '</td>';
                                html += '<td>' + device_info[i]['name'] + '</td>';
                                html += '<td>' + device_info[i]['use_nub'] + '</td>';
                                html += '<td>' + device_info[i]['use_time'] + '</td>';

                                html += '<td>';
                                if (device_info[i]['state_net'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['state_net'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html+="无";
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['state_dev'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['state_dev'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['dev_en'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info['dev_en'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['dev2_state'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['dev2_state'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['dev1_state'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['dev1_state'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['dev4_state'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['dev4_state'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['dev3_state'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['dev3_state'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['dev5_state'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['dev5_state'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['police'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['police'] == '02') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';

                                html += '<td>' + device_info[i]['ip_show'] + '</td>';
                                html += '<td>' + device_info[i]['mac_show'] + '</td>';
                                html += '<td>' + device_info[i]['version'] + '</td>';
                                html += '<td>' + device_info[i]['note_info'] + '</td>';
                            }
                            if (mac_length > 0) {
                                $('#tbody').append(html);
                                // console.log('append');
                            } else {
                                $('#tbody').html(html);
                                // console.log('html');
                            }
                            icheck_init();
                        }
                    }

            /**********************添加 end**************************/

            /**********************报警 start**************************/
                        var result_police = re.result_police;
                        // console.log(police_result);
                        var police_length = result_police.length;

                        //报警提示
                        var police_state = $('#police_state');
                        var police_html = '';
                        if(police_length>0){
                        var i;
                            police_html += '<div class="panel panel-custom radius" style="margin-bottom: 20px;">';
                            police_html += '<div class="panel-header">报警设备</div><div class="cl"><div class="panel-body"  style="color: red;font-size: 1.5em;margin-bottom: 10px;font-weight: bold">';
                            for (i = 0; i < police_length; i++) {
                                police_html += '<div class="col-xs-4">' + result_police[i]['addr'] + '--' + result_police[i]['name'] + '</div>';
                            }
                            police_html += '</div></div></div>';
                            police_state.html(police_html);
                        }else{
                            police_state.html('');
                        }

            /**********************报警 end**************************/

                    T = window.setTimeout(ajax_show_control,1500);
                }
            })
        }

    // 按钮控制操作
    function sys_doedit(cmdcode){
        layer.confirm('确认要执行操作？', function (index) {
            var mac_str = ''
            $('[name="ids[]"]:checked').each(function(){
                mac_str += $(this).attr('data-mac')
            })
            if(mac_str==''){
                layer.msg('请选择设备', {icon: 5, shade: [0.3, '#393D49'], time: 3000});
                return false
            }
            $.post('<?php echo url("admin/Article/send_udp_addmac"); ?>',{cmdcode:cmdcode,mac_check:mac_str},function(res){
                    layer.msg('操作成功！', {icon: 6, shade: [0.3, '#393D49'], time: 3000});
                    setTimeout(function(){
                        location.href = "";
                    },3000)
                })

        })
    }
</script>
</html>