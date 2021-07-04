<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['pekerjaan_model']);
	}

	public function index()
	{
		$data = [
			'pekerjaan' => $this->pekerjaan_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/pekerjaan/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->pekerjaan_model->delete($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Pekerjaan Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Pekerjaan Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$pekerjaan = $this->pekerjaan_model->select_all();
		$i = 1;
		$html = '';
		foreach ($pekerjaan as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->kode_pekerjaan . '</td>
                    <td>' . $value->nama_pekerjaan . '</td>
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
		$data = $this->pekerjaan_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah($id)
	{
		$inputs = $this->input->post();
		if ($this->pekerjaan_model->update($inputs, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Pekerjaan Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Pekerjaan Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	protected function cek_data_pekerjaan($kode_pekerjaan)
	{
		$pekerjaan = $this->pekerjaan_model->get_by_code($kode_pekerjaan);
		return $pekerjaan;
	}

	public function simpan()
	{
		$inputs = $this->input->post();
		$return = [];
		if ($this->cek_data_pekerjaan($inputs['kode_pekerjaan'])) {
			$return = [
				'cls' => 'danger',
				'msg' => 'Kode pekerjaan ('. $inputs['kode_pekerjaan'] .') sudah ada, silahkan masukan kode pekerjaan yang lain.'
			];
		} else {
			if ($this->pekerjaan_model->insert($inputs))
			{
				$return = [
					'cls' => 'success',
					'msg' => 'Pekerjaan Berhasil disimpan.'
				];
			} else {
				$return = [
					'cls' => 'failed',
					'msg' => 'Pekerjaan Gagal disimpan.'
				];
			}
		}

		echo json_encode($return);
	}
}