<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/8/2
 * Time: 9:09
 */

namespace app\user\model;
use  think\model;

class RegisterCode extends Model
{
   function add_code($em,$code)
   {
       $e = $this->where("email",$em)->find();
       if (is_null($e)){
           $data = array("email"=>$em,"code"=>$code,"expired"=>time()+600);
           $this->insert($data);
       }else{
           $this->where("email",$em)->update(["code"=>$code,"expired"=>time()+600]);

       }

   }
    /**获取发送的验证码
     * @param $em
     * @return bool|mixed
     * 成功返回验证码，失败返回false
     */
    public function get_code($em)
   {
       $e = $this->where("email",$em)->find();
       if (is_null($e)){
           return false;
       }elseif ($e->expired>time()){
               return $e->code;
       }else
           return false;


   }


    /**根据code获取email
     * @param $code
     * @return mixed
     */
    public function get_email($code){
       return $this->where("code",$code)
           ->value("email");
   }


}