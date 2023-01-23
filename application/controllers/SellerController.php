<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SellerController extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		$role_akun = $this->session->userdata('role');
		if($role_akun === "customer"){
            redirect('customer');
            exit();
		}
        else if(!$role_akun){
            redirect('/');
            exit();
        }
		$this->load->model('sellerModel');
	}

    public function index()
    {
        $this->buku;
    }

    public function buku()
    {
        $data['data_buku'] = $this->sellerModel->get_buku();
		$this->load->view('seller/buku/index', $data);
    }

    public function tambahJumlah()
	{
        $id_buku = $this->input->get('id_buku');
        $jumlah_baru = $this->input->get('jumlah_baru');
		$data['buku_anda'] = $this->sellerModel->update_tambah_buku($id_buku, $jumlah_baru);
		redirect('seller/buku');
	}

    public function editBuku()
	{
        $id_buku = $this->input->get('id_buku');
        $data['data_buku'] = $this->sellerModel->get_buku_by_id($id_buku)[0];
        $this->load->view('seller/buku/edit_buku', $data);
	}

    public function submitEditBuku()
	{
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'kd_buku' => $this->input->post('kd_buku'),
			'judul_buku' => $this->input->post('judul_buku'),
			'kategori_buku' => $this->input->post('kategori_buku'),
			'penulis_buku' => $this->input->post('penulis_buku'),
			'penerbit_buku' => $this->input->post('penerbit_buku'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'jumlah' => $this->input->post('jumlah'),
        );
        $this->sellerModel->update_buku($data);
        redirect('seller/buku');
	}

    public function hapusBuku()
    {
        $id_buku = $this->input->get('id_buku');
        $this->sellerModel->delete_buku($id_buku);
        redirect('seller/buku');
    }
    
    public function tambahBuku()
    {
        $this->load->view('seller/buku/tambah_buku');
    }
    
    public function submitTambahBuku()
    {
        $data = array(
            'kd_buku' => $this->input->post('kd_buku'),
			'judul_buku' => $this->input->post('judul_buku'),
            'kategori_buku' => $this->input->post('kategori_buku'),
			'penulis_buku' => $this->input->post('penulis_buku'),
			'penerbit_buku' => $this->input->post('penerbit_buku'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'jumlah' => $this->input->post('jumlah'),
		);
        $this->sellerModel->add_buku_baru($data);
        redirect('seller/buku');
    }

    public function pembelian()
	{
		$data['buku_anda'] = $this->sellerModel->get_pembelian();
		$this->load->view('seller/pembelian/index', $data);
	}

    public function konfirmasiPembelian()
	{
        $data = array(
            	'id_beli' => $this->input->get('id_beli'),
            	'id_buku' => $this->input->get('id_buku'),
        );
		$data['buku_anda'] = $this->sellerModel->update_konfirm_pembelian($data);
		redirect('seller/pembelian');
	}

    public function pengirimanBarang()
	{
        $id_beli = $this->input->get('id_beli');
		$data['buku_anda'] = $this->sellerModel->update_kirim_barang($id_beli);
		redirect('seller/pembelian');
	}

    public function penyampaianBarang()
	{
        $id_beli = $this->input->get('id_beli');
		$data['buku_anda'] = $this->sellerModel->update_barang_sampai($id_beli);
		redirect('seller/pembelian');
	}
}
