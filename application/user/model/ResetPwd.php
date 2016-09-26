<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/8/15
 * Time: 17:46
 */

namespace app\user\model;


use think\Model;

class ResetPwd extends Model
{
    private $email;
    private $ip;
    private $key;


    /**    /**根据数据初始化对应的字段
     * ResetPwd constructor.
     * @param array|object $email
     * @param $key
     */
    function __construct($email, $key =null)
    {
        parent::__construct();
        $req = request();
        $this->email = isset($email)?$email:die('输入邮箱');
        $this->ip = $req->ip();
        $this->key = isset($key)?$key:$this->get_one_key();
    }


    /**添加一条记录
     * @return bool
     */
    public function add_row(){

        $expired = $this->where('email',$this->email)->value('expired');
        if ($expired+3600>time())
            return false;
        $data = array(
            'email'=>$this->email,
            'key'=>$this->key['key'],
            'ip'=>$this->ip,
            'expired'=>time(),
            'status'=>0,
            'time'=>$this->get_time() + 1
        );
        if ($this->check_row())
            $hash = $this->insert($data)==1?$this->key['hash']:false;
        else
            $hash = $this->where('email',$this->email)->update($data)==0?false:$this->key['hash'];
        return $hash?$this->send_link($hash):false;

    }

    /**验证hash是否通过
     * @return bool
     */
    public function check_hash(){
        if (!is_array($this->key) && ($status = $this->check_status())  )
        {
            $password = $this->where('email',$this->email)->value('key')?
                $this->where('email',$this->email)->value('key'):die("获取key失败！");
            return password_verify($password, $this->key);
        }

        return false;
    }

    /** 当修改密码完成后，修改状态
     *
     */
    public function change_status(){
        $this->where('email',$this->email)->update(['status'=>1]);
    }


    /**检查状态
     * @return bool
     */
    private function check_status($time = 7200){
        $status = $this->where('email',$this->email)->value('status');
       $expired =  $this->where('email',$this->email)->value('expired');
        return $status == 0 && $expired+$time>time();
    }
    /**发送重置链接
     * @param $hash
     * @return bool
     */
    private function send_link($hash){
        $msg = "你正在为你的账号找回密码，请点击链接： http://example.com/setPwd?key=".$hash.'&email='.urlencode($this->email);
        $subject = "找回资源平台的密码";
        return send_email($this->email,$subject,$msg);
    }
    /**检查记录是否存在
     * @return bool
     */
    private  function check_row(){
       $key = $this->where('email',$this->email)->value('key');
        if (empty($key))
            return true;
        return false;
    }
    private function get_time(){
        return $this->where('email',$this->email)->value('time');
    }

    /**产生验证密钥与对于的hash
     * @param int $length
     * @return array
     */
    private function get_one_key($length = 11){
        
        $key =random_keys($length);
        $key .=$this->email.$this->ip;
        $hash = password_hash($key, PASSWORD_BCRYPT )?password_hash($key, PASSWORD_BCRYPT ):die("错误发生在hash阶段");
        return array('key'=>$key,'hash'=>$hash);

    }


}