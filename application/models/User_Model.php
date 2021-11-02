<?php

class User_Model extends CI_Model
{
  public function getPelanggan($data)
  {
    $this->db->select('*');
    $this->db->from('pelanggan');
    $this->db->where('Username', $data);
    $this->db->or_where('Email', $data);
    return $this->db->get()->num_rows();
  }

  public function daftarPelanggan($data)
  {
    $this->db->insert('pelanggan', $data);
  }

  public function getLogin($data)
  {
    return $this->db->get_where('pelanggan', ['Username' => $data])->row_array();
  }

  public function getLoginAdmin($data)
  {
    return $this->db->get_where('admin', ['Username_Admin' => $data])->row_array();
  }

  public function updateLogin($data, $username)
  {
    $this->db->set('Terakhir_Login', $data);
    $this->db->where('Username', $username);
    $this->db->update('pelanggan');
  }

  public function updateLoginAdmin($data, $username)
  {
    $this->db->set('Terakhir_Login', $data);
    $this->db->where('Username_Admin', $username);
    $this->db->update('admin');
  }

  public function updateProfile($id, $image, $password)
  {
    $this->db->set("Nama_Pelanggan", $this->input->post('Nama_Pelanggan', true));
    $this->db->set("Password", $password);
    $this->db->set("No_Hp", $this->input->post('No_Hp', true));
    $this->db->set("Alamat", $this->input->post('Alamat', true));
    $this->db->set("Avatar", $image);
    $this->db->set("Kode_Pos", $this->input->post('Kode_Pos', true));
    $this->db->where("Id_Pelanggan", $id);
    $this->db->update('pelanggan');
  }

  public function updateProfileAdmin($id, $image, $password)
  {
    $this->db->set("Nama_Admin", $this->input->post('Nama_Admin', true));
    $this->db->set("Password_Admin", $password);
    $this->db->set("Foto_Admin", $image);
    $this->db->where("Id_Admin", $id);
    $this->db->update('admin');
  }
}
