<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['pendidikan_model']);
	}

	public function tambah_anggota_keluarga($no_kk)
	{
		$data = [
			'no_kk' => $no_kk,
			'pendidikan' => $this->pendidikan_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/penduduk/tambah_anggota_keluarga', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->pendidikan_model->delete($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Pendidikan Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Pendidikan Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$pendidikan = $this->pendidikan_model->select_all();
		$i = 1;
		$html = '';
		foreach ($pendidikan as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->kode_pendidikan . '</td>
                    <td>' . $value->nama_pendidikan . '</td>
                    <td>
                        <button type="button" class="btn btn-primary" onClick="editField(' . $value->id . ')">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onClick="deleteField(' . $value->id . ')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
			';
			$i++;
		}
		echo $html;
	}

	public function cari($id)
	{
		$data = $this->pendidikan_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah($id)
	{
		$inputs = $this->input->post();
		if ($this->pendidikan_model->update($inputs, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Pendidikan Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Pendidikan Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	protected function cek_data_pendidikan($kode_pendidikan)
	{
		$pendidikan = $this->pendidikan_model->get_by_code($kode_pendidikan);
		return $pendidikan;
	}

	public function simpan()
	{
		$inputs = $this->input->post();
		$return = [];
		if ($this->cek_data_pendidikan($inputs['kode_pendidikan'])) {
			$return = [
				'cls' => 'danger',
				'msg' => 'Kode pendidikan ('. $inputs['kode_pendidikan'] .') sudah ada, silahkan masukan kode pendidikan yang lain.'
			];
		} else {
			if ($this->pendidikan_model->insert($inputs))
			{
				$return = [
					'cls' => 'success',
					'msg' => 'Pendidikan Berhasil disimpan.'
				];
			} else {
				$return = [
					'cls' => 'failed',
					'msg' => 'Pendidikan Gagal disimpan.'
				];
			}
		}

		echo json_encode($return);
	}
}
