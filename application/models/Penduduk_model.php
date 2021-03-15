<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Copy
 */
class Penduduk_model extends CI_Model
{
	public function insert($inputs)
	{
		return $this->db->insert('penduduk', $inputs);
	}

	public function update($inputs, $nik)
	{
		return $this->db
					->where(['nik' => $nik])
					->update('penduduk', $inputs);
	}

	public function delete($nik)
	{
		return $this->db->delete('penduduk', ['nik' => $nik]);
	}

	public function get_by_no_kk($no_kk)
	{
		return $this->get_penduduk($no_kk, 'no_kk');
	}

	public function get_by_nik($nik)
	{
		return $this->get_penduduk($nik, 'nik');
	}

	protected function get_penduduk($id, $get_by) {
		$query = $this->db;
					$query->join("agama AG", "AG.kode_agama=P.kode_agama", "left");	
					$query->join("pendidikan PD", "PD.kode_pendidikan=P.kode_pendidikan", "left");
					$query->join("pekerjaan PK", "PK.kode_pekerjaan=P.kode_pekerjaan", "left");
					$query->join("status_kawin SK", "SK.kode_status_kawin=P.kode_status_kawin", "left");
					$query->join("hubungan HB", "HB.kode_hubungan=P.kode_hubungan", "left");
					if ($get_by == 'no_kk') {
						$query->where(['no_kk' => $id]);
					} else {
						$query->where(['nik' => $id]);
					}
					return $query->get('penduduk P')->result();
	}

	public function get_by_code($code)
	{
		return $this->db
					->where(['kode_penduduk' => $code])
					->get('penduduk')
					->result();
	}

	public function select_all() {
		$query = $this->db;
					$query->join("agama AG", "AG.kode_agama=P.kode_agama", "left");	
					$query->join("pendidikan PD", "PD.kode_pendidikan=P.kode_pendidikan", "left");
					$query->join("pekerjaan PK", "PK.kode_pekerjaan=P.kode_pekerjaan", "left");
					$query->join("status_kawin SK", "SK.kode_status_kawin=P.kode_status_kawin", "left");
					$query->join("hubungan HB", "HB.kode_hubungan=P.kode_hubungan", "left");
					$query->join("kartu_keluarga KK", "KK.no_kk=P.no_kk", "left");
					return $query->get('penduduk P')->result();
	}
}
?>