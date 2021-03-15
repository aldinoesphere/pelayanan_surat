<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Agama_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('agama', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('agama', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('agama', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('agama')
					->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_agama' => $code])
					->get('agama')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('agama')
					->result();
	}
}
?>