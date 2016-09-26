<?php
namespace app\user\controller;
use app\user\model\ResetPwd;
use think\Request;
use app\user\model\User;
use think\Session;
use think\Cookie;
use PHPMailer;
use app\user\model\RegisterCode;
use app\user\model\Plugin;
class Index extends Comm
{



    public function collectPlugin(){
        $id =$this->request->param("plugin");
        $u = new User();
        $uid = session('uid');
        if (!isset($uid))
            return 0;
        if (!$u->add_myCollecton(session("uid"), $id)){
            return json(["code"=>2]);
        }
        $p = new Plugin();
        $p->add_heart($id);
        return json(["code"=>1]);

    }

    /**密码找回
     * @return mixed
     */
    public function sendPwd(){

        $em = $this->request->param("eml");

        $u = new User();
        if (!$u->check_email($em)){
            $key = random_keys(11);
            return $this->fetch('findPwd',["keycode"=>$key]);
        }

        $resetPwd =  new ResetPwd($em);

        if ($resetPwd->add_row())
            return $this->fetch();

        $key = random_keys(11);
        return $this->fetch('findPwd',["keycode"=>$key]);
    }


    /**密码重置
     * @return mixed|\think\response\Json
     */
    public function setPwd(){

        $email = $this->request->param('email');
        $key = $this->request->param('key');

        $resetPwd = new ResetPwd($email,$key);
        if (!$resetPwd->check_hash()){
            $key = random_keys(11);
            return $this->fetch('findPwd',["keycode"=>$key]);
        }
        $user = new User($email);
        $newPwd = $this->request->param("newPwd");
        if (is_null($newPwd))
            return $this->fetch();
        else
            if ($user->update_pwd($newPwd)){
                $resetPwd->change_status();
                unset($user);
                $user = new User($email,$newPwd);
                if ($user->user_login()) {
                    return json(["code"=>1]);
                }
            }
    }

public function addFollow(){
        $u = new User();
        if (!$u->add_myLover(session("uid"), $this->request->param("lover")))
            return json(["code"=>2]);
        return json(["code"=>1]);
}

    public function index()
    {

        $this->title = "个人中心";
        $uid = Session::get("uid");
        $user = new User();
        $u["username"] = $user->get_username($uid);
        $u["uid"] = $uid;
        $u["coin"] = $user->get_coin($uid);
        $u["myPhoto"] = $user->get_myPhoto($uid);
        $u["follow"] =count($user->get_myFollow($uid));
        return $this->fetch('myhome',["user"=>$u]);
    }

    public function register()
    {
        $email = $this->request->param("em");
        if (!isset($email)){
            $this->title = "用户注册";
            return $this->fetch('register');
        }

        $user = new User($email);
        if ($user->check_email()){
            return 'n';
        }
        $code = random_keys(8);
        $subject = '资源平台注册！';
        if (send_email($email, $subject, $code)){
            $cf = new RegisterCode();
            $cf->add_code($email,$code);
            echo "y";
        }

    }

    function send_email(){

        $email = $this->request->param("em");
        $user = new User($email);
        if (!$user->check_email()){
            return 'n';
        }
        $code = random_keys(8);
        $subject = '资源平台注册！';
        if (send_email($email, $subject, $code)){
            $cf = new RegisterCode();
            $cf->add_code($email,$code);
            echo "y";
        }

    }

    public function myPhoto(){

        $user = new User();
        $uid = session("uid");
        $p = $this->request->param();
        if (empty($p)){
            $this->view->engine->layout(false);
           // $key = rand(548792,91254787);
            //$user->set_key($uid, $key);
            $data["key"] = 1;
            $data["myPhotoNumber"] = config("myPhotoNumber");
            return $this->fetch("",$data);
        }
        else{
            if ($p["key"] ==1 && !empty($p["tx"])){
                $user->set_myPhoto($uid,$p["tx"]);
                echo $p["tx"];
            }
        }

    }

    public function myCollectPlugin(){

        $uid = session("uid");
        $p = new Plugin();
        if ($p = $p->get_user_collect_plugin($uid)){
            $this->view->engine->layout(false);
            echo $this->fetch("myPlugin",["pls"=>$p]);
        }

    }
    public function myPlugin(){

        $uid = session("uid");
        $p = new Plugin();
        if ($p = $p->get_plugin_info(6,$uid)){
            $this->view->engine->layout(false);
            echo $this->fetch("myPlugin",["pls"=>$p]);
        }

    }
    public  function regok(){
        $info = $this->request->param();
        $user = new User($info["em"], $info["pwd"], $info["username"]);
        $code = new RegisterCode();
        $code = $code->get_code($info["em"]);
        if ($info["code"]==$code && $info["pwd"]==$info["pwd2"] && $user->add_user()){
            if ($user->user_login()) {
                echo "y";
            }
            else
                echo "请检查用户名或密码是否正确！";
        }
        else
            return false;
    }
    public  function regyhm(){
        echo "y";

    }

    public function uploadPlugin(){

        $pl = $this->request->param();
        $pl["uid"] = session("uid");
        $pl["time"] = date("Ymd");
        $file = $this->request->file("plugin");
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            if ($info->getExtension() =="zip" || $info->getExtension() =="rar"){
                $pl["uploadname"] = $info->getFilename();
                $plugin = new Plugin();
                if ($id = $plugin->add_plugin($pl)){
                    return 'y';
                }
            }
        }
    }


    public function jquerySubmit(){

       return $this->fetch("submit");
    }
    public function login()
    {

        $request = Request::instance();

        $email = $request->param('em');
        $pwd = $request->param('pw');
        $user = new User($email,$pwd);
        if ($user->user_login()) {

            echo "success";
        }
        else
            echo "请检查用户名或密码是否正确！";

    }

    public  function myout(){
        session(null);
        cookie("is_login",null);
        $this->redirect('/',302);
    }

    /**判读邮箱是否注册过
     * @param y：未注册，n:注册过
     */
    function emailpd()
    {
        $em = $this->request->param("em");
        $user = new User();
        echo $user->check_email($em)?"y":"n";
    }



    /**签到功能
     * @return mixed|string
     */
    public function signIn(){

        $uid = Session::get("uid");
        $user = new User();
        $day = $user->get_sign_number($uid);
        $p = $this->request->param();
        if (empty($p) && !($user->get_sign_status($uid))){
            $key = rand(147852,9874512);
            $user->set_key($uid, $key);
            $data = array("status"=>"签到","disable"=>null,"key"=>$key,"day"=>$day);
        }
        elseif (empty($p) && ($user->get_sign_status($uid))){
            $data = array("status"=>"已签到" ,"disable"=>"disabled=\"disabled\"","key"=>null,"day"=>$day);
        }
        else{
            if (!$user->get_sign_status($uid) && ($p["key"]==$user->get_key($uid))){
                $user->add_sign_number($uid);
                $user->set_sign_status($uid, date("z"));
               $day = $user->get_sign_number($uid);
                $data = array("status"=>"已签到" ,"disable"=>"disabled=\"disabled\"","key"=>null,"day"=>$day);

            }
            else
                return "签到错误！";
        }
        $this->view->engine->layout(false);
        return $this->fetch("",$data);
    }
}
