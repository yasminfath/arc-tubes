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

    public function pembelian()
	{
		$data['buku_anda'] = $this->sellerModel->get_pembelian();
		$this->load->view('seller/pembelian/index', $data);
	}
}
