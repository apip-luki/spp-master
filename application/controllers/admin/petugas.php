<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
	}

	public function index()
	{
		$petugas = $this->petugas_model->get_all();

		$data = array(
			'title'  => 'Daftar Petugas',
			'petugas'   => $petugas
		);

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/petugas/get_petugas', $data);
		$this->load->view('admin/template/footer');
	}

	public function create()
	{
		$valid = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'nama_petugas',
			'Nama Petugas',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'password',
			'Password',
			'required|trim',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'level',
			'Level',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data['title'] = 'Tambah Petugas';

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/petugas/create', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = array(
				'username'      => htmlspecialchars($this->input->post('username', true)),
				'nama_petugas'  => htmlspecialchars($this->input->post('nama_petugas', true)),
				'password'		 => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level'          => $this->input->post('level')
			);

			$this->petugas_model->create($data);
			$this->session->set_flashdata('message', 'Data telah ditambahkan');
			redirect('admin/petugas');
		}
	}

	public function update($id_petugas)
	{
		$petugas = $this->petugas_model->detail($id_petugas);

		$valid = $this->form_validation;
		$valid->set_rules(
			'username',
			'Username',
			'required',
			array('required' => '%s tidak boleh kosong')
		);
		$valid->set_rules(
			'nama_petugas',
			'Nama Petugas',
			'required',
			array('required' => '%s tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data = array(
				'title' => 'Update Petugas : ' . $petugas->nama_petugas,
				'petugas' => $petugas
			);

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/petugas/update', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = array(
				'id_petugas'    => $id_petugas,
				'username'      => $this->input->post('username'),
				'nama_petugas'  => $this->input->post('nama_petugas'),
				'level'          => $this->input->post('level'),
			);

			$this->petugas_model->update($data);
			$this->session->set_flashdata('message', 'Data petugas <b>' . $petugas->nama_petugas . '</b> telah diupdate');
			redirect('admin/petugas');
		}
	}

	public function delete($id_petugas)
	{
		// $this->cek_login->cek();

		$petugas = $this->petugas_model->detail($id_petugas);

		$data = array('id_petugas' => $petugas->id_petugas);

		$this->petugas_model->delete($data);
		$this->session->set_flashdata('message', 'Data petugas <b>' . $petugas->nama_petugas . '</b> telah dihapus');
		redirect('admin/petugas');
	}
}