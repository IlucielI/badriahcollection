<?php

defined('BASEPATH') or exit('No direct script access allowed');

class authen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_Model');
  }

  public function index()
  {
    if ($this->session->userdata('usernameadmin')) {
      redirect('admin');
    }
    if ($this->session->userdata('username')) {
      redirect('home');
    }
    $this->load->view('auth/masukdandaftar');
  }

  public function daftar()
  {
    $username = htmlspecialchars(strtolower(stripslashes($this->input->post('UserDaftar', true))));
    $password = $this->db->escape_like_str($this->input->post('PasswordDaftar'));
    $password2 = $this->db->escape_like_str($this->input->post('KonfirmasiPassword'));
    $email = htmlspecialchars($this->db->escape_like_str($this->input->post('EmailDaftar', true)));

    if ($password !== $password2) {
      $this->session->set_flashdata('flash', 'Konfirmasi password tidak sesuai!');
      redirect('authen');
    }

    if (strlen($password) < 6) {
      $this->session->set_flashdata('flash', 'Password minimal 6 karakter!');
      redirect('authen');
    }

    if (strlen($username) < 6) {
      $this->session->set_flashdata('flash', 'Username minimal 6 karakter dan maksimal 10 karakter!');
      redirect('authen');
    }

    if ($this->User_Model->getPelanggan($username)) {
      $this->session->set_flashdata('flash', 'Username sudah terdaftar!');
      redirect('authen');
    }

    if ($this->User_Model->getPelanggan($email)) {
      $this->session->set_flashdata('flash', 'Email sudah terdaftar!');
      redirect('authen');
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $data = array(
      'Username' => htmlspecialchars($username),
      'Password' => $password,
      'Email' => htmlspecialchars($email),
      'No_Hp' => '',
      'Alamat' => '',
      'Avatar' => 'Noimage.png',
      'Aktivasi' => '0',
      'Terakhir_Login' => '',
    );
    $token = urlencode(base64_encode(random_bytes(32)));
    $user_token = [
      'Username' => $username,
      'Token' => $token,
      'Date_Created' => time()
    ];
    $this->User_Model->daftarPelanggan($data);
    $this->db->insert('usertoken', $user_token);
    $this->_sendEmail($token, 'verify');
    $this->session->set_flashdata('flash', 'User baru berhasil ditambahkan! Silahkan Aktifasi Akun Anda :)');
    redirect('authen');
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'badriahcollection.official@gmail.com',
      'smtp_pass' => 'Badriahcollection99',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n",
    ];
    if ($type == 'verify') {
      $this->load->library('email', $config);
      $this->email->initialize($config);
      $this->email->from('badriahcollection.official@gmail.com', 'Badriah Collection OFFICIAL');
      $this->email->to($this->input->post('EmailDaftar'));
      $this->email->subject('Verifikasi Akun');
      $this->email->message('
      <p style= "color: pink; text-align:center"> Badriah Collection Official</p>
      <p style= "color: grey; font-size:18px;text-align:center"> Verifikasi Email</p>
      <p style= "text-align:center"> Hai ' . $this->input->post('UserDaftar') . ', hanya beberapa langkah lagi sebelum Anda dapat menggunakan akun Anda.</p>
      <p style= "text-align:center">Klik link ini untuk mengaktifkan akun anda :</p>
      <p style= "text-align:center;"><a href="'
        . base_url() . 'authen/verify?username=' . $this->input->post('UserDaftar')
        . '&token=' . $token . '"><button type="button" style="width:200px;height:40px;border-radius:6px;background-color:pink;border-style: outset;border-color:blue;cursor:pointer">
                  Aktifasi akun
                </button></a></p>');
      if ($this->email->send()) {
        return true;
      } else {
        $this->email->print_debugger();
        die;
      }
    }
  }

  public function verify()
  {
    $username = $this->input->get('username');
    $token = $this->input->get('token');
    $user = $this->User_Model->getLogin($username);

    if ($user) {
      if ($user['Aktivasi'] == 0) {
        $user_token = $this->db->get_where('usertoken', ['Token' => urlencode($token)])->row_array();
        if ($user_token) {
          if (time() - $user_token['Date_Created'] < (60 * 60)) {
            $this->db->set('Aktivasi', 1);
            $this->db->where('Username', $username);
            $this->db->update('pelanggan');
            $this->db->delete('usertoken', ['Username' => $username]);
            $this->session->set_flashdata('flash', 'Aktivasi ' . $username . ' sukses! silahkan login :)');
            redirect('authen');
          } else {
            $this->db->delete('pelanggan', ['Username' => $username]);
            $this->db->delete('usertoken', ['Username' => $username]);
            $this->session->set_flashdata('flash', 'Aktifasi akun gagal! token expired!');
            redirect('authen');
          }
        } else {
          $this->session->set_flashdata('flash', 'Aktifasi akun gagal! token aktivasi salah!');
          redirect('authen');
        }
      } else {
        $this->session->set_flashdata('flash', 'Aktifasi akun sudah dilakukan! silahkan login!');
        redirect('authen');
      }
    } else {
      $this->session->set_flashdata('flash', 'Aktifasi akun gagal! username salah!');
      redirect('authen');
    }
  }

  public function Login()
  {
    $username = strtolower(stripslashes($this->input->post('username', true)));
    $password = $this->input->post('password', true);
    $user = $this->User_Model->getLogin($username);
    $admin = $this->User_Model->getLoginAdmin($username);

    if ($user) {
      if (password_verify($password, $user['Password'])) {
        if ($user['Aktivasi'] == 1) {
          $data = [
            'username' => $user['Username'],
          ];
          $this->session->set_userdata($data);
          redirect('Home');
        } else {
          $this->session->set_flashdata('flash', 'Silahkan aktivasi akun anda!');
          redirect('authen');
        }
      } else {
        $this->session->set_flashdata('flash', 'Password salah!');
        redirect('authen');
      }
    } elseif ($admin) {
      if (password_verify($password, $admin['Password_Admin'])) {
        $data = [
          'usernameadmin' => $admin['Username_Admin'],
        ];
        $this->session->set_userdata($data);
        redirect('Admin');
      } else {
        $this->session->set_flashdata('flash', 'Password salah!');
        redirect('authen');
      }
    } else {
      $this->session->set_flashdata('flash', 'Username salah / belum terdaftar!');
      redirect('authen');
    }
  }

  public function Logout()
  {
    if ($this->session->userdata('username')) {
      $Terakhir_Login = date('Y-m-d');
      $this->User_Model->updateLogin($Terakhir_Login, $this->session->userdata('username'));
      $this->session->unset_userdata('username');
      $this->session->set_flashdata('flash', 'Sampai jumpa kembali :)');
      redirect('authen');
    }

    if ($this->session->userdata('usernameadmin')) {
      $Terakhir_Login = date('Y-m-d');
      $usernameadmin = $this->session->userdata('usernameadmin');
      $data = $this->User_Model->updateLoginAdmin($Terakhir_Login, $usernameadmin);
      $this->session->unset_userdata('usernameadmin');
      $this->session->set_flashdata('flash', 'Sampai jumpa kembali Admin :)');
      redirect('authen');
    }
  }
}
