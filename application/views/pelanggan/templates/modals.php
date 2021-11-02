<!-- Lihat -->
<div class="modal fade" id="lihat">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b class="name"></b></h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h1 id="Nmetode" style="font-weight: 800; color: #46576C;"></h1>
          <h2 class="No_Tujuan" style="font-weight: 800; color: #46576C;"></h2>
          <h2 class="AtasNama" style="font-weight: 800; color: #46576C;"></h2>
        </div>
        <div class="text-center mt-5">
          <h5 style="font-size:15px">Mohon transfer dengan tepat sesuai nilai yang diminta, jangan dibulatkan untuk memudahkan pengecekan data pembayaran.</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="upload_photo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span class="name"></span></b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Home/uploadFotoPembayaran" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" class="prodid" name="Id_Transaksi">
            <input type="hidden" class="fotodatabase" name="Foto_DataBase">
            <label for="Foto_Pembayaran" class="col-sm-1 ml-2 mr-4 control-label">Foto</label>
            <div class="custom-file col-sm-6 ml-3 mb-3">
              <input type="file" class="custom-file-input" id="Foto" name="Foto_Pembayaran" required>
              <label class="custom-file-label" for="Foto_Pembayaran">Choose file</label>
            </div>
          </div>
          <div class="ml-4"><img src="" id="Update_Foto" width="300px" height="300px"></div>
          <div class="text-center mt-5">
            <h5 style="font-size:15px">Mohon transfer dengan tepat sesuai nilai yang diminta, jangan dibulatkan untuk memudahkan pengecekan data pembayaran.</h5>
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

<!-- Transaction Detail-->
<div class="modal fade" id="transaction">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 800px;left:-90px">
      <div class="modal-header">
        <h4 class="modal-title"><b>Informasi Transaksi</b></h4>
      </div>
      <div class="modal-body">
        <p>Date: <span id="date"></span>
          <span class="float-right">Id Transaksi: <span id="transid" style="font-weight: 800; color: #46576C;"></span></span>
        </p>
        <table class="table table-bordered">
          <thead>
            <th>Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Keterangan Tambahan</th>
            <th>Subtotal</th>
          </thead>
          <tbody id="detail">
            <tr>
              <td colspan="3" class="align-right"><b>Total</b></td>
              <td><span id="total"></span></td>
            </tr>
          </tbody>
        </table>
        <div class="text-center mt-2">
          <h5>Alamat Pengiriman</h5>
          <div id="alamat"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>