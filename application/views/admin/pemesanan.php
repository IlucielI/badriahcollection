<div id="content">
  <div class="row m-2 mb-5">
    <div class="col-md-12">
      <div class="text-center" style="font-weight: 800; color: #46576C;">Table Pemesanan Badriah Collection</div>
      <div class="box">
        <div class="box-header with-border">
          <form method="POST" class="form-inline" action="<?= base_url() ?>Admin/printPemesanan" target="_blank">
            <div class="input-group mr-2">
              <div class="input-group-addon border">
                <img class="mt-1 ml-1" src="<?= base_url() ?>asset/img/calendar.png" height='30px' width='30px'>
              </div>
              <input type="text" class="form-control" id="reservation" name="date_range" required>
            </div>
            <button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><img src="<?= base_url() ?>asset/img/print.png" height='20px' width='20px'> Cetak</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="table">
        <thead>
          <th>Tanggal Transaksi</th>
          <th>Nama Pelanggan</th>
          <th>Id Transaksi</th>
          <th style="width: 90px">Metode Pembayaran</th>
          <th>Total Pembayaran</th>
          <th style="width: 200px">Status Pembayaran</th>
          <th>Status Pengiriman</th>
          <th style="width: 110px">Info Lengkap</th>
        </thead>
        <tbody>

          <?php foreach ($transaksi as $trans) : ?>
            <tr>
              <td><?= date('d F Y', strtotime($trans['Tanggal_Transaksi']))  ?></td>
              <td><?= $trans['Username'] ?></td>
              <td><?= $trans['Id_Transaksi'] ?></td>
              <td><?= $trans['Nama_Metode'] ?></td>
              <td>Rp <?= number_format($trans['Total_Pembayaran'], 2) ?></td>
              <td>
                <?= $trans['Status_Bayar'] ?>
                <span class='float-right'><a href='#edit_bayar' class='bayar' data-toggle='modal' data-id='<?= $trans['Id_Transaksi'] ?>'><img src="<?= base_url() ?>asset/img/editFoto.png" height='30px' width='30px'></a></span>
              </td>
              <td>
                <?= $trans['Status_Kirim'] ?>
                <span class='float-right'><a href='#edit_kirim' class='kirim' data-toggle='modal' data-id='<?= $trans['Id_Transaksi'] ?>'><img src="<?= base_url() ?>asset/img/editFoto.png" height='30px' width='30px'></a></span>
              </td>
              <td>
                <div class="form-inline mt-4">
                  <a href='#transaction' data-toggle='modal' class='btn btn-info btn-sm btn-flat desctrans' data-id='<?= $trans['Id_Transaksi'] ?>'> View</a>
                  <button class='btn btn-danger btn-sm btn-flat ml-2'><a href="<?= base_url('admin/invoice/' . $trans['Id_Transaksi']) ?>"> Invoice</a></button>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>