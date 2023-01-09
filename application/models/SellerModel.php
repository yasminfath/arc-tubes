<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SellerModel extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$id_akun = $this->session->userdata('id_akun');
	}

    public function get_buku()
    {
        $query = $this->db->get('data_buku');
        return $query->result_array();
    }

    public function get_pembelian()
    {
        $query = $this->db->query("SELECT * FROM pembelian LEFT JOIN akun ON pembelian.id_pembeli = akun.id_akun LEFT JOIN data_buku ON data_buku.id_buku = pembelian.id_buku WHERE tanggal_beli IS NOT NULL");
        return $query->result_array();
    }
}