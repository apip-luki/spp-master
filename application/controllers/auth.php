<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'trim|required'
		);
		$valid->set_rules(
			'password',
			'Password',
			'trim|required'
		);

		if (!$valid->run()) {

			$data['title'] = 'Login';
			$this->load->view('login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$petugas = $this->db->get_where('petugas', ['username' => $username])->row_array();

		if ($petugas) {
			if (password_verify($password, $petugas['password'])) {
				$data = [
					'username' => $petugas['username'],
					'level' => $petugas['level'],
					'id_petugas' => $petugas['id_petugas']
				];
				$this->session->set_userdata($data);
				if ($petugas['level'] == 'Admin') {

					redirect('admin/index');
				} else {
					redirect('index');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->set_userdata('id_petugas');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
		redirect('auth');
	}
}