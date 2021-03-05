<?php
if (!$this->session->has_userdata('login'))
  redirect('user/login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TPA </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower/datatables/css/dataTables.bootstrap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower/Ionicons/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/skins/_all-skins.min.css') ?>">
  <script src="<?= base_url('assets/adminlte/bower/jquery/dist/jquery.min.js') ?>"></script>
  <style type="text/css">
    .form-horizontal .control-label {
      text-align: left;
    }
  </style>
</head>

<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-mini"><b>Tempat penitipan anak</b></span>
        <span class="logo-lg"><b>TPA</span>
      </a>
      <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/adminlte/dist/img/avatar5.png') ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><b>Admin</b></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?= base_url('assets/adminlte/dist/img/avatar5.png') ?>" class="img-circle" alt="User Image">

                  <p>
                    Admin

                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= site_url('user/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          </ul>
        </div>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url('assets/adminlte/dist/img/avatar5.png') ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Admin</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li><a href="<?= site_url('home') ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          <li><a href="<?= site_url('kriteria') ?>"><i class="fa fa-home"></i> <span>Kriteria</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file-text"></i> <span>Data Alternatif</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= site_url('alternatif') ?>"><i class="fa fa-angle-right text-blue"></i> Alternatif</a></li>
              <li><a href="<?= site_url('relasi') ?>"><i class="fa fa-angle-right text-blue"></i> Nilai Alternatif</a></li>
            </ul>
          </li>
          <li><a href="<?= site_url('tpa') ?>"><i class="fa fa-home"></i> <span>Data TPA</span></a></li>
          <li><a href="<?= site_url('perhitungan_kmeans') ?>"><i class="fa fa-home"></i> <span>hitung K-means</span></a></li>

          <li><a href="<?= site_url('hitung') ?>"><i class="fa fa-home"></i> <span>Perhitungan</span></a></li>
          <li><a href="<?= site_url('user/password') ?>"><i class="glyphicon glyphicon-lock"></i> <span>Password</span></a></li>
          <li><a href="<?= site_url('user/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content container-fluid">
        <h1> <?= $title ?></h1>