<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$role_akun = $this->session->userdata('role');
		if($role_akun === "seller"){
			redirect('seller');
            exit();
		}
		else if(!$role_akun){
            redirect('/');
            exit();
        }
		$this->load->model('customerModel');
	}
    
	public function buku()
	{
		$data['data_buku'] = $this->customerModel->get_buku();
		$this->load->view('customer/buku/index', $data);
	}
	
    public function beli()
	{
		$data = array(
				'id_buku' => $this->input->get('id_buku'),
				'id_pembeli' => $this->session->userdata('id_akun'),
		);
		$this->customerModel->add_beli($data);
		redirect('customer/buku_anda');
	}
	
    public function buku_anda()
	{
		$data['buku_anda'] = $this->customerModel->get_buku_anda();
		$this->load->view('customer/buku_anda/index', $data);
	}
	
    // public function sampai()
	// {
	// 	$id_beli = $this->input->get('id_beli');
	// 	$this->customerModel->update_beli($id_beli);
	// 	redirect('customer/buku_anda');
	// }
}