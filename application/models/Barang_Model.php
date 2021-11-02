<?php

class Barang_Model extends CI_Model
{
  //index
  public function getPenjualanBulan($bulan)
  {
    $this->db->select('Total_Pembayaran');
    $this->db->from('transaksi');
    $this->db->where('transaksi.Tanggal_Transaksi >=', $bulan . '-01');
    $this->db->where('transaksi.Tanggal_Transaksi <=', $bulan . '-31');
    return $this->db->get()->result_array();
  }
  public function getPenjualanAll()
  {
    $this->db->select('Total_Pembayaran');
    $this->db->from('transaksi');
    return $this->db->get()->result_array();
  }
  public function getAllBarangJualan()
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'barang.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $this->db->join('subkategori', 'barang.Id_SubKategori = subkategori.Id_SubKategori AND barang.Id_Kategori = subkategori.Id_Kategori', 'INNER');
    return $this->db->get()->num_rows();
  }
  public function getPemesananBelumSelesai()
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->where('Id_StatusBayar', 1);
    $this->db->or_where('Id_StatusKirim !=', 3);
    return $this->db->get()->num_rows();
  }

  // barang
  public function getAllBarang($Pilih_Kategori = '', $Pilih_SubKategori = '', $Pilih_SortBy = '', $limit = '')
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'barang.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $this->db->join('subkategori', 'barang.Id_SubKategori = subkategori.Id_SubKategori AND barang.Id_Kategori = subkategori.Id_Kategori', 'INNER');
    $Pilih_Kategori;
    $Pilih_SubKategori;
    $Pilih_SortBy;
    $limit;
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getKategori()
  {
    return $this->db->get('kategori')->result_array();
  }

  public function getSubKategori($Id_Kategori)
  {
    return $this->db->get_where('subkategori', array('Id_Kategori' => $Id_Kategori))->result_array();
  }

  public function tambahDataProduk($image)
  {
    $data = [
      "Nama_Barang" => $this->input->post('Nama_Barang', true),
      "Id_Kategori" => $this->input->post('Kategori_Barang', true),
      "Id_SubKategori" => $this->input->post('SubKategori_Barang', true),
      "Harga_Barang" => $this->input->post('Harga_Barang', true),
      "Stok_Barang" => $this->input->post('Stok_Barang', true),
      "Ukuran_Barang" => $this->input->post('Ukuran_Barang', true),
      "Foto_Barang" => $image,
      "Berat_Barang" => $this->input->post('Berat_Barang', true),
      "Deskripsi_Barang" => $this->input->post('Deskripsi_Barang', true)
    ];
    $this->db->insert('barang', $data);
  }

  public function hapusDataProduk()
  {
    $this->db->delete('barang', array('Id_Barang' => $this->input->post('Id_Barang')));
  }

  public function editDataProduk($image)
  {
    $this->db->set("Nama_Barang", $this->input->post('Nama_Barang', true));
    $this->db->set("Id_Kategori", $this->input->post('Kategori_Barang', true));
    $this->db->set("Id_SubKategori", $this->input->post('SubKategori_Barang', true));
    $this->db->set("Harga_Barang", $this->input->post('Harga_Barang', true));
    $this->db->set("Stok_Barang", $this->input->post('Stok_Barang', true));
    $this->db->set("Ukuran_Barang", $this->input->post('Ukuran_Barang', true));
    $this->db->set("Foto_Barang", $image);
    $this->db->set("Berat_Barang", $this->input->post('Berat_Barang', true));
    $this->db->set("Deskripsi_Barang", $this->input->post('Deskripsi_Barang', true));
    $this->db->where("Id_Barang", $this->input->post('Id_Barang'));
    $this->db->update('barang');
  }

  public function editFoto($image)
  {
    $this->db->set("Foto_Barang", $image);
    $this->db->where("Id_Barang", $this->input->post('Id_Barang'));
    $this->db->update('barang');
  }

  public function editFotoAlter($imageAlter)
  {
    $data = array(
      'Id_Barang' => 'My title',
      'FotoAlter_Barang' => 'My Name',
    );
    $this->db->insert('mytable', $data);
  }

  public function getInfoBarang($id)
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'barang.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $this->db->join('subkategori', 'barang.Id_SubKategori = subkategori.Id_SubKategori AND barang.Id_Kategori = subkategori.Id_Kategori', 'INNER');
    $this->db->where('Id_barang', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  public function getInfoBarangAlter($id)
  {
    $this->db->select('*');
    $this->db->from('fotobarang');
    $this->db->where('Id_barang', $id);
    $query = $this->db->get();
    return $query->result_array();
  }

  // subkategori
  public function getAllSubKategori($subpilih = ' ')
  {
    $this->db->select('*');
    $this->db->from('subkategori');
    $this->db->join('kategori', 'subkategori.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $subpilih;
    return $this->db->get()->result_array();
  }

  public function tambahDataSubKategori($image)
  {
    $data = [
      "Id_Kategori" => $this->input->post('Kategori_Barang', true),
      "Nama_SubKategori" => $this->input->post('Nama_SubKategori', true),
      "Foto_SubKategori" => $image,
    ];
    $this->db->insert('subkategori', $data);
  }

  public function editFotoSubKategori($image)
  {
    $this->db->set("Foto_SubKategori", $image);
    $this->db->where("Id_SubKategori", $this->input->post('Id_SubKategori'));
    $this->db->update('subkategori');
  }

  public function getInfoSub($id)
  {
    $this->db->select('*');
    $this->db->from('subkategori');
    $this->db->join('kategori', 'subkategori.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $this->db->where('Id_SubKategori', $id);
    return $this->db->get()->result_array();
  }

  public function editDataSubKategori($image)
  {
    $this->db->set("Nama_SubKategori", $this->input->post('Nama_SubKategori', true));
    $this->db->set("Id_Kategori", $this->input->post('Kategori_Barang', true));
    $this->db->set("Foto_SubKategori", $image);
    $this->db->where("Id_SubKategori", $this->input->post('Id_SubKategori'));
    $this->db->update('subkategori');
  }

  public function hapusDataSubKategori()
  {
    $this->db->delete('subkategori', array('Id_SubKategori' => $this->input->post('Id_SubKategori')));
  }

  public function tambahDataKategori($image)
  {
    $data = [
      "Nama_Kategori" => $this->input->post('Nama_Kategori', true),
      "Foto_Kategori" => $image,
    ];
    $this->db->insert('kategori', $data);
  }

  //kategori
  public function getInfoKat($id)
  {
    $this->db->select('*');
    $this->db->from('kategori');
    $this->db->where('Id_Kategori', $id);
    return $this->db->get()->result_array();
  }

  public function editFotoKategori($image)
  {
    $this->db->set("Foto_Kategori", $image);
    $this->db->where("Id_Kategori", $this->input->post('Id_Kategori'));
    $this->db->update('kategori');
  }

  public function editDataKategori($image)
  {
    $this->db->set("Nama_Kategori", $this->input->post('Nama_Kategori', true));
    $this->db->set("Foto_Kategori", $image);
    $this->db->where("Id_Kategori", $this->input->post('Id_Kategori'));
    $this->db->update('kategori');
  }

  public function hapusDataKategori()
  {
    $this->db->delete('Kategori', array('Id_Kategori' => $this->input->post('Id_Kategori')));
  }

  // Pemesanan
  public function getAllPemesanan($wherepelanggan = '', $joinmetode = '')
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('transaksistatusbayar', 'transaksi.Id_StatusBayar = transaksistatusbayar.Id_StatusBayar', 'INNER');
    $this->db->join('pelanggan', 'transaksi.Id_Pelanggan = pelanggan.Id_Pelanggan', 'INNER');
    $joinmetode;
    $this->db->join('transaksistatuskirim', 'transaksi.Id_Statuskirim = transaksistatuskirim.Id_StatusKirim', 'INNER');
    $wherepelanggan;
    return $this->db->get()->result_array();
  }

  public function getStatusBayar()
  {
    return $this->db->get('transaksistatusbayar')->result_array();
  }

  public function getStatusKirim()
  {
    return $this->db->get('transaksistatuskirim')->result_array();
  }

  public function getInfoTrans($id)
  {
    $this->db->select('*');
    $this->db->from('transaksidetail');
    $this->db->join('transaksi', 'transaksidetail.Id_Transaksi = transaksi.Id_Transaksi', 'INNER');
    $this->db->join('barang', 'transaksidetail.Id_Barang = barang.Id_Barang', 'INNER');
    $this->db->where('transaksidetail.id_Transaksi', $id);
    return $this->db->get()->result_array();
  }

  public function getTrans($id, $joinmetode = '')
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('transaksistatusbayar', 'transaksi.Id_StatusBayar = transaksistatusbayar.Id_StatusBayar', 'INNER');
    $this->db->join('transaksistatuskirim', 'transaksi.Id_StatusKirim = transaksistatuskirim.Id_StatusKirim', 'INNER');
    $joinmetode;
    $this->db->where('Id_Transaksi', $id);
    return $this->db->get()->result_array();
  }

  public function editTransaksiBayar($kirim = '', $total = '')
  {
    $this->db->set("Id_StatusBayar", $this->input->post('Id_StatusBayar'));
    $kirim;
    $total;
    $this->db->where("Id_Transaksi", $this->input->post('Id_Transaksi'));
    $this->db->update('transaksi');
  }

  public function editTransaksiKirim($bayar = '', $total = '')
  {
    $this->db->set("Id_StatusKirim", $this->input->post('Id_StatusKirim'));
    $bayar;
    $total;
    $this->db->where("Id_Transaksi", $this->input->post('Id_Transaksi'));
    $this->db->update('transaksi');
  }

  public function getPdfInfo($from, $to)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('transaksidetail', 'transaksidetail.Id_Transaksi = transaksi.Id_Transaksi', 'INNER');
    $this->db->join('barang', 'transaksidetail.Id_Barang = barang.Id_Barang', 'INNER');
    $this->db->where('transaksi.Tanggal_Transaksi >=', $from);
    $this->db->where('transaksi.Tanggal_Transaksi <=', $to);
    $this->db->order_by('transaksi.Id_Transaksi DESC');
    return $this->db->get()->result_array();
  }

  public function getPdfPemesanan($from, $to)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('transaksistatusbayar', 'transaksi.Id_StatusBayar = transaksistatusbayar.Id_StatusBayar', 'INNER');
    $this->db->join('pelanggan', 'transaksi.Id_Pelanggan = pelanggan.Id_Pelanggan', 'INNER');
    $this->db->join('metodepembayaran', 'transaksi.Id_Metode = metodepembayaran.Id_Metode', 'INNER');
    $this->db->join('transaksistatuskirim', 'transaksi.Id_Statuskirim = transaksistatuskirim.Id_StatusKirim', 'INNER');
    $this->db->where('transaksi.Tanggal_Transaksi >=', $from);
    $this->db->where('transaksi.Tanggal_Transaksi <=', $to);
    $this->db->order_by('Tanggal_Transaksi DESC');
    return $this->db->get()->result_array();
  }

  public function getInvoice($Id)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('transaksistatusbayar', 'transaksi.Id_StatusBayar = transaksistatusbayar.Id_StatusBayar', 'INNER');
    $this->db->join('pelanggan', 'transaksi.Id_Pelanggan = pelanggan.Id_Pelanggan', 'INNER');
    $this->db->join('metodepembayaran', 'transaksi.Id_Metode = metodepembayaran.Id_Metode', 'INNER');
    $this->db->join('transaksistatuskirim', 'transaksi.Id_Statuskirim = transaksistatuskirim.Id_StatusKirim', 'INNER');
    $this->db->where('transaksi.Id_Transaksi', $Id);
    return $this->db->get()->row_array();
  }

  public function getInfoInvoice($Id)
  {
    $this->db->select('*');
    $this->db->from('transaksidetail');
    $this->db->join('transaksi', 'transaksidetail.Id_Transaksi = transaksi.Id_Transaksi', 'INNER');
    $this->db->join('barang', 'transaksidetail.Id_Barang = barang.Id_Barang', 'INNER');
    $this->db->where('transaksidetail.id_Transaksi', $Id);
    return $this->db->get()->result_array();
  }
}
