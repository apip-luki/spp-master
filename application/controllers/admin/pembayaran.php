<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pembayaran_model');
		$this->load->model('siswa_model');
		$this->load->model('spp_model');
		$this->load->model('kelas_model');
	}

	public function index()
	{
		$keyword = $this->input->post('keyword');

		$spp = $this->spp_model->get_all();
		$kelas = $this->kelas_model->get_all();
		$siswa = $this->siswa_model->search($keyword);

		$data = [
			'title' => 'Dashboard Pembayaran',
			'spp' => $spp,
			'kelas' => $kelas,
			'siswa' => $siswa
		];
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/pembayaran/get_bayar2', $data);
		$this->load->view('admin/template/footer');
	}

	public function bayar($id_pembayaran)
	{
		$data2 = [
			'id_pembayaran' => $id_pembayaran,
			'id_petugas' => $this->session->userdata('id_petugas'),
			'tgl_bayar' => date('Y-m-d'),
			'keterangan' => 'Lunas'
		];
		$this->pembayaran_model->update($data2);

		$this->load->library('user_agent');
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function transaksi($nisn)
	{
		$siswa = $this->siswa_model->detail($nisn);
		$kelas = $this->kelas_model->get_all();
		$spp = $this->spp_model->get_all();
		$pembayaran = $this->pembayaran_model->get_all_($nisn);

		$data = array(
			'title'     => 'Pembayaran Siswa : ' . $siswa->nama,
			'siswa'     => $siswa,
			'kelas'     => $kelas,
			'spp'       => $spp,
			'pembayaran' => $pembayaran
		);

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/pembayaran/get_bayar', $data);
		$this->load->view('admin/template/footer');
	}
}