<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Artikel_model extends CI_Model
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

	public function get_by_slug($slug)
	{
		return $this->db
					->where(['alias' => $slug])
					->get('post')
					->result();
	}

	public function select_all()
	{
		return $this->db
					->where(['tipe' => 'artikel'])
					->get('post')
					->result();
	}

	public function get_by_alias($alias) 
	{
		return $this->db
					->where([
						'tipe' => 'artikel',
						'alias' => $alias
					])
					->get('post')
					->result();
	}

	public function get_post_by_category($category_slug)
	{
		return $this->db
					->select('post.*')
					->join('kategori', 'kategori.id=post.kategori')
					->where([
						'kategori.alias' => $category_slug
					])
					->get('post')
					->result();
	}

	/*
	* Kategori artikel model
	*
	*/

	public function get_all_category()
	{
		return $this->db
					->get('kategori')
					->result();
	}

	public function insert_category($inputs)
	{
		return $this->db->insert('kategori', $inputs);
	}

	public function delete_category($id)
	{
		return $this->db->delete('kategori', ['id' => $id]);
	}

	public function get_category_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('kategori')
					->result();
	}

	public function update_category($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('post', $inputs);
	}
}
?>