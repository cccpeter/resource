<?php 


	function uploadfile($name,$path='uploads'){
		//1.判断文件的错误值
		$num = $_FILES[$name]['error'];
		if($num>0){
			switch ($num) {
				case 1:
					$msg = '图片大小超过upload_max_filesize的值';
					break;
				case 2:
					$msg = '文件大小超出了MAX_FILE_SIZE指令';
					break;
				case 3:
					$msg = '没有上传文件';
					break;
				case 4:
					$msg = '没有指定上传的文件就提交表单';
					break;
			}
			echo '<script>alert("'.$msg.'");history.go(-1);</script>';
			exit;
		}
		//3 保存图片
		if(!file_exists($path)){
			mkdir($path,0777,true);
		}

		//确定是否使用HTTP POST上传
		if(is_uploaded_file($_FILES[$name]['tmp_name'])){
			move_uploaded_file($_FILES[$name]['tmp_name'], $path.'/'.$_FILES[$name]['name']);
		}
		return $path.'/'.$file;
	}


$name = uploadfile('file','./upgrade');
echo $name;








 ?>