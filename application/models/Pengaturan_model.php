<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Pengaturan_model extends CI_Model
{

	public function get_settings() {
		$query = $this->db->get('pengaturan')->result();
		$data = [];

		foreach ($query as $setting) {
			$data[$setting->nama_pengaturan] =  $setting->pengaturan;
		}

		return $data;	
	}

	protected function check_pengaturan($nama_pengaturan)
	{
		return $this->db
					->where(['nama_pengaturan' => $nama_pengaturan])
					->get('pengaturan')
					->result();
	}

	public function simpan_pengaturan() {

		$settings = $this->input->post();
		foreach ($settings as $key => $value) {
			$data = [
				'nama_pengaturan' 	=> $key,
				'pengaturan' 		=> $value 
			];
			if (sizeof($this->check_pengaturan($key)) > 0) {
				$this->db->where('nama_pengaturan', $key);
				$this->db->update('pengaturan', $data);
			} else {
				$this->db->insert('pengaturan', $data);
			}
		}
		return true;
	}

	public function get_banners()
	{
		return $this->db->get('banners')->result();
	}

	public function get_banner($id)
	{
		return $this->db->where('id', $id)->get('banners')->result();
	}

	public function save_banner($input)
	{
		return $this->db->insert('banners', $input);
	}

	public function delete_banner($id)
	{
		return $this->db->delete('banners', ['id' => $id]);
	}
}
?>