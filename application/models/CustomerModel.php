<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    // public $id_akun;

    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

    public function get_buku()
    {
        $query = $this->db->get('data_buku');
        return $query->result_array();
    }

    public function add_beli($data)
    { 
        $query = $this->db->insert('pembelian', $data);
    }
    
    public function get_buku_anda()
    {
        $id_akun = $this->session->userdata('id_akun');
        $query = $this->db->query("SELECT * FROM pembelian LEFT JOIN data_buku ON pembelian.id_buku = data_buku.id_buku WHERE id_pembeli = $id_akun");
        return $query->result_array(); // return berupa array objek
    }
}