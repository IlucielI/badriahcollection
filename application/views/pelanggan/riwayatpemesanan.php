<div id="content" style="  width: 100%;
  padding: 20px;
  min-height: 80vh;
  transition: all 0.3s;" data-aos="fade" data-aos-duration="1000" data-aos-once="false">
  <div class="row m-2 mb-0">
    <div class="col-md-12">
      <div class="text-center" style="font-weight: 800; color: #46576C;">Table Riwayat Pemesanan Badriah Collection</div>
      <div class="box">
      </div>
    </div>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="table">
        <thead>
          <th>Tanggal Transaksi</th>
          <th>Nama Pelanggan</th>
          <th>Id Transaksi</th>
          <th style="width:fit-content">Metode Pembayaran</th>
          <th>Total Pembayaran</th>
          <th style="width: 230px">Status Pembayaran</th>
          <th>Status Pengiriman</th>
          <th>Info Lengkap</th>
        </thead>
        <tbody>

          <?php foreach ($transaksi as $trans) : ?>
            <tr>
              <td><?= date('d F Y', strtotime($trans['Tanggal_Transaksi']))  ?></td>
              <td><?= $trans['Username'] ?></td>
              <td><?= $trans['Id_Transaksi'] ?></td>
              <td>
                <?= $trans['Nama_Metode'] ?>
                <button class='btn btn-success btn-sm lihat btn-flat' data-id='<?= $trans['Id_Transaksi'] ?>'>Lihat</button>
              </td>
              <td>Rp <?= number_format($trans['Total_Pembayaran'], 2) ?></td>
              <td>
                <?= $trans['Status_Bayar'] ?>
                <?php if ($trans['Status_Bayar'] != 'Telah Dibayar') : ?>
                  <button class='btn btn-success btn-sm upload btn-flat' data-id='<?= $trans['Id_Transaksi'] ?>'>Upload</button>
                <?php endif; ?>
              </td>
              <td>
                <?= $trans['Status_Kirim'] ?>
              </td>
              <td><a href='#transaction' data-toggle='modal' class='btn btn-info btn-sm btn-flat desctrans' data-id='<?= $trans['Id_Transaksi'] ?>'>Info</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>