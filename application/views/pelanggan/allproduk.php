<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush mt-3">
      <section class="ml-4">
        <h5>Kategori</h5>
        <div class="text-muted small text-uppercase mb-4">
          <?php foreach ($kategori as $ktgr) : ?>
            <p class="mb-2"><a href="<?php echo (base_url('Home/allproduk?kategori=' . $ktgr['Id_Kategori']));
                                      if (isset($subkatpilih)) echo ('&subkategori=' . $subkatpilih);
                                      if (isset($keyword)) echo ('&keyword=' . $keyword);
                                      if (isset($sortby)) echo ('&sortby=' . $sortby); ?>" class="list-group-item list-group-item-action bg-light card-link-secondary <?php if (isset($katpilih) && $katpilih == $ktgr['Id_Kategori']) echo 'active bg-dark' ?> "><?= $ktgr['Nama_Kategori']; ?></a></p>
          <?php endforeach; ?>
        </div>
      </section>
      <section class="ml-4">
        <h5>SubKategori</h5>
        <div class="text-muted small text-uppercase mb-3">
          <?php foreach ($subkategori as $subktgr) : ?>
            <p class="mb-2"><a href="<?php echo (base_url('Home/allproduk?subkategori=' . $subktgr['Id_SubKategori']));
                                      if (isset($katpilih)) echo ('&kategori=' . $katpilih);
                                      if (isset($keyword)) echo ('&keyword=' . $keyword);
                                      if (isset($sortby)) echo ('&sortby=' . $sortby); ?>" class="list-group-item list-group-item-action bg-light card-link-secondary <?php if (isset($subkatpilih) && $subkatpilih == $subktgr['Id_SubKategori']) echo 'active bg-dark' ?> "><?= $subktgr['Nama_SubKategori']; ?></a></p>
          <?php endforeach; ?>
        </div>
      </section>
      <section class="mt-0">
        <hr>
        <div class="text-muted small text-uppercase mb-4">
          <p class="mb-2"><a href="<?php echo (base_url('Home/allproduk'));
                                    if (isset($keyword)) echo ('?keyword=' . $keyword); ?>" class="list-group-item list-group-item-action text-danger card-link-secondary">Reset Filter</a></p>
        </div>
      </section>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg mb-4">
      <button class="btn btn-primary" id="menu-toggle">
        <img src="<?= base_url() ?>asset/img/alignleft.png" width="30px">
      </button>


      <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <div class="d-flex flex-wrap">

            <!-- Sorting -->

            <div class="select-outline position-relative w-100 text-secondary">
              <select id="sort" class="mdb-select md-form md-outline text-secondary border-right-0 border-left-0" style="border-color :#45ccb8">
                <option value="0">ALL</option>
                <option value="ASC" <?php if (isset($sortby) && $sortby == 'ASC') echo 'selected' ?>>Harga rendah ke tinggi</option>
                <option value="DESC" <?php if (isset($sortby) && $sortby == 'DESC') echo 'selected' ?>>Harga tinggi ke rendah</option>
              </select>
              <label>Sort</label>
            </div>

            <!-- Sorting -->

          </div>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row" id="products">
        <?php foreach ($barang as $brng) : ?>
          <div class="col-sm-4 mb-5 d-flex justify-content-center" data-aos="flip-left" data-aos-duration="1000" data-aos-once="false">
            <figure class="figure">
              <div class="figure-img">
                <?php if ($brng['Stok_Barang'] == 0) : ?>
                  <a href="<?= base_url('Home/produk/' . $brng["Id_Barang"]) ?>" class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                      <img src="<?= base_url('asset/img/sold.png') ?>" width="150px" height="140px" style="position :absolute; opacity :85%">
                      <img src="<?= base_url('asset/barang/' . $brng['Foto_Barang']) ?>" class="figure-img img-fluid m-0" style="width: 165px; height:160px;border-radius:8px">
                  </a>
                <?php else : ?>
                  <a href="<?= base_url('Home/produk/' . $brng["Id_Barang"]) ?>" class="d-flex justify-content-center">
                    <div class="d-flex justify-content-center">
                      <img src="<?= base_url('asset/barang/' . $brng['Foto_Barang']) ?>" class="figure-img img-fluid m-0" style="width: 165px; height:160px;border-radius:8px">
                  </a>
                <?php endif; ?>
              </div>
              <div class="btn-group align-self-end w-100 h-100" role="group">
                <a class="w-100 h-100" href="<?= base_url('Home/produk/' . $brng["Id_Barang"]) ?>"><button type="button" class="btn btn-danger w-100 h-100"><img src="<?= base_url('asset/') ?>img/view.png" class="mx-auto" width="25px" height="30px"></button></a>
                <?php if ($brng['Stok_Barang'] == 0) : ?>
                  <a class="w-100 h-100" href="#"><button type="button" class="btn btn-success w-100 h-100"><img src="<?= base_url() ?>asset/img/keranjang2.png" class="mx-auto" width="30px" height="30px"></button></a>
                <?php else : ?>
                  <a class="w-100 h-100" href="<?= base_url('Home/tambahkeranjang/' . $brng["Id_Barang"] . '/allproduk') ?>"><button type="button" class="btn btn-success w-100 h-100"><img src="<?= base_url() ?>asset/img/keranjang2.png" class="mx-auto" width="30px" height="30px"></button></a>
                <?php endif; ?>
              </div>
          </div>
          <figcaption class="figure-caption text-center">
            <h5><?= $brng['Nama_Barang']; ?></h5>
            <p class="my-0" style="font-size: 10px; color:#E18388;"><strike>Rp <?= number_format(intval($brng['Harga_Barang']) + 100000); ?></strike></p>
            <p>Rp <?= number_format($brng['Harga_Barang'], 0); ?></p>
          </figcaption>
          </figure>
      </div>
    <?php endforeach; ?>
    </div>


    <ul class="pagination float-right">
      <?php if ($halamanAktif > 1) : ?>
        <li class="page-item"><a class="page-link" href="<?php echo (base_url('Home/allproduk?halaman=' . ($halamanAktif - 1)));
                                                          if (isset($subkatpilih)) echo ('&subkategori=' . $subkatpilih);
                                                          if (isset($keyword)) echo ('&keyword=' . $keyword);
                                                          if (isset($sortby)) echo ('&sortby=' . $sortby);
                                                          if (isset($katpilih)) echo ('&kategori=' . $katpilih); ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
          <li class="page-item active"><a class="page-link" href="<?php echo (base_url('Home/allproduk?halaman=' . $i));
                                                                  if (isset($subkatpilih)) echo ('&subkategori=' . $subkatpilih);
                                                                  if (isset($keyword)) echo ('&keyword=' . $keyword);
                                                                  if (isset($sortby)) echo ('&sortby=' . $sortby);
                                                                  if (isset($katpilih)) echo ('&kategori=' . $katpilih); ?>"><?= $i ?></a></li>
        <?php else : ?>
          <li class="page-item"><a class="page-link" href="<?php echo (base_url('Home/allproduk?halaman=' . $i));
                                                            if (isset($subkatpilih)) echo ('&subkategori=' . $subkatpilih);
                                                            if (isset($keyword)) echo ('&keyword=' . $keyword);
                                                            if (isset($sortby)) echo ('&sortby=' . $sortby);
                                                            if (isset($katpilih)) echo ('&kategori=' . $katpilih); ?>"><?= $i ?></a></li>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <li class="page-item"><a class="page-link" href="<?php echo (base_url('Home/allproduk?halaman=' . ($halamanAktif + 1)));
                                                          if (isset($subkatpilih)) echo ('&subkategori=' . $subkatpilih);
                                                          if (isset($keyword)) echo ('&keyword=' . $keyword);
                                                          if (isset($sortby)) echo ('&sortby=' . $sortby);
                                                          if (isset($katpilih)) echo ('&kategori=' . $katpilih); ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
      <?php endif; ?>
    </ul>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->