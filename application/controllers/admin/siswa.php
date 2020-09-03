<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
		$this->load->model('kelas_model');
		$this->load->model('spp_model');
		$this->load->model('pembayaran_model');
	}

	public function index()
	{
		$siswa = $this->siswa_model->get_all();

		$data = array(
			'title'  => 'Daftar Semua siswa',
			'siswa'   => $siswa
		);

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/siswa/get_siswa', $data);
		$this->load->view('admin/template/footer');
	}

	public function create_sis()
	{
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
				'title'     => 'Tambah Siswa Baru',
				'kelas'     => $kelas,
				'spp'       => $spp
			);

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/siswa/create', $data);
			$this->load->view('admin/template/footer');
		} else {

			$bulanindonesia = array(
				'01' => 'Januari',
				'02' => 'Februari',
				'03' => 'Maret',
				'04' => 'April',
				'05' => 'Mei',
				'06' => 'Juni',
				'07' => 'Juli',
				'08' => 'Agustus',
				'09' => 'September',
				'10' => 'Oktober',
				'11' => 'November',
				'12' => 'Desember'
			);

			$data = array(
				'nisn'      => $this->input->post('nisn'),
				'nis'       => $this->input->post('nis'),
				'nama'      => $this->input->post('nama'),
				'id_kelas'  => $this->input->post('id_kelas'),
				'alamat'    => $this->input->post('alamat'),
				'no_telp'   => $this->input->post('no_telp'),
				'id_spp'    => $this->input->post('id_spp'),
			);

			$nisn = $this->input->post('nisn');
			$id_spp = $this->input->post('id_spp');
			$tempo_awal = $this->input->post('bulan');

			$this->siswa_model->create($data);

			for ($i = 0; $i < 12; $i++) {
				$tempo = date("Y-m-d", strtotime("+$i month", strtotime($tempo_awal)));
				$bulan = $bulanindonesia[date('m', strtotime($tempo))];

				$this->pembayaran_model->create($nisn, $id_spp, $bulan);
			}

			$this->session->set_flashdata('message', 'Data siswa berhasil ditambahkan');
			redirect('admin/siswa');
		}
	}

	public function update_sis($nisn)
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
			'alamat',
			'Alamat',
			''
		);
		$valid->set_rules(
			'no_telp',
			'No Telp',
			''
		);
		$valid->set_rules(
			'id_spp',
			'Tahun',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data = array(
				'title'     => 'Update Siswa : ' . $siswa->nama,
				'siswa'     => $siswa,
				'kelas'     => $kelas,
				'spp'       => $spp
			);

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/siswa/update', $data);
			$this->load->view('admin/template/footer');
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
			redirect('admin/siswa');
		}
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
			'alamat',
			'Alamat',
			''
		);
		$valid->set_rules(
			'no_telp',
			'No Telp',
			''
		);
		$valid->set_rules(
			'id_spp',
			'Tahun',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data = array(
				'title'     => 'Detail Data',
				'siswa'     => $siswa,
				'kelas'     => $kelas,
				'spp'       => $spp
			);

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/siswa/view', $data);
			$this->load->view('admin/template/footer');
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
			redirect('admin/siswa');
		}
	}
	public function delete_sis($nisn)
	{
		$siswa = $this->siswa_model->detail($nisn);

		$data = array('nisn' => $siswa->nisn);

		$this->siswa_model->delete($data);
		$this->session->set_flashdata('message', 'Data siswa <b> ' . $siswa->nama . '</b> telah dihapus');
		redirect('admin/siswa');
	}

	public function kelas()
	{
		$kelas = $this->kelas_model->get_all();

		$data = array(
			'title'  => 'Daftar Kelas',
			'kelas'   => $kelas
		);

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/template/topbar', $data);
		$this->load->view('admin/kelas/get_kelas', $data);
		$this->load->view('admin/template/footer');
	}

	public function create_kel()
	{
		$valid = $this->form_validation;
		$valid->set_rules(
			'nama_kelas',
			'Nama Kelas',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'kompetensi_keahlian',
			'Kompetensi Keahlian',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data['title'] = 'Tambah Kelas';

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/kelas/create', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = array(
				'nama_kelas'            => $this->input->post('nama_kelas'),
				'kompetensi_keahlian'   => $this->input->post('kompetensi_keahlian')
			);

			$this->kelas_model->create($data);
			$this->session->set_flashdata('message', 'Data berhasil ditambahkan');
			redirect('admin/siswa/kelas');
		}
	}

	public function update_kel($id_kelas)
	{
		$kelas = $this->kelas_model->detail($id_kelas);

		$valid = $this->form_validation;
		$valid->set_rules(
			'nama_kelas',
			'Nama Kelas',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);
		$valid->set_rules(
			'kompetensi_keahlian',
			'Kompetensi Keahlian',
			'required',
			array('required' => '%s Tidak boleh kosong')
		);

		if (!$valid->run()) {
			$data = array(
				'title'     => 'Update Kelas : ' . $kelas->nama_kelas,
				'kelas'     => $kelas
			);
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/template/topbar', $data);
			$this->load->view('admin/kelas/update', $data);
			$this->load->view('admin/template/footer');
		} else {
			$data = array(
				'id_kelas'              => $id_kelas,
				'nama_kelas'            => $this->input->post('nama_kelas'),
				'kompetensi_keahlian'   => $this->input->post('kompetensi_keahlian')
			);

			$this->kelas_model->update($data);
			$this->session->set_flashdata('message', 'Data kelas <b>' . $kelas->nama_kelas . '</b> telah diupdate');
			redirect('admin/siswa/kelas');
		}
	}

	public function delete_kel($id_kelas)
	{
		$kelas = $this->kelas_model->detail($id_kelas);

		$data = array('id_kelas' => $kelas->id_kelas);

		$this->kelas_model->delete($data);
		$this->session->set_flashdata('message', 'Data kelas <b>' . $kelas->nama_kelas . '</b> telah dihapus');
		redirect('admin/siswa/kelas');
	}
}