<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Status_tinggal_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('status_tinggal', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('status_tinggal', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('status_tinggal', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('status_tinggal')
					->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_status_tinggal' => $code])
					->get('status_tinggal')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('status_tinggal')
					->result();
	}
}
?>