<?php 
    session_start();

	if(!isset($_SESSION['debug'])){
		echo '<script>location="index.php"</script>';
		exit;
	}

	if($_POST){
		//向UDP服务器发送数据
	    $handle = stream_socket_client("udp://127.0.0.1:40005", $errno, $errstr);  
	    if( !$handle ){  
	        die("ERROR: {$errno} - {$errstr}\n");  
	    }  
	    
	    $code = "AA5500070541".'0005410901'."A5";
	    fwrite($handle, $code."\n");   // 逐组数据发送
	    fclose($handle);  

	    echo json_encode(['status'=>1]);
	    exit;
	}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>系统升级</title>
 	<link rel="stylesheet" href="./webuploader/webuploader.css">
 </head>
 <style>
 	 /*视频上传样式*/
        .progress,.progress-bar,.sr-only{height:10px; font-size:0;line-height:0}
        .progress{overflow:hidden; 
        	width:100%;
        	border-radius:6px;
 
        }
        .progress-bar{width:170px;background-color:#0099FF;}
        .sr-only{display:inline-block; background-color:#58b957}
        .scwz{
            margin: 0;
            /*width: 100px;*/
            /*float: left;*/
        }
        
        /*系统升级进度*/
        .progress-sys,.progress-sys-bar,.sr-only_sys{height:10px; font-size:0;line-height:0;border-radius: 6px;padding: 0;}
        .progress-sys{overflow:hidden;border-radius:6px}
        .progress-sys-bar{width:100%;background-color:#efefef;}
        .sr-only_sys{display:inline-block; background-color:#58b957}



 </style>
 <body style="background-color: #d8dce3;">
 				<div class="" style="text-align: center;">
 					<h2>系统升级</h2>
                        <div style="width: 250px;margin: 0 auto;">
                        <div class="btns" >  
                                <input type="hidden" id="is_uploadvideo" value="0">
                                <div id="picker" style="">选择升级包</div>  
                                <!-- <p style=" height: 40px;line-height: 40px;"></p> -->

                                <button type="button" id="ctlBtn" class="btn btn-success radius" style="width: 170px;height: 40px;font-size: 18px;background-color: #22DD6D;border-radius: 5px;">上传升级包</button>  
                            <div id="vedioup" style="display: none;"></div>
                            <div id="thelist" class="uploader-list" style="position: relative;">    
                             
                            </div> 
                        </div> 
                            <button type="button" class="btn btn-danger radius" style="width: 170px;height: 40px;font-size: 18px;margin-top: 10px;background-color: #D87D8F;border-radius: 5px;" onclick="sys_update()">执行升级</button> 

                            <div id="pro_wz" class="col-xs-12" style="margin-top: 20px;margin-bottom: 10px;color: green;display: none;">
                            升级进度： 1%
                            </div>
                            <div class="progress-sys col-xs-12" style="text-align: left;display: none;" >
                                <div class="progress-sys-bar"><span class="sr-only_sys" style="" id="pro_jd"></span>
                                </div>
                            </div>

                        </div>

                </div>
 </body>
 <script src="./js/jquery.js"></script>
 <script src="./webuploader/webuploader.js"></script>
 <script>
 	//系统升级
    function sys_update(msg,cmdcode){

        if(window.confirm('确认要执行升级吗？')){
            if($('#is_uploadvideo').val()=='0'){
                alert('请上传升级包！')
                return false;
            } 
            $.post("", {active:'ajax'},
                function(res){
                        if(res.status=='1'){
                            
                            $('#pro_wz').show()
                            $('.progress-sys').show()
                            var num = 0
                            var T2 = setInterval(function(){
                                $('#pro_wz').html('升级进度：'+ ++num +'%')
                                $('#pro_jd').css('width',num +'%')
                                if(num>=100){
                                    alert('升级成功!')
                                    location.href = "logout.php";
                                    $('#pro_wz').html('升级成功！')
                                    clearInterval(T2)
                                }
                            },600);  

                        }
                    }
                ,'json');
            }

    }
 </script>
 <script>  
    // 视频上传
var uploader = WebUploader.create({  
  
    // swf文件路径  
    swf:  './webuploader/Uploader.swf',  
    // formData:{"dn":$("#requestDn").val()},//参数列表  
    // 文件接收服务端。  
    server: './upload.php',  
    // 选择文件的按钮。可选。  
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.  
    pick: '#picker',  
    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！  
    resize: false,  

    // fileNumLimit: xx,//上传数量限制
    // fileSizeLimit: xx,//限制上传所有文件大小
    // fileSingleSizeLimit: xx,//限制上传单个文件大小
    // 只允许选择图片文件。  
    accept: {  
        title: 'file',  
        // extensions: 'tar,zip' 
               // mimeTypes: '.cer,'  
    }  
});  
//当文件被加入前：
uploader.on('beforeFileQueued',function (file){
    //文件只能传tar,zip
    var strRegex = "(.tar|.zip)$";
    var re=new RegExp(strRegex);
    if (!re.test(file.name.toLowerCase())){
    // if(checkfilename.test(file.name)){
        // layer.msg('只能上传 tar , zip 格式的文件！', {icon: 5, shade: [0.3, '#393D49'], time: 1500});
        alert('只能上传 tar , zip 格式的文件！');
        return false
    }
    var filename = file.name
    filename=filename.substring(0,filename.lastIndexOf("."))
    if(filename!='upgrade'){
        alert('文件名只能为upgrade！');
        return false
    }
})

var $list = $("#thelist");  
uploader.on( 'fileQueued', function( file ) {  
    
    $list.append( '<div id="' + file.id + '" class="item">' +  
            '<h4 class="info">' + file.name + '</h4>' +  
            '<p class="state" >等待上传...</p>' +  
            '<p class="scwz scjd'+file.id+'" style="display:block;">上传进度：<span></span></p>' +  
            '</div>' );  
});  
  
uploader.on( 'uploadSuccess', function( file ) {  
    $( '#'+file.id ).find('p.state').text('上传成功');  
    $( '#'+file.id ).find('p.state').css('color','green'); 
    //设置视频上传验证
    $('#is_uploadvideo').val('1')
    //百分比文字
    $('.scjd'+file.id+' span').html('100%'); 
});  
// 文件上传过程中创建进度条实时显示。  
uploader.on( 'uploadProgress', function( file, percentage ) {  
    var $li = $( '#'+file.id ),  
            $percent = $li.find('.progress .progress-bar ');  
  
    // 避免重复创建  
    // if ( !$percent.length ) {  
    //     $percent = $('<div class="progress progress-striped active">' +  
    //             '<div class="progress-bar" role="progressbar" style="width: 0%">' +  
    //             '</div>' +  
    //             '</div>').appendTo( $li ).find('.progress-bar');  
    // }  
  if ( !$percent.length ) {  
        // $percent = $('<div class="progress active">' +  
        //         '<div class="progress-bar" role="progressbar" style="">' +  
        //         '</div>' +
                 
        //         '</div>').appendTo( $li ).find('.progress-bar');  
        $percent = $('<div class="progress active">' +  
                '<div class="progress-bar progress_wz" role="progressbar" style="">' +  
                '</div>' +'<span id="progress_wz"></span>'+
                 
                '</div>').appendTo( $li ).find('.progress-bar'); 
    } 

    $li.find('p.state').text('文件上传中...,请勿离开页面。');  
  
    $percent.css( 'width', percentage * 100 + '%' );  
    //进度百分比文字
    $('.scjd'+file.id+' span').html(Math.ceil((percentage-0.01) * 100 )+'%');

    if($('.scjd'+file.id+' span').html()=='99%'){
        $('.scjd'+file.id+' span').html(Math.ceil((percentage-0.01) * 100 )+'%'+'（正在移动文件，大约需要1~10分钟）');
    }
    
});  
uploader.on( 'uploadError', function( file ) {  
    $( '#'+file.id ).find('p.state').text('上传出错');  
    $( '#'+file.id ).find('p.state').css('color','red');  
    //百分比文字
    $('.scjd'+file.id+' span').html('');
});  
  
uploader.on( 'uploadComplete', function( file ) {  
    // $( '#'+file.id ).find('.progress').fadeOut();  
}); 
//如果上传成功，文件路径写入表单
uploader.on("uploadAccept", function( file, data){ 
    var vedioup = $('#vedioup')
    vedioup.append("<input type='hidden' name='vedioup[]' value="+data._raw+">")
    
    
});

  
$("#ctlBtn").on('click', function() {  
    uploader.upload();  
});  
$("#goBack").on('click', function() {  
    $("#uploadFileDiv").empty();  
    $("#uploadFile").removeClass("hidden");  
});  
</script>
 </html>