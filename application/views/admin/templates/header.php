<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="icon" href="<?= base_url('asset/img/logo.png') ?>">
  <!--- bootstrap--->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/css/daterangepicker.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/css/bootstrap-timepicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>asset/css/bootstrap-datepicker.min.css">
  <!-- Custom Sylesheet -->
  <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/admin.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/costumalert.css') ?>">
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3>Hi, <?= $admin['Nama_Admin']; ?></h3>
      </div>
      <ul class="lisst-unstyled components">
        <div class="text-center mb-2">
          <img src="<?= base_url('asset/img/logo.png') ?>" width="80px">
        </div>
        <hr class="my-2">
        <div class="sidebar-heading">Home</div>
        <li class="<?php if (isset($active)) echo ('bg-info') ?>">
          <a href="<?= base_url() ?>Admin">Beranda</a>
        </li>
        <li>
          <hr class="my-2">
          <div class="sidebar-heading">Manage</div>
          <a href="#submenuproduk" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle <?php if ($this->uri->segment(2) == 'subkategori' ||  $this->uri->segment(2) == 'produk' || $this->uri->segment(2) == 'kategori') echo 'bg-info' ?>">Barang</a>
          <ul class="collapse lisst-unstyled" id="submenuproduk">
            <li class="<?php if ($this->uri->segment(2) == 'produk') echo 'bg-info' ?>">
              <a href="<?= base_url() ?>Admin/produk">Produk</a>
            </li>
            <li class="<?php if ($this->uri->segment(2) == 'subkategori') echo 'bg-info' ?>">
              <a href="<?= base_url() ?>Admin/subkategori">SubKategori</a>
            </li>
            <li class="<?php if ($this->uri->segment(2) == 'kategori') echo 'bg-info' ?>">
              <a href="<?= base_url() ?>Admin/kategori">Kategori</a>
            </li>
          </ul>
        </li>
        <hr class="my-2">
        <div class="sidebar-heading">Transaction</div>
        <li class="<?php if ($this->uri->segment(2) == 'pemesanan') echo 'bg-info' ?>">
          <a href="<?= base_url() ?>Admin/pemesanan">Pemesanan</a>
        </li>
      </ul>
    </nav>
    <main>
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <img src="<?= base_url('asset/img/alignleft.png') ?>" width="30px">
            <span>Menu Utama</span>
          </button>
          <a href="<?= base_url() ?>Admin"><img src="<?= base_url('asset/img/logo.png') ?>" width="100px"></a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <button role="button" type="button" class="btn dropdown" data-toggle="dropdown">
                  <img src="<?= (!empty($admin['Foto_Admin'])) ? base_url('asset/img/') . $admin['Foto_Admin'] : base_url('asset/barang/Noimage.png'); ?>" class="user-image" width="30px">
                  <span class="hidden-xs"><?= $admin['Nama_Admin']; ?></span>
                </button>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <div class="d-flex justify-content-center"><img src="<?= (!empty($admin['Foto_Admin'])) ? base_url('asset/img/') . $admin['Foto_Admin'] : base_url('asset/barang/Noimage.png'); ?>" class="img-circle" width="80px">
                    </div>
                    <p class="text-center">
                      <small>Terakhir login <?= $admin['Terakhir_Login']; ?></small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <hr class="my-1">
                    <div class="float-left">
                      <a href="<?= base_url('admin/profileadmin') ?>" class="btn btn-default btn-flat"><img src="<?= base_url() ?>asset/img/edit_profile.png" height='30px' width='30px'>Update</a>
                    </div>
                    <div class="pull-right ml-1">
                      <a href="<?= base_url('authen/Logout') ?>" class="btn btn-default btn-flat"><img src="<?= base_url() ?>asset/img/logout.png" height='30px' width='25px'>Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>