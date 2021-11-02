<section class="item pt-3 bg-white shadow-sm mb-5">
  <div class="container justify-content-center">
    <div class="row mx-0">
      <div class="col-md-4 mt-1" style="max-width:unset;">
        <div class="row mx-0" data-aos="flip-left" data-aos-duration="1000" data-aos-once="false">
          <div class="figure-img">
            <?php if ($produk['Stok_Barang'] == 0) : ?>
              <img src="<?= base_url('asset/img/sold.png') ?>" width="150px" height="140px" style="position :absolute; opacity :85%">
              <img src="<?= base_url('asset/barang/' . $produk['Foto_Barang']) ?>" class="d-block w-100">
            <?php else : ?>
              <img style="cursor:pointer" src="<?= base_url('asset/barang/' . $produk['Foto_Barang']) ?>" class="PopupImg d-block w-100">
            <?php endif; ?>
          </div>
        </div>

        <section class="thumbs figure-caption">
          <div class="container-fluid px-0" style="height: max-content;">
            <div class="row mx-0 mt-3 justify-content-center" data-aos="flip-left" data-aos-duration="1000" data-aos-once="false">
              <?php if ($fotoproduk != 0) : ?>
                <?php foreach ($fotoproduk as $fotop) : ?>
                  <div class="col-3 px-0 thumbs-img ml-1 mr-1" style="width: fit-content; flex: unset;">
                    <?php if ($produk['Stok_Barang'] == 0) : ?>
                      <img src="<?= base_url('asset/img/sold.png') ?>" width="80px" height="70px" style="position :absolute; opacity :90%">
                      <img src="<?= base_url('asset/barang/' . $fotop['FotoAlter_Barang']) ?>" class="d-block w-100">
                    <?php else : ?>
                      <img style="cursor:pointer" src="<?= base_url('asset/barang/' . $fotop['FotoAlter_Barang']) ?>" class="PopupImg d-block w-100">
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </section>
      </div>


      <div class="col px-3 mt-1" data-aos="fade-right" data-aos-duration="1000" data-aos-once="false">
        <div class="row mx-0">
          <h2><?= $produk['Nama_Barang']; ?></h2>
        </div>
        <div class="row mx-0">
          <h4 class="mr-2 text-secondary">Rp <?= number_format($produk['Harga_Barang']); ?></h4>
          <p class="text-danger" style="font-size: 14px; opacity: 0.6;"><strike>Rp <?= number_format(intval($produk['Harga_Barang']) + 100000); ?></strike></p>
        </div>

        <div class="row mx-0 mt-2 mb-0">
          <div class="col mx-0">
            <p class="text-danger mr-2 mb-0" style="font-size: 20px;">Stok &lt; <?= $produk['Stok_Barang']; ?></p>
            <p class="text-danger" style="font-size: 14px; opacity: 0.6;">Segera pesan sebelum kehabisan !</p>
          </div>
        </div>

        <?php if ($produk['Stok_Barang'] == 0) : ?>
          <form action="#">
          <?php else : ?>
            <form action="<?= base_url('Home/tambahKeranjangProduk/' . $produk["Id_Barang"]) ?>" method="POST">
            <?php endif; ?>
            <div class="row mx-0 mt-3">
              <div class="col" style="height: fit-content;width: 100%;">
                <p class="mb-1 text-secondary">Ukuran</p>
                <div class="btn-group-sm btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary disabled">
                    <input name="ukuran" type="radio" value="<?= $produk['Ukuran_Barang']; ?>"> <?= $produk['Ukuran_Barang']; ?>
                  </label>
                </div>
              </div>
            </div>

            <div class="row mx-0 mt-4">
              <div class="col" style="height: fit-content;">
                <div class="form-group">
                  <label for="message" class="text-secondary">Keterangan tambahan</label>
                  <textarea class="form-control" name="keterangan" id="message" rows="3" placeholder="ex: Warna utama" style="font-size: 12px; max-width: 320px;" required></textarea>
                </div>
              </div>
            </div>

            <div class="row mt-1">
              <div class="col-md-3">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <button class="btn btn-secondary" type="button" id="kurang" onclick="tambahdankurang('Jumlah_Barang','kurang')">-</button>
                  </div>
                  <input class="form-control text-center" id="Jumlah_Barang" name="Jumlah_Barang" type="number" placeholder="1" <?php if ($produk['Stok_Barang'] == 0) echo 'min="0"';
                                                                                                                                else echo 'min="1"' ?> max="<?= $produk['Stok_Barang'] ?>" <?php if ($produk['Stok_Barang'] == 0) echo 'value="0"';
                                                                                                                                                                                            else echo 'value="1"' ?>>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="tambah" onclick="tambahdankurang('Jumlah_Barang','tambah')">+</button>
                  </div>
                </div>
              </div>
              <div class="col-md-3 h-75">
                <button type="submit" class="btn btn-success w-100 h-100"><img src="<?= base_url() ?>asset/img/keranjang2.png" class="mx-auto" width="30px" height="30px"></button>
              </div>
            </div>
            </form>
      </div>
    </div>
    <hr class="m-0 mt-5 mb-5">

    <div class="row mx-0" data-aos="flip-up" data-aos-duration="1000" data-aos-once="false">
      <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 100%;">
        <li class="nav-item text-center mx-0" style="width: 30%;">
          <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-selected="true">Deskripsi</a>
        </li>
        <li class="nav-item text-center mx-0" style="width: 30%;">
          <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-selected="false">Review</a>
        </li>
        <li class="nav-item text-center mx-0" style="width: 30%;">
          <a class="nav-link" id="diskusi-tab" data-toggle="tab" href="#diskusi" role="tab" aria-selected="false">Diskusi</a>
        </li>
      </ul>
      <div class="tab-content" style="width: 100%;" id="myTabContent">
        <div class="tab-pane fade show active pt-3" id="desc" role="tabpanel">
          <?= $produk['Deskripsi_Barang']; ?>
        </div>
        <div class="tab-pane fade" id="review" style="width: 100%;" role="tabpanel">
          <div class="container" style="width: 100%;">
            <div class="row py-5">

              <?php foreach ($diskusi as $disk) : ?>
                <div class="col-md-4" style="width: 100%;">

                  <div class="row p-3 align-items-center">
                    <img src="<?= base_url('asset/img/' . $disk['Avatar']) ?>" style="width: 80px; height: 60px; margin-right: 1rem;">
                    <div class="name">
                      <h5 class="m-0"><?= $disk['Username']; ?></h5>
                      <hr class="my-1">
                      <span>
                        <p class="m-0" style="opacity: 0.5;"><?= date('d F Y', strtotime($disk['Tanggal_Diskusi']))  ?></p>
                      </span>
                    </div>
                  </div>

                  <div class="row px-3 align-items-center">
                    <p><?= $disk['Diskusi']; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="diskusi" role="tabpanel">
          <form action="<?= base_url() ?>Home/Diskusi" method="POST">
            <div class="container" style="width: 100%;">
              <div class="row py-5">
                <div class="row mx-0" style="width: 100%;">
                  <div class="col-md-10 px-0">
                    <div class=" form-group">
                      <input type="hidden" name="Id_Barang" value="<?= $produk['Id_Barang'] ?>">
                      <?php if (isset($user['Username']))echo '<input type="hidden" name="Username" value="'. $user['Username'].'">' ?>
                      <input type="hidden" name="Username" value="<?= $user['Username'] ?>">
                      <input type="hidden" name="Avatar" value="<?= $user['Avatar'] ?>">
                      <textarea class="form-control" name="diskusi" rows="4" placeholder="Tuliskan pertanyaan baru Anda tentang produk diatas" style="font-size: 14px;" required></textarea>
                    </div>
                  </div>
                  <div class="col" style="height: fit-content;">
                    <button type="submit" class="btn btn-primary btn-block">Post</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  </div>
</section>



<section class="featured shadow-sm bg-white p-3 mb-5">
  <div class="container  text-center">
    <div class="row">
      <div class="col" data-aos="flip-left" data-aos-duration="2000" data-aos-once="false">
        <h2 class="mb-2">Produk lain yang mungkin anda suka</h2>
        <p>Berdasarkan produk yang sering dibeli</p>
      </div>
    </div>

    <div class="row mb-0" data-aos="fade" data-aos-duration="1000" data-aos-once="false">


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
                  <a class="w-100 h-100" href="<?= base_url('Home/tambahkeranjang/' . $brng["Id_Barang"] . '/produk') ?>"><button type="button" class="btn btn-success w-100 h-100"><img src="<?= base_url() ?>asset/img/keranjang2.png" class="mx-auto" width="30px" height="30px"></button></a>
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
        <button type="button" class="btn btn-outline-secondary btn-sm"><a href="<?= base_url('Home/kategori') ?>" style="text-decoration: none;" class=" text-light">Lihat Selengkapnya</a></button>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="ModalImage">
  <div class="modal-dialog" style="width: 800px;">
    <div class="modal-content">
      <img src="" alt="" class="img-responsive w-100 h-100">
    </div>
  </div>
</div>