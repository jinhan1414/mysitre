<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"H:\environment\wamp\www\mysite\public/../application/user\view\Index\myPlugin.html";i:1470736421;}*/ ?>
<!--主体-->
        <!--左-->
            <?php if(is_array($pls) || $pls instanceof \think\Collection): $i = 0; $__LIST__ = $pls;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pl): $mod = ($i % 2 );++$i;?>
            <div class="col-lg-5 col-md-3 col-sm-4">
                <a href="page?id=<?php echo $pl['id']; ?>" target="_blank"><img src="uploads/img/<?php echo $pl['img']; ?>.png"></a>
                <div class="cover-info">
                    <a href="page?id=<?php echo $pl['id']; ?>" target="_blank"><h4><?php echo $pl['title']; ?></h4></a>
                    <small><?php echo $pl['describe']; ?></small>
                </div>
                <div class="cover-fields">
                    <i class="fa fa-list-ul"></i> &nbsp;<?php echo $pl['keyword']; ?>
                </div>
                <div class="cover-stat">
                    <i class="fa fa-eye"></i><span class="f10"> &nbsp;<?php echo $pl['eye']; ?></span>
                    <i class="fa fa-heart"></i></i><span class="f10"> &nbsp;<?php echo $pl['heart']; ?></span>
                    <div class="cover-yh">
                        <a href="man<?php echo $pl['uid']; ?>" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $pl['username']; ?> ">
                            <i class="fa fa-user-secret"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <?php echo $pls->render(); ?>

<script>
    $(document).ready(function(){
        var next_url = $("a.next").attr("href");
        var previous_url = $("a.previous").attr("href");
        $("a.next").attr("href",'#');
        $("a.previous").attr("href",'#');
        $("a.next").click(function(){
            $(".spjz").load(next_url);
        });
        $("a.previous").click(function(){
            $(".spjz").load(previous_url);
        });
        $('[data-toggle="popover"]').popover({trigger:'hover'});
    });
</script>