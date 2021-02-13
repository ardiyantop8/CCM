<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('user');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Form Login';
			$this->load->view('Auth/login', $data);
			// $this->load->view('template/auth-header', $data_title);
			// $this->load->view('auth/login');
			// $this->load->view('template/auth-footer');
		} else {
			//validasinya lolos
			$this->_login();
		}
		// $this->load->view('Auth/login');
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		//usernya ada
		if ($user) {
			//jika usernya aktif
			if ($user['is_active'] == 1) {
				//cek passwordnya
				if (password_verify($password, $user['password'])) {
					$data = [
						'username' 		=> $user['username'],
						'role_id'		=> $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('Admin');
					} else if ($user['role_id'] == 2) {
						redirect('Owner');
					} else {
						redirect('Kasir');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Salah ! </div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak aktif, Silahkan Hubungi Developer </div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username belum terdaftar </div>');
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Anda berhasil keluar </div>');
		redirect('Auth');
	}

	public function blocked()
	{
		$this->load->view('Auth/blocked');
	}
}
