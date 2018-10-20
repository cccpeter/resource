<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\phpStudy\PHPTutorial\WWW\web/application/admin\view\repair\edit.html";i:1537170625;s:75:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\head_css.html";i:1535416609;s:73:"D:\phpStudy\PHPTutorial\WWW\web\application\admin\view\common\footer.html";i:1535416743;}*/ ?>
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

    <style>
        .edit_box {
            margin-top: 30px;
        }

        .edit_box div:nth-child(2) {
            margin-top: 10px;
        }

        .btn-on{
            background:url('/web/public/static/images/btn-on.png');
            border: 3px solid #ccc;
            background-size: 100% 100%;

        }
        .btn-off{
            background:url('/web/public/static/images/btn-off.png')no-repeat;
            border: 3px solid #ccc;
            background-size: 100% 100%;
        }
        .btn-sty{
            width: 75px;
            height: 34px;
            border-radius: 20px;
        }
        .btn-bg-green{
            background: url('/web/public/static/images/btn-bg-green.png');
            background-size:100% 100%;
            border-radius: 15px;
            border-width: 0;
            font-size: 13px;
            height: 34px;width: 75px;
        }

        .btn-bg-red{
            background: url('/web/public/static/images/btn-bg-red.png');
            background-size:100% 100%;
            border-radius: 15px;
            border-width: 0;
            font-size: 13px;
            height: 34px;width: 75px;
        }

        .inline-table tr td{
            border: 0;
            background-color: #FFFFFF;
            text-align: center;
        }
        .second-table tr td{
            background-color: #FFFFFF;
            text-align: center;
        }
        .green_font td {
            color: #50A219;
            font-weight: bold;
        }
    </style>
    <title>中控设备 - 云服务</title>
