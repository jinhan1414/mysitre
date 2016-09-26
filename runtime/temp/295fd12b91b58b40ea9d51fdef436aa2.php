<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"H:\environment\wamp\www\mysite\public/../application/user\view\Index\myPhoto.html";i:1470654684;}*/ ?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>

</title>
    <style>
        body {
            font-family: "微软雅黑";
        }
        img{
            border-radius: 10px; width:60px;height:60px;border: 2px solid #fff;
        }
        .qdbut { padding-left:30px; padding-right:30px}
        a{display:inline-block;border-radius: 10px;}
        .bk{ border: 2px solid #74CC00;background-color: #91FF00;}
    </style>
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        var tx;
        var key;
        $(document).ready(function(){
            $("a").click(function () {
                $("a").removeClass("bk");
                $(this).addClass("bk");
                tx=$(this).attr('name');
                key=$("input").attr('value');
            });
        });
    </script>
</head>
<body>
<form name="form1" method="post" action="./myPhoto.aspx" id="form1">
    <div>
        <input type="hidden" name="key" value="<?php echo $key; ?>" />
    </div>
    <div>
        <?php $__FOR_START_9051__=1;$__FOR_END_9051__=$myPhotoNumber+1;for($i=$__FOR_START_9051__;$i < $__FOR_END_9051__;$i+=1){ ?>
        <a name="<?php echo $i; ?>"><img src="/static/img/tx/<?php echo $i; ?>.png" /></a>
        <?php } ?>

    </div>
</form>
</body>
</html>
