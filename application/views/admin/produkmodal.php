<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b>Add New Product</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/tambahProduk" enctype="multipart/form-data">
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Nama_Barang" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-4" id="Nama_Barang" name="Nama_Barang" required>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Kategori_Barang" class="col-sm-5 mr-1 control-label">Kategori</label>
              <div class="col-sm-5">
                <select class="form-control ml-2" id="Kategori_Barang" name="Kategori_Barang" required>
                  <option value="0">------</option>
                  <?php
                  foreach ($kategori as $ktgr) : ?>
                    <option value="<?= $ktgr['Id_Kategori'] ?>"><?= $ktgr['Nama_Kategori'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="SubKategori_Barang" class="col-sm-5 ml-1 control-label">SubKategori</label>
              <div class="col-sm-5">
                <select class="form-control" id="SubKategori_Barang" name="SubKategori_Barang" disabled required>
                  <option>------</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Harga_Barang" class="col-sm-3 control-label">Harga</label>
              <small class="text-muted ml-2">Rp</small>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="Harga_Barang" name="Harga_Barang" required>
              </div>
            </div>
            <small class="text-muted">tanpa titik ataupun koma</small>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Stok_Barang" class="col-sm-2 ml-2 mr-3 control-label">Stok</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-4" id="Stok_Barang" name="Stok_Barang" required>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Berat_Barang" class="col-sm-3 mr-2 control-label">Berat</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-3" id="Berat_Barang" name="Berat_Barang" required>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Ukuran_Barang" class="col-sm-3 control-label">Ukuran Barang</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-3" id="Ukuran_Barang" name="Ukuran_Barang" required>
              </div>
            </div>
          </div>
          <label for="Foto_Barang" class="col-sm-1 ml-2 mr-4 control-label">Foto</label>
          <div class="custom-file col-sm-6 ml-3 mb-3">
            <input type="file" class="custom-file-input" id="Foto_Barang" name="Foto_Barang">
            <label class="custom-file-label" for="Foto_Barang">Choose file</label>
          </div>
          <p class="ml-3"><b>Deskripsi</b></p>
          <div class="form-group">
            <div class="col-sm-12">
              <textarea id="Deskripsi_Barang" name="Deskripsi_Barang" rows="10" cols="80" required></textarea>
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

<!-- desc -->
<div class="modal fade" id="description">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span class="name"></span></b></h4>
      </div>
      <div class="modal-body">
        <p class="Deskripsi"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 800px;left:-90px">
      <div class="modal-header">
        <h4 class="modal-title"><b><span class="name"></span></b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/editFoto" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" class="prodid" name="Id_Barang">
            <label for="Foto_Barang" class="col-sm-1 ml-2 mr-5 control-label">Foto</label>
            <div class="custom-file col-sm-6 ml-3 mb-3">
              <input type="file" class="custom-file-input" id="Foto" name="Foto_Barang" required>
              <label class="custom-file-label" for="Foto_Barang">Choose file</label>
            </div>
          </div>
          <div class="ml-4 mb-4"><img src="" id="Update_Foto" width="300px" height="300px"></div>
          <div class="ml-4 mt-3">
            <a href="#edit_photoAlter" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="TambahFotoAlter">+ Tambah Foto Barang</a>
          </div>
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
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/hapusProduk">
          <input type="hidden" class="prodid" name="Id_Barang">
          <div class="text-center">
            <p>DELETE PRODUCT</p>
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
        <h4 class="modal-title"><b>Edit Product</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/editProduk" enctype="multipart/form-data">
          <input type="hidden" class="prodid" name="Id_Barang">
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="edit_name" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-4" id="edit_name" name="Nama_Barang" required>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="edit_category" class="col-sm-5 mr-1 control-label">Kategori</label>
              <div class="col-sm-5">
                <select class="form-control ml-2" id="edit_category" name="Kategori_Barang" required>
                  <option id="catselected" selected></option>
                  <option disabled="disabled">------</option>
                  <?php
                  foreach ($kategori as $ktgr) : ?>
                    <option value="<?= $ktgr['Id_Kategori'] ?>"><?= $ktgr['Nama_Kategori'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="edit_subcategory" class="col-sm-5 ml-1 control-label">SubKategori</label>
              <div class="col-sm-5">
                <select class="form-control" id="edit_subcategory" name="SubKategori_Barang">
                  <option selected id="subcatselected"></option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Ubah_Harga" class="col-sm-3 control-label">Harga</label>
              <small class="text-muted ml-2">Rp</small>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="Ubah_Harga" name="Harga_Barang" required>
              </div>
            </div>
            <small class="text-muted">tanpa titik ataupun koma</small>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Ubah_Stok" class="col-sm-2 ml-2 mr-3 control-label">Stok</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-4" id="Ubah_Stok" name="Stok_Barang" required>
              </div>
            </div>
          </div>

          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Ubah_Berat" class="col-sm-3 mr-2 control-label">Berat</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-3" id="Ubah_Berat" name="Berat_Barang" required>
              </div>
            </div>
          </div>
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="Ubah_Ukuran" class="col-sm-3 control-label">Ukuran Barang</label>
              <div class="col-sm-5">
                <input type="text" class="form-control ml-3" id="Ubah_Ukuran" name="Ukuran_Barang" required>
              </div>
            </div>
          </div>
          <label for="Foto_Barang" class="col-sm-1 ml-2 mr-4 control-label">Foto</label>
          <div class="custom-file col-sm-6 ml-3 mb-3">
            <input type="hidden" class="fotodatabase" name="Foto_DataBase">
            <input type="file" class="custom-file-input" id="Ubah_Foto" name="Foto_Barang">
            <label class="custom-file-label" for="Foto_Barang">Choose file</label>
          </div>
          <p><b>Description</b></p>
          <div class="form-group">
            <div class="col-sm-12">
              <textarea class="Deskripsi" name="Deskripsi_Barang" rows="10" cols="80"></textarea>
            </div>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photoAlter">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 700px;left:-70px">
      <div class="modal-header">
        <h4 class="modal-title"><b><span class="name"></span></b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/updateFotoAlter" enctype="multipart/form-data">
          <div class="form-group mt-4">
            <input type="hidden" class="prodid" name="Id_Barang">
            <label for="FotoAlter_Barang" class="col-sm-3 ml-2 mr-4 control-label">Foto Alter(Max 3)</label>
            <div class="custom-file col-sm-6 ml-3 mb-3">
              <input type="file" class="custom-file-input" id="FotoAlter" name="FotoAlter_Barang">
              <label class="custom-file-label" for="FotoAlter_Barang">Choose file</label>
            </div>
          </div>
          <div class="form-inline mt-4">
            <div class="ml-4"><img src="<?= base_url('asset/barang/Noimage.png') ?>" id="Update_FotoAlter1" width="70px" height="70px"><button class='btn btn-danger btn-sm btn-flat ml-1'><a id="FotoAlter1" href="<?= base_url('admin/alterKosong') ?>"> Delete</a></button></div>
            <div class="ml-4"><img src="<?= base_url('asset/barang/Noimage.png') ?>" id="Update_FotoAlter2" width="70px" height="70px"><button class='btn btn-danger btn-sm btn-flat ml-1'><a id="FotoAlter2" href="<?= base_url('admin/alterKosong') ?>"> Delete</a></button></div>
            <div class="ml-4"><img src="<?= base_url('asset/barang/Noimage.png') ?>" id="Update_FotoAlter3" width="70px" height="70px"><button class='btn btn-danger btn-sm btn-flat ml-1'><a id="FotoAlter3" href="<?= base_url('admin/alterKosong') ?>"> Delete</a></button></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
        </form>
      </div>

    </div>
  </div>
</div>