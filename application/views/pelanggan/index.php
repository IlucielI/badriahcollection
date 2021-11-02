<div class="container-fluid p-0">
  <div class="site-slider">
    <div class="slider-one">
      <?php foreach ($banner as $bnr) : ?>
        <div>
          <img src="<?= base_url('asset/img/' . $bnr['Nama_Banner']) ?>" class="w-100" height="550px">
        </div>
      <?php endforeach; ?>
    </div>
    <div class="slider-btn">
      <span class="prev position-top"><img src="<?= base_url('asset/') ?>img/previous.png" width="40px"></span>
      <span class="next position-top right-0"><img src="<?= base_url('asset/') ?>img/next.png" width="40px"></span>
    </div>
  </div>
</div>
<section class="featured shadow-sm bg-white p-3 mb-5">
  <div class="container  text-center">
    <div class="row">
      <div class="col" data-aos="flip-left" data-aos-duration="2000" data-aos-once="false">
        <h2 class="mb-3">Khusus Untuk Anda</h2>
        <p>Koleksi Produk kami</p>
      </div>
    </div>
    <div class="row mb-0" data-aos="fade" data-aos-duration="1500" data-aos-once="false">
      <?php foreach ($barang as $brng) : ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 justify-content-center" style="height: fit-content;">
          <figure class="figure">
            <div class="figure-img">
              <?php if ($brng['Stok_Barang'] == 0) : ?>
                <a href="<?= base_url('Home/produk/' . $brng["Id_Barang"]) ?>" class="d-flex justify-content-center">
                  <div class="d-flex justify-content-center">
                    <img src="<?= base_url('asset/img/sold.png') ?>" width="150px" height="140px" style="position :absolute; opacity :85%">
                    <img src="<?= base_url('asset/barang/' . $brng['Foto_Barang']) ?>" class="figure-img img-fluid m-0" style="width: 165px; height:160px;border-radius:8px">
                  </div>
                </a>
              <?php else : ?>
                <a href="<?= base_url('Home/produk/' . $brng["Id_Barang"]) ?>" class="d-flex justify-content-center">
                  <div class="d-flex justify-content-center">
                    <img src="<?= base_url('asset/barang/' . $brng['Foto_Barang']) ?>" class="figure-img img-fluid m-0" style="width: 165px; height:160px;border-radius:8px">
                  </div>
                </a>
              <?php endif; ?>
              <div class="btn-group align-self-end" role="group" style="width: 100%;">
                <a class="w-100 h-100" href="<?= base_url('Home/produk/' . $brng["Id_Barang"]) ?>"><button type="button" class="btn btn-danger w-100 h-100"><img src="<?= base_url('asset/') ?>img/view.png" class="mx-auto" width="25px" height="30px"></button></a>
                <?php if ($brng['Stok_Barang'] == 0) : ?>
                  <a class="w-100 h-100" href="#"><button type="button" class="btn btn-success w-100 h-100"><img src="<?= base_url() ?>asset/img/keranjang2.png" class="mx-auto" width="30px" height="30px"></button></a>
                <?php else : ?>
                  <a class="w-100 h-100" href="<?= base_url('Home/tambahkeranjang/' . $brng["Id_Barang"] . '/index') ?>"><button type="button" class="btn btn-success w-100 h-100"><img src="<?= base_url() ?>asset/img/keranjang2.png" class="mx-auto" width="30px" height="30px"></button></a>
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
    <div class="row mb-4">
      <div class="col text-center">
        <button type="button" class="btn btn-outline-secondary btn-sm mx-auto"><a href="<?= base_url() ?>Home/kategori" style="text-decoration: none;" class="text-light">Lihat Selengkapnya</a></button>
      </div>
    </div>
  </div>
</section>