</head>
<body style="background-color: <?php echo BG_COLOR; ?>;">
<input type="hidden" id="aid" value="<?php echo $aid; ?>">
<input type="hidden" id="mac" value="<?php echo $mac; ?>">
<div class="container">
    <div class="row cl text-c edit_box" style="margin-top: 0px;padding: 10px;">
        <table style="background-color: white;min-width: 880px;" class="table table-border table-bordered radius text-nowrap table-radius">
            <tr>
                <td  width="101px" style="text-align: center;min-width: 101px;">设备控制</td>
                <td>
                    <table class="inline-table">
                        <tr>
                            <td>设备开关</td>
                            <td>授权开关</td>
                            <td>使用时间</td>
                            <td>使用次数</td>
                            <td>使用能耗</td>
                            <td>取消报警</td>
                        </tr>
                        <tr>
                            <td id="state_dev" data-state_dev="<?php echo $device_info['state_dev']; ?>">
                                <?php switch($device_info['state_dev']): case "01": ?>
                                <button class="btn btn-sty btn-on" onclick='edit_change("03210005210102")'></button>
                                <?php break; case "02": ?>
                                <button class="btn btn-sty btn-off" onclick='edit_change("03210005210101")'></button>
                                <?php break; case "03": ?>
                                <b style="color: green;">开机中</b>
                                <?php break; case "04": ?>
                                <b style="color: red;">关机中</b>
                                <?php break; case "05": ?>
                                <b style="color: #D5912B;">检测中</b>
                                <?php break; endswitch; ?>
                            </td>
                            <td id="dev_en" data-dev_en="<?php echo $device_info['dev_en']; ?>">
                                <?php if($device_info['dev_en'] == '01'): ?>
                                <button class="btn btn-sty btn-on" onclick='edit_change("03210005210502")'></button>
                                <?php else: ?>
                                <button class="btn btn-sty btn-off" onclick='edit_change("03210005210501")'></button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-bg-green" onclick='edit_change("03210005230201")'>重置</button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-bg-green" onclick='edit_change("03210005230301")'>重置</button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-bg-green" onclick='edit_change("032300052304010005230501")'>重置</button>
                            </td>
                            <td>
                                <button class="btn btn-success btn-bg-green" onclick='edit_change("03210005210202")'>取消</button>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table style="background-color: white;margin-top: 20px;min-width: 880px;" class="table table-border table-bordered radius text-nowrap table-radius">
            <tr>
                <td width="101px" style="text-align: center;min-width: 101px;">动态信息</td>
                <td>
                    <table class="inline-table" >
                        <tr>
                            <td>使用次数</td>
                            <td>使用时间</td>
                            <td>累计能耗</td>
                            <td>投影机瞬时功率</td>
                            <td>多媒体瞬时功率</td>
                            <td>多媒体瞬时电流</td>
                            <!-- <td>瞬时电流（DC）</td> -->
                            <td>报警状态</td>
                        </tr>
                        <tr class="green_font">
                            <td><span id="use_nub"><?php echo $device_info['use_nub']; ?></span> 次</td>
                            <td><span id="use_time"><?php echo $device_info['use_time']; ?></span> h</td>
                            <td><span id="port2_energy"><?php echo $device_info['port2_energy']; ?></span> W/h</td>
                            <td><span id="port1_power"><?php echo $device_info['port1_power']; ?></span> W</td>
                            <td><span id="port2_power"><?php echo $device_info['port2_power']; ?></span> W</td>
                            <td><span id="port2_ac_current"><?php echo $device_info['port2_ac_current']; ?></span> A</td>
                            <!-- <td><span id="port1_dc_current"><?php echo $device_info['port1_dc_current']; ?></span> A</td> -->
                            <td id="police">
                                <?php if($device_info['police'] == '01'): ?>
                                <img src="/web/public/static/images/error.png" />
                                <?php elseif($device_info['police'] == '02'): ?>
                                <img src="/web/public/static/images/success.png" />
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table style="background-color: white;margin-top: 20px;text-align: center;min-width: 880px;" class="table table-border table-bordered radius text-nowrap table-radius second-table">
            <tr>
                <td width="101px"></td>
                <td><?php echo config('conf.dev1'); ?></td>
                <td><?php echo config('conf.dev2'); ?></td>
                <td><?php echo config('conf.dev3'); ?></td>
                <td><?php echo config('conf.dev4'); ?></td>
                <td><?php echo config('conf.dev5'); ?></td>
                <td>net_out</td>
            </tr>
            <tr>
                <td>设备运行状态</td>
                <td id="dev2_state">
                    <?php if($device_info['dev2_state'] == '01'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php elseif($device_info['dev2_state'] == '02'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev1_state">
                    <?php if($device_info['dev1_state'] == '01'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php elseif($device_info['dev1_state'] == '02'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev4_state">
                    <?php if($device_info['dev4_state'] == '01'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php elseif($device_info['dev4_state'] == '02'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev3_state">
                    <?php if($device_info['dev3_state'] == '01'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php elseif($device_info['dev3_state'] == '02'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev5_state">
                    <?php if($device_info['dev5_state'] == '01'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php elseif($device_info['dev5_state'] == '02'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="netcheck1_state">
                    <?php if($device_info['netcheck1_state'] == '01'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php elseif($device_info['netcheck1_state'] == '02'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>设备报修状态</td>
                <td id="dev2">
                    <?php if($device_info['dev2'] == '01'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php elseif($device_info['dev2'] == '02'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev1">
                    <?php if($device_info['dev1'] == '01'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php elseif($device_info['dev1'] == '02'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev4">
                    <?php if($device_info['dev4'] == '01'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php elseif($device_info['dev4'] == '02'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev3">
                    <?php if($device_info['dev3'] == '01'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php elseif($device_info['dev3'] == '02'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="dev5">
                    <?php if($device_info['dev5'] == '01'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php elseif($device_info['dev5'] == '02'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
                <td id="netcheck1">
                    <?php if($device_info['netcheck1'] == '01'): ?>
                    <img src="/web/public/static/images/success.png" />
                    <?php elseif($device_info['netcheck1'] == '02'): ?>
                    <img src="/web/public/static/images/error.png" />
                    <?php else: ?>
                    无
                    <?php endif; ?>
                </td>
            </tr>
        </table>

    </div>
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
    function edit_change(code) {
        if("<?php echo $device_info['state_net']; ?>" == '01'){
            var index_confirm = layer.confirm('您确定要操作？', {
                title: "提示",
                btn: ['确定', '取消']
            }, function () {
                var mac = "<?php echo $mac; ?>";

                layer.close(index_confirm);
                // window.index = layer.load(0, {shade: false});
                $.ajax({
                    url: "<?php echo url('Admin/Repair/repairCodeSend'); ?>",
                    data: {mac: mac, code: code},
                    dataType: 'json',
                    type: 'post',
                    success: function (res) {
                        if(res.status=='1'){
                            layer.msg(res.message, {icon: 6, shade: [0.3, '#393D49'], time: 1500});
                            if(res.location!='nj'){
                                setTimeout(function(){
                                    location.href = res.location;
                                },1500)
                            }
                        }else if(res.status=='0'){
                            layer.msg(res.message, {icon: 5, shade: [0.3, '#393D49'], time: 1500});
                        }
                    }
                });
            });
        }
    }

$(document).ready(
   function(){
    document.onkeydown = function(){
    var oEvent = window.event;
    if (oEvent && oEvent.keyCode==27) {
        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
        parent.layer.close(index); 
    }
  }
});
    ajax_show() 
    function ajax_show(){
        var mac = $('#mac').val();
        $.ajax({
            url: "<?php echo url('Admin/Repair/edit_change'); ?>",
            data: {mac: mac},
            datatype: 'json',
            type: 'post',
            success: function (re) {
                var result = re.result;
                // console.log(result);

                var state_dev_html = dev_en_html = '';
                var dev1_html = dev2_html = dev3_html = dev4_html = dev5_html = netcheck1_html ='';
                var dev1_state_html = dev2_state_html = dev3_state_html = dev4_state_html = dev5_state_html = netcheck1_state_html = '';

                var police_html = '';

                var network_html = police_html = '';

                switch (result['state_dev']){
                    case '01':
                        state_dev_html = "<button class='btn btn-sty btn-on' onclick='edit_change("+'"03210005210102"'+")'></button>";
                        break;
                    case '02':
                        state_dev_html = "<button class='btn btn-sty btn-off' onclick='edit_change("+'"03210005210101"'+")'></button>";
                        break;
                    case '03':
                        state_dev_html = '<b style="color: green;">开机中</b>';
                        break;
                    case '04':
                        state_dev_html = '<b style="color: red;">关机中</b>';
                        break;
                    case '05':
                        state_dev_html = '<b style="color: #D5912B;">检测中</b>';
                        break;
                }

                if(result['dev_en'] == '01'){
                    dev_en_html = "<button class='btn btn-sty btn-on' onclick='edit_change("+'"03210005210502"'+")'></button>";
                }else if(result['dev_en'] == '02'){
                    dev_en_html = "<button class='btn btn-sty btn-off' onclick='edit_change("+'"03210005210501"'+")'></button>";
                }


                if(result['dev1'] == '01'){
                    dev1_html = '<img src="/web/public/static/images/error.png" />';
                }else if(result['dev1'] == '02'){
                    dev1_html = '<img src="/web/public/static/images/success.png" />'
                }else{
                    dev1_html = '无'
                }
                if(result['dev2'] == '01'){
                    dev2_html = '<img src="/web/public/static/images/error.png" />';
                }else if(result['dev2'] == '02'){
                    dev2_html = '<img src="/web/public/static/images/success.png" />'
                }else{
                    dev2_html = '无'
                }
                if(result['dev3'] == '01'){
                    dev3_html = '<img src="/web/public/static/images/error.png" />';
                }else if(result['dev3'] == '02'){
                    dev3_html = '<img src="/web/public/static/images/success.png" />'
                }else{
                    dev3_html = '无'
                }
                if(result['dev4'] == '01'){
                    dev4_html = '<img src="/web/public/static/images/error.png" />';
                }else if(result['dev4'] == '02'){
                    dev4_html = '<img src="/web/public/static/images/success.png" />'
                }else{
                    dev4_html = '无'
                }
                if(result['dev5'] == '01'){
                    dev5_html = '<img src="/web/public/static/images/error.png" />';
                }else if(result['dev5'] == '02'){
                    dev5_html = '<img src="/web/public/static/images/success.png" />'
                }else{
                    dev5_html = '无'
                }
                if(result['netcheck1'] == '01'){
                    netcheck1_html = '<img src="/web/public/static/images/success.png" />';
                }else if(result['netcheck1'] == '02'){
                    netcheck1_html = '<img src="/web/public/static/images/error.png" />';
                }else{
                    netcheck1_html = '无'
                }

                if(result['dev1_state'] == '01'){
                    dev1_state_html = '<img src="/web/public/static/images/success.png" />';
                }else if(result['dev1_state'] == '02'){
                    dev1_state_html = '<img src="/web/public/static/images/error.png" />'
                }else{
                    dev1_state_html = '无'
                }
                if(result['dev2_state'] == '01'){
                    dev2_state_html = '<img src="/web/public/static/images/success.png" />';
                }else if(result['dev2_state'] == '02'){
                    dev2_state_html = '<img src="/web/public/static/images/error.png" />'
                }else{
                    dev2_state_html = '无'
                }
                if(result['dev3_state'] == '01'){
                    dev3_state_html = '<img src="/web/public/static/images/success.png" />';
                }else if(result['dev3_state'] == '02'){
                    dev3_state_html = '<img src="/web/public/static/images/error.png" />'
                }else{
                    dev3_state_html = '无'
                }
                if(result['dev4_state'] == '01'){
                    dev4_state_html = '<img src="/web/public/static/images/success.png" />';
                }else if(result['dev4_state'] == '02'){
                    dev4_state_html = '<img src="/web/public/static/images/error.png" />'
                }else{
                    dev4_state_html = '无'
                }
                if(result['dev5_state'] == '01'){
                    dev5_state_html = '<img src="/web/public/static/images/success.png" />';
                }else if(result['dev5_state'] == '02'){
                    dev5_state_html = '<img src="/web/public/static/images/error.png" />'
                }else{
                    dev5_state_html = '无'
                }

                
                if(result['police'] == '01'){
                    police_html = '<img src="/web/public/static/images/error.png" />';
                }else if(result['police'] == '02'){
                    police_html = '<img src="/web/public/static/images/success.png" />'
                }else{
                    police_html = '无'
                }

                if(result['netcheck1_state'] == '01'){
                    netcheck1_state_html = '<img src="/web/public/static/images/success.png" />';
                }else if(result['netcheck1_state'] == '02'){
                    netcheck1_state_html = '<img src="/web/public/static/images/error.png" />';
                }else{
                    netcheck1_state_html = '无'
                }
                if($('#state_dev').attr('data-state_dev')!=result['state_dev']){
                    $('#state_dev').attr('data-state_dev',result['state_dev'])
                    $('#state_dev').html(state_dev_html); 
                }
                if($('#dev_en').attr('data-dev_en')!=result['dev_en']){
                    $('#dev_en').attr('data-dev_en',result['dev_en'])
                    $('#dev_en').html(dev_en_html);
                }
                if(result['port2_energy']>0){
                    result['port2_energy']=result['port2_energy']/1000;
                }else{
                    result['port2_energy']='0';

                }
                if(result['port2_power']>0){
                    result['port2_power']=result['port2_power']/1000;
                }else{
                    result['port2_power']='0';

                }
                if(result['port1_power']>0){
                    result['port1_power']=result['port1_power']/1000;
                }else{
                    result['port1_power']='0';

                }
                if(result['port2_ac_current']>0){
                    result['port2_ac_current']=result['port2_ac_current']/1000;
                }else{
                    result['port2_ac_current']='0';

                }
                $('#use_nub').html(result['use_nub']);
                $('#use_time').html(result['use_time']);
                $('#port2_energy').html(result['port2_energy']);
                $('#port1_power').html(result['port1_power']);
                $('#port2_power').html(result['port2_power']);
                $('#port2_ac_current').html(result['port2_ac_current']);
                $('#port1_dc_current').html(result['port1_dc_current']);
                $('#police').html(police_html);

                $('#dev1').html(dev1_html);
                $('#dev2').html(dev2_html);
                $('#dev3').html(dev3_html);
                $('#dev4').html(dev4_html);
                $('#dev5').html(dev5_html);
                $('#netcheck1').html(netcheck1_html);

                $('#dev1_state').html(dev1_state_html);
                $('#dev2_state').html(dev2_state_html);
                $('#dev3_state').html(dev3_state_html);
                $('#dev4_state').html(dev4_state_html);
                $('#dev5_state').html(dev5_state_html);
                $('#netcheck1_state').html(netcheck1_state_html);
                setTimeout(ajax_show,15000)
            }
        })
    }
        



</script>
</html>