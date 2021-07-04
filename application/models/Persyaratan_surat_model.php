<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Persyaratan_surat_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('persyaratan_surat', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('persyaratan_surat', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('persyaratan_surat', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('persyaratan_surat')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('persyaratan_surat')
					->result();
	}
}
?>