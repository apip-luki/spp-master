<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('spp_model');
		$this->load->model('pembayaran_model');
		$this->load->model('siswa_model');

		// is_logged_in();
		$this->cek_login->cek();
	}

	public function index()
	{
		$siswa = $this->siswa_model->get_all();

		$data = [
			'title' => 'Dashboard Pembayaran',
			'siswa' => $siswa
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/pembayaran/get_pembayaran', $data);
		$this->load->view('admin/template/footer');
	}


	public function spp()
	{
		$spp = $this->spp_model->get_all();

		$data = array(
			'title'     => 'Daftar SPP',
			'spp'       => $spp
		);

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/spp/get_spp', $data);
		$this->load->view('admin/template/footer');
	}

	public function create_spp()
	{
		$valid = $this->form_validation;
		$valid->set_rules(
			'tahun',
			'Tahun',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'nominal',
			'Nominal',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data['title'] = 'Tambah SPP';

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/spp/create', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = array(
				'tahun'     => $this->input->post('tahun'),
				'nominal'   => $this->input->post('nominal')
			);

			$this->spp_model->create($data);
			$this->session->set_flashdata('message', 'Data berhasil ditambahkan');
			redirect('admin/index/spp');
		}
	}

	public function update_spp($id_spp)
	{
		$spp = $this->spp_model->detail($id_spp);

		$valid = $this->form_validation;
		$valid->set_rules(
			'tahun',
			'Tahun',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'nominal',
			'Nominal',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data = array(
				'title'     => 'Update SPP' . $spp->tahun,
				'spp'       => $spp
			);

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/spp/update', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = array(
				'id_spp'    => $id_spp,
				'tahun'     => $this->input->post('tahun'),
				'nominal'   => $this->input->post('nominal')
			);

			$this->spp_model->update($data);
			$this->session->set_flashdata('message', 'Data SPP <b>' . $spp->tahun . '</b> telah diupdate');
			redirect('admin/index/spp');
		}
	}

	public function delete_spp($id_spp)
	{
		$spp = $this->spp_model->detail($id_spp);

		$data = array('id_spp' => $spp->id_spp);

		$this->spp_model->delete($data);
		$this->session->set_flashdata('message', 'Data SPP <b>' . $spp->tahun . '</b> telah dihapus');
		redirect('admin/index/spp');
	}
}