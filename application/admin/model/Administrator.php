<?php
namespace app\admin\model;

use think\Model;
use think\Validate;
class Administrator extends Model
{

    // 设置完整的数据表（包含前缀）
    protected $table = 'think_administrator';

    // 关闭自动写入时间戳
    //protected $autoWriteTimestamp = false;

    //默认时间格式
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $type       = [
        // 设置时间戳类型（整型）
        'create_time'     => 'timestamp',
        'update_time'     => 'timestamp',
        'last_login_time' => 'timestamp',
        'expire_time' => 'timestamp',

    ];
    //自动完成
    protected $insert = [
    	'create_time',
    	'update_time',
    ];
    protected $update = ['update_time'];

    // 属性修改器
    protected function setCreateTimeAttr($value, $data)
    {
        return time();
    }

    // 属性修改器
    protected function setUpdateTimeAttr($value, $data)
    {
        return time();
    }

    // 属性修改器
    protected function setLastLoginTimeAttr($value, $data)
    {
        return time();
    }

    protected function getLastLoginTimeAttr($datetime)
    {
        return date('Y-m-d H:i:s', $datetime);
    }

    protected function setExpireTimeAttr($value, $data)
    {
        return time();
    }
    protected function getExpireTimeAttr($datetime)
    {
        return date('Y-m-d H:i:s', $datetime);
    }

    // status属性读取器
    protected function getStatusAttr($value)
    {
        $status = [-1 => '删除', 0 => '禁用', 1 => '正常', 2 => '待审核'];
        return $status[$value];
    }

    public function check_user($data){
        $rule = [
            //管理员登陆字段验证
            'admin_username|管理员账号' => 'require|min:5',
            'admin_password|管理员密码' => 'require|min:5',
        ];
        // 数据验证
        $validate = new Validate($rule);
        $result   = $validate->check($data);
        if(!$result){
            return $validate->getError();
        }

        $preview = $this->where(array('username'=>$data['admin_username'],'status'=>1))->find();
        if(!$preview){
            $this->error('用户不存在');
        }

        $where_query = array(
            'username' => $data['admin_username'],
            'password' => (isset($preview['salt']) && $preview['salt']) ? md5($data['admin_password'].$preview['salt']) : md5($data['admin_password']),
            'status'   => 1
        );
        return $this->where($where_query)->find();
    }

    public function update_IP($ip){
        $time = time();
        $expire_time = time()+config('auth_expired_time');
        $this->where("id",$this->id)->update(['last_login_ip' => $ip, 'last_login_time' => $time,'expire_time'=>$expire_time]);
    }

}