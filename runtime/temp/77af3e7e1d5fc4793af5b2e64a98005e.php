<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\phpStudy\PHPTutorial\WWW\web/application/admin\view\call\call_list.html";i:1536646328;s:75:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\head_css.html";i:1535416609;s:71:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\head.html";i:1537165607;s:73:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\footer.html";i:1535416743;}*/ ?>
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
            <span class="c-666">呼叫对讲</span>
        </nav>

        <div class="Hui-article">

            <article class="cl" style="height: 100%;">
                <table class="table" style="height: 100%;">
                    <tr>
                        <td style="width: 120px;padding: 0;" class="va-t">
                            <aside class="Hui-aside" style="position: relative;width: 160px;height:100%;margin-top: -44px;">
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
<div class="col-xs-13 text-c">
     <table id="tbody1" class="table table-border table-bordered table-bg table-hover radius table-striped text-nowrap table-radius">
    </table>
</div>

                                    <div class="col-xs-4 col-xs-offset-4 text-c">
                                        <form method="get">
                                            <input type="hidden" id="selected" name="selected" value="<?php echo $selected; ?>"/>
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
                                          
                                            <a class="btn btn-success radius r" style="line-height:1.6em;margin-left:20px"
                                               href="javascript:location.replace(location.href);" title="刷新">
                                                <i class="Hui-iconfont">&#xe68f;</i>&nbsp;刷新&nbsp;/&nbsp;F5
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-20">
                                    <div style="overflow:auto;">
                                        <table id="table" class="table table-border table-bordered table-bg table-hover radius table-striped text-nowrap table-radius">
                                            <thead class="text-c">
                                            <tr>
                                         <!--        <th>选择</th> -->
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
                                                <th>IP</th>
                                                <th>MAC</th>
                                                <th>版本</th>
                                                <th>终端信息</th>
                                                <th>是否控制中心</th>
                                            </tr>
                                            </thead>

                                            <tbody class="text-c" id="tbody">
                                              
                                            <?php if(!(empty($device_info) || (($device_info instanceof \think\Collection || $device_info instanceof \think\Paginator ) && $device_info->isEmpty()))): foreach($device_info as $k=>$v): ?>
                                            <tr <?php if($v['state_net'] == '02'): ?>class="tr_offline"<?php endif; ?>>
                                              
                                                <td><input type="hidden" value="<?php echo $v['id']; ?>"><?php  echo (($page-1)*$page_nub+($k+1));  ?></td>
                                                <td>
                                                    <div <?php if($auth_display != 'block'): ?>title="没有权限"<?php endif; ?>>
                                                        <button style="height:28px;" <?php if($v['ser_mac'] == '02'): ?>onclick="call(this,'<?php echo $v["id"]; ?>','<?php echo $v["mac"]; ?>','<?php echo $v["addr"]; ?>','<?php echo $v['name']; ?>','<?php echo ip_hex($v['ip']); ?>')');"<?php endif; ?> class="btn btn-primary size-MINI radius <?php if($v['ser_mac'] == '01'): ?>disabled<?php endif; ?>" type="button"><!-- &#xe6c7;Hui-iconfont-tel -->
                                                        <i class="Hui-iconfont">&#xe6c7;</i> 
                                                        呼叫
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
                                                <td><?php echo ip_hex($v['ip']); ?></td>
                                                <td><?php echo get_macstr($v['mac']); ?></td>
                                                <td><?php echo $v['version']; ?></td>
                                                <td><?php echo $v['note_info']; ?></td>
                                                <td><?php if($v['ser_mac'] == '01'): ?>
                                                    <img src="/web/public/static/images/success.png" />
                                                    <?php elseif($v['ser_mac'] == '02'): ?>
                                                    <img src="/web/public/static/images/error.png" />
                                                    <?php endif; ?></td>
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
            location.href = "<?php echo url('admin/Call/call_list'); ?>?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&search=<?php echo $search; ?>&page_nub=" + value;
        });
        $('#bad_device_select').change(function () {
            var value = $(this).val();
            location.href = "<?php echo url('admin/Call/call_list'); ?>?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&search=<?php echo $search; ?>&page_nub=<?php echo $page_nub; ?>";
        });
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



    function icheck_init() {
        $('input').iCheck({
            radioClass: 'iradio_square-green',
            checkboxClass: 'icheckbox_flat-blue',
        });

        $('#online').on('ifChecked', function (event) {
            location.href = "<?php echo url('admin/Call/call_list',['selected'=>$selected,'state_net'=>'01','page_nub'=>$page_nub]); ?>";
        });

        $('#offline').on('ifChecked', function (event) {
            location.href = "<?php echo url('admin/Call/call_list',['selected'=>$selected,'state_net'=>'02','page_nub'=>$page_nub]); ?>";
        });
    }

    function menuClick(name, state_net) {
        location.href = "<?php echo url('admin/Call/call_list'); ?>?selected=" + name + "&state_net=" + state_net;
    }

   
    <?php if($auth_display != 'disabled'): endif; ?>
    ///
    function order(item){
        location.href = "<?php echo url('admin/Call/call_list'); ?>?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&item=" + item + "&sort=<?php echo $sort; ?>&search=<?php echo $search; ?>&page_nub=<?php echo $page_nub; ?>";
    }


        ajax_show_control()
        //刷新页面显示
        function ajax_show_control(){
            var mac_str = ''
            $("[name='mac[]']").each(function(){
                mac_str += $(this).val()+','
            })
            var url = "<?php echo url('admin/Call/call_list'); ?>"+"?selected=<?php echo urlencode($selected); ?>&state_net=<?php echo $state_net; ?>&item=<?php echo $item; ?>&sort=<?php echo $sort; ?>&search=<?php echo $search; ?>&page_nub=<?php echo $page_nub; ?>&active=ajax_show&page=<?php echo $page; ?>&mac_str="+mac_str
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
                    var device_count_online = re.device_count_online;
                    var device_count_sum = re.device_count_sum;
                    var addr_select = re.addr_select;
                    var selected = $('#selected').val();

                    var sum_html;
                    if (selected == '所有设备') {
                        sum_html = '<i class="Hui-iconfont">&#xe67a;</i>&nbsp;所有设备&nbsp;(' + device_count_online + '/' + device_count_sum + ')';
                    } else {
                        sum_html = '&nbsp;所有设备&nbsp;(' + device_count_online + '/' + device_count_sum + ')';
                    }

                    $('#sum').html(sum_html);
                    //左侧子菜单的动态更新
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

                    //呼叫请求的
                    if(re.diglog.length!=0){
                        // alert(re.diglog.length);
                        var callhtml='';
                        callhtml+='<thead class="text-c"><tr><th>主叫</th><th>从叫</th><th> 呼叫状态</th><th>操作</th></tr></thead><tbody class="text-c"><tr>';
                        for (var i in re.diglog){
                            // alert(re.diglog[i].lord_name)
                            callhtml+='<td>'+re.diglog[i].lord_name+'</td>';
                            callhtml+='<td>'+re.diglog[i].from_name+'</td>';
                            callhtml+='<td>'+re.diglog[i].status+'</td>';
                            if(re.diglog[i].status=='连接中'){
                                callhtml+='<td><button class="btn btn-secondary radius" style="height:28px;"type="button"'
                                callhtml+='onclick="answer(this,\'' + re.diglog[i]['lord'] + '\',\'' + re.diglog[i]['from'] + '\')">';

                                callhtml+='<i class="Hui-iconfont">&#xe6c7;</i> 接听 </button>&nbsp&nbsp<button class="btn btn-warning radius" style="height:28px;" type="button"'
                                callhtml+='onclick="hang(this,\'' + re.diglog[i]['lord'] + '\',\'' + re.diglog[i]['from'] + '\')"';
                                callhtml+='><i class="Hui-iconfont">&#xe6c7;</i>挂断</button></td></tr></tbody>';
                            }else if(re.diglog[i].status=='会话中'){
                                callhtml+='<td><button class="btn btn-warning radius" style="height:28px;" type="button"'
                                callhtml+='onclick="hang(this,\'' + re.diglog[i]['lord'] + '\',\'' + re.diglog[i]['from'] + '\')"';
                                callhtml+='><i class="Hui-iconfont">&#xe6c7;</i>挂断</button></td></tr></tbody>';
                            }else{
                                callhtml+='<td>空闲中</td></tr></tbody>';
                            }
                            $('#tbody1').html(callhtml);
                        }
                    }else{
                        $('#tbody1').html('');
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
                                    var html_7, html_8, html_9, html_10, html_11,html_12;

                                    if (result_update[i]['state_net'] == '01') {
                                        html_6 = '<img src="/web/public/static/images/success.png" />';
                                        e.parent().removeClass('tr_offline');
                                    } else if (result_update[i]['state_net'] == '02') {
                                        html_6 = '<img src="/web/public/static/images/error.png" />';
                                        e.parent().addClass('tr_offline');
                                    }else{
                                        html_6 = '无';
                                        e.parent().addClass('tr_offline');
                                    }
                                    switch (result_update[i]['state_dev']){
                                        case '01':
                                            html_7 = '<img src="/web/public/static/images/success.png" />';
                                            break;
                                        case '02':
                                            html_7 = '<img src="/web/public/static/images/error.png" />';
                                            break;
                                        case '03':
                                            html_7 = '<b style="color: green;">开机中</b>';
                                            break;
                                        case '04':
                                            html_7 = '<b style="color: red;">关机中</b>';
                                            break;
                                        case '05':
                                            html_7 = '<b style="color: #D5912B;">检测中</b>';
                                            break;
                                    }
                                    if (result_update[i]['ser_mac'] == '01') {
                                        html_12 = '<img src="/web/public/static/images/success.png" />';
                                        e.parent().removeClass('tr_offline');
                                    } else if (result_update[i]['ser_mac'] == '02') {
                                        html_12 = '<img src="/web/public/static/images/error.png" />';
                                        e.parent().addClass('tr_offline');
                                    }
                                    td.eq(2).html(result_update[i]['addr']);
                                    td.eq(3).html(result_update[i]['name']);
                                    td.eq(4).html(result_update[i]['use_nub']);
                                    td.eq(5).html(result_update[i]['use_time']);
                                    td.eq(6).html(html_6);
                                    td.eq(7).html(html_7);
                                    td.eq(8).html(result_update[i]['ip']);
                                    td.eq(9).html(result_update[i]['mac']);
                                    td.eq(10).html(result_update[i]['version']);
                                    td.eq(11).html(result_update[i]['note_info']);
                                    td.eq(12).html(html_12);
                                    // alert(result_update[i]['note_info']);
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
                        // var device_info = re.device_info_add.data;原来的
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
                                
                                html += '<td><input type="hidden" value="' + device_info[i]['id'] + '">' + order_nub + '</td>';

                                html += '<td>';
                                html += '<div';
                                if (auth_display != 'block') {
                                    html += ' title="没有权限"';
                                }
                                html += '>';
                                html += '<button style="height:28px;"';
                                if (device_info[i]['ser_mac'] == '02') {
                                    html += ' onclick="call(this,\'' + device_info[i]['id'] + '\',\'' + device_info[i]['mac'] + '\',\'' + device_info[i]['addr'] + '\',\'' + device_info[i]['name'] + '\',\'' + device_info[i]['ip'] + '\')"';
                                }
                                // class="btn btn-primary size-MINI radius 禁用按钮样式
                                html += ' class="btn btn-primary size-MINI radius ';
                                if (device_info[i]['ser_mac'] == '01') {
                                    html += 'disabled';
                                }
                                html += '"';
                                html += ' type="button">';
                                html += '<i class="Hui-iconfont">&#xe6c7;</i> 呼叫';
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
                                }
                                html += '</td>';

                                html += '<td>';
                                if (device_info[i]['state_dev'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['state_dev'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }else{
                                    html += '无'
                                }
                                html += '</td>';


                                html += '</td>';

                                html += '<td>' + device_info[i]['ip_show'] + '</td>';
                                html += '<td>' + device_info[i]['mac_show'] + '</td>';
                                html += '<td>' + device_info[i]['version'] + '</td>';
                                html += '<td>' + device_info[i]['note_info'] + '</td>';
                                html += '<td>';
                                if (device_info[i]['ser_mac'] == '01') {
                                    html += '<img src="/web/public/static/images/success.png" />';
                                } else if (device_info[i]['ser_mac'] == '02') {
                                    html += '<img src="/web/public/static/images/error.png" />';
                                }
                                html += '</td>';
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

                    T = window.setTimeout(ajax_show_control,1500);
                }
            })
        }

    // 呼叫的操作
    function call(e, id, mac, addr, name, ip){
        layer.confirm('确认要执行操作？', function (index) {
            $.post('<?php echo url("admin/Call/send_udp_call"); ?>',{mac:mac,id:id},function(res){
                    layer.msg('操作成功！', {icon: 6, shade: [0.3, '#393D49'], time: 3000});
                    setTimeout(function(){
                        location.href = "";
                    },3000)
                })

        })
    }
    // 接听的操作
    function answer(e, id, mac, addr, name, ip){
        layer.confirm('确认要执行操作？', function (index) {
            $.post('<?php echo url("admin/Call/send_udp_call"); ?>',{mac:mac,id:id},function(res){
                    layer.msg('操作成功！', {icon: 6, shade: [0.3, '#393D49'], time: 3000});
                    setTimeout(function(){
                        location.href = "";
                    },3000)
                })

        })
    }
    // 挂断的操作
    function hang(e, id, mac, addr, name, ip){
        layer.confirm('确认要执行操作？', function (index) {
            $.post('<?php echo url("admin/Call/send_udp_call"); ?>',{mac:mac,id:id},function(res){
                    layer.msg('操作成功！', {icon: 6, shade: [0.3, '#393D49'], time: 3000});
                    setTimeout(function(){
                        location.href = "";
                    },3000)
                })
        })
    }
</script>
</html>