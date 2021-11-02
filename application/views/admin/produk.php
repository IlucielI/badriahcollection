<div id="content">
  <div class="row m-2 mb-5">
    <div class="col-md-12">
      <div class="text-center" style="font-weight: 800; color: #46576C;">Table Produk Badriah Collection</div>
      <div class="box">
        <div class="box-header with-border">
          <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct">+ Tambah</a>
          <div class="float-right">
            <form class="form-inline">
              <div class="form-group">
                <div class="p-2"><label>Category: </label></div>
                <select class="form-control input-sm" id="select_category">
                  <option value="0">ALL</option>
                  <?php
                  foreach ($kategori as $ktgr) : ?>
                    <?php $selected = ($ktgr['Id_Kategori'] == $pilih) ? 'selected' : ''; ?>
                    <option value="<?= $ktgr['Id_Kategori'] ?>" <?= $selected ?>><?= $ktgr['Nama_Kategori'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="table">
        <thead>
          <th>Nama</th>
          <th>Kategori</th>
          <th>SubKategori</th>
          <th>Foto</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Berat</th>
          <th>Aksi</th>
        </thead>
        <tbody>

          <?php foreach ($barang as $brng) : ?>
            <tr>
              <td><?= $brng['Nama_Barang'] ?></td>
              <td><?= $brng['Nama_Kategori'] ?></td>
              <td><?= $brng['Nama_SubKategori'] ?></td>
              <td>
                <img src="<?= (!empty($brng['Foto_Barang'])) ? base_url('asset/barang/' . $brng['Foto_Barang']) : base_url('asset/barang/Noimage.png'); ?>" height='30px' width='30px'>
                <span class='float-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='<?= $brng['Id_Barang'] ?>'><img src="<?= base_url() ?>asset/img/editFoto.png" height='30px' width='30px'></a></span>
              </td>
              <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='<?= $brng['Id_Barang'] ?>'> View</a></td>
              <td>Rp <?= number_format($brng['Harga_Barang'], 2) ?></td>
              <td><?= $brng['Stok_Barang'] ?></td>
              <td><?= $brng['Berat_Barang'] ?> Gram</td>
              <td>
                <button class='btn btn-success btn-sm edit btn-flat' data-id='<?= $brng['Id_Barang'] ?>'>Edit</button>
                <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?= $brng['Id_Barang'] ?>'> Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>