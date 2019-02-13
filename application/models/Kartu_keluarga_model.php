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

	public function select_all() {
		return $this->db
					->where(['flag' => 0])
					->get('kartu_keluarga')
					->result();
	}
}
?>