<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_($nisn)
	{
		$this->db->select('pembayaran.*, siswa.nama, siswa.nis, spp.*, petugas.*');
		$this->db->from('pembayaran');

		//join dengan tabel pembayaran
		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn', 'left');
		$this->db->join('spp', 'spp.id_spp = pembayaran.id_spp', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');
		$this->db->where('pembayaran.nisn', $nisn);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_all()
	{
		$this->db->distinct();
		$this->db->select('pembayaran.*, siswa.nama, siswa.nis, spp.*, petugas.*');
		$this->db->from('pembayaran');

		//join dengan tabel pembayaran
		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn', 'left');
		$this->db->join('spp', 'spp.id_spp = pembayaran.id_spp', 'left');
		$this->db->join('petugas', 'petugas.id_petugas = pembayaran.id_petugas', 'left');

		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_pembayaran)
	{
		$this->db->select('pembayaran.*, siswa.nama, siswa.nis, siswa.nisn, spp.nominal');
		$this->db->from('pembayaran');

		$this->db->join('siswa', 'siswa.nisn = pembayaran.nisn', 'left');
		$this->db->join('spp', 'spp.id_spp = pembayaran.id_spp', 'left');
		$this->db->where('pembayaran.id_pembayaran', $id_pembayaran);

		$query = $this->db->get();
		return $query->row();
	}

	public function create($nisn, $id_spp, $bulan)
	{
		$query = $this->db->query("INSERT INTO pembayaran (nisn, id_Spp, bulan) values('$nisn', '$id_spp', '$bulan')");
		return $query;
	}

	public function update($data2)
	{
		$this->db->where('id_pembayaran', $data2['id_pembayaran']);
		$this->db->update('pembayaran', $data2);
	}

	public function delete($data)
	{
		$this->db->where('id_pembayaran', $data['id_pembayaran']);
		$this->db->delete('pembayaran', $data);
	}
}
