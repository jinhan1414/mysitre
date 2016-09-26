<?php
namespace app\index\model;
use think\Model;
Class Navigation extends Model{


    /**取出导航栏的pid分组
     * @param $n : 分组号
     * @return array pid分组
     */
    public function get_pid($n){
		$pid = $this->distinct('true')
			->where('pid','>',$n)
			->column('pid');
		return $pid;
	}

    /**取出对应分组的导航栏数据
     * @param $pid
     * @return array 导航栏数据
     */
    public function get_nav($pid){
        $objArr = $this->where('pid','=',$pid)->select();
        foreach ($objArr as $value) {
            $navs[] = $value->toArray();
        }
        return $navs;
    }

    /**获取导航栏数据
     * @return array
     */
    public function nav(){
	    $first_nav = $this->all(['level'=>0]);
		$pid = $this->get_pid(0);
		foreach ($pid as $number) {
			$second_nav[] = $this->get_nav($number);
		}
		$nav = array(
		    "first_nav"=>$first_nav,
            "second_nav"=>$second_nav
        );
		return $nav;
	}

}