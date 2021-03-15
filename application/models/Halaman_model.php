<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Halaman_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('post', $inputs);
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('post', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('post', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('post')
					->result();
	}

	public function select_all()
	{
		return $this->db
					->where(['tipe' => 'halaman'])
					->get('post')
					->result();
	}

	public function get_by_alias($alias) 
	{
		return $this->db
					->where([
						'tipe' => 'halaman',
						'alias' => $alias
					])
					->get('post')
					->result();
	}
}
?>