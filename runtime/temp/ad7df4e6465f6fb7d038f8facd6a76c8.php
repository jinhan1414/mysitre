<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:82:"H:\environment\wamp\www\mysite\public/../application/user\view\Index\register.html";i:1471785343;s:92:"H:\environment\wamp\www\mysite\public/../application/user\view\..\..\html\layout\layout.html";i:1470642729;s:92:"H:\environment\wamp\www\mysite\public/../application/user\view\..\..\html\public\header.html";i:1470017254;s:90:"H:\environment\wamp\www\mysite\public/../application/user\view\..\..\html\public\nav1.html";i:1470656683;s:91:"H:\environment\wamp\www\mysite\public/../application/user\view\..\..\html\public\model.html";i:1471496728;s:92:"H:\environment\wamp\www\mysite\public/../application/user\view\..\..\html\public\search.html";i:1469856576;s:90:"H:\environment\wamp\www\mysite\public/../application/user\view\..\..\html\public\nav2.html";i:1470642997;s:92:"H:\environment\wamp\www\mysite\public/../application/user\view\..\..\html\public\footer.html";i:1469853315;}*/ ?>
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
<div class="login">
    <div class="loingnr">
        <div class="modal-body">

            <div class="input-group input-group-lg" style="position:relative;">
                <span class="input-group-addon" id="sizing-s1"><i class="fa fa-envelope-o" style="width:18px"></i></span>

                <input id="myemail" class="form-control" placeholder="请输入登录邮箱" aria-describedby="sizing-addon1" type="text" name="name" size="30" onblur="emailgs(this)" >
                <div class="on_changes" style="position: absolute; left:51px; top: 49px">
                    <li email="">请选择邮箱类型</li>
                    <li email=""></li>
                    <li email="@163.com"></li>
                    <li email="@126.com"></li>
                    <li email="@qq.com"></li>
                    <li email="@sina.com"></li>
                    <li email="@hotmail.com"></li>
                    <li email="@gmail.com"></li>
                    <li email="@yahoo.com"></li>
                </div>

                <span class="input-group-btn tccBut1">
                    <input  type="button"  id="bt1" class="btn btn-success " style=" width:130px; font-size:15px;line-height:28px" value="获取验证码" />
                </span>
            </div>
            <div class="alert alert-danger errts top10" id="empdts" role="alert" style="display:none"><i class="fa fa-info-circle"></i> <span id="erremailts"> 此邮箱已经被注册过</span></div>

            <div class="input-group input-group-lg top20">
                <span class="input-group-addon" id="sizing-s2"><i class="fa fa-user-secret" style="width:18px"></i></span>
                <input type="text" class="form-control" id="myhm" placeholder="用户名" aria-describedby="sizing-addon1" onblur="yhmok(this)">
            </div>
            <div class="alert alert-danger errts top10" id="yhts" role="alert" style="display:none"><i class="fa fa-info-circle"></i> <span id="erreyhmts"> 此用户名已经被使用过</span></div>

            <div class="input-group input-group-lg top20">
                <span class="input-group-addon" id="sizing-s5"><i class="fa fa-qrcode" style="width:18px"></i></span>
                <input type="text" class="form-control" id="yzm" placeholder="请输入验证码" aria-describedby="sizing-addon1" >
            </div>
            <div class="input-group input-group-lg top20">
                <span class="input-group-addon" id="sizing-s3"><i class="fa fa-lock" style="width:18px"></i></span>
                <input type="password" class="form-control" id="pwd1" placeholder="请输入登录密码" aria-describedby="sizing-addon1" >
            </div>
            <div class="input-group input-group-lg top20">
                <span class="input-group-addon" id="sizing-s4"><i class="fa fa-key" style="width:18px"></i></span>
                <input type="password" class="form-control" id="pwd2" placeholder="确认登录密码" aria-describedby="sizing-addon1" onblur="yzm()">
                <span class="input-group-btn tccBut">

                  <input type="button" class="btn btn-success" style="width:130px" onclick="tj()" value="注册">
              </span>
            </div>
            <p ><input type="checkbox" class="check" checked>同意<a class="modalLink" href="#" class="btn btn-default" data-toggle="tooltip" data-html="true" data-placement="top" title="注册声明
		一、用户注册、登陆，视为接受本协议的约束。
		二、用户承诺遵守国家的法律法规及部门规章
		三、用户承诺遵守“jQuery插件库”的知识产权政策.
		四、站内插件用于行业交流、学习。
		五、用户侵犯第三人的知识产权，由该用户承担全部法律责任。

        版权声明
		jQuery插件库（www.jq22.com）站内所有涉及插件及代码由会员上传而来，jQuery插件库不拥有此类插件及代码的版权
		jQuery插件库作为jQuery插件网络服务提供者，对非法转载，盗版行为的发生不具备充分的监控能力。但是当版权拥有者提出侵权指控并出示充分的版权证明材料时，jQuery插件库负有移除盗版和非法转载作品以及停止继续传播的义务。jQuery插件库在满足前款条件下采取移除等相应措施后不为此向原发布人承担违约责任或其他法律责任，包括不承担因侵权指控不成立而给原发布人带来损害的赔偿责任。
		如果版权拥有者发现自己作品被侵权，请及时向jQuery插件库提出权利通知，并将姓名、电话、身份证明、权属证明、具体链接（URL）及详细侵权情况描述发往版权举报专用通道，jQuery插件库在收到相关举报文件后，在3个工作日内移除相关涉嫌侵权的内容
		QQ：67971087（周一到周五，9：30-18:00）">《注册声明》《版权声明》</a></p>



        </div>
    </div>

