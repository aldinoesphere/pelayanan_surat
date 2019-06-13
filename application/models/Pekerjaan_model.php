<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Pekerjaan_model extends CI_Model
{
	public function insert($inputs)
	{
		$args = [
			'created' => date("Y-m-d")
		];
		$args = array_merge_recursive($args, $inputs);

		return $this->db->insert('jenis_surat', $args);
	}

	public function select_all() {
		return $this->db
					->get('pekerjaan')
					->result();
	}
}
?>