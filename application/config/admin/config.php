<?php
//配置文件
return [
	'object_name' => 'TP5 Admin Tpl',
	'auth_password_check' => true, //动态密码校验
	'auth_expired_check'  => true, //动态过期时间校验
	'auth_expired_time'		  => 3600, //权限过期时间设置，默认1小时,请按需要自行设置
	'template'  =>  [
	    'layout_on'     =>  true,
	    'layout_name'   =>  'layout',
	],
    //邮箱配置
    'mail'=>[
        'SMTPDebug' => 0,
        'CharSet' => 'utf-8',
        'Host'=>'smtp.qq.com',
        'Port'=>'465',
        'SMTPSecure'=>'ssl',
        'Username' => '1414641776@qq.com',
        'Password' => 'ikosadhjfoujgfgg',
        'WebName'=>'资源平台',

    ]

];