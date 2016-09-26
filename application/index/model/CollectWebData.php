<?php
namespace app\index\model;

use app\user\model\Plugin;
/**
* 网站数据采集
*/
class CollectWebData 
{
 var $html;
	function getHtml($url){
		    
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$html = curl_exec($ch);
        curl_close($ch);
		//$html = preg_replace('/\s/', '', $html);
		return $html;
	}

	function save_img($i){
	    $url = "http://www.jq22.com/tx/".$i.".png";
        $img = file_get_contents($url);
        file_put_contents($i.".png",$img);
    }

	/**
	* 获取文章列表信息
	*/
	function getArticlesList($pid){
		$url = "http://www.jq22.com/jq".$pid."-jq";
		$this->html = $this->getHtml($url);
		preg_match_all('/<divclass="col-lg-4col-md-3col-sm-4"><ahref="jquery-info(.*?)"target="_blank"><imgsrc="(.*?)"><\/a><divclass="cover-info"><ahref="jquery-info(.*?)"target="_blank"><h4>(.*?)<\/h4><\/a><small>(.*?)<\/small><\/div><divclass="cover-fields"><iclass="fafa-list-ul"><\/i>&nbsp;(.*?)<\/div><divclass="cover-stat"><iclass="fafa-eye"><\/i><spanclass="f10">&nbsp;(.*?)<\/span><iclass="fafa-heart"><\/i><\/i><spanclass="f10">&nbsp;(.*?)<\/span><divclass="cover-yh"><ahref="(.*?)"data-container="body"data-toggle="popover"data-placement="top"data-content="(.*?)"><iclass="fafa-user-secret"><\/i><\/a><\/div><\/div><\/div>/', $this->html, $data,PREG_SET_ORDER);

		foreach ($data as $key => $value) {
			$articles[$key]['id'] = $value[1];
			$articles[$key]['img'] = $value[2];
			$articles[$key]['title'] = $value[4];
			$articles[$key]['small'] = $value[5];
			$articles[$key]['field'] = $value[6];
			$articles[$key]['eye'] = $value[7];
			$articles[$key]['heart'] = $value[8];
			$articles[$key]['uid'] = $value[9];
			$articles[$key]['userName'] = $value[10];

		}
		return $articles;	
	}


	/**
	* 获取单个文章
	*/
		function getPage($pid){
		$url = "http://www.jq22.com/jquery-info".$pid;
		$html = $this->getHtml($url);
		preg_match('/<divclass="project-header"><h1>(.*?)<\/h1><p>所属分类：(.*?)<\/p><divclass="rowpd10"><divclass="f"><span><iclass="fafa-eye"><\/i>&nbsp;(.*?)<\/span><span><iclass="fafa-heart"><\/i>&nbsp;(.*?)<\/span><spanstyle="border-right:0;"><iclass="fafa-comment"><\/i>&nbsp;(.*?)<\/span>/', $html,$header);
		preg_match('/<divclass="project-content"><imgsrc="(.*?)"class="thumbile"alt="(.*?)"><imgsrc="(.*?)"class="thumbile"alt="(.*?)"\/>/', $html,$imgs);
            preg_match('/<divclass="alertcjms"role="alert">插件描述：(.*?)<\/div>/', $html,$cjms);
		preg_match_all('/<divclass="col-lg-4col-md-3col-sm-4"><ahref="http:\/\/www.jq22.com\/jquery-info(.*?)"><imgsrc="(.*?)"><\/a><divclass="cover-info"><ahref="http:\/\/www.jq22.com\/jquery-info(.*?)"><h4>(.*?)<\/h4><\/a><small>(.*?)<\/small><\/div><divclass="cover-fields"><iclass="fafa-list-ul"><\/i>&nbsp;(.*?)<\/div><divclass="cover-stat"><iclass="fafa-eye"><\/i><spanclass="f10">&nbsp;(.*?)<\/span><iclass="fafa-heart"><\/i><\/i><spanclass="f10">&nbsp;(.*?)<\/span><divclass="cover-yh"><ahref="http:\/\/www.jq22.com\/(.*?)"data-container="body"data-toggle="popover"data-placement="top"data-content="(.*?)"><iclass="fafa-user-secret"><\/i><\/a><\/div><\/div><\/div>/', $html,$xgcj,PREG_SET_ORDER);
$article['id'] = $pid;
$article['title'] = $header[1];
$article['class'] = $header[2];
$article['eye'] = $header[3];
$article['heart'] = $header[4];
$article['comment'] = $header[5];
$article['cjms'] = isset($cjms[1])?$cjms[1]:"";
//$article['content'] = isset($cjms[1])?$cjms[2]:"";
$article['imgs'][0] = $imgs[1];
$article['imgs'][1] = $imgs[2];
$article['imgs'][2] = $imgs[3];
$article['imgs'][3] = $imgs[4];

		foreach ($xgcj as $key => $value) {
			$articles[$key]['id'] = $value[1];
			$articles[$key]['img'] = $value[2];
			$articles[$key]['title'] = $value[4];
			$articles[$key]['small'] = $value[5];
			$articles[$key]['field'] = $value[6];
			$articles[$key]['eye'] = $value[7];
			$articles[$key]['heart'] = $value[8];
			$articles[$key]['uid'] = $value[9];
			$articles[$key]['userName'] = $value[10];

		}
		$page = array('article' =>$article ,'xgcjs' =>$articles );
		return $page;	
	}

/**
* 获取页数
*/
function getPageId(){
	preg_match("/<ahref='jq(\d?)-jq'class='next'>/",$this->html,$pageId);
	
	return $pageId[1];
}

public function get_data($pid){
    try{
        $url = "http://www.jq22.com/jquery-info".$pid;
        $html = $this->getHtml($url);
        preg_match('/<divclass="project-header"><h1>(.*?)<\/h1><p>所属分类：(.*?)<\/p><divclass="rowpd10"><divclass="f"><span><iclass="fafa-eye"><\/i>&nbsp;(.*?)<\/span><span><iclass="fafa-heart"><\/i>&nbsp;(.*?)<\/span><spanstyle="border-right:0;"><iclass="fafa-comment"><\/i>&nbsp;(.*?)<\/span>/', $html,$header);
        preg_match('/<divclass="alertcjms"role="alert">插件描述：(.*?)<\/div>/', $html,$cjms);

        if (!isset($header[1]) || strlen($header[1])>=100 || strlen($header[2])>=60){
            echo  "y";
            return;
        }
        $data = array(
            "uid"=>rand(1,100),
            "title"=>$header[1],
            "keyword"=>$header[2],
            "describe"=>isset($cjms[1])?$cjms[1]:"",
            "compatible"=>rand(7,11),
            "time"=>date("Ymd"),
            "coin"=>rand(0,5),
            "uploadname"=>"test.zip"
        );
        $pl = new Plugin();
        echo $pl->add_plugin($data)?("Y"):$pid;
        return ;
    }catch(Exception $e){
        echo "失败！";
        return;
    }

}





}