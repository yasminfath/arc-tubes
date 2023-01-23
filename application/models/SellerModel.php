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

    public function get_buku_by_id($id_buku)
    {
        $this->db->select('*');
        $this->db->from('data_buku');
        $this->db->where('id_buku', $id_buku);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_tambah_buku($id_buku, $jumlah_baru)
    {
        $id_buku = intval($id_buku);
        $jumlah_awal =  $this->db->query("SELECT jumlah FROM data_buku WHERE id_buku = $id_buku");
        $jumlah_akhir = $jumlah_awal->result_array()[0]['jumlah'] + $jumlah_baru;
        $this->db->set('jumlah', $jumlah_akhir, FALSE);
        $this->db->where('id_buku', $id_buku);
        $this->db->update('data_buku'); 
    }

    public function update_buku($data)
    {
        $this->db->set('kd_buku', '"'.$data['kd_buku'].'"', FALSE);
        $this->db->set('judul_buku', '"'.$data['judul_buku'].'"', FALSE);
        $this->db->set('kategori_buku', '"'.$data['kategori_buku'].'"', FALSE);
        $this->db->set('penerbit_buku', '"'.$data['penerbit_buku'].'"', FALSE);
        $this->db->set('penulis_buku', '"'.$data['penulis_buku'].'"', FALSE);
        $this->db->set('tahun_terbit', '"'.$data['tahun_terbit'].'"', FALSE);
        $this->db->set('jumlah', intval($data['jumlah']), FALSE);
        $this->db->where('id_buku', intval($data['id_buku']));
        $this->db->update('data_buku'); 
    }

    public function delete_buku($id_buku)
    {
        $this->db->delete('data_buku', array('id_buku' => $id_buku));
        $this->db->delete('pembelian', array('id_buku' => $id_buku));
    }

    public function add_buku_baru($data)
    {
        $query = $this->db->insert('data_buku', $data);
        return $query;
    }

    public function get_pembelian()
    {
        $query = $this->db->query("SELECT * FROM pembelian LEFT JOIN akun ON pembelian.id_pembeli = akun.id_akun LEFT JOIN data_buku ON data_buku.id_buku = pembelian.id_buku WHERE tanggal_beli IS NOT NULL");
        return $query->result_array();
    }

    public function update_konfirm_pembelian($data)
    {
        $id_buku = intval($data['id_buku']);
        $jumlah_awal =  $this->db->query("SELECT jumlah FROM data_buku WHERE id_buku = $id_buku");
        $jumlah_akhir = $jumlah_awal->result_array()[0]['jumlah'] - 1;
        $this->db->set('jumlah', $jumlah_akhir, FALSE);
        $this->db->where('id_buku', $data['id_buku']);
        $this->db->update('data_buku'); 
        $id_beli = $data['id_beli'];
        $query = $this->db->query("UPDATE pembelian SET tanggal_konfirmasi_beli = CURRENT_TIMESTAMP() WHERE id_beli = $id_beli");
    }
    
    public function update_kirim_barang($id_beli)
    {
        $query = $this->db->query("UPDATE pembelian SET tanggal_dikirim = CURRENT_TIMESTAMP() WHERE id_beli = $id_beli");
        $hari_inii = $this->db->query("SELECT tanggal_dikirim FROM pembelian WHERE id_beli = $id_beli");
        $hari_ini = $hari_inii->result_array()[0]['tanggal_dikirim'];
        $estimasi = date('Y-m-d', strtotime('+5 days', strtotime($hari_ini)));
        $this->db->set('estimasi_sampai', '"'.$estimasi.'"', FALSE);
        $this->db->where('id_beli', $id_beli);
        $this->db->update('pembelian');
    }

    public function update_barang_sampai($id_beli)
    {
        $query = $this->db->query("UPDATE pembelian SET tanggal_sampai = CURRENT_TIMESTAMP() WHERE id_beli = $id_beli");
    }
}
