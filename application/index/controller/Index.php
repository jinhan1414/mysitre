<?php
namespace app\index\controller;
use app\index\model\CollectWebData;
use app\user\controller\Comm;
use app\user\model\Plugin;
use app\admin\model\Navigation;
use app\user\model\User;

class Index extends Comm
{
    /**获取插件信息并渲染对应内容模板
     * @return mixed
     */
    public function index()
    {
        $pl = new Plugin();
        if ($pl = $pl->get_plugin_info())
            return $this->fetch("index",["pls"=>$pl]);
        $this->error("出错误了，请联系管理员！","/");
    }

    /**获取指定插件数据并渲染对应内容模板
     * @return mixed
     */
    public function page(){

        $id = $this->request->param('id');
        $pl = new Plugin();
        if (($pls = $pl->get_plugin($id)) && ($ls = $pl->get_plugin_info(4))){

            $uid = $pl->get_uid($id);
            $u = new User(null,null,null,$uid);
            $follow = count($u->get_myFollow($uid));
            $pl->add_eye($id);
            return $this->fetch("",['pages'=>$pls,"follow"=>$follow,"xgcjs"=>$ls]);
        }

        $this->error("文章不存在！",'/');
    }

    public function men(){

       $subject = $_SERVER["PATH_INFO"];
        preg_match("/men([1-9]\d*$)/", $subject,$m);
        $uid = $m[1];
        $user = new User();
        $u["uid"] = $uid;
        $u["username"] = $user->get_username($uid);
        $u["myPhoto"] = $user->get_myPhoto($uid);
        $u["follow"] =count($user->get_myFollow($uid));
        return $this->fetch("",["user"=>$u]);
    }

    public function taCollectPlugin(){

        $uid = $this->request->param("id");
        $p = new Plugin();
        if ($p = $p->get_user_collect_plugin($uid)){
            $this->view->engine->layout(false);
            echo $this->fetch("../../user/view/index/myPlugin",["pls"=>$p]);
        }
    }
    public function taPlugin(){

        $uid = $this->request->param("id");
        $p = new Plugin();
        if ($p = $p->get_plugin_info(6,$uid)){
            $this->view->engine->layout(false);
            echo $this->fetch("../../user/view/index/myPlugin",["pls"=>$p]);
        }

    }

    public  function test(){
        $p = new CollectWebData();
        for ($i=1;$i<49;$i++){
            $p->save_img($i);
        }




    }

}
