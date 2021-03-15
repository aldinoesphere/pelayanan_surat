<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Pelayanan_surat_model extends CI_Model
{
	public function insert($inputs)
	{
		if ($this->db->insert('permohonan_surat', $inputs)) {
			return $this->db->insert_id();
		}
		return false;
	}

	public function update($inputs, $id)
	{
		return $this->db
					->where(['id' => $id])
					->update('permohonan_surat', $inputs);
	}

	public function delete($id)
	{
		return $this->db->delete('permohonan_surat', ['id' => $id]);
	}

	public function get_by_id($id)
	{
		return $this->db
					->where(['id' => $id])
					->get('permohonan_surat')
					->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_permohonan_surat' => $code])
					->get('permohonan_surat')
					->result();
	}

	public function select_all() {
		return $this->db
					->get('permohonan_surat')
					->result();
	}

	public function get_detail_permohonan_surat($id)
	{
		return $this->db
					->join("jenis_surat JS", "JS.kode_surat=PS.kode_surat", "left")
					->join("penduduk PD", "PD.nik=PS.nik", "left")
					->where(['PS.id' => $id])
					->get('permohonan_surat PS')
					->result();
	}

	public function get_dokumen_permohonan_surat($id)
	{
		return $this->db
					->join("persyaratan_surat PS", "PS.id=DPS.id_persyaratan", "left")
					->where(['DPS.id_permohonan_surat' => $id])
					->get('detail_permohonan_surat DPS')
					->result();
	}

	public function simpan_detail_permohonan($inputs)
	{
		return $this->db->insert('detail_permohonan_surat', $inputs);
	}
}
?>