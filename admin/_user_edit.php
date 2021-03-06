<?php
require_once '../lib/config.php';
require_once '_check.php';

if(!empty($_POST)){
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $passwd = $_POST['passwd'];
    $email = $_POST['email'];
    $transfer_enable = $_POST['transfer_enable'];
    $invite_num = $_POST['invite_num'];
    $end_date = $_POST['end_date'];
    //更新
    $User = new Ss\User\User($uid);
    $query = $User->updateUser($name,$email,$passwd,$transfer_enable,$invite_num, $end_date);
    if($query){
                $ue['code'] = '1';
                $ue['ok'] = '1';
                $ue['msg'] = "修改成功！即将跳转到用户管理列表！";
                $mmc = memcache_init();
                $mmc->delete('all_user');
                $mmc->delete($uid.'_datas');
    }else{
                $ue['code'] = '0';
                $ue['msg'] = "出错了，请重试";
    }
}
echo json_encode($ue);
