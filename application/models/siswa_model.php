<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->distinct();
		$this->db->select('siswa.*, kelas.nama_kelas, spp.*');
		$this->db->from('siswa');
		//join dengan tabel siswa
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->join('spp', 'spp.id_spp = siswa.id_spp', 'left');
		// $this->db->join('pembayaran', 'pembayaran.id_pembayaran = siswa.id_pembayaran', 'left');
		$this->db->order_by('nisn');

		$query = $this->db->get();
		return $query->result();
	}

	public function detail($nisn)
	{
		$this->db->select('siswa.*, kelas.nama_kelas, spp.*');
		$this->db->from('siswa');

		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->join('spp', 'spp.id_spp = siswa.id_spp', 'left');

		$this->db->where('nisn', $nisn);
		$this->db->order_by('nisn');

		$query = $this->db->get();
		return $query->row();
	}

	public function create($data)
	{
		$this->db->insert('siswa', $data);
	}

	public function update($data)
	{
		$this->db->where('nisn', $data['nisn']);
		$this->db->update('siswa', $data);
	}

	public function delete($data)
	{
		$this->db->where('nisn', $data['nisn']);
		$this->db->delete('siswa', $data);
	}

	public function search($keyword)
	{
		$this->db->distinct();
		$this->db->select('siswa.*, kelas.nama_kelas, spp.nominal');
		$this->db->from('siswa');

		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left');
		$this->db->join('spp', 'spp.id_spp = siswa.id_spp', 'left');

		$this->db->like('nisn', $keyword);
		$this->db->or_like('nis', $keyword);
		$this->db->or_like('nama', $keyword);

		return $this->db->get()->result();
	}
}