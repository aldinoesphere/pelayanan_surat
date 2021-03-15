<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Pendidikan_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('pendidikan', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('pendidikan', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('pendidikan', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('pendidikan')
					->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_pendidikan' => $code])
					->get('pendidikan')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('pendidikan')
					->result();
	}
}
?>