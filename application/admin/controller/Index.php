<?php
namespace app\admin\controller;
use app\admin\model\Administrator;
use app\admin\controller\AdminAuth;
class Index extends AdminAuth
{
    public function index()
    {
        return $this->fetch();
    }

    public function login()
    {
        $this->view->engine->layout(false);
        return view();
    }
    public function login_action(){

        $user = new Administrator;
        $data = input('post.');
        if ($user = $user->check_user($data)) {
            //注册session
            session('uid',$user->id,'think');
            session('admin_username',$user->username,'think');
            session('admin_password',$user->password,'think');
            session('admin_nickname',$user->nickname,'think');
            //更新最后请求IP及时间
            $request = request();
            $ip = $request->ip();
           $user->update_IP($ip);
            return $this->success('登录成功', '/admin/index');
        } else {
            $this->error('登录失败:账号或密码错误');
        }
    }

    /**
     * [logout 登出操作]
     * @return [type] [description]
     */
    public function logout(){
        session(null, 'think');
        return $this->success('已成功登出', '/admin/login');
    }
}
