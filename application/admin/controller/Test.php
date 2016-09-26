<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/8/8
 * Time: 13:14
 */

namespace app\admin\controller;

use app\admin\model\Navigation;
use think\Controller;

class Test extends Controller
{
    public function index(){
        $n = new Navigation();
        return $n->conf;

    }

}