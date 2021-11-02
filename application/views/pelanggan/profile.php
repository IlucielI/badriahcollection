<div class="container mt-3" data-aos="fade" data-aos-duration="1500" data-aos-once="false">
    <div class="row">
        <div class="col-sm-8 justify-content-center mt-2">
            <h1 class="ml-3"><?= $user['Username']; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <form action="<?= base_url('Home/updateprofile') ?>" method="post" enctype="multipart/form-data">
                <div class="text-center">
                    <img src="<?= base_url('asset/img/' . $user['Avatar']) ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                    <input type="hidden" class="fotodatabase" name="Foto_DataBase" value="<?= $user['Avatar'] ?>">
                    <h6>Upload foto</h6>
                    <div class="custom-file" style="overflow: hidden;">
                        <input type="file" class="custom-file-input" id="Foto" name="Avatar">
                        <label class="custom-file-label" for="Avatar">Choose file</label>
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
                            <label for="Nama_Pelanggan">
                                <h4>Nama Lengkap</h4>
                            </label>
                            <input type="text" class="form-control" name="Nama_Pelanggan" id="Nama_Pelanggan" placeholder="Nama Lengkap" value="<?= $user['Nama_Pelanggan'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="No_Hp">
                                <h4>Nomor Handphone atau Telephone Rumah</h4>
                            </label>
                            <input type="text" class="form-control" name="No_Hp" id="No_Hp" placeholder="No.Hp atau No.Telp rumah" value="<?= $user['No_Hp'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="email">
                                <h4>Email</h4>
                            </label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $user['Email'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="email">
                                        <h4>Alamat</h4>
                                    </label>
                                    <textarea required class="form-control" name="Alamat" rows="3" placeholder="ex: Jl.kedondong No.05 Rt.15 Rw.01,(kelurahan),(kecamatan),(kotamadya),(provinsi). " style="font-size: 12px; max-width: 320px;"><?= $user['Alamat']; ?></textarea>
                                </div>
                                <div class="col-md-2">
                                    <label for="email">
                                        <h4>Kode Pos</h4>
                                    </label>
                                    <input type="text" class="form-control" name="Kode_Pos" id="Kode_Pos" placeholder="Kode Pos" value="<?= $user['Kode_Pos'] ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="password">
                                <h4>Password</h4>
                            </label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Ganti Password?" title="enter your password." value="<?= $user['Password'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="password2">
                                <h4>Konfirmasi Password</h4>
                            </label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" title="enter your password2." value="<?= $user['Password'] ?>">
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