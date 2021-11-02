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
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- Custom Sylesheet -->
  <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/simple-sidebar.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/preloader.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/costumalert.css') ?>">
  <!-- slider -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/slick-1.8.1/slick/slick.css') ?>" />
  <?php if (isset($map)) echo $map['js']; ?>
</head>

<body>
  <header>

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-16 col-12">
          <div class="btn-group">
            <button class="btn border my-md-4 my-2 text-white"><img src="<?= base_url('asset/img/indo.png') ?>" width="25px" height="25px"> ID</button>
          </div>
        </div>
        <div class="col-md-4 col-16 text-center">
          <a href="<?= base_url() ?>Home" class="my-md-3 site-title"><img src="<?= base_url('asset/img/logo.png') ?>" alt="Badriah Collection" width=120px height="100px"></a>
        </div>

        <div class="col-md-4 col-16 text-right">
          <?php if ($user) : ?>
            <div class="navbar-custom-menu my-4">
              <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <button role="button" type="button" class="btn dropdown" data-toggle="dropdown" style="width: auto; height:40px">
                    <img src="<?= (!empty($user['Avatar'])) ? base_url('asset/img/' . $user['Avatar'])  : base_url('asset/img/Noimage.png'); ?>" class="user-image mt-0" width="30px" height="25px" style="border-radius: 50%;">
                    <span class="hidden-xs" style="font-size: 18px;"><?= $user['Username']; ?></span>
                  </button>
                  <ul class="dropdown-menu menuprofil">
                    <!-- User image -->
                    <li class="user-header">
                      <div class="d-flex justify-content-center mb-1"><img src="<?= (!empty($user['Avatar'])) ? base_url('asset/img/' . $user['Avatar']) : base_url('asset/barang/Noimage.png'); ?>" style="border-radius: 50%;" class="img-circle" width="85px">
                      </div>
                      <p class="text-center">
                        <small>Terakhir login <?= $user['Terakhir_Login']; ?></small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <hr class="my-1">
                      <div class="float-left">
                        <a href="<?= base_url('home/profile') ?>" class="btn btn-default btn-flat"><img src="<?= base_url() ?>asset/img/edit_profile.png" height='30px' width='30px'>Update</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?= base_url('home/riwayatpemesanan') ?>" class="btn btn-default btn-flat"><img src="<?= base_url() ?>asset/img/riwayat_pemesanan.png" height='25px' width='25px'> Riwayat Pemesanan</a>
                      </div>
                      <div class="pull-right ml-1">
                        <a href="<?= base_url('authen/Logout') ?>" class="btn btn-default btn-flat"><img src="<?= base_url() ?>asset/img/logout.png" height='30px' width='25px'> Logout</a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          <?php else : ?>
            <div class="" style="margin-top: 35px;">
              <a href="<?= base_url('authen') ?>" class="px-2 font-italic text-light"><u>Masuk || Daftar</u></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link <?php if (isset($active)) echo ($active) ?>" href="<?= base_url() ?>Home">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($this->uri->segment(2) == 'kategori') echo 'active' ?>" href="<?= base_url() ?>Home/kategori">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($this->uri->segment(2) == 'produk' or $this->uri->segment(2) == 'allproduk') echo 'active' ?>" href="<?= base_url() ?>Home/allproduk">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($this->uri->segment(2) == 'caramemesan') echo 'active' ?>" href="<?= base_url() ?>Home/caramemesan">Cara Memesan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if ($this->uri->segment(2) == 'tentangkami') echo 'active' ?>" href="<?= base_url() ?>Home/tentangkami">Tentang Kami</a>
            </li>
          </ul>
        </div>
        <div class="navbar-nav">
          <li class="nav-item mx-3 search-icon">
            <!-- Search form -->
            <form action="<?= base_url() ?>Home/allproduk" method="GET">
              <div class="md-form mt-0">
                <input name="keyword" style="border : none; border-bottom : solid; border-top : solid; border-color :#45ccb8" class="form-control input-xs m-0" type="text" placeholder="Mau cari apa?.." aria-label="Search" value="<?php if (isset($keyword)) echo ($keyword); ?>">
              </div>
          </li>
          </form>
          <li class="nav-item mx-3 basket-icon ml-0">
            <a href="<?= base_url() ?>Home/keranjang">
              <img src="<?= base_url() ?>asset/img/keranjang.png" width="35px">
              <span class="badge badge-info" style="position :absolute;"><?= $this->cart->total_items(); ?></span>
            </a>
          </li>
        </div>
      </nav>
    </div>
  </header>
  <main>