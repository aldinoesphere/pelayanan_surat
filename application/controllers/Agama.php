<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['agama_model']);
	}

	public function index()
	{
		$data = [
			'agama' => $this->agama_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/agama/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->agama_model->delete($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Agama Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Agama Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$agama = $this->agama_model->select_all();
		$i = 1;
		$html = '';
		foreach ($agama as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->kode_agama . '</td>
                    <td>' . $value->nama_agama . '</td>
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
		$data = $this->agama_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah($id)
	{
		$inputs = $this->input->post();
		if ($this->agama_model->update($inputs, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Agama Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Agama Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	protected function cek_data_agama($kode_agama)
	{
		$agama = $this->agama_model->get_by_code($kode_agama);
		return $agama;
	}

	public function simpan()
	{
		$inputs = $this->input->post();
		$return = [];
		if ($this->cek_data_agama($inputs['kode_agama'])) {
			$return = [
				'cls' => 'danger',
				'msg' => 'Kode agama ('. $inputs['kode_agama'] .') sudah ada, silahkan masukan kode agama yang lain.'
			];
		} else {
			if ($this->agama_model->insert($inputs))
			{
				$return = [
					'cls' => 'success',
					'msg' => 'Agama Berhasil disimpan.'
				];
			} else {
				$return = [
					'cls' => 'failed',
					'msg' => 'Agama Gagal disimpan.'
				];
			}
		}

		echo json_encode($return);
	}
}
