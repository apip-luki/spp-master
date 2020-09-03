<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->order_by('id_kelas', 'asc');

		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_kelas)
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('id_kelas', $id_kelas);
		$this->db->order_by('id_kelas');

		$query = $this->db->get();
		return $query->row();
	}

	public function create($data)
	{
		$this->db->insert('kelas', $data);
	}

	public function update($data)
	{
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->update('kelas', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_kelas', $data['id_kelas']);
		$this->db->delete('kelas', $data);
	}
}