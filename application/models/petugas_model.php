<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->order_by('id_petugas', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_petugas)
	{

		$this->db->select('*');
		$this->db->from('petugas');
		$this->db->where('id_petugas', $id_petugas);

		$query = $this->db->get();
		return $query->row();
	}

	public function create($data)
	{
		$this->db->insert('petugas', $data);
	}

	public function update($data)
	{
		$this->db->where('id_petugas', $data['id_petugas']);
		$this->db->update('petugas', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_petugas', $data['id_petugas']);
		$this->db->delete('petugas', $data);
	}
}