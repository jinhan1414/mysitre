<?php
namespace app\user\model;
use think\Model;
use think\db;
use think\session;
use think\Cookie;
class User extends Model{
    private $email;
    private $pwd;
    private $uid;
    private $username;


    function __construct($email = null ,$pwd = null,$username = null,$uid =null ,$method = 0)
    {
        $this->email = $email;
        $this->pwd = $pwd;
        $this->uid = $uid;
        $this->username = $username;
        parent::__construct();
    }

    /**检查用户信息是否正确
     * @param $email
     * @param $pwd
     * @return mixed 正确，返回用户id ；错误，false
     */
    public function check_user($email, $pwd){
        $user['email'] = $email;
        $user['pwd'] = $pwd;
        $id = $this->where($user)->value('id');
        if ($id){
            $expired_time = time()+7200;
            $this->where('id',$id)->update(['expired_time'=>$expired_time]);
            return $id;
        }
        return false;

    }


    /**判读是否存在该email记录
     * @param null $email
     * @return mixed 存在返回uid，不存在返回false
     */
    public function check_email($email = null){
        $email = is_null($email)?$this->email:$email;
        $result = $this->where(['email'=>$email])->value("id");
        return $result;
    }

    /**根据email获取用户id
     * @param $em
     * @return mixed
     */
    public function get_uid($em = null){
        $em = is_null($em)?$this->email:$em;
       return $this->where("email",$em)->value("id");
    }



    /**添加用户
     * @param $em
     * @param $pwd
     * @param $username
     * @return int :新增的id，false ：插入失败
     */
    public function add_user($em = null, $pwd =null, $username =null){
        $em = is_null($em)?$this->email:$em;
        $pwd = is_null($pwd)?$this->pwd:$pwd;
        $username = is_null($username)?$this->username:$username;
        $data = array("email"=>$em,"pwd"=>$pwd,"username"=>$username,"status"=>1);
        return $this->save($data);
    }

    /**更新用户密码
     * @param $pwd
     * @return int|string
     */
    public function update_pwd($pwd){

        return $this->where("email",$this->email)->update(["pwd"=>$pwd]);
    }

    /**根据uid获取用户名
     * @param $uid
     * @return bool|mixed
     */
    public function get_username($uid = null){
        $uid = is_null($uid)?$this->uid:$uid;
        return $name = $this->where("id",$uid)->value("username")?
            $this->where("id",$uid)->value("username"):false;
    }

    /**获取用户金币数量
     * @param $uid
     * @return mixed
     */
    public function get_coin($uid){
        return $this->where("id",$uid)->value("coin");
    }

    /**增加1个签到次数
     * @param $uid
     */
    public function add_sign_number($uid){
        $num = $this->get_sign_number($uid) + 1;
        $this->where("id",$uid)->update(["sign_number"=>$num]);
    }

    /** 获取签到次数
     * @param $uid
     * @return mixed
     */
    public  function get_sign_number($uid){

        $status = $this->where('id',$uid)->value("sign_status");
        if (date("z")>($status+1))
            $this->where("id",$uid)->update(["sign_number"=>0]);
        return $this->where('id',$uid)->value("sign_number");
    }

    /**获取签到状态
     * @param $uid
     * @return bool true：已签到，false：未签到
     */
    public function get_sign_status($uid){

        $status = $this->where('id',$uid)->value("sign_status");

        return date("z")>$status?false:true ;
    }

    /**设置签到状态
     * @param $uid
     * @param $status
     */
    public function set_sign_status($uid, $status){
        $this->where("id",$uid)->update(["sign_status"=>$status]);
    }

    /**获取验证码
     * @param $uid
     * @return mixed
     */
    public function get_key($uid){
        return $this->where('id',$uid)->value("key");
    }

    /**设置验证码
     * @param $uid
     * @param $key
     */
    public function set_key($uid, $key){

        $this->where("id",$uid)->update(["key"=>$key]);
    }

    /**设置头像
     * @param $uid
     * @param $number
     */
    public function set_myPhoto($uid, $number){
        $this->where("id",$uid)->update(["myPhoto"=>$number]);
    }

    /**获取用户的头像号
     * @param $uid
     * @return mixed
     */
    public function get_myPhoto($uid = null){
        $uid = is_null($uid)?$this->uid:$uid;
        return $this->where(['id'=>$uid])->value("myPhoto");
    }


    /**添加用户关注的插件
     * @param $uid
     * @param $pluginId
     * @return int|string
     */
    public function add_myCollecton($uid, $pluginId){

        $d = array("uid"=>$uid,"plugin_id"=>$pluginId);

        $r = Db::table('think_user_collection')->where(["uid"=>$uid,"plugin_id"=>$pluginId])
            ->value('id');
        if ($r)
            return false;
        $id = Db::table('think_user_collection')
            ->insert($d);
        return $id;
    }

    /**添加用户关注的人
     * @param $uid
     * @param $lover
     * @return bool|int|string
     */
    public function add_myLover($uid, $lover){

        $d = array("uid"=>$uid,"lover"=>$lover);
        $r = Db::table('think_user_lover')->where(["uid"=>$uid,"lover"=>$lover])
            ->value('id');
        if ($r)
            return false;
        $id = Db::table('think_user_lover')
            ->insert($d);
        return $id;
    }

    /**得到用户关注的人
     * @param $uid
     * @return bool|mixed
     */
    public function get_myLover($uid){
        $w = array("uid"=>$uid);
        $lover = Db::table('think_user_lover')->where($w)
            ->column("lover");
        return $name = $this->where("id",'in',$lover)->column("username")?
            $this->where('id','in',$lover)->column("username"):false;
    }

    /**获得关注的人
     * @param $uid
     * @return array|bool
     */
    public function get_myFollow($uid = null){

        $uid = is_null($uid)?$this->uid:$uid;
        $foller = Db::table('think_user_lover')->where("lover",$uid)
            ->column("uid");
        if (empty($foller))
            return array();
        return $name = $this->where("id",'in',$foller)->column("username")?
            $this->where('id','in',$foller)->column("username"):false;
    }

    /**用户登录并设置相关的信息
     * @return bool true：成功，fals ：失败
     */
    public function user_login(){

       if ($uid = $this->check_user($this->email, $this->pwd)){
           Session::set('uid',$uid);
           Session::set('email',$this->email);
           Session::set('pwd',$this->pwd);
           Cookie::init([  'expire'    => 7200]);
           Cookie::set("is_login","1");
        return true;
       }
       return false;
    }

}
