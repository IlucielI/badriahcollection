<section class="item mb-5" data-aos="flip-left" data-aos-duration="1500" data-aos-once="false">
  <div class="container">
    <div class="row mx-0 justify-content-center">
      <div class="col-md-6 mt-3 pt-3 bg-white shadow-sm justify-content-center rounded cart-items" style="height: max-content;">
        <div class="row mx-0 mb-4 justify-content-center">
          <h5 style="font-size: 24px; font-family: 'Playfair+Display' ; font-weight: 900; color: #46576C;">Daftar
            Belanjaan</h5>
        </div>

        <!-- Items -->
        <?php if ($this->cart->total_items() == 0) : ?>
          <h3 class="text-center" style="font-weight: 800; color: #46576C;">Belum ada barang di keranjang, Ayo Buruan Beli! :)</h3>
        <?php endif; ?>
        <?php foreach ($this->cart->contents() as $items) : ?>
          <?php $barang = $this->db->get_where('barang', ["Id_Barang" => $items['id']])->row_array(); ?>
          <div class="row mt-0 mb-1">
            <div class="col-2 mb-2">
              <img src="<?= base_url('asset/barang/' . $barang['Foto_Barang']) ?>" class="shadow-sm" style="width: 100%;">
            </div>

            <div class="col-4">
              <div class="row mx-0">
                <h5 style="color: #46576C;"><?= $items['name'];; ?></h5>
              </div>

              <div class="row mx-0">
                <p style="color: #46576C; font-weight: 800; opacity: 0.5;"><?= number_format($items['price']); ?></p>
              </div>

              <div class="row mx-0">
                <form action="<?= base_url('Home/updatecart/' . $items['rowid']) ?>" method="POST">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <button class="btn btn-secondary" type="button" id="kurang" onclick="tambahdankurang('J<?= $barang['Id_Barang'] ?>','kurang')">-</button>
                    </div>
                    <!-- max belum -->
                    <input class="form-control text-center" id="J<?= $barang['Id_Barang'] ?>" name="Jumlah_Barang" type="number" placeholder="1" min="1" max="<?= $barang['Stok_Barang'] ?>" value="<?= $items['qty'] ?>">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" id="tambah" onclick="tambahdankurang('J<?= $barang['Id_Barang'] ?>','tambah')">+</button>
                    </div>
                  </div>
              </div>
            </div>
            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) : ?>
              <div class="form-group">
                <label for="message" class="text-secondary">Keterangan tambahan</label>
                <textarea class="form-control" name="keterangan" id="message" rows="1" placeholder="ex: warna biru daun" style="font-size: 12px; max-width: 200px;"><?php echo $option_value; ?></textarea>
                <input name="ukuran" class="p-0" type="text" hidden value="<?= $barang['Ukuran_Barang'] ?>">
                <label class="btn btn-secondary disabled mt-1"><?= $barang['Ukuran_Barang'] ?></label>
              </div>
            <?php endforeach; ?>
            <div class="form-group">
              <div class="col-1" style=" max-width: 100px;">
                <button type="submit" class='btn btn-danger btn-sm update btn-flat mt-2'>Update</button>
                </form>
                <a href="<?= base_url('Home/deletecart/' . $items['rowid']) ?>"><button class='btn btn-danger btn-sm delete btn-flat mt-2'>Delete</button></a>
              </div>
            </div>
          </div>
          <hr>
        <?php endforeach; ?>
        <!-- End of Items -->

        <!-- CTA -->
        <div class="row">
          <button type="button" id="gunakanprofile" class="btn btn-outline-secondary btn-block px-0" data-toggle="buttons">Gunakan
            info pengiriman pada profil</button>
        </div>
        <!-- End of CTA -->
        <form action="<?= base_url('Home/pesan') ?>" method="POST">
          <!-- Form Pengiriman -->
          <div class="row p-4">
            <div class="row mx-0 mb-4 justify-content-center" style="width: 100%;">
              <h5 style="font-size: 24px; font-family: 'Playfair+Display' ; font-weight: 900; color: #46576C;">Informasi
                Pengiriman</h5>
            </div>
            <div class="form-group mr-4">
              <label for="inputNamaLengkap">Nama lengkap</label>
              <input required type="text" class="form-control" name="Nama_Pelanggan" id="inputNamaLengkap" placeholder="Nama Lengkap" onkeyup="myFunction('NamaLengkap','inputNamaLengkap')">
            </div>
            <div class="form-group">
              <label for="inputAddress">Alamat</label>
              <input required type="text" class="form-control" name="Alamat" id="inputAddress" placeholder="Alamat Pengiriman" onkeyup="myFunction('Alamat','inputAddress')">
            </div>
            <div class="form-group">
              <label for="inputNoHp">Nomor Handphone atau Telephone Rumah</label>
              <input required type="text" class="form-control" name="No_Hp" id="inputNoHp" placeholder="No HP" onkeyup="myFunction('No_Hp','inputNoHp')">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputCity">Kota</label>
                <input required type="text" class="form-control" name="Kota" id="inputCity" placeholder="Kota" onkeyup="myFunction('Kota','inputCity')">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Provinsi</label>
                <select required id="inputState" class="form-control" name="Provinsi">
                  <option value="">Pilih provinsi ...</option>
                  <?php
                  foreach ($provinsi as $prov) : ?>
                    <option value="<?= $prov['Id_Ongkir'] ?>"><?= $prov['Provinsi'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputZip">Kode Pos</label>
                <input required type="number" name="Kode_Pos" class="form-control" id="inputZip" placeholder="Kode pos" onkeyup="myFunction('KodePos','inputZip')">
              </div>
            </div>
            <hr>


          </div>
          <!-- End of Form Pengiriman -->
      </div>

      <div class="col-md-5 mt-3 ml-auto pt-3 bg-white shadow-sm justify-content-center rounded" style="height: max-content;">
        <!-- disini -->

        <div class="row mx-0">
          <div class="row mx-0 mb-4 justify-content-center" style="width: 100%;">
            <h5 style="font-size: 24px; font-family: 'Playfair+Display' ; font-weight: 900; color: #46576C;">Ringkasan
            </h5>
          </div>
        </div>

        <!-- Summary Items -->
        <section class="summary">
          <?php foreach ($this->cart->contents() as $items) : ?>
            <div class="row mx-0 justify-content-between">
              <p><?php echo ($items['qty'] . ' x ');
                  echo ($items['name']); ?></p>
              <p><?php echo $this->cart->format_number($items['subtotal']); ?></p>
            </div>
          <?php endforeach; ?>
          <!-- End of Summary Items -->
          <hr>
          <!-- Info kirim -->
          <div class="row mx-0 d-flex justify-content-between align-items-center">
            <p>Informasi pengiriman</p>
          </div>

          <div class="row mx-0 d-flex justify-content-between align-items-center" style="width: 100%;">
            <div class="row mx-0 d-flex justify-content-between align-items-center mt-1" style="width: 100%; color: #90A2B8;">
              <p id="NamaLengkap"></p>
              <p id="No_Hp"></p>
            </div>

            <h5 id="Alamat" style="font-weight: 800; font-size: 14px; color: #90A2B8;"></h5>
            <h5 style="font-weight: 800; font-size: 12px; color: #90A2B8;">,</h5>
            <h5 id="Kota" style="font-weight: 800; font-size: 12px; color: #90A2B8;"></h5>
            <h5 style="font-weight: 800; font-size: 12px; color: #90A2B8;">,</h5>
            <h5 id="Provinsi" style="font-weight: 800; font-size: 12px; color: #90A2B8;"></h5>
            <h5 style="font-weight: 800; font-size: 12px; color: #90A2B8;">,</h5>
            <h5 id="KodePos" style="font-weight: 800; font-size: 12px; color: #90A2B8;"></h5>

          </div>
        </section>
        <!-- End of Info kirim -->
        <hr>
        <!-- Harga bayar -->
        <div class="row mx-0 justify-content-between align-items-center">
          <p>Harga Total</p>
          <p style="font-weight: 800; color: #46576C;">Rp <?= number_format($this->cart->total()); ?></p>
        </div>

        <div class="row mx-0 justify-content-between align-items-center">
          <p>Ongkos Kirim</p>
          <p id="Ongkir" style="font-weight: 800; color: #46576C;"></p>
        </div>

        <hr class="mt-0">

        <div class="row mx-0 justify-content-center align-items-center">
          <p>Harga Bayar</p>
        </div>
        <div class="row mx-0 justify-content-center align-items-center">
          <h3 id="totalBayar" style="font-weight: 800; color: #46576C;"></h3>
          <input type="text" hidden class="form-control" name="Total_Pembayaran" id="Total_Pembayaran" required>
        </div>
        <!-- End of Harga bayar -->
        <hr>

        <!-- Metode Bayar -->
        <section class="bayar">
          <div class="row mx-0">
            <div class="card" style="width: 100%;">
              <div class="card-header bg-white pt-2 px-0 text-center">

                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                  <li class="nav-item m-0" style="width: 33%; margin-bottom: -1px">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Metode Pemabayaran</a>
                  </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-group my-4">
                      <label for="inputState">Pilih Metode</label>
                      <select required id="inputbayar" class="form-control" name="metodepembayaran">
                        <option value="">Bayar pakai apa?</option>
                        <?php
                        foreach ($metode as $mtd) : ?>
                          <option value="<?= $mtd['Id_Metode'] ?>"><?= $mtd['Nama_Metode'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mx-0 justify-content-center align-items-center">
                      <h3 id="Nomor_Tujuan" style="font-weight: 800; color: #46576C;"></h3>
                      <h3 id="AtasNama" style="font-weight: 800; color: #46576C;"></h3>
                    </div>
                  </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="width: 100%;">BAYAR</button>
                </form>
                <div class="d-flex justify-content-center mt-3">
                  <a class="text-danger" style="opacity: 0.6; text-decoration: none;" href="<?= base_url('Home') ?>">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End of Metode Bayar -->

      </div>
    </div>
  </div>
</section>