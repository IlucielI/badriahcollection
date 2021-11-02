<div id="content">
  <div class="row m-2 mb-5">
    <div class="col-md-12">
      <div class="text-center" style="font-weight: 800; color: #46576C;">Table SubKategori Badriah Collection</div>
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
          <th>SubKategori</th>
          <th>Kategori</th>
          <th>Foto</th>
          <th>Aksi</th>
        </thead>
        <tbody>

          <?php foreach ($subkategori as $subktgr) : ?>
            <tr>
              <td><?= $subktgr['Nama_SubKategori'] ?></td>
              <td><?= $subktgr['Nama_Kategori'] ?></td>
              <td>
                <img src="<?= (!empty($subktgr['Foto_SubKategori'])) ? base_url('asset/subkategori/' . $subktgr['Foto_SubKategori']) : base_url('asset/subkategori/Noimage.png'); ?>" height='30px' width='30px'>
                <span class='ml-5'><a href='#edit_photo' class='photosubkategori' data-toggle='modal' data-id='<?= $subktgr['Id_SubKategori'] ?>'><img src="<?= base_url() ?>asset/img/editFoto.png" height='30px' width='30px'></a></span>
              </td>
              <td>
                <button class='btn btn-success btn-sm editsubkategori btn-flat' data-id='<?= $subktgr['Id_SubKategori'] ?>'>Edit</button>
                <button class='btn btn-danger btn-sm deletesubkategori btn-flat' data-id='<?= $subktgr['Id_SubKategori'] ?>'> Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>