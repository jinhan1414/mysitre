<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/7/30
 * Time: 15:59
 */

namespace app\user\controller;
use  think\Controller;
use  app\user\model\User;


class Auth extends Controller
{
    public $is_login =0 ;

    /**初始化检查
     * @return bool
     */
    protected function auth_check()
    {

        //检查模块权限
        if ($this->auth_check_module())
            return true;
        //检查是否拥有会话令牌
        if (!session('uid')){
            cookie("is_login",null);
            $this->error("请登录！","/");
        }

        //检查密码有效性
        $expired_time = $this->auth_check_pwd(session('email'),session('pwd'));
        //检查时效
        $this->auth_check_expired($expired_time);
        $this->is_login = 1;

    }

    /**检查访问的模块是否需要验证
     * true :不需要
     * false :需要
     * @return bool
     */
    protected function auth_check_module()
    {
        //不需要验证的
        $no_check_module = array('index');
        $no_check_action = array('user/setPwd','user/sendPwd','user/login','user/register','user/emailpd','user/send_email','user/regyhm','user/regok','user/findPwd');
        $module_name = $this->request->module();
        $action_name = $this->request->module().'/'.$this->request->action();
        if (in_array($action_name,$no_check_action) || in_array($module_name,$no_check_module))
            return true;
        return false;


    }


    /**检查密码有效性,返回登陆时间戳
     * @param $email
     * @param $pwd
     * @return 时间戳
     */
    protected function auth_check_pwd($email, $pwd)
    {
        $user = new User();
        $where_query = array(
            "email"=>$email,
            "pwd"=>$pwd,
            "status"=>1
        );
        $user = $user->where($where_query)->value("expired_time");
        if ($user){
            return $user;
        }

        session(null);
        $this->error("请重新登陆！!!","/");

    }

    /**  检查时效
     * @param $expired_time
     * @return bool|void
     */
    private function auth_check_expired($expired_time)
    {
        if (time()>$expired_time){
            cookie("is_login",null);
            $this->error("请重新登陆o！","/");
        }
        return true;
    }

    protected function is_login()
    {
        $j = $this->request->cookie("is_login");
        if(isset($j) && $j ==1)
            $this->is_login = 1;

    }

}