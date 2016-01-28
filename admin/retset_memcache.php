<?php
$mmc = memcache_init();
if(!empty($_GET)){
    //获取id
    $type = $_GET['type'];
    $uid =  $_GET['uid'];
    if ($type == '1') {
        $mmc->delete('all_user');
    }else{
        if ($uid) {
            $mmc->delete($uid.'_datas');
        }
    }
}
?>
<script>
    location.href='http://ss.anyb.tk/admin/user.php';
</script>