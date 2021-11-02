<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add New Product</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/tambahSubKategori" enctype="multipart/form-data">
          <div class="form-inline mb-3">
            <label for="Nama_SubKategori" class="col-sm-3 control-label">Nama SubKategori</label>
            <div class="col-sm-5">
              <input type="text" class="form-control p-0" id="Nama_SubKategori" name="Nama_SubKategori" required>
            </div>
          </div>
          <div class="form-inline mb-3">
            <label for="Kategori_Barang" class="col-sm-3 ml-1 control-label">Kategori</label>
            <div class="col-sm-5">
              <select class="form-control ml-2" id="Kategori_Barang" name="Kategori_Barang" required>
                <option value="" disabled selected>------</option>
                <?php
                foreach ($kategori as $ktgr) : ?>
                  <option value="<?= $ktgr['Id_Kategori'] ?>"><?= $ktgr['Nama_Kategori'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-inline mb-3">
            <label for="Foto_SubKategori" class="col-sm-3 control-label">Foto SubKategori</label>
            <div class="custom-file col-sm-6 ml-3 mb-3">
              <input type="file" class="custom-file-input" id="Foto_SubKategori" name="Foto_SubKategori">
              <label class="custom-file-label" for="Foto_SubKategori">Choose file</label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary btn-flat" name="Tambah"> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span class="name"></span></b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/editFotoSubKategori" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" class="prodid" name="Id_SubKategori">
            <input type="hidden" class="fotodatabase" name="Foto_DataBase">
            <label for="Foto_SubKategori" class="col-sm-1 ml-2 mr-4 control-label">Foto</label>
            <div class="custom-file col-sm-6 ml-3 mb-3">
              <input type="file" class="custom-file-input" id="Foto" name="Foto_SubKategori" required>
              <label class="custom-file-label" for="Foto_SubKategori">Choose file</label>
            </div>
          </div>
          <div class="ml-4"><img src="" id="Update_Foto" width="300px" height="300px"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Deleting...</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/hapusSubKategori">
          <input type="hidden" class="prodid" name="Id_SubKategori">
          <div class="text-center">
            <p>DELETE SUBKATEGORI</p>
            <h2 class="bold name"></h2>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-danger btn-flat" name="Hapus"><i class="fa fa-trash"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Edit SubKategori</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/editSubKategori" enctype="multipart/form-data">
          <input type="hidden" class="prodid" name="Id_SubKategori">
          <div class="form-inline mb-3">
            <label for="edit_name" class="col-sm-3 control-label">Nama SubKategori</label>
            <div class="col-sm-5">
              <input type="text" class="form-control ml-2" id="edit_name" name="Nama_SubKategori" required>
            </div>
          </div>
          <div class="form-inline mb-3">
            <label for="edit_category" class="col-sm-3 ml-1 control-label">Kategori</label>
            <div class="col-sm-5">
              <select class="form-control ml-2" id="edit_category" name="Kategori_Barang">
                <option id="catselected" selected></option>
                <option disabled="disabled">------</option>
                <?php
                foreach ($kategori as $ktgr) : ?>
                  <option value="<?= $ktgr['Id_Kategori'] ?>"><?= $ktgr['Nama_Kategori'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <input type="hidden" class="fotodatabase" name="Foto_DataBase">
          <label for="Foto_Barang" class="col-sm-3 ml-2 control-label">Foto SubKategori</label>
          <div class="custom-file col-sm-6 ml-3 mb-3">
            <input type="file" class="custom-file-input" id="Ubah_Foto" name="Foto_Barang">
            <label class="custom-file-label" for="Foto_Barang">Choose file</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-success btn-flat" name="Ubah"><i class="fa fa-check-square-o"></i> Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>