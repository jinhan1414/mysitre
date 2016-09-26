<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/8/6
 * Time: 16:00
 */

namespace app\admin\model;
use think\Config;


class Navigation
{
    public  $conf = array();

    public function __construct()
    {
        Config::load(APP_PATH.'config/admin/nav_config.php','','admin');
        $this->conf = Config::get('','admin');
    }
    public function add_nav(){

    }

    public function del_nav(){

    }
    public function update_nav(){

    }

    public function get_nav($name){

        return Config::get($name,'admin');

    }


}