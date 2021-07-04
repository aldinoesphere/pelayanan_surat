<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_tinggal extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['status_tinggal_model']);
	}

	public function index()
	{
		$data = [
			'status_tinggal' => $this->status_tinggal_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/status_tinggal/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->status_tinggal_model->delete($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Status tinggal Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Status tinggal Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$status_tinggal = $this->status_tinggal_model->select_all();
		$i = 1;
		$html = '';
		foreach ($status_tinggal as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->kode_status_tinggal . '</td>
                    <td>' . $value->nama_status_tinggal . '</td>
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
		$data = $this->status_tinggal_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah($id)
	{
		$inputs = $this->input->post();
		if ($this->status_tinggal_model->update($inputs, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Status tinggal Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Status tinggal Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	protected function cek_data_status_tinggal($kode_status_tinggal)
	{
		$status_tinggal = $this->status_tinggal_model->get_by_code($kode_status_tinggal);
		return $status_tinggal;
	}

	public function simpan()
	{
		$inputs = $this->input->post();
		$return = [];
		if ($this->cek_data_status_tinggal($inputs['kode_status_tinggal'])) {
			$return = [
				'cls' => 'danger',
				'msg' => 'Kode status tinggal ('. $inputs['kode_status_tinggal'] .') sudah ada, silahkan masukan kode status tinggal yang lain.'
			];
		} else {
			if ($this->status_tinggal_model->insert($inputs))
			{
				$return = [
					'cls' => 'success',
					'msg' => 'Status tinggal Berhasil disimpan.'
				];
			} else {
				$return = [
					'cls' => 'failed',
					'msg' => 'Status tinggal Gagal disimpan.'
				];
			}
		}

		echo json_encode($return);
	}
}