<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pembayaran_model');
		$this->load->model('spp_model');
		$this->load->model('siswa_model');
		$this->load->model('kelas_model');
		// $this->cek_login->cek();
		is_logged_in();
	}

	public function index()
	{
		$siswa = $this->siswa_model->get_all();
		// $pembayaran = $this->pembayaran_model->get_all();


		$data = [
			'title' => 'Dashboard Pembayaran',
			// 'pembayaran' => $pembayaran,
			'siswa' => $siswa
		];

		$this->load->view('petugas/template/header', $data);
		$this->load->view('petugas/template/sidebar', $data);
		$this->load->view('petugas/template/topbar', $data);
		$this->load->view('petugas/pembayaran/get_pembayaran', $data);
		$this->load->view('petugas/template/footer');
	}

	public function search()
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
		$this->load->view('petugas/template/header', $data);
		$this->load->view('petugas/template/sidebar', $data);
		$this->load->view('petugas/template/topbar', $data);
		$this->load->view('petugas/pembayaran/get_pembayaran2', $data);
		$this->load->view('petugas/template/footer');
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

		$this->load->view('petugas/template/header', $data);
		$this->load->view('petugas/template/sidebar', $data);
		$this->load->view('petugas/template/topbar', $data);
		$this->load->view('petugas/pembayaran/get_bayar', $data);
		$this->load->view('petugas/template/footer');
	}

	public function siswa()
	{
		$siswa = $this->siswa_model->get_all();

		$data = [
			'title' => 'Daftar Semua Siswa',
			'siswa' => $siswa
		];

		$this->load->view('petugas/template/header', $data);
		$this->load->view('petugas/template/sidebar', $data);
		$this->load->view('petugas/template/topbar', $data);
		$this->load->view('petugas/siswa/get_siswa', $data);
		$this->load->view('petugas/template/footer', $data);
	}

	public function view($nisn)
	{
		$siswa = $this->siswa_model->detail($nisn);
		$kelas = $this->kelas_model->get_all();
		$spp = $this->spp_model->get_all();

		$valid = $this->form_validation;
		$valid->set_rules(
			'nisn',
			'NISN',
			'required|trim',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'nis',
			'NIS',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'nama',
			'Nama',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'id_kelas',
			'Kelas',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'id_spp',
			'Tahun',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data = array(
				'title'		=> 'View',
				'nama'      => 'Detail Siswa : <b>' . $siswa->nama . '</b>',
				'siswa'     => $siswa,
				'kelas'     => $kelas,
				'spp'       => $spp
			);

			$this->load->view('petugas/template/header', $data);
			$this->load->view('petugas/template/sidebar', $data);
			$this->load->view('petugas/template/topbar', $data);
			$this->load->view('petugas/siswa/update', $data);
			$this->load->view('petugas/template/footer');
		} else {
			$data = array(
				'nisn'      => $nisn,
				'nis'       => $this->input->post('nis'),
				'nama'      => $this->input->post('nama'),
				'id_kelas'  => $this->input->post('id_kelas'),
				'alamat'    => $this->input->post('alamat'),
				'no_telp'   => $this->input->post('no_telp'),
				'id_spp'    => $this->input->post('id_spp')
			);

			$this->siswa_model->update($data);
			$this->session->set_flashdata('message', 'Data siswa <b> ' . $siswa->nama . '</b> telah diupdate');
			redirect('index/siswa');
		}
	}

	public function spp()
	{
		$spp = $this->spp_model->get_all();

		$data = array(
			'title'     => 'Daftar SPP',
			'spp'       => $spp
		);

		$this->load->view('petugas/template/header', $data);
		$this->load->view('petugas/template/sidebar', $data);
		$this->load->view('petugas/template/topbar', $data);
		$this->load->view('petugas/spp/get_spp', $data);
		$this->load->view('petugas/template/footer');
	}
}