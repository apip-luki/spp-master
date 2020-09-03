<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spp_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('spp');
		$this->db->order_by('id_spp', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_spp)
	{
		$this->db->select('*');
		$this->db->from('spp');
		$this->db->where('id_spp', $id_spp);
		$this->db->order_by('id_spp');

		$query = $this->db->get();
		return $query->row();
	}

	public function create($data)
	{
		$this->db->insert('spp', $data);
	}

	public function update($data)
	{
		$this->db->where('id_spp', $data['id_spp']);
		$this->db->update('spp', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_spp', $data['id_spp']);
		$this->db->delete('spp', $data);
	}
}