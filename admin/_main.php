<?php
require_once '../lib/config.php';
require_once '_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $site_name;  ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <!-- <link href="../asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="http://120.52.72.22/apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="http://120.52.72.22/libs.useso.com/js/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://120.52.72.22/cdn.bootcss.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="http://120.52.72.22/anyb.applinzi.com/asset/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="http://120.52.72.22/anyb.applinzi.com/asset/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <link href="http://120.52.72.22/cdn.bootcss.com/jquery-datetimepicker/2.1.8/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <a href="index.php" class="logo"><?php echo $site_name;  ?></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo \Ss\User\Comm::Gravatar($U->GetEmail());  ?>" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?php echo $U->GetUserName(); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo \Ss\User\Comm::Gravatar($U->GetEmail());  ?>" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo $U->GetEmail(); ?>
                                    <small>加入时间：<?php echo $U->RegDate(); ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="my.php" class="btn btn-default btn-flat">个人信息</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">退出</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo \Ss\User\Comm::Gravatar($U->GetEmail());  ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo $U->GetUserName(); ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li>
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>管理中心</span>
                    </a>
                </li>

                <li>
                    <a href="server.php">
                        <i class="fa fa-dashboard"></i> <span>服务器状态</span>
                    </a>
                </li>

                <li>
                    <a href="node.php">
                        <i class="fa fa-sitemap"></i> <span>节点编辑</span>
                    </a>
                </li>

                <li>
                    <a href="user.php">
                        <i class="fa fa-user"></i> <span>查看用户</span>
                    </a>
                </li>

                <li>
                    <a href="invite.php">
                        <i class="fa fa-users"></i> <span>邀请管理</span>
                    </a>
                </li>
                <li>
                    <a href="invite_list.php">
                        <i class="fa fa-users"></i> <span>邀请码</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
