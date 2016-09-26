<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

/*Route::pattern('setPwd','setPwd[a-fA-F0-9]{64}');
Route::rule(":setPwd","user/Index/setPwd");
Route::rule("setPwd","user/Index/setPwd");*/
Route::rule("setPwd","user/Index/setPwd");
Route::rule("sendPwd","user/Index/sendPwd");
//Route::rule("findPwd","user/Index/findPwd");
Route::pattern('id','[1-9]\d*$');
Route::rule("taCollectPlugin/:id","index/Index/taCollectPlugin");
Route::rule("taPlugin/:id","index/Index/taPlugin");
Route::pattern('men','men[1-9]\d*$');
Route::rule(":men","index/Index/men");
Route::rule("collectPlugin","user/Index/collectPlugin");
Route::rule("addFollow","user/Index/addFollow");
Route::rule("myCollectPlugin","user/Index/myCollectPlugin");
Route::rule("myPlugin","user/Index/myPlugin");
Route::rule("myphoto","user/Index/myPhoto");
Route::rule('login','user/Index/login');
Route::rule('myhome','user/Index/index');
Route::rule("register","user/Index/register");
Route::rule("emailpd","user/Index/emailpd");
Route::rule("email","user/Index/send_email");
Route::rule("regok","user/Index/regok");
Route::rule("regyhm","user/Index/regyhm");
Route::rule("jquerySubmit","user/Index/jquerySubmit");
Route::rule("uploadPlugin","user/Index/uploadPlugin");
Route::rule("myout","user/Index/myout");
Route::rule("signIn","user/Index/signIn");

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'page/[:name]' =>'index/index/page'
    
    

];