</div>


<script type="text/javascript" charset="utf-8">

    var wait = 60;
    var id = 0;
    var ea = 0;
    var ea2 = 0;

    //邮箱验证
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    function emailgs(txt) {
        if (!myreg.test(txt.value) || txt.value.length >= 30) {
            $("#myemail").addClass("err");
            $("#myemail").attr('placeholder', '邮箱格式错误')
        }
        else {
            //在线验证是否已经注册
            $("#myemail").removeClass("err");
        }
    }
    //验证用户名
    function yhmok(txt) {
        if (txt.value.length >= 30 || txt.value.length<2) {
            $("#myhm").addClass("err");
            $("#myhm").attr('placeholder', '用户名错误')
        }
        else {
            $("#myhm").removeClass("err");
            var emyz = $.ajax({
                type: 'post',
                url: 'regyhm',
                data: { yhm: txt.value },
                cache: false,
                dataType: 'text',
                success: function (data) {
                    if (data == "y") {
                        $("#yhts").css("display", "none");
                    } else {
                        $("#yhts").css("display", "block");
                    }
                },
                error: function () { }
            });
        }
    }


    document.getElementById("bt1").onclick = function () { time2(this); }
    function time2(o) {
        if (wait == 60) {
            var myemail = $("#myemail").val();
            if (!myreg.test(myemail) || myemail.length >= 30) {
                $("#myemail").addClass("err");
                $("#myemail").attr('placeholder', '邮箱格式错误');
                ea = 1;
            }
            else
            {

                o.setAttribute("disabled", true);
                o.value = "正在发送验证码";
                var yz = $.ajax({
					//timeout : 5000, //超时时间设置，单位毫秒
                    type: 'post',
                    url: 'register',
                    data: { em: myemail },
                    cache: false,
                    dataType: 'text',
					//async :false,
                    success: function (data) {
                        if (data == "y") {
                            $("#empdts").css("display", "none");
                            //delayed(wait,o);
                            id = setInterval(send_time,1000);
							ea2 =0;
                        } else {
                            $("#empdts").css("display", "block");
                            o.removeAttribute("disabled");
                            o.value = "获取验证码";
							ea2 =1;

                        }
                    },
                    error: function () {},
					complete : function(XMLHttpRequest,status){ 
					//请求完成后最终执行参数
							　　　　if(status=='timeout'){
							//超时,status还有success,error等值的情况
							 　　　　　 ajaxTimeoutTest.abort();
							　　　　　  o.value = "获取验证码失败"; 
							　　　　}
							　　}
                });
            }
        }
       /* if (wait == 0 && ea2==0)
        {
            o.removeAttribute("disabled");
            o.value = "获取验证码";
            wait = 60;
        }
        else if (ea == 0 && ea2==0)
        {
            o.setAttribute("disabled", true);
            o.value = "已发送(重发" + wait + ")";
            wait--;
            setTimeout(function () {
                        time2(o)
                    },
                    1000
            );
        }*/

    }

    function send_time() {
        var  obj = document.getElementById("bt1");
        obj.value = "已发送(重发" + wait + ")";
        wait--;
        if(wait == 0){
            obj.removeAttribute("disabled");
            obj.value = "获取验证码";
            wait = 60;
            clearInterval(id);
        }

    }



    //密码
    function yzm() {
        var mpwd1 = $("#pwd1").val();
        var mpwd2 = $("#pwd2").val();
        if (mpwd1 != mpwd2) {
            $("#pwd2").addClass("err");
            $("#pwd2").attr('placeholder', '两次输入的密码不一直')
        } else {
            $("#pwd2").removeClass("err");
        }

    }


    function tj() {
        var myemail = $("#myemail").val();
        var myhm = $("#myhm").val();
        var myzm = $("#yzm").val();

        var mpwd1 = $("#pwd1").val();
        var mpwd2 = $("#pwd2").val();

        if (!myreg.test(myemail) || myemail.length >= 30) {
            $("#myemail").addClass("err");
            $("#myemail").attr('placeholder', '邮箱格式错误')
        }
        else if (myhm.length >= 30 || myhm.length < 2)
        {
            $("#myhm").addClass("err");
            $("#myhm").attr('placeholder', '用户名错误')
        }
        else if (mpwd1 != mpwd2 || mpwd2.length < 5) {
            $("#pwd2").addClass("err");
            $("#pwd2").attr('placeholder', '密码错误')
        }
        else {
            $.post("regok", { Action: "post", em: myemail, username: myhm, code: myzm, pwd: mpwd1, pwd2: mpwd2 }
                    , function (data) {
                        if (data == "y") {
                            window.location.href = "myhome";
                        }else {
                            alert("注册失败");
                        }

                    }, "text");


        }





    }

</script>

</body>
</html>

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
