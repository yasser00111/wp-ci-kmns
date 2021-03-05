<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="favicon.ico" />

  <title>Tempat penitipan anak</title>
  <link href="<?= base_url('assets/css/flatly-bootstrap.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/general.css') ?>" rel="stylesheet" />
  <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= site_url('user_tampil/dashboard') ?>">Dashboard</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?= site_url('user_tampil') ?>"><span class="glyphicon glyphicon-th-large"></span> Daftar TPA</a></li>
          <li><a href="<?= site_url('user_tampil/perhitungan') ?>"><span class="glyphicon glyphicon-calendar"></span>hasil perhitungan</a></li>
          <li><a href="<?= site_url('user_tampil/tentang') ?>"><span class="glyphicon glyphicon-calendar"></span> Tentang</a></li>
          <li><a href="<?= site_url('user_tampil/contact') ?>"><span class="glyphicon glyphicon-th-address-book"></span> Contact</a></li>
          <li><a href="<?= site_url('home') ?>"><span class="glyphicon glyphicon-log-out"></span> Login</a></li>
        </ul>
      </div>
      /.nav-collapse
  </nav>

  <div class="container">
    <div class="page">
      <h1><?= $title ?></h1>
    </div>