<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Home_Model');
    $this->load->model('Barang_Model');
    $this->load->model('User_Model');
    if ($this->session->userdata('usernameadmin')) {
      redirect('admin');
    }
  }

  public function index()
  {
    $data = array(
      'title' => 'Official Badriah Collection',
      'active' => 'active',
      'banner' => $this->Home_Model->getAllBanner(),
      'barang' => $this->Home_Model->getLimit('barang', 'Id_Barang', '6'),
      'user' => $this->User_Model->getLogin($this->session->userdata('username')),
    );
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/index', $data);
    $this->load->view('pelanggan/templates/footer');
  }

  public function kategori()
  {
    $data = array(
      'title' => 'Kategori Badriah Collection',
      'kategori' => $this->Home_Model->getLimit('kategori', 'Id_Kategori', '2'),
      'subkategori' => $this->Home_Model->getLimit('subkategori', 'Id_SubKategori', '4'),
      'user' => $this->User_Model->getLogin($this->session->userdata('username')),
    );
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/kategori', $data);
    $this->load->view('pelanggan/templates/footer');
  }

  public function allProduk()
  {
    $data['user'] = $this->User_Model->getLogin($this->session->userdata('username'));
    $data['jumlahDataPerHalaman'] = 9;
    $data['title'] = 'Produk Badriah Collection';
    $data['kategori'] = $this->Barang_Model->getKategori();
    $data['subkategori'] = $this->Barang_Model->getAllSubKategori();

    if (!($this->input->get('kategori')) && !($this->input->get('subkategori')) && !($this->input->get('sortby')) && !($this->input->get('keyword'))) {
      $data['jumlahData'] = $this->Barang_Model->getAllBarangJualan();
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($limit);
    }
    if ($this->input->get('kategori') && !($this->input->get('subkategori')) && !($this->input->get('sortby')) && !($this->input->get('keyword'))) {
      $katpilih = $this->input->get('kategori');
      $data['jumlahData'] = $this->Home_Model->jumlahDataBarang($this->db->where("barang.Id_Kategori", $katpilih, false));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($this->db->where("barang.Id_Kategori", $katpilih, false), $limit);
      $data['katpilih'] = $katpilih;
    };

    if ($this->input->get('subkategori') && !($this->input->get('kategori')) && !($this->input->get('sortby')) && !($this->input->get('keyword'))) {
      $subkatpilih = $this->input->get('subkategori');
      $data['jumlahData'] = $this->Home_Model->jumlahDataBarang($this->db->where("barang.Id_SubKategori", $subkatpilih, false));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($this->db->where("barang.Id_SubKategori", $subkatpilih, false), $limit);
      $data['subkatpilih'] = $subkatpilih;
    };
    if ($this->input->get('sortby') && !($this->input->get('subkategori')) && !($this->input->get('kategori')) && !($this->input->get('keyword'))) {
      $sortby = $this->input->get('sortby');
      $data['jumlahData'] = $this->Home_Model->jumlahDataBarang($this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['sortby'] = $sortby;
    };
    if ($this->input->get('keyword') && !($this->input->get('subkategori')) && !($this->input->get('sortby')) && !($this->input->get('kategori'))) {
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword);
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $limit);
      $data['keyword'] = $keyword;
    }
    if ($this->input->get('kategori') && $this->input->get('subkategori') && !($this->input->get('sortby')) && !($this->input->get('keyword'))) {
      $katpilih = $this->input->get('kategori');
      $subkatpilih = $this->input->get('subkategori');
      $data['jumlahData'] = $this->Home_Model->jumlahDataBarang($this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $limit);
      $data['katpilih'] = $katpilih;
      $data['subkatpilih'] = $subkatpilih;
    }
    if ($this->input->get('kategori') && $this->input->get('sortby') && !($this->input->get('subkategori')) && !($this->input->get('keyword'))) {
      $katpilih = $this->input->get('kategori');
      $sortby = $this->input->get('sortby');
      $data['jumlahData'] = $this->Home_Model->jumlahDataBarang($this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['katpilih'] = $katpilih;
      $data['sortby'] = $sortby;
    }
    if ($this->input->get('kategori') && $this->input->get('keyword') && !($this->input->get('sortby')) && !($this->input->get('subkategori'))) {
      $katpilih = $this->input->get('kategori');
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false), $limit);
      $data['katpilih'] = $katpilih;
      $data['keyword'] = $keyword;
    }
    if ($this->input->get('subkategori') && $this->input->get('sortby') && !($this->input->get('kategori')) && !($this->input->get('keyword'))) {
      $subkatpilih = $this->input->get('subkategori');
      $sortby = $this->input->get('sortby');
      $data['jumlahData'] = $this->Home_Model->jumlahDataBarang($this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['subkatpilih'] = $subkatpilih;
      $data['sortby'] = $sortby;
    }
    if ($this->input->get('subkategori') && $this->input->get('keyword') && !($this->input->get('sortby')) && !($this->input->get('kategori'))) {
      $subkatpilih = $this->input->get('subkategori');
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword, $this->db->where("barang.Id_SubKategori", $subkatpilih, false));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $limit);
      $data['subkatpilih'] = $subkatpilih;
      $data['keyword'] = $keyword;
    }
    if ($this->input->get('sortby') && $this->input->get('keyword') && !($this->input->get('kategori')) && !($this->input->get('subkategori'))) {
      $sortby = $this->input->get('sortby');
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword, $this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['keyword'] = $keyword;
      $data['sortby'] = $sortby;
    }
    if ($this->input->get('kategori') && $this->input->get('subkategori') && $this->input->get('sortby') && !($this->input->get('keyword'))) {
      $katpilih = $this->input->get('kategori');
      $subkatpilih = $this->input->get('subkategori');
      $sortby = $this->input->get('sortby');
      $data['jumlahData'] = $this->Home_Model->jumlahDataBarang($this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Barang_Model->getAllBarang($this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['katpilih'] = $katpilih;
      $data['subkatpilih'] = $subkatpilih;
      $data['sortby'] = $sortby;
    }
    if ($this->input->get('kategori') && $this->input->get('sortby') && $this->input->get('keyword') && !($this->input->get('subkategori'))) {
      $katpilih = $this->input->get('kategori');
      $sortby = $this->input->get('sortby');
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['keyword'] = $keyword;
      $data['katpilih'] = $katpilih;
      $data['sortby'] = $sortby;
    }
    if ($this->input->get('kategori') && $this->input->get('subkategori') && $this->input->get('keyword') && !($this->input->get('sortby'))) {
      $katpilih = $this->input->get('kategori');
      $subkatpilih = $this->input->get('subkategori');
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $limit);
      $data['keyword'] = $keyword;
      $data['katpilih'] = $katpilih;
      $data['subkatpilih'] = $subkatpilih;
    }
    if ($this->input->get('subkategori') && $this->input->get('keyword') && $this->input->get('sortby') && !($this->input->get('kategori'))) {
      $subkatpilih = $this->input->get('subkategori');
      $sortby = $this->input->get('sortby');
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword, $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['keyword'] = $keyword;
      $data['sortby'] = $sortby;
      $data['subkatpilih'] = $subkatpilih;
    }
    if ($this->input->get('kategori') && $this->input->get('subkategori') && $this->input->get('keyword') && $this->input->get('sortby')) {
      $katpilih = $this->input->get('kategori');
      $subkatpilih = $this->input->get('subkategori');
      $sortby = $this->input->get('sortby');
      $keyword = $this->input->get('keyword');
      $data['jumlahData'] = $this->Home_Model->jumlahDataKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby));
      $data['jumlahHalaman'] = ceil($data['jumlahData'] / $data['jumlahDataPerHalaman']);
      if ($this->input->get('halaman')) {
        $data['halamanAktif'] = $this->input->get('halaman');
      } else {
        $data['halamanAktif'] = 1;
      }
      $data['awalData'] = ($data['jumlahDataPerHalaman'] * $data['halamanAktif']) - $data['jumlahDataPerHalaman'];
      $limit = $this->db->limit($data['jumlahDataPerHalaman'], $data['awalData']);
      $data['barang'] = $this->Home_Model->getKeyword($keyword, $this->db->where("barang.Id_Kategori", $katpilih, false), $this->db->where("barang.Id_SubKategori", $subkatpilih, false), $this->db->order_by('Harga_Barang', $sortby), $limit);
      $data['keyword'] = $keyword;
      $data['sortby'] = $sortby;
      $data['subkatpilih'] = $subkatpilih;
      $data['katpilih'] = $katpilih;
    }
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/allproduk', $data);
    $this->load->view('pelanggan/templates/footer');
  }

  public function produk($Id_Barang)
  {
    $data['title'] = 'Produk Badriah Collection';
    $data['user'] = $this->User_Model->getLogin($this->session->userdata('username'));
    $dataProduk = $this->Barang_Model->getAllBarang($this->db->where('Id_Barang', $Id_Barang));
    $data['produk'] = $dataProduk[0];
    $data['fotoproduk'] = $this->db->get_where('fotobarang', ['Id_Barang' => $Id_Barang])->result_array();
    $data['barang'] = $this->Home_Model->produkSeringDiBeli();
    $data['diskusi'] = $this->Home_Model->getDiskusiBarang($Id_Barang);
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/produk', $data);
    $this->load->view('pelanggan/templates/footer');
  }

  public function Diskusi()
  {
    $this->Home_Model->diskusiBarang();
    $this->session->set_flashdata('flash', 'Diskusi berhasil diunggah, Terima kasih!');
    redirect('Home/produk/' . $this->input->post('Id_Barang'));
  }

  public function tentangkami()
  {
    $data = array(
      'title' => 'Tentang Badriah Collection',
      'user' => $this->User_Model->getLogin($this->session->userdata('username')),
    );
    $this->load->library('googlemaps');
    $config['center'] = '-7.257472, 112.752090';
    $config['zoom'] = '25';
    $this->googlemaps->initialize($config);
    $marker = array();
    $marker['position'] = '-7.257472, 112.752090';
    $this->googlemaps->add_marker($marker);
    $data['map'] = $this->googlemaps->create_map();
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/tentangkami', $data);
    $this->load->view('pelanggan/templates/footer');
  }

  public function Berlangganan()
  {
    $query = $this->db->get_where('berlangganan', array('Email_Langganan' => $this->input->post('email')));
    if ($query) {
      $this->session->set_flashdata('flash', 'Anda sudah berlangganan, nantikan update menariknya!');
      redirect('Home');
    } else {
      $this->db->set('Email_Langganan', $this->input->post('email'));
      $this->db->insert('berlangganan');
      $this->session->set_flashdata('flash', 'Berlangganan berhasil dilakukan, nantikan update menariknya!');
      redirect('Home');
    }
  }

  public function profile()
  {
    $data = array(
      'title' => 'Profile Badriah Collection',
      'user' => $this->User_Model->getLogin($this->session->userdata('username')),
    );
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/profile', $data);
    $this->load->view('pelanggan/templates/footer');
  }

  public function updateprofile()
  {
    if (!($this->session->userdata('username'))) {
      redirect('authen');
    }
    $user = $this->User_Model->getLogin($this->session->userdata('username'));
    if ($this->input->post('password') != $this->input->post('password2')) {
      $this->session->set_flashdata('flash', 'Password konfirmasi tidak sama!');
      redirect('Home/profile');
    } else {
      if ($this->input->post('password') == $user['Password']) {
        $password = $this->input->post('password');
      } else {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      }
      $upload_image = $_FILES['Avatar']["name"];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './asset/img';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('Avatar')) {
          $image = $this->upload->data('file_name');
        }
      } else {
        $image = $this->input->post('Foto_DataBase');
      }
      $this->User_Model->updateProfile($user['Id_Pelanggan'], $image, $password);
      $this->session->set_flashdata('flash', 'Profile berhasil diperbarui!');
      redirect('Home/profile');
    }
  }

  public function keranjang()
  {
    if (!($this->session->userdata('username'))) {
      redirect('authen');
    }
    $data = array(
      'title' => 'Official Badriah Collection',
      'user' => $this->User_Model->getLogin($this->session->userdata('username')),
      'provinsi' => $this->db->get('ongkir')->result_array(),
      'metode' => $this->db->get('metodepembayaran')->result_array(),
    );
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/keranjang', $data);
    $this->load->view('pelanggan/templates/footer');
  }

  public function tambahKeranjang($Id_Barang, $url)
  {
    $barang = $this->db->get_where('barang', ["Id_Barang" => $Id_Barang])->row_array();
    $data = array(
      'id'      => $barang['Id_Barang'],
      'qty'     => 1,
      'price'   => $barang['Harga_Barang'],
      'name'    => $barang['Nama_Barang'],
      'options' => array('Color' => 'Warna Utama')
    );
    $this->cart->insert($data);
    $this->session->set_flashdata('flash', 'Keranjang berhasil ditambahkan!');
    if ($url == 'produk') {
      redirect('Home/' . $url . '/' . $Id_Barang);
    }
    redirect('Home/' . $url);
  }

  public function tambahKeranjangProduk($Id_Barang)
  {
    $barang = $this->db->get_where('barang', ["Id_Barang" => $Id_Barang])->row_array();
    $data = array(
      'id'      => $barang['Id_Barang'],
      'qty'     => $this->input->post('Jumlah_Barang'),
      'price'   => $barang['Harga_Barang'],
      'name'    => $barang['Nama_Barang'],
      'options' => array('Color' => $this->input->post('keterangan')),
    );
    $this->cart->insert($data);
    $this->session->set_flashdata('flash', 'Keranjang berhasil ditambahkan!');
    redirect('Home/produk/' . $Id_Barang);
  }

  public function deletecart($rowid)
  {
    $this->cart->remove($rowid);
    $this->session->set_flashdata('flash', 'Produk berhasil dihapus :(');
    redirect('Home/keranjang');
  }

  public function pesan()
  {
    foreach ($this->cart->contents() as $items) {
      $stokbarang = $this->db->get_where("barang", array('Id_Barang' => $items['id']))->row_array();
      if ($stokbarang < $items['qty']) {
        $this->session->set_flashdata('flash', 'Produk' . $items['name'] . ' melebihi stok kami!');
        redirect('Home/riwayatpemesanan');
      }
    }
    $Idtrans = $this->Home_Model->trans();
    $Id_Transaksi = 'TRX-' . (++$Idtrans['Id']);
    $Pelanggan = $this->Home_Model->getIdpel($this->session->userdata('username'));
    $Id_StatusKirim = 1;
    $Id_StatusBayar = 1;
    $Id_Metode = $this->input->post('metodepembayaran');
    $Tanggal_Transaksi = date('Y-m-d');
    $Provinsi = $this->db->get_where('ongkir', ['Id_Ongkir' => $this->input->post('Provinsi', true)])->row_array();
    $Alamat_Pengiriman = $this->input->post('Nama_Pelanggan', true) . ' ' . $this->input->post('No_Hp', true) . ', ' . $this->input->post('Alamat', true)
      . ', ' . $this->input->post('Kota', true) . ', ' . $Provinsi['Provinsi'] . ', ' . $this->input->post('Kode_Pos', true);
    $Total_Pembayaran = $this->input->post('Total_Pembayaran');
    $this->Home_Model->tambahPemesanan($Id_Transaksi, $Pelanggan['Id_Pelanggan'], $Id_StatusKirim, $Id_StatusBayar, $Id_Metode, $Tanggal_Transaksi, $Alamat_Pengiriman, $Total_Pembayaran);
    foreach ($this->cart->contents() as $items) {
      $Id_Barang = $items['id'];
      $Jumlah_Barang = $items['qty'];
      foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {
        $Keterangan_Tambahan = $option_value;
      }
      $this->Home_Model->tambahPemesananDetail($Id_Transaksi, $Id_Barang, $Jumlah_Barang, $Keterangan_Tambahan);
      $this->Home_Model->updateStok($Id_Barang, $Jumlah_Barang);
    }
    $this->cart->destroy();
    $this->session->set_flashdata('flash', 'Pesanan berhasil dibuat, silakan upload bukti transfer!');
    redirect('Home/riwayatpemesanan');
  }

  public function updatecart($rowid)
  {
    $data = array(
      'rowid' => $rowid,
      'qty'   => $this->input->post('Jumlah_Barang'),
      'options' => array('Color' => $this->input->post('keterangan')),
    );
    $this->cart->update($data);
    $this->session->set_flashdata('flash', 'Keranjang berhasil diperbarui!');
    redirect('Home/keranjang');
  }

  public function ajaxKeranjang()
  {
    $Metode = $this->Home_Model->getMetode($this->input->post("Id_Metode"));
    echo json_encode($Metode);
  }

  public function ajaxOngkir()
  {
    $Metode = $this->Home_Model->getOngkir($this->input->post("Id_Ongkir"));
    echo json_encode($Metode);
  }

  public function riwayatpemesanan()
  {
    $data = array(
      'title' => 'Pemesanan Badriah Collection',
      'user' => $this->User_Model->getLogin($this->session->userdata('username')),
    );
    $wherepelanggan = $this->db->where('transaksi.Id_Pelanggan', $data['user']['Id_Pelanggan']);
    $joinmetode = $this->db->join('metodepembayaran', 'transaksi.Id_Metode = metodepembayaran.Id_Metode', 'INNER');
    $data['transaksi'] = $this->Barang_Model->getAllPemesanan($wherepelanggan, $joinmetode);
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/riwayatpemesanan', $data);
    $this->load->view('pelanggan/templates/modals');
    $this->load->view('pelanggan/templates/footer');
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

  public function ajaxTransUser()
  {
    $id = $this->input->post('id');
    $joinmetode = $this->db->join('metodepembayaran', 'transaksi.Id_Metode = metodepembayaran.Id_Metode', 'INNER');
    echo json_encode($this->Barang_Model->getTrans($id, $joinmetode));
  }
  public function uploadFotoPembayaran()
  {
    $upload_image = $_FILES['Foto_Pembayaran']["name"];
    if ($upload_image) {
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './asset/buktipembayaran';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('Foto_Pembayaran')) {
        $image = $this->upload->data('file_name');
      }
    } else {
      $image = $this->input->post('Foto_DataBase');
    }
    $this->Home_Model->uploadFotoPembayaran($image);
    $this->session->set_flashdata('flash', 'Bukti Pembayaran berhasil diunggah!');
    redirect('Home/riwayatpemesanan');
  }

  public function caramemesan()
  {
    $data = array(
      'title' => 'Cara memesan Badriah Collection',
      'user' => $this->User_Model->getLogin($this->session->userdata('username')),
    );
    $this->load->view('pelanggan/templates/header', $data);
    $this->load->view('pelanggan/caramemesan', $data);
    $this->load->view('pelanggan/templates/footer');
  }
}
