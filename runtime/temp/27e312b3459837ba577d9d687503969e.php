<?php if (!defined('THINK_PATH')) exit(); /*a:9:{s:79:"H:\environment\wamp\www\mysite\public/../application/index\view\index\page.html";i:1470795886;s:93:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\layout\layout.html";i:1470642729;s:93:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\public\header.html";i:1470017254;s:91:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\public\nav1.html";i:1470656683;s:92:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\public\model.html";i:1471496728;s:93:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\public\search.html";i:1469856576;s:91:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\public\nav2.html";i:1470642997;s:93:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\public\right2.html";i:1471786418;s:93:"H:\environment\wamp\www\mysite\public/../application/index\view\..\..\html\public\footer.html";i:1469853315;}*/ ?>
<!DOCTYPE html>
<html>
<head><title><?php echo $title; ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css">
    <link href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="static/css/my.css" rel="stylesheet" media="screen">
    <link href="static/css/dl.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="static/js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="static/js/m.js" charset="gbk"></script>
    <script>
    <?php if(($_SERVER['REQUEST_URI'] =='/')): ?>var n =0;
    <?php else: ?> var n =1;
    <?php endif; ?>
    </script>
    <script type="text/javascript" src="static/js/my.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar-example">

<!--nav-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
         <a class="navbar-logo" href="http://www.jq22.com/"><img src="http://www.jq22.com/img/logo.png" height="100%" alt="jQuery插件,jQuery,jQuery特效.jQuery ui,jQuery 教程,css3,网页特效,JS特效"></a> </div>
         <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                  <?php if(is_array($nav['top_nav']) || $nav['top_nav'] instanceof \think\Collection): $i = 0; $__LIST__ = $nav['top_nav'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <li ><a href="<?php echo $item['url']; ?>"><i class="<?php echo $item['style']; ?>"></i> &nbsp;<?php echo $key; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                <li >
                    <?php switch($is_login): case "1": ?>
                    <div class="myhome">
                        <a href="myhome"><img class="tou" src="static/img/tx/<?php echo $myPhoto; ?>.png"/></a>
                        <div class="myhome-z bh2">
                            <a class="bh" href="myhome"><i class="fa fa-home"></i> 个人中心</a>
                            <a class="bh" href="#" onclick="myout()"><i class="fa fa-sign-out"></i> 退出登录</a>
                        </div>
                    </div>
                    <?php break; case "0": ?>
                        <a href="#" data-toggle="modal" data-target="#myModal" >
                        <i class="fa fa-user"></i> &nbsp;注册/登录<span class="sr-only">(current)</span></a>
                    <?php break; default: endswitch; ?>
                </li>
              </ul>
        </div>
      </div><!--/.nav-collapse -->
  </div>
</nav>
<!--end nav-->

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content2 tcc">
             <div class="modal-header2 top20">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                     ×
                 </button>
              <h4 class="modal-title" id="myModalLabel">6666
              </h4>
            </div>
      <div class="modal-body tcck">
            <div class="input-group input-group-lg parentCls">
              <span class="input-group-addon" id="email"><i class="fa fa-envelope-o"></i></span>                
              <input type="text" class="form-control inputElem" placeholder="请输入登录邮箱" aria-describedby="email" id="ema" style="width: 466px;">             
            </div>
            <div class="input-group input-group-lg top20">
              <span class="input-group-addon" id="pwd"><i class="fa fa-unlock-alt" style="width:18px"></i></span>
              <input type="password" class="form-control" placeholder="请输入登录密码" aria-describedby="pwd" id="pw">
              <span class="input-group-btn tccBut">
                <button class="btn btn-success" type="button" onclick="login()">登 录</button>
              </span>
            </div>
      </div>


          <div class="modal-footer2">
                <div class="f"><a href="sendPwd">忘记密码?</a>
                </div>
                  <div class="r"><a href="register">注册新用户</a>
                  </div>
                  <div class="dr"></div>
          </div>

      <div class="d3f modal-body tcck2">          
       <a href="#" onClick="tz()" class="qq"></a>
       <a href="https://api.weibo.com:443/oauth2/authorize?client_id=3364913104&redirect_uri=http%3A%2F%2Fwww.jq22.com%2FWeiboReturn.aspx&response_type=code&display=default" class="sina"></a>
       <a href="http://www.jq22.com/zfbReturn.aspx" class="zfb"></a>
       <a href="#" onClick="gt()" class="git"></a>
     </div>

       <script>          
         function tz() {
           var urldz = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101135281&redirect_uri=http://www.jq22.com/QQReturn.aspx?tjurl=" + window.location.href;
           window.location.href = urldz;
         }
         function gt() {
           var urldz = "https://github.com/login/oauth/authorize?client_id=cf869185ea7d8fcab6df&state=jq22&redirect_uri=http://www.jq22.com/github.aspx?tjurl=" + window.location.href;
           window.location.href = urldz;
         }
       </script>

</div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>

<?php if(($_SERVER['REQUEST_URI'] =='/')): ?>
<div class="container-fluid banner banbk">
	<div class="banseo">
        
    	<input type="text" class="bantxt" id="searchtxt" placeholder="搜索插件.." onkeyup="autoComplete.start(event)"><button class="btn banbutt" type="button" id="seobut" ><i class="fa fa-search"></i></button>
        
        <script type="text/javascript">
			$("#seobut").click(function() {
				var seo = $("#searchtxt").val();
				if (seo.length > 1) {
					window.location.href = "search?seo=" + seo;
				}
			});
			$('#searchtxt').bind('keypress',
			function(event) {
			
				if (event.keyCode == "13") {
					var seo = $("#searchtxt").val();
					if (seo.length > 1) {
						window.location.href = "search?seo=" + seo;
					}
				}
			});
			
			if (window.location.href == "http://jq22.com/") { window.location.href = "http://www.jq22.com/"; }
		</script>
    </div>

	<iframe class="baniframe" sandbox="allow-scripts allow-same-origin" id="mh" src="http://example.com/static/js/a1.html"></iframe>
	<script src="http://example.com/static/js/bb.js"></script>
</div>



<?php endif; ?>
<!--nav-->
<div class="yn jz container-fluid nav-bg m0 visible-lg visible-md visible-sm" id="menu_wrap" >	
  <div class="container m0" style="position:relative;">
    <?php if(is_array($nav['guide_nav']) || $nav['guide_nav'] instanceof \think\Collection): $i = 0; $__LIST__ = $nav['guide_nav'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
    <a class="nzz" href="<?php echo $item['url']; ?>" id="z<?php echo $i; ?>"><span class="sort"><i class="<?php echo $item['style']; ?>"></i> &nbsp;<?php echo $key; ?> <i class="fa fa-angle-down"></i></span></a>|
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="container-fluid">
    <div id="n1" class="nav-zi ty" style="display: none;">
      <?php if(is_array($nav['guide_nav']) || $nav['guide_nav'] instanceof \think\Collection): $id = 0; $__LIST__ = $nav['guide_nav'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$items): $mod = ($id % 2 );++$id;?>
      <ul id="nz<?php echo $id; ?>" class="nn list-inline container m0" style="display: none;">
        <?php if(is_array($items['item']) || $items['item'] instanceof \think\Collection): $i = 0; $__LIST__ = $items['item'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <li><a href="<?php echo $item['url']; ?>"><i class="fa <?php echo $item['style']; ?> ls"></i> <?php echo $item['name']; ?></a> </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
</div>
<!--end nav-->

<!--主体-->
<div class="container m0 bod top70" id="zt">
    <!--左-->
    <div class="col-lg-9 col-md-12 col-sm-12">
        <div class="project">
            <div class="project-header">
                <?php if(is_array($pages) || $pages instanceof \think\Collection): $i = 0; $__LIST__ = $pages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$page): $mod = ($i % 2 );++$i;?>
                <h1><?php echo $page['title']; ?></h1>
                <p>所属分类：<?php echo $page['keyword']; ?></p>
                <div class="row pd10">
                    <div class="f">
                        <span><i class="fa fa-eye"></i>  &nbsp;<?php echo $page['eye']; ?> </span>
                        <span><i class="fa fa-heart"></i>  &nbsp;<?php echo $page['heart']; ?> </span>
                    </div>
                </div>
            </div>
            <div class="project-content">
                <img src="uploads/img/<?php echo $page['img']; ?>.png" class="thumbile" alt="<?php echo $page['img']; ?>">
                <img src="static/img/<?php echo $page['compatible']; ?>.png" class="thumbile" alt="ie兼容<?php echo $page['compatible']; ?>"/>
                <div class="thumbile">
                    <a href="http://www.jq22.com/yanshi<?php echo $page['id']; ?>" target="_blank" class="btn btn-success"><i
                            class="fa fa-eye"></i> &nbsp;查看演示</a>
                    <a href="" target="_blank" class="btn btn-info" style="display:none"><i class="fa fa-globe"></i>
                        &nbsp;website</a>
                    <a href="javascript:void(0)" onclick="mydown()" class="btn btn btn-danger" data-toggle="modal"
                       data-target="#mydown"><i class="fa fa-cloud-download"></i> &nbsp;立即下载</a>
                </div>

                <div class="alert cjms" role="alert">插件描述：<?php echo $page['describe']; ?></div>

<!--                <ul class="x-top" style="padding-left:0px">
                    <div class="fy f zhs"><span class="jg35">PREVIOUS:</span></div>
                    <div class="fy f txtRight zhs"><span class="jg352">NEXT:</span></div>
                    <div class="fy f"><a class='PREVIOUS' href='http://www.jq22.com/jquery-info8881'> jQuery表格隔行换色 </a> </div>
                    <div class="fy f txtRight"><a class='NEXT' href='http://www.jq22.com/jquery-info8867'> jquery 拖动复制 </a> </div>
                    <div class="dr"></div>
                    <div class="df"></div>
                </ul>-->
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
                <div class="in100">
                    <h4 style="padding-left:10px">相关插件-水平导航,其他导航</h4>
                    <?php if(is_array($xgcjs) || $xgcjs instanceof \think\Collection): $i = 0; $__LIST__ = $xgcjs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xgcj): $mod = ($i % 2 );++$i;?>
                    <div class="col-lg-4 col-md-3 col-sm-4">
                        <a href="page?id=<?php echo $xgcj['id']; ?>"><img src="uploads/img/<?php echo $xgcj['img']; ?>.png"></a>
                        <div class="cover-info">
                            <a href="page?id=<?php echo $xgcj['id']; ?>"><h4><?php echo $xgcj['title']; ?></h4></a>
                            <small><?php echo $xgcj['describe']; ?></small>
                        </div>
                        <div class="cover-fields">
                            <i class="fa fa-list-ul"></i> &nbsp;
                            <?php echo $xgcj['keyword']; ?>
                        </div>
                        <div class="cover-stat">
                            <i class="fa fa-eye"></i><span class="f10"> &nbsp;<?php echo $xgcj['eye']; ?></span>
                            <i class="fa fa-heart"></i></i>
                            <span class="f10"> &nbsp;<?php echo $xgcj['heart']; ?></span>

                            <div class="cover-yh">
                                <a href="/<?php echo $xgcj['uid']; ?>" data-container="body" data-toggle="popover"
                                   data-placement="top" data-content="<?php echo $xgcj['username']; ?>">
                                    <i class="fa fa-user-secret"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                    <div class="df"></div>
        </div>
    </div>
    <!--end左-->
    <!--右-->
<div class="col-lg-2 visible-lg" style="width:200px">
          <ul class="zuo f list-group">
            <h6>PROMULGATOR</h6>
            <a href="../men<?php echo $page['uid']; ?>"><img src="static/img/tx/<?php echo $page['myPhoto']; ?>.png"></a>
              <div class="zuox f">
                <h4><?php echo $page['username']; ?></h4> <i class="fa fa-map-marker"></i>
              </div>
              <button type="button" class="btn btn-z top20" onclick="zuozhe()">
                  <i class='fa fa-plus-circle'></i>
                关注作者
                <span id="follow">(<?php echo $follow; ?>)</span>
              </button>
              <button type="button" class="btn btn-z top10" onclick="sc()">
                <i class='fa fa-heart-o'></i>
                收藏此插件
                <span id="heart">(<?php echo $page['heart']; ?>)</span>
              </button>
              <div class="df"></div>
          </ul>
        <div class="df"></div>

    <ul class="list-group" style="margin-bottom:10px">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="搜索插件.." style="height: 34px; margin-top: 8px;" id="searchtxt">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="seobut" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-left-width: 0px;">
                <i class="fa fa-search"></i>
              </button>
            </span>
            <script type="text/javascript">
                $("#seobut").click(function() {
                    var seo = $("#searchtxt").val();
                    if (seo.length > 1) {
                        window.location.href = "search?seo=" + seo;
                    }
                });
                $('#searchtxt').bind('keypress',
                        function(event) {

                            if (event.keyCode == "13") {
                                var seo = $("#searchtxt").val();
                                if (seo.length > 1) {
                                    window.location.href = "search?seo=" + seo;
                                }
                            }
                        });
            </script>
        </div>
    </ul>
    <ul class="list-group">
        <a class="list-group-item on" href="http://www.jq22.com/jq1-jq1" data-para="time">
            <i class="fa fa-flag"></i>
            &nbsp;最新发布
        </a>
        <a class="list-group-item" href="http://www.jq22.com/jq1-jq4" data-para="comments">
            <i class="fa fa-heart"></i>
            &nbsp;最多收藏
        </a>
        <a class="list-group-item" href="http://www.jq22.com/jq1-jq2" data-para="comments">
            <i class="fa fa-comments-o"></i>
            &nbsp;最多评论
        </a>
        <a class="list-group-item" href="http://www.jq22.com/jq1-jq3" data-para="downloads">
            <i class="fa fa-arrow-circle-o-down"></i>
            &nbsp;最多下载
        </a>
        <a class="list-group-item" href="http://www.jq22.com/jq1-jq8" data-para="ie8">
            <i class="fa fa-bus"></i>
            &nbsp;兼容IE8
        </a>
        <a class="list-group-item" href="http://www.jq22.com/jq1-jq6" data-para="ie6">
            <i class="fa fa-motorcycle"></i>
            &nbsp;兼容IE6
        </a>
    </ul>
      <ul class="list-group" >
        <a class="list-group-item on" href="http://www.jq22.com/cssgsh" data-para="time">
          <i class="fa fa-css3"></i>
          &nbsp;css 格式化工具
        </a>
        <a class="list-group-item on" href="http://www.jq22.com/jsgsh" data-para="time">
          <i class="fa fa-code"></i>
          &nbsp;js 格式化工具
        </a>
      </ul>
      <ul class="list-group" style="margin-top:0px">
        <button type="button" class="btn btn-info" style="width:100%" onclick="fbcj()">发布资源获得jQ币</button>
        <a class="btn btn-success top10" style="width:100%" href="http://www.jq22.com/zxzf.aspx">直接获得jQ币</a>
      </ul>
</div>
<!--end右-->

<script type="text/javascript">
    function zuozhe() {
        var yz = $.ajax({
            type: 'post',
            url: 'addFollow',
            data: {lover:<?php echo $page['uid']; ?> },
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.code == "1") {

                   var follow =Number($('#follow').text().match(/\d+/))+1;
                    $('#follow').text('('+follow+')');
                    //window.location.href = window.location;
                } else if(data.code =='0'){
                    $("#myModal").modal();
                }
            },
            error: function () { }
        });
    }

    function sc() {
        var yz = $.ajax({
            type: 'post',
            url: 'collectPlugin',
            data: { plugin:<?php echo $page['id']; ?>},
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.code == "0") {
                    $("#myModal").modal();
                } else if (data.code == '1'){
                    //window.location.href = window.location;
                    var heart =Number( $('#heart').text().match(/\d+/))+1;
                    $('#heart').text('('+heart+')');
                }
            },
            error: function () { }
        });
    }

</script>


<?php if(($_SERVER['REQUEST_URI'] !='/register')): ?>
</div>
<!--end主体-->
<!--底部-->
<nav class="foot navbar-inverse navbar-fixed-bottom">
	<ul class="list-inline">
      <li class="footer-ss">关于我</li>
      <li class="footer-ss">在线反馈</li>
      <li class="footer-ss">帮助中心</li>
      <li>Copyright © 2012-2015 资源平台Version 1.0.0. 备案号:沪ICP备13043785号-1.</li>
    </ul>
    <ul class="list-inline text-right">
   	 	<li >
     
    	</li>
    </ul>
</nav>
<!--end底部-->
</body>
</html>
<?php endif; ?>
