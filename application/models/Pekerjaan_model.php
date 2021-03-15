<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Pekerjaan_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('pekerjaan', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('pekerjaan', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('pekerjaan', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('pekerjaan')
					->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_pekerjaan' => $code])
					->get('pekerjaan')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('pekerjaan')
					->result();
	}
}
?>