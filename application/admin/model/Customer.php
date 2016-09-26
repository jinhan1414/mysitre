<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/8/6
 * Time: 16:05
 * 用于网站用户的管理模型
 */

namespace app\admin\model;


use think\Model;
use  app\user\model\User ;
class Customer extends Model
{
    public $customer;

    /**初始化一些变量和验证
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct(); //父类的构造函数
        $this->customer = new User();
    }

    /**用户列表
     * @return bool|array
     */
    public function customer_list(){

        $column = array("id","email","username","status","expired_time",
            "sign_number","sign_status","coin","last_login_ip");//9
        $list = $this->customer
            ->field($column)->order('id desc')
            ->paginate(15,true);
        if (empty($list))
            return false;
        return $list;
    }


}