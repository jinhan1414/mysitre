<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"H:\environment\wamp\www\mysite\public/../application/user\view\Index\signIn.html";i:1470453606;}*/ ?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>

</title><link href="static/css/bootstrap.min.css" rel="stylesheet" media="screen" /><link href="static/fonts/font-awesome.min.css" rel="stylesheet" media="screen" />
    <!--[if lt IE 9]>
    <script src="static/js/respond.min.js"></script>
    <script src="static/js/html5shiv.min.js"></script>
    <![endif]-->
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: "微软雅黑";
        }
        .progress-bar {
            background-color:#0094ff;
        }
        .qdbut { padding-left:30px; padding-right:30px}

    </style>
</head>
<body>
<form name="form1" method="post" action="./signIn" id="form1">

    <div><input type="hidden" name="key" value="<?php echo $key; ?>" /></div>
    <div>
        <h4>你已连续签到 <?php echo $day; ?>天！</h4>
        <p>签到说明：连续签到3天以上,每天签到都会获得1jQ币.</p>
        <div class="progress" style="height:5px">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $day; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $day*25; ?>%"><!--25-->
                <span class="sr-only"><?php echo $day*45; ?>% Complete</span>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="Button1" value="<?php echo $status; ?>" id="Button1"  <?php echo $disable; ?> class="btn btn-success qdbut" />
        </div>

    </div>
</form>
</body>
</html>

