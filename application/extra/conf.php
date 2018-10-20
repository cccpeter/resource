<?php 
	return [
		// udp配置
		'UDP_PORT'=>'15014',
		'UDP_IP'=>'127.0.0.1',
		//密码秘钥
		'SECRET_KEY'=>'a8f5f167f44f4964e6c998dee827110c',
		//debug操作密码
		'debug_dopwd'=>'ltaadmin',
	
		//设备类别名称
		'dev1'=>'投影机',
		'dev2'=>'电脑',
		'dev3'=>'中控',
		'dev4'=>'多媒体',
		'dev5'=>'其他',

		//报修日志-类型
		'log_type'=>[
			'报修',
			'修复',
		],

		'table_type'=>[
			// '01'=>['table_name'=>'','title'=>'中控设备'],
			'02'=>['table_name'=>'device_repair','title'=>'报修设备'],
			// '03'=>['table_name'=>'','title'=>'对讲设备'],
			// '04'=>['table_name'=>'','title'=>'PC'],
			// '05'=>['table_name'=>'','title'=>'手机'],
			// '06'=>['table_name'=>'','title'=>'平板电脑'],
			// '07'=>['table_name'=>'','title'=>'IC卡注册终端'],
			// '08'=>['table_name'=>'','title'=>'服务器'],
			'09'=>['table_name'=>'device_info','title'=>'信息发布终端'],
		],

		
	];