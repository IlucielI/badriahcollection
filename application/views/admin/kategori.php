<div id="content">
  <div class="row m-2 mb-5">
    <div class="col-md-12">
      <div class="text-center" style="font-weight: 800; color: #46576C;">Table Kategori Badriah Collection</div>
      <div class="box">
        <div class="box-header with-border">
          <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct">+ Tambah</a>
        </div>
      </div>
    </div>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="table">
        <thead>
          <th>Kategori</th>
          <th>Foto</th>
          <th>Aksi</th>
        </thead>
        <tbody>

          <?php foreach ($kategori as $ktgr) : ?>
            <tr>
              <td><?= $ktgr['Nama_Kategori'] ?></td>
              <td>
                <img src="<?= (!empty($ktgr['Foto_Kategori'])) ? base_url('asset/kategori/' . $ktgr['Foto_Kategori']) : base_url('asset/kategori/Noimage.png'); ?>" height='30px' width='30px'>
                <span class='ml-5'><a href='#edit_photo' class='photokategori' data-toggle='modal' data-id='<?= $ktgr['Id_Kategori'] ?>'><img src="<?= base_url() ?>asset/img/editFoto.png" height='30px' width='30px'></a></span>
              </td>
              <td>
                <button class='btn btn-success btn-sm editkategori btn-flat' data-id='<?= $ktgr['Id_Kategori'] ?>'>Edit</button>
                <button class='btn btn-danger btn-sm deletekategori btn-flat' data-id='<?= $ktgr['Id_Kategori'] ?>'> Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>