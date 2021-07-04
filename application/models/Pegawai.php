<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Pegawai_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('pegawai', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('pegawai', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('pegawai', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('pegawai')
					->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_pegawai' => $code])
					->get('pegawai')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('pegawai')
					->result();
	}
}
?>