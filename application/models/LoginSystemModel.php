<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();

class LoginSystemModel extends CI_Model
{
	private $_table = "akun";

	public function login($email, $password)
	{
        $this->db->where('email', $email);
		$query = $this->db->get($this->_table);
		$akun = $query->row();

		if (!$akun) {
			return FALSE;
		}

		if ($password !== $akun->password) {
            return FALSE;
		}

		$this->session->set_userdata('id_akun', $akun->id_akun);
		$this->session->set_userdata('role', $akun->role);

		return $this->session->has_userdata('id_akun');
	}

	public function logout()
	{
		$this->session->unset_userdata('id_akun');
		$this->session->unset_userdata('role');
		return !$this->session->has_userdata('id_akun');
	}

	public function register($data)
	{
		$this->session->unset_userdata('id_akun');
		$this->session->unset_userdata('role');

		$this->db->where('email', $data['email']);
		$query = $this->db->get($this->_table);
		$akun = $query->row();

		if (!$akun) {
			$query = $this->db->insert('akun', $data);
			$customer['id_akun'] = $this->db->insert_id();
			return $query = $this->db->insert('customer', $customer);
		}
		else{
			return FALSE;
		}
	}
}