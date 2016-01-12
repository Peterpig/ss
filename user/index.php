<?php
require_once '_main.php';

//获得流量信息
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$all_transfer = $oo->get_transfer_enable()/$togb;
$unused_transfer =  $oo->unused_transfer()/$togb;
$used_100 = $oo->get_transfer()/$oo->get_transfer_enable();
$used_100 = round($used_100,2);
$used_100 = $used_100*100;
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = round($all_transfer,2);
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();
?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                用户中心
                <small>User Center</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- START PROGRESS BARS -->
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">公告&FAQ</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>流量不会重置，可以通过签到获取流量。</p> 
                            <p>流量可以通过签到获取，基本每天可以用1G流量。</p> 
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">流量使用情况</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 已用流量：<?php echo $transfers."MB";?> </p>
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $used_100; ?>%">
                                    <span class="sr-only">Transfer</span>
                                </div>
                            </div>
                            <p> 可用流量：<?php echo $all_transfer ."GB";?> </p>
                            <p> 剩余流量：<?php echo  $unused_transfer."GB";?> </p>
                            <p> SS到期时间：<code><?php echo $oo->get_end_date();?></code>
                            <?php
                                $zero1 = date("Y-m-d h:i:s");
                                $zero2 = $oo->get_end_date();
                                $status = 1;
                                if(strtotime($zero1) > strtotime($zero2)){
                                 $status = 0;
                                }
                            ?>
                            <span class='<?php if ($status == 0){echo "label label-danger";} ?>'>
                                <?php 
                                    if ($status == 0){
                                    echo "  已到期，请及时缴费！";
                                    }
                                ?>
                            </span>
                            <p> 有问题联系我：
                            <?php
                                echo '<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=309871271&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:309871271:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a>';
                            ?>
                            </p>
                            <p> 支付二维码：
                            <code onclick="ViewPic()">点击这里查看二维码</code>付款完成后，请将您的支付宝名字 和 端口号，发到上面的QQ，谢谢！
                            </p>
                            </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (left) -->



                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">签到获取流量</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 22小时内可以签到一次。</p>
                            <?php  if($oo->is_able_to_check_in())  { ?>
                                <p id="checkin-btn"> <button id="checkin" class="btn btn-success  btn-flat">签到</button></p>
                            <?php  }else{ ?>
                                <p><a class="btn btn-success btn-flat disabled" href="#">不能签到</a> </p>
                            <?php  } ?>
                            <p id="checkin-msg" ></p>
                            <p>上次签到时间：<code><?php echo date('Y-m-d H:i:s',$oo->get_last_check_in_time());?></code></p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->

                <div class="col-md-6">
                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">连接信息</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p> 端口：<code><?php echo $oo->get_port();?></code> </p>
                            <p> 密码：<?php echo $oo->get_pass();?> </p>
                            <p> 套餐：<span class="label label-info"><?php echo $oo->get_plan();?></span> </p>
                            <p> 最后使用时间：<code><?php echo date('Y-m-d H:i:s',$unix_time);  ?></code> </p>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col (right) -->
            </div><!-- /.row -->
            <!-- END PROGRESS BARS -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<div id="layer-photos-demo" class="layer-photos-demo">
    <img layer-pid="1" layer-src="https://ooo.0o0.ooo/2016/01/11/569484390e6ee.png" src="https://ooo.0o0.ooo/2016/01/11/56948438f3f5d.png" alt="搜我支付，请备注支付端口！">
</div>
<?php
require_once '_footer.php'; ?>

<script src="../asset/layer.js"></script>
<script>
    $(document).ready(function(){
        layer.config({
            extend: '../asset/extend/layer.ext.js'
        });
        $("#checkin").click(function(){
            $.ajax({
                type:"GET",
                url:"_checkin.php",
                dataType:"json",
                success:function(data){
                    $("#checkin-msg").html(data.msg);
                    $("#checkin-btn").hide();
                },
                error:function(jqXHR){
                    alert("发生错误："+jqXHR.status);
                }
            })
        })
    })
function ViewPic(){
    // pic_list = {
    //     'alt':'支付时请备注端口号',
    //     'pid':1,
    //     'src':'https://ooo.0o0.ooo/2016/01/11/5694885745685.png',
    //     'thumb': 'https://ooo.0o0.ooo/2016/01/11/5694885753cf8.png'
    // }
    var pic_list = new Array();
    pic_list.push({'alt':'完成后请将您支付宝名+端口号发给群主！', 'pid':1, 'src':'https://ooo.0o0.ooo/2016/01/11/56948aa53a652.png', 'thumb':'https://ooo.0o0.ooo/2016/01/11/56948aa53a652.png'})
    json_dic = {
            "title": "完成后请将您支付宝名+端口号发给群主！", //相册标题
            "id": 1, //相册id
            "data": pic_list
        }
    layer.photos({
        photos: json_dic,
    });
}
</script>

