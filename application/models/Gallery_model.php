<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Gallery_model extends CI_Model
{
	/**
	*
	* Model Gallery Foto
	*/
	public function update_gallery_foto($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('gallery', $inputs);
	}

	public function select_all_foto() {
		return $this->get_gallery_by_category(0);
	}

	/**
	* 
	* Model Gallery Global
	* 
	* @param int $category_id
	* @return array
	*/
	protected function get_gallery_by_category($category_id) {
		return $this->db
					->where(['kategori' => $category_id])
					->get('gallery')
					->result();
	}

	public function get_all_gallery()
	{
		return $this->db
					->get('gallery')
					->result();
	}

	public function save_gallery($inputs)
	{
		return $this->db->insert('gallery', $inputs);
	}

	public function get_gallery_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('gallery')
					->result();
	}

	public function delete_gallery($id)
	{
		return $this->db->delete('gallery', ['id' => $id]);
	}

	public function get_last_id()
	{
		return $this->db->insert_id();
	}

	/**
	* 
	* Model Gallery Video
	* 
	*/
	public function select_all_video() {
		return $this->get_gallery_by_category(1);
	}
}
?>