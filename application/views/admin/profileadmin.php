<div class="container mt-3" id="content">
  <div class="row">
    <div class="col-sm-8 justify-content-center mt-2">
      <h1 class="ml-2"><?= $admin['Username_Admin']; ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <!--left col-->
      <form action="<?= base_url('admin/updateprofileadmin') ?>" method="post" enctype="multipart/form-data">
        <div class="text-center">
          <img src="<?= base_url('asset/img/' . $admin['Foto_Admin']) ?>" class="avatar img-circle img-thumbnail" alt="avatar">
          <input type="hidden" class="fotodatabase" name="Foto_DataBase" value="<?= $admin['Foto_Admin'] ?>">
          <h6>Upload foto</h6>
          <div class="custom-file" style="overflow: hidden;">
            <input type="file" class="custom-file-input" id="Foto" name="Foto_Admin">
            <label class="custom-file-label" for="Foto_Admin">Choose file</label>
          </div>
        </div>
        </hr><br>
    </div>
    <!--/col-3-->
    <div class="col-sm-9">
      <div class="tab-content">
        <div class="tab-pane active">
          <div class="form-group">
            <div class="col-xs-6">
              <label for="Nama_Admin">
                <h4>Nama Admin</h4>
              </label>
              <input type="text" class="form-control" name="Nama_Admin" id="Nama_Admin" placeholder="Nama Lengkap" value="<?= $admin['Nama_Admin'] ?>" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-6">
              <label for="password">
                <h4>Password</h4>
              </label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Ganti Password?" title="enter your password." value="<?= $admin['Password_Admin'] ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-6">
              <label for="password2">
                <h4>Konfirmasi Password</h4>
              </label>
              <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" title="enter your password2." value="<?= $admin['Password_Admin'] ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <br>
              <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
            </div>
          </div>
          </form>

        </div>

      </div>
      <!--/tab-pane-->
    </div>
    <!--/tab-content-->

  </div>
  <!--/col-9-->
</div>
<!--/row-->