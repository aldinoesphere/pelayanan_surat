<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_kawin extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['status_kawin_model']);
	}

	public function index()
	{
		$data = [
			'status_kawin' => $this->status_kawin_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/status_kawin/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->status_kawin_model->delete($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Status kawin Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Status kawin Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$status_kawin = $this->status_kawin_model->select_all();
		$i = 1;
		$html = '';
		foreach ($status_kawin as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->kode_status_kawin . '</td>
                    <td>' . $value->nama_status_kawin . '</td>
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
		$data = $this->status_kawin_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah($id)
	{
		$inputs = $this->input->post();
		if ($this->status_kawin_model->update($inputs, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Status kawin Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Status kawin Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	protected function cek_data_status_kawin($kode_status_kawin)
	{
		$status_kawin = $this->status_kawin_model->get_by_code($kode_status_kawin);
		return $status_kawin;
	}

	public function simpan()
	{
		$inputs = $this->input->post();
		$return = [];
		if ($this->cek_data_status_kawin($inputs['kode_status_kawin'])) {
			$return = [
				'cls' => 'danger',
				'msg' => 'Kode status_kawin ('. $inputs['kode_status_kawin'] .') sudah ada, silahkan masukan kode status_kawin yang lain.'
			];
		} else {
			if ($this->status_kawin_model->insert($inputs))
			{
				$return = [
					'cls' => 'success',
					'msg' => 'Status kawin Berhasil disimpan.'
				];
			} else {
				$return = [
					'cls' => 'failed',
					'msg' => 'Status kawin Gagal disimpan.'
				];
			}
		}

		echo json_encode($return);
	}
}