<?php
$mmc = memcache_init();
if(!empty($_GET)){
    //获取id
    $type = $_GET['type'];
    $uid =  $_GET['uid'];
    echo "type == ".$type;
    if ($type == '1') {
        $mmc->delete('all_user');
    }else{
        if ($uid) {
            $mmc->delete($uid.'_datas');
        }
    }
}

?>