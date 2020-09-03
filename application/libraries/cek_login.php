<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_login
{
	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function cek()
	{
		if ($this->CI->session->userdata('username') == "" && $this->CI->session->userdata('level') == "") {
			$this->CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->CI->session->unset_userdata('id_petugas');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama_petugas');
		$this->CI->session->unset_userdata('level');

		$this->CI->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
		redirect('auth');
	}
}