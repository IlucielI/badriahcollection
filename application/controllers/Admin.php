<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
  //<span class="badge badge-danger badge-counter">3+</span>
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Barang_Model');
    $this->load->model('User_Model');
    if (!($this->session->userdata('usernameadmin'))) {
      redirect('notfound404');
    }
  }
  public function index()
  {
    $bulan = date('Y-m');
    $jualanbulan = $this->Barang_Model->getPenjualanBulan($bulan);
    $penjualanbulan = 0;
    foreach ($jualanbulan as $jualbln) {
      $penjualanbulan +=  $jualbln['Total_Pembayaran'];
    }
    $penjualanall = 0;
    $pnjlanall = $this->Barang_Model->getPenjualanAll();
    foreach ($pnjlanall as $jall) {
      $penjualanall += $jall['Total_Pembayaran'];
    }
    $data = array(
      'title' => 'Admin Badriah Collection',
      'active' => 'active',
      'penjualanbulan' => $penjualanbulan,
      'penjualanall' => $penjualanall,
      'totalbarang' => $this->Barang_Model->getAllBarangJualan(),
      'pemesanan' => $this->Barang_Model->getPemesananBelumSelesai(),
      'admin' => $this->User_Model->getLoginAdmin($this->session->userdata('usernameadmin')),
    );
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('admin/templates/footer');
  }
  public function produk()
  {
    $data = array(
      'title' => 'Produk Badriah Collection',
      'barang' => $this->Barang_Model->getAllBarang(),
      'kategori' => $this->Barang_Model->getKategori(),
      'admin' => $this->User_Model->getLoginAdmin($this->session->userdata('usernameadmin')),
    );
    if ($this->uri->segment(3)) {
      $katpilih = $this->uri->segment(3);
      $Pilih_Kategori = $this->db->where("barang.Id_Kategori", $katpilih, false);
      $data['barang'] = $this->Barang_Model->getAllBarang($Pilih_Kategori);
      $data['pilih'] = $katpilih;
    };
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/produk', $data);
    $this->load->view('admin/produkmodal', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahProduk()
  {
    $upload_image = $_FILES['Foto_Barang']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/barang';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_Barang')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = 'Noimage.png';
    }
    $this->Barang_Model->tambahDataProduk($image);
    $this->session->set_flashdata('flash', 'Produk baru berhasil ditambahkan!');
    redirect('Admin/produk');
  }
  public function hapusProduk()
  {
    $this->Barang_Model->hapusDataProduk();
    $this->session->set_flashdata('flash', 'Produk berhasil dihapus!');
    redirect('Admin/produk');
  }
  public function editProduk()
  {
    $upload_image = $_FILES['Foto_Barang']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/barang';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_Barang')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = $this->input->post('Foto_DataBase');
    }
    $this->Barang_Model->editDataProduk($image);
    $this->session->set_flashdata('flash', 'Produk berhasil diubah!');
    redirect('Admin/produk');
  }
  public function editFoto()
  {
    $upload_image = $_FILES['Foto_Barang']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/barang';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_Barang')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = $this->input->post('Foto_DataBase');
    }
    $this->Barang_Model->editFoto($image);
    $this->session->set_flashdata('flash', 'Foto produk berhasil diubah!');
    redirect('Admin/produk');
  }
  public function ajax()
  {
    $id = $this->input->post('id');
    echo json_encode($this->Barang_Model->getInfoBarang($id));
  }

  public function ajaxAlter()
  {
    $id = $this->input->post('id');
    echo json_encode($this->Barang_Model->getInfoBarangAlter($id));
  }

  public function ajaxSubKategori()
  {
    $Id_Kategori = $this->input->post('Id_Kategori');
    $subkategori = $this->Barang_Model->getSubKategori($Id_Kategori);
    if (count($subkategori) > 0) {
      $Sub_select_box = '';
      $Sub_select_box .= '<option>------</option>';
      foreach ($subkategori as $subktgr) {
        $Sub_select_box .= '<option value="' . $subktgr['Id_SubKategori'] . '">' . $subktgr['Nama_SubKategori'] . '</option>';
      }
      echo json_encode($Sub_select_box);
    }
  }


  public function subkategori()
  {
    $data = array(
      'title' => 'SubKategori Badriah Collection',
      'subkategori' => $this->Barang_Model->getAllSubKategori(),
      'kategori' => $this->Barang_Model->getKategori(),
      'admin' => $this->User_Model->getLoginAdmin($this->session->userdata('usernameadmin')),
    );
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/subkategori', $data);
    $this->load->view('admin/subkategorimodal', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahSubKategori()
  {
    $upload_image = $_FILES['Foto_SubKategori']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/subkategori';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_SubKategori')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = 'Noimage.png';
    }
    $this->Barang_Model->tambahDataSubKategori($image);
    $this->session->set_flashdata('flash', 'SubKategori baru berhasil ditambahkan!');
    redirect('Admin/subkategori');
  }
  public function editFotoSubKategori()
  {
    $upload_image = $_FILES['Foto_SubKategori']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/subkategori';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_SubKategori')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = $this->input->post('Foto_DataBase');
    }
    $this->Barang_Model->editFotoSubKategori($image);
    $this->session->set_flashdata('flash', 'Foto SubKategori berhasil diubah!');
    redirect('Admin/subkategori');
  }
  public function ajaxInfoSub()
  {
    $id = $this->input->post('id');
    echo json_encode($this->Barang_Model->getInfoSub($id));
  }
  public function editSubKategori()
  {
    $upload_image = $_FILES['Foto_SubKategori']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/subkategori';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_SubKategori')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = $this->input->post('Foto_DataBase');
    }
    $this->Barang_Model->editDataSubKategori($image);
    $this->session->set_flashdata('flash', 'SubKategori berhasil diubah!');
    redirect('Admin/subkategori');
  }
  public function hapusSubKategori()
  {
    $this->Barang_Model->hapusDataSubKategori();
    $this->session->set_flashdata('flash', 'SubKategori berhasil dihapus!');
    redirect('Admin/subkategori');
  }


  public function kategori()
  {
    $data = array(
      'title' => 'Kategori Badriah Collection',
      'kategori' => $this->Barang_Model->getKategori(),
      'admin' => $this->User_Model->getLoginAdmin($this->session->userdata('usernameadmin')),
    );
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/kategori', $data);
    $this->load->view('admin/kategorimodal', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahKategori()
  {
    $upload_image = $_FILES['Foto_Kategori']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/kategori';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_Kategori')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = 'Noimage.png';
    }
    $this->Barang_Model->tambahDataKategori($image);
    $this->session->set_flashdata('flash', 'Kategori baru berhasil ditambahkan!');
    redirect('Admin/kategori');
  }
  public function ajaxInfoKat()
  {
    $id = $this->input->post('id');
    echo json_encode($this->Barang_Model->getInfoKat($id));
  }
  public function editFotoKategori()
  {
    $upload_image = $_FILES['Foto_Kategori']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/kategori';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_Kategori')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = $this->input->post('Foto_DataBase');
    }
    $this->Barang_Model->editFotoKategori($image);
    $this->session->set_flashdata('flash', 'Foto Kategori berhasil diubah!');
    redirect('Admin/kategori');
  }
  public function editKategori()
  {
    $upload_image = $_FILES['Foto_Kategori']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/kategori';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_Kategori')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = $this->input->post('Foto_DataBase');
    }
    $this->Barang_Model->editDataKategori($image);
    $this->session->set_flashdata('flash', 'Kategori berhasil diubah!');
    redirect('Admin/kategori');
  }
  public function hapusKategori()
  {
    $this->Barang_Model->hapusDataKategori();
    $this->session->set_flashdata('flash', 'Kategori berhasil dihapus!');
    redirect('Admin/kategori');
  }


  public function pemesanan()
  {
    $joinmetode = $this->db->join('metodepembayaran', 'transaksi.Id_Metode = metodepembayaran.Id_Metode', 'INNER');
    $data = array(
      'title' => 'Pemesanan Badriah Collection',
      'transaksi' => $this->Barang_Model->getAllPemesanan($joinmetode),
      'statusbayar' => $this->Barang_Model->getStatusBayar(),
      'statuskirim' => $this->Barang_Model->getStatusKirim(),
      'admin' => $this->User_Model->getLoginAdmin($this->session->userdata('usernameadmin')),
    );
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/pemesanan', $data);
    $this->load->view('admin/pemesananmodal', $data);
    $this->load->view('admin/templates/footer');
  }

  public function ajaxInfoTrans()
  {
    $id = $this->input->post('id');
    $datas = $this->Barang_Model->getInfoTrans($id);
    $total = 0;
    $output = array('list' => '');
    foreach ($datas as $data) {
      $output['Id_Transaksi'] = $data['Id_Transaksi'];
      $output['Alamat_Pengiriman'] = $data['Alamat_Pengiriman'];
      $output['Tanggal_Transaksi'] = date('d F Y', strtotime($data['Tanggal_Transaksi']));
      $subtotal = $data['Harga_Barang'] * $data['Jumlah_Barang'];
      $total += $subtotal;
      $output['list'] .= "
			<tr class='prepend_items'>
				<td>" . $data['Nama_Barang'] . "</td>
				<td>Rp " . number_format($data['Harga_Barang'], 2) . "</td>
        <td>" . $data['Jumlah_Barang'] . "</td>
        <td>" . $data['Keterangan_Tambahan'] . "</td>
        <td>Rp " . number_format($subtotal, 2) . "</td>
      </tr>
		";
    }
    $output['list'] .= "<tr>
      <td colspan='4' class='align-right'><b>Total</b></td>
        <td><span id='total'></span></td>
      </tr>";
    $output['Total_Pembayaran'] = '<b>Rp ' . number_format($total, 2) . '<b>';
    echo json_encode($output);
  }

  public function ajaxTrans()
  {
    $id = $this->input->post('id');
    echo json_encode($this->Barang_Model->getTrans($id));
  }

  public function editTransaksiBayar()
  {
    if ($this->input->post('Id_StatusBayar') == 3) {
      $id = $this->input->post('Id_Transaksi');
      $detail = $this->Barang_Model->getInfoTrans($id);
      foreach ($detail as $dtl) {
        $this->db->set("Stok_Barang", "Stok_Barang + " + $dtl['Jumlah_Barang']);
        $this->db->where("Id_Barang", $dtl['Id_Barang']);
        $this->db->update('barang');
      }
      $kirim = $this->db->set("Id_StatusKirim", 4);
      $this->Barang_Model->editTransaksiBayar($kirim);
    } else {
      $this->Barang_Model->editTransaksiBayar();
    }
    $this->session->set_flashdata('flash', 'Status Pembayaran berhasil diubah!');
    redirect('Admin/pemesanan');
  }

  public function editTransaksiKirim()
  {
    if ($this->input->post('Id_StatusKirim') == 4) {
      $id = $this->input->post('Id_Transaksi');
      $detail = $this->Barang_Model->getInfoTrans($id);
      foreach ($detail as $dtl) {
        $this->db->set("Stok_Barang", "Stok_Barang + " + $dtl['Jumlah_Barang']);
        $this->db->where("Id_Barang", $dtl['Id_Barang']);
        $this->db->update('barang');
      }
      $bayar = $this->db->set("Id_StatusBayar", 3);
      $this->Barang_Model->editTransaksiKirim($bayar);
    } else {
      $this->Barang_Model->editTransaksiKirim();
    }
    $this->session->set_flashdata('flash', 'Status Pengiriman berhasil diubah!');
    redirect('Admin/pemesanan');
  }

  public function printPemesanan()
  {
    $ex = explode(' - ', $this->input->post('date_range'));
    $from = date('Y-m-d', strtotime($ex[0]));
    $to = date('Y-m-d', strtotime($ex[1]));
    $from_title = date('M d, Y', strtotime($ex[0]));
    $to_title = date('M d, Y', strtotime($ex[1]));
    // Create an instance of the class:
    $mpdf = new \Mpdf\Mpdf();
    $data = array(
      'title' => 'Pemesanan Badriah Collection',
      'transaksi' => $this->Barang_Model->getPdfPemesanan($from, $to),
      'detailtransaksi' => $this->Barang_Model->getPdfInfo($from, $to),
      'from' => $from_title,
      'to' => $to_title,
    );
    $mpdf->WriteHTML($this->load->view('admin/printpemesanan', $data, true));
    // Output a PDF file directly to the browser
    $mpdf->Output();
  }

  public function profileadmin()
  {
    $data = array(
      'title' => 'Profile Badriah Collection',
      'admin' => $this->User_Model->getLoginAdmin($this->session->userdata('usernameadmin')),
    );
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/profileadmin', $data);
    $this->load->view('admin/templates/footer');
  }

  public function updateprofileadmin()
  {
    $admin = $this->User_Model->getLoginAdmin($this->session->userdata('usernameadmin'));
    if ($this->input->post('password') != $this->input->post('password2')) {
      $this->session->set_flashdata('flash', 'Password konfirmasi tidak sama!');
      redirect('admin/profileadmin');
    } else {
      if ($this->input->post('password') == $admin['Password']) {
        $password = $this->input->post('password');
      } else {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      }
      $upload_image = $_FILES['Foto_Admin']["name"];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './asset/img';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Foto_Admin')) {
          $image = $this->upload->data('file_name');
        }
      } else {
        $image = $this->input->post('Foto_DataBase');
      }
      $this->User_Model->updateProfileAdmin($admin['Id_Admin'], $image, $password);
      $this->session->set_flashdata('flash', 'Profile berhasil diperbarui!');
      redirect('admin/profileadmin');
    }
  }

  public function alterKosong()
  {
    $this->session->set_flashdata('flash', 'Foto alternatif produk tidak ada!');
    redirect('admin/produk');
  }

  public function deleteAlter($id)
  {
    $this->db->delete('fotobarang', array('Id' => $id));
    $this->session->set_flashdata('flash', 'Foto alternatif produk berhasil dihapus!');
    redirect('admin/produk');
  }

  public function updateFotoAlter()
  {
    $fotoalter = $this->db->get_where('fotobarang', array('Id_Barang' => $this->input->post('Id_Barang')))->num_rows();
    if ($fotoalter < 3) {
      if ($_FILES['FotoAlter_Barang']) {
        $upload_image = $_FILES['FotoAlter_Barang']["name"];
        if ($upload_image) {
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size']     = '2048';
          $config['upload_path'] = './asset/barang';
          $this->load->library('upload', $config);

          if ($this->upload->do_upload('FotoAlter_Barang')) {
            $image = $this->upload->data('file_name');
          }
        }
        $data = array(
          'Id_Barang' => $this->input->post('Id_Barang'),
          'FotoAlter_Barang' => $image,
        );
        $this->db->insert('fotobarang', $data);
        $this->session->set_flashdata('flash', 'Foto alternatif produk berhasil ditambahkan!');
        redirect('Admin/produk');
      }
    }
    $this->session->set_flashdata('flash', 'Foto alternatif produk sudah maksimal!');
    redirect('Admin/produk');
  }

  public function invoice($Id)
  {
    $mpdf = new \Mpdf\Mpdf();
    $data = array(
      'title' => 'Pemesanan Badriah Collection',
      'transaksi' => $this->Barang_Model->getInvoice($Id),
      'detailtransaksi' => $this->Barang_Model->getInfoInvoice($Id),
    );
    $mpdf->WriteHTML($this->load->view('admin/invoice', $data, true));
    // Output a PDF file directly to the browser
    $mpdf->Output();
  }
}
