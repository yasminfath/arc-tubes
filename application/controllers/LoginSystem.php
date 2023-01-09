<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginSystem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginSystemModel');
	}

	public function index(){
		$this->login();
	}
    
	public function login()
	{      
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		if($this->loginSystemModel->login($email, $password)){
			$role_akun = $this->session->userdata('role');
			if($role_akun == "customer"){
				redirect('customer/buku');
			}
			else{
				redirect('seller/buku');
			}
		} 

		$this->load->view('login');
	}
	
	public function logout()
	{
		$this->loginSystemModel->logout();
		redirect(base_url());
	}
	
	public function register()
	{
		$this->load->view('register');
	}

	public function submitRegister()
	{
		$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);

		if($this->loginSystemModel->register($data)){
			redirect(base_url());
		}
		else{
			redirect(base_url('register'));
		}
	}
}