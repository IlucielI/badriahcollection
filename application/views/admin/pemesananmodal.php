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


<!-- Update Bayar -->
<div class="modal fade" id="edit_bayar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Id Transaksi : <span class="name"></span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/editTransaksiBayar">
          <input type="hidden" class="prodid" name="Id_Transaksi">
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="edit_Bayar" class="col-sm-5 mr-1 control-label">Pembayaran</label>
              <div class="col-sm-5">
                <select class="form-control ml-2" id="edit_Bayar" name="Id_StatusBayar">
                  <option id="bayarselected" selected></option>
                  <option disabled="disabled">------</option>
                  <?php
                  foreach ($statusbayar as $byr) : ?>
                    <option value="<?= $byr['Id_StatusBayar'] ?>"><?= $byr['Status_Bayar'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="ml-4"><img src="" id="Update_Foto" width="300px" height="300px"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-success btn-flat" name="Ubah"><i class="fa fa-check-square-o"></i> Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Update kirim -->
<div class="modal fade" id="edit_kirim">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Id Transaksi : <span class="name"></span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="<?= base_url() ?>Admin/editTransaksiKirim">
          <input type="hidden" class="prodid" name="Id_Transaksi">
          <div class="form-inline mb-3">
            <div class="form-group">
              <label for="edit_Kirim" class="col-sm-5 mr-1 control-label">Pengiriman</label>
              <div class="col-sm-5">
                <select class="form-control ml-2" id="edit_Kirim" name="Id_StatusKirim">
                  <option id="kirimselected" selected></option>
                  <option disabled="disabled">------</option>
                  <?php
                  foreach ($statuskirim as $kirim) : ?>
                    <option value="<?= $kirim['Id_StatusKirim'] ?>"><?= $kirim['Status_Kirim'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
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