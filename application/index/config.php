<?php

return [
    'session'                => [
        'id'             => '',
        // SESSION_ID的提交变量,解决flash上传跨域
        'var_session_id' => '',
        // SESSION 前缀
        'prefix'         => 'index_',
        // 驱动方式 支持redis memcache memcached
        'type'           => '',
        // 是否自动开启 SESSION
        'auto_start'     => true,
    ],

    'cache'                  => [
        // 驱动方式
        'type'   => 'File',
        // 缓存保存目录
        'path'   => APP_PATH.'runtime/cache/',
        // 缓存前缀
        'prefix' => 'resource_',
        // 缓存有效期 0表示永久缓存
        'expire' => 0,
    ],
    'sqlmode'               =>[
        // 数据库模式，0为sqlite，1位mysql
        'type'   => '0',
    ],
    'videotype'             =>[
        'videotab'=>'1',
        'livetab'=>'2',
        'opentab'=>'3',
    ]
    
];