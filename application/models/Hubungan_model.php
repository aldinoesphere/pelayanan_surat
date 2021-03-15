<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Hubungan_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('hubungan', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('hubungan', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('hubungan', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('hubungan')
					->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_hubungan' => $code])
					->get('hubungan')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('hubungan')
					->result();
	}
}
?>