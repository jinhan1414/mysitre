<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2016/8/3
 * Time: 14:51
 */

namespace app\user\model;


use think\Model;
use think\db;

class Plugin extends Model
{

    /**用户添加插件相关信息
     * @param $pl
     * @return int 成功返回插入id，失败返回fals
     */
    public function add_plugin($pl){
       $column = array( "time","uid", "title",  "keyword", "describe","compatible", "coin", "website", "detail","uploadname");
        foreach ($pl as $key=>$value){
           if (in_array($key, $column))
               $data[$key] = $value;
        }
        return $this->save($data);
    }

    /**获取设置数量的的插件的相关信息（用于主页展示）
     * @param int $number
     * @param int $uid
     * @return bool|\think\paginator\Collection 成功返回二维数组，失败返回false
     */
    public function get_plugin_info($number =15,$uid = 0 ){

        if ($uid == 0){
            $whereSql = array("a.status"=>1);
        }
        elseif($uid !=0)
            $whereSql = array("a.status"=>1,"uid"=>$uid);
        else
            $whereSql = array("a.status"=>1);

        $column = array("a.id","a.uid", "a.title",  "a.keyword", "a.describe","a.heart","a.eye","a.img","p.username");
        $plugin_info = $this
            //->where('a.status',1)
            ->where($whereSql)
            ->alias('a')->join('user p','a.uid = p.id')
            ->field($column)->order('a.id desc')
            ->paginate($number,true);
        if (empty($plugin_info))
            return false;
        return $plugin_info;
    }

    /**获取用户收藏的插件
     * @param $uid
     * @return bool|\think\paginator\Collection
     */
    public function get_user_collect_plugin($uid){

        $id = Db::table('think_user_collection')->where("uid",$uid)
            ->column("plugin_id");
        if (empty($id)){
            echo '你还没收藏过插件呢';
            return false;
            }

       $column = array("a.id","a.uid", "a.title",  "a.keyword", "a.describe","a.heart","a.eye","a.img","p.username");
        $plugin_info = $this
            ->where('a.status',1)
            ->where('a.id','in', $id)
            ->alias('a')->join('user p','a.uid = p.id')
            ->field($column)
            ->paginate(9,true);
        if (empty($plugin_info))
            return false;
        return $plugin_info;

    }

    /**获取指定插件的信息（用于插件单独展示）
     * @param $id
     * @return array|bool 成功返回插件信息，失败返回false
     */
    public function get_plugin($id = 1){
        $column = array("a.id","a.uid", "a.title",  "a.keyword", "a.describe",
            "a.heart","a.eye","a.compatible","a.coin","a.website","a.detail","a.uploadname",
            "a.time","a.img","p.username","p.myPhoto");
        $plugin = $this
            ->where(['a.id'=>$id,"a.status"=>1])
            ->alias('a')->join('user p','a.uid = p.id')
            ->field($column)->order('a.id desc')
            ->paginate(1,true);
        return $plugin;


    }

    public function get_uid($id){
        return $this->where('id',$id)
            ->value("uid");
    }


    /**添加收藏量+1
     * @param $id
     */
    public function add_heart($id){
       $n = $this->where('id',$id)->value("heart")+1;
        $this->where('id',$id)->update(["heart"=>$n]);
    }

    /**添加浏览量
     * @param $id
     */
    public function add_eye($id){

        $n = $this->where('id',$id)->value("eye")+1;
        $this->where('id',$id)->update(["eye"=>$n]);
    }

    public function change_status(){

    }
    public function del_plugin($id){

    }

}