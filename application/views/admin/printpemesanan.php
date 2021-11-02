<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="<?= base_url() ?>vendor/mpdf/data/mpdf.css">
</head>
<style>
  table,
  th,
  td {
    border: 1px solid black;
    text-align: center;
  }

  table {
    width: 100%;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
  }

  th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #808080;
    color: black;
  }
</style>

<body>
  <div class="container">
    <header>
      <div style="text-align: center;">
        <img src="<?= base_url() ?>asset/img/logo.png" />
        <h3>Laporan Pemesanan </h1>
          <p>Badriah Collection</p>
      </div>
    </header>
    <p>Berdasarkan tanggal pemesanan :</p>
    <p><?= $from; ?> - <?= $to; ?></p>
    <hr />
    <h3>Tabel Pemesanan</h3>
    <section class="content">
      <table>
        <thead style="border-top: 2px solid">
          <tr>
            <th>Tanggal Transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Id Transaksi</th>
            <th>Metode Pembayaran</th>
            <th>Total Pembayaran</th>
            <th>Status Pembayaran</th>
            <th>Status Pengiriman</th>
            <th>Alamat Pengiriman</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($transaksi as $trans) : ?>
            <tr>
              <td scope="row"><?= $trans['Tanggal_Transaksi']; ?></th>
              <td><?= $trans['Username']; ?></td>
              <td><?= $trans['Id_Transaksi']; ?></td>
              <td><?= $trans['Nama_Metode'] ?></td>
              <td>Rp <?= number_format($trans['Total_Pembayaran'], 2); ?></td>
              <td><?= $trans['Status_Bayar']; ?></td>
              <td><?= $trans['Status_Kirim']; ?></td>
              <td><?= $trans['Alamat_Pengiriman']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
    <h4>Tabel Detail Pemesanan</h4>
    <section class="content">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id Transaksi</th>
            <th scope="col">Barang</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($detailtransaksi as $detail) : ?>
            <tr>
              <td scope="row"><?= $detail['Id_Transaksi']; ?></th>
              <td><?= $detail['Nama_Barang']; ?></td>
              <td><?= $detail['Jumlah_Barang']; ?></td>
              <td><?= $detail['Harga_Barang'] * $detail['Jumlah_Barang']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </div>
  </div>
</body>

</html>