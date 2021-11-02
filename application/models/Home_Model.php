<?php

class Home_Model extends CI_Model
{
  public function getAllBanner()
  {
    $this->db->select('*');
    $this->db->from('banner');
    $this->db->order_by('Id_Banner', 'RANDOM');
    $this->db->limit(3);
    return $this->db->get()->result_array();
  }

  public function getLimit($tabel, $kolom, $limit)
  {
    $this->db->select('*');
    $this->db->from($tabel);
    $this->db->order_by($kolom, 'RANDOM');
    $this->db->limit($limit);
    return $this->db->get()->result_array();
  }

  public function getKeyword($keyword, $Pilih_Kategori = '', $Pilih_SubKategori = '', $Pilih_SortBy = '', $limit = '')
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'barang.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $this->db->join('subkategori', 'barang.Id_SubKategori = subkategori.Id_SubKategori AND barang.Id_Kategori = subkategori.Id_Kategori', 'INNER');
    $Pilih_SortBy;
    $Pilih_SubKategori;
    $Pilih_Kategori;
    $limit;
    $this->db->group_start();
    $this->db->like('barang.Nama_Barang', $keyword);
    $this->db->or_like('kategori.Nama_Kategori', $keyword);
    $this->db->or_like('barang.Deskripsi_Barang', $keyword);
    $this->db->or_like('subkategori.Nama_SubKategori', $keyword);
    $this->db->group_end();
    return $this->db->get()->result_array();
  }

  public function jumlahDataBarang($Pilih_Kategori = '', $Pilih_SubKategori = '', $SortBy = '')
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'barang.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $this->db->join('subkategori', 'barang.Id_SubKategori = subkategori.Id_SubKategori AND barang.Id_Kategori = subkategori.Id_Kategori', 'INNER');
    $Pilih_Kategori;
    $Pilih_SubKategori;
    $SortBy;
    return $this->db->get()->num_rows();
  }

  public function jumlahDataKeyword($keyword, $Pilih_Kategori = '', $Pilih_SubKategori = '', $Pilih_SortBy = '', $limit = '')
  {
    $this->db->select('*');
    $this->db->from('barang');
    $this->db->join('kategori', 'barang.Id_Kategori = kategori.Id_Kategori', 'INNER');
    $this->db->join('subkategori', 'barang.Id_SubKategori = subkategori.Id_SubKategori AND barang.Id_Kategori = subkategori.Id_Kategori', 'INNER');
    $Pilih_SortBy;
    $Pilih_SubKategori;
    $Pilih_Kategori;
    $limit;
    $this->db->group_start();
    $this->db->like('barang.Nama_Barang', $keyword);
    $this->db->or_like('kategori.Nama_Kategori', $keyword);
    $this->db->or_like('subkategori.Nama_SubKategori', $keyword);
    $this->db->or_like('barang.Deskripsi_Barang', $keyword);
    $this->db->group_end();
    return $this->db->get()->num_rows();
  }

  public function produkSeringDiBeli()
  {

    $this->db->select('*');
    $this->db->from('transaksidetail');
    $this->db->join('barang', 'transaksidetail.Id_Barang = barang.Id_Barang', 'INNER');
    $this->db->group_by('transaksidetail.Id_Barang');
    $this->db->order_by('COUNT(transaksidetail.Id_Barang)', 'DESC');
    $this->db->limit(6);
    return $this->db->get()->result_array();
  }

  public function diskusiBarang()
  {
    $data = array(
      'Id_Barang' => $this->input->post('Id_Barang', true),
      'Username' => $this->input->post('Username', true),
      'Diskusi' => htmlspecialchars($this->input->post('diskusi', true)),
      'Avatar' => $this->input->post('Avatar'),
      'Tanggal_Diskusi' => date('Y-m-d'),
    );

    $this->db->insert('diskusibarang', $data);
  }

  public function getdiskusiBarang($Id_Barang)
  {
    $this->db->select('*');
    $this->db->from('diskusibarang');
    $this->db->where('Id_Barang', $Id_Barang);
    $this->db->order_by('Id_Barang', 'RANDOM');
    $this->db->limit(3);
    return $this->db->get()->result_array();
  }

  public function trans()
  {
    $this->db->select('Id');
    $this->db->from('transaksi');
    $this->db->order_by('Id', 'DESC');
    $this->db->limit(1);
    return $this->db->get()->row_array();
  }

  public function getIdpel($username)
  {
    $this->db->select('Id_Pelanggan');
    $this->db->from('pelanggan');
    $this->db->where('Username', $username);
    return $this->db->get()->row_array();
  }

  public function tambahPemesanan($Id_Transaksi, $Pelanggan, $Id_StatusKirim, $Id_StatusBayar, $Id_Metode, $Tanggal_Transaksi, $Alamat_Pengiriman, $Total_Pembayaran)
  {
    $data = array(
      'Id_Transaksi' => $Id_Transaksi,
      'Id_Pelanggan' => $Pelanggan,
      'Id_StatusKirim' => $Id_StatusKirim,
      'Id_StatusBayar' => $Id_StatusBayar,
      'Id_Metode' => $Id_Metode,
      'Tanggal_Transaksi' => $Tanggal_Transaksi,
      'Alamat_Pengiriman' => $Alamat_Pengiriman,
      'Foto_Pembayaran' => 'Noimage.png',
      'Total_Pembayaran' => $Total_Pembayaran,
    );

    $this->db->insert('transaksi', $data);
  }

  public function tambahPemesananDetail($Id_Transaksi, $Id_Barang, $Jumlah_Barang, $Keterangan_Tambahan)
  {
    $data = array(
      'Id_Transaksi' => $Id_Transaksi,
      'Id_Barang' => $Id_Barang,
      'Jumlah_Barang' => $Jumlah_Barang,
      'Keterangan_Tambahan' => $Keterangan_Tambahan,
    );

    $this->db->insert('transaksidetail', $data);
  }

  public function uploadFotoPembayaran($image)
  {
    $this->db->set("Foto_Pembayaran", $image);
    $this->db->where("Id_Transaksi", $this->input->post('Id_Transaksi'));
    $this->db->update('transaksi');
  }

  public function updateStok($Id, $Jumlah_Barang)
  {
    $this->db->set("Stok_Barang", "Stok_Barang - " . $Jumlah_Barang);
    $this->db->where("Id_Barang", $Id);
    $this->db->update('barang');
  }

  public function getMetode($Id)
  {
    $this->db->select('*');
    $this->db->from('metodepembayaran');
    $this->db->where('Id_Metode', $Id);
    return $this->db->get()->result_array();
  }

  public function getOngkir($Id)
  {
    $this->db->select('*');
    $this->db->from('ongkir');
    $this->db->where('Id_Ongkir', $Id);
    return $this->db->get()->result_array();
  }
}
