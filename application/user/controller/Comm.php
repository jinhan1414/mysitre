<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/7/31
 * Time: 13:44
 */

namespace app\user\controller;
//use app\index\model\Navigation;
use app\admin\model\Navigation;
use app\user\model\User;

class Comm extends Auth
{
    public $title ="资源平台";
    public $nav = null;
    protected function _initialize()
    {
        $this->is_login();
        $this->get_nav();
        $this->auth_check();

        $uid = session("uid");
        if (isset($uid)){
            $user = new User();
            $myPhoto = $user->get_myPhoto($uid);
        }
        else
            $myPhoto = null;
        $information = array(
            "is_login"=>$this->is_login,
            "title"=>$this->title,
            "nav"=>$this->nav,
            "myPhoto"=>$myPhoto
        );
        $this->assign($information);

    }
    protected function get_nav()
    {
        $n = new Navigation();
        $this->nav = $n->conf;
    }


}