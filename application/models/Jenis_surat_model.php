<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Jenis_surat_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('jenis_surat', $inputs);
	}

	public function select_all() {
		return $this->db
					->where(['flag' => 0])
					->get('jenis_surat')
					->result();
	}

	public function delete($id)
	{
		return $this->db->delete('jenis_surat', ['id' => $id]);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('jenis_surat', $inputs);
	}

	public function select_by_id($id) {
		return $this->db
					->where(
						[
							'flag' => 0,
							'id' => $id
						]
					)
					->get('jenis_surat')
					->result();
	}

	public function select_by_kode_surat($kode_surat)
	{
		return $this->db
					->where(
						[
							'flag' => 0,
							'kode_surat' => $kode_surat
						]
					)
					->get('jenis_surat')
					->result();
	}
}
?>