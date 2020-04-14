<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo config_item('assets_dist');?>css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo config_item('assets_dist');?>css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo config_item('assets_plugins');?>bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo config_item('assets_bower');?>datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    td.details-control {
    background: url('<?php echo config_item('assets_path');?>img/brand/details_open.png') no-repeat center center;
    cursor: pointer;
    }
    tr.details td.details-control {
        background: url('<?php echo config_item('assets_path');?>img/brand/details_close.png') no-repeat center center;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SAM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><label>SAM</label></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo config_item('assets_dist');?>img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo config_item('assets_dist');?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $name;?>
                   - 
                  <?php echo $usernip;?>
                </p>
                <!-- <p>
                  <?php echo $role;?>
                </p> -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="<?php echo config_item('base_url');?>dashboard/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>

    <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo config_item('assets_dist');?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo config_item('base_url');?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php
          if($roleid == '2'){
          ?>
        <li>
          <a href="<?php echo config_item('base_url');?>history">
            <i class="fa fa-check"></i> <span>History Absensi</span>
          </a>
        </li>
        <li>
          <a href="<?php echo config_item('base_url');?>editprofile">
            <i class="fa fa-cogs"></i> <span>Edit Profile</span>
          </a>
        </li>
        <li>
          <a href="<?php echo config_item('base_url');?>adddevice">
            <i class="fa fa-laptop"></i> <span>Add Device</span>
          </a>
        </li>
      <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>