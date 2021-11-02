<section class="display mt-4">
  <div class="container">
    <div class="row">
      <?php foreach ($kategori as $ktgr) : ?>
        <div class="col-md-6 px-3 pb-3" data-aos="fade-down" data-aos-duration="1000" data-aos-once="false" style="height: fit-content;">
          <div class="card bg-dark text-white banner">
            <a href="<?= base_url('Home/allproduk?kategori=' . $ktgr['Id_Kategori']) ?>">
              <img src="<?= base_url('asset/kategori/' . $ktgr['Foto_Kategori']) ?>" class="card-img rounded" width="550" height="270">
              <div class="card-img-overlay d-flex justify-content-between">
                <h4 class="card-title text-light" style="font-weight: 800;"><span class="badge badge-dark"><?= $ktgr['Nama_Kategori']; ?></span></h4>
                <?php $jumlahkat = $this->db->get_where('barang', array('Id_Kategori' => $ktgr['Id_Kategori']))->num_rows(); ?>
                <button type="button" class="btn btn-light align-self-end">
                  Items <span class="badge badge-secondary"><?= $jumlahkat; ?></span>
                </button>
              </div>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
      <hr class="m-1 border">
      <div class="row mb-1 d-flex justify-content-center">
        <?php foreach ($subkategori as $subktgr) : ?>
          <div class="col-6 col-lg-2 col-md-4" data-aos="fade-left" data-aos-duration="1500" data-aos-once="false" style="height: fit-content;">
            <div class="card bg-dark text-white banner">
              <a href="<?= base_url('Home/allproduk?subkategori=' . $subktgr['Id_SubKategori']) ?>">
                <img src="<?= base_url('asset/subkategori/' . $subktgr['Foto_SubKategori']) ?>" class="card-img rounded" width="125px" height="110px">
                <div class="card-img-overlay d-flex justify-content-between">
                  <h5 class="card-title" style="font-weight: 800;"><span class="badge badge-danger"><?= $subktgr['Nama_SubKategori']; ?></span></h5>
                </div>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>