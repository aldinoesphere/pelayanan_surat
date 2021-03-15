<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Kartu_keluarga_model extends CI_Model
{
	public function insert($inputs)
	{
		$args = [
			'created' => date("Y-m-d")
		];
		$args = array_merge_recursive($args, $inputs);

		return $this->db->insert('kartu_keluarga', $args);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('kartu_keluarga', $inputs);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('kartu_keluarga')
					->result();
	}

	public function get_by_no_kk($no_kk)
	{
		return $this->db
					->where(['no_kk' => $no_kk])
					->get('kartu_keluarga')
					->result();
	}

	public function delete($id)
	{
		return $this->db->delete('kartu_keluarga', ['id' => $id]);
	}

	public function select_all() {
		return $this->db
					->where(['flag' => 0])
					->get('kartu_keluarga')
					->result();
	}
}
?>