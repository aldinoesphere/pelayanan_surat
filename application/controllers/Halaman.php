<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['halaman_model']);
	}

	public function index()
	{
		
	}

	public function daftar()
	{
		$data = [
			'semua_halaman' => $this->halaman_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/halaman/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah()
	{
		$data = [
			'halaman_induk' => $this->halaman_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/halaman/tambah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function ubah($id)
	{
		$data = [
			'halaman' => $this->halaman_model->get_by_id($id),
			'halaman_induk' => $this->halaman_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/halaman/ubah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->halaman_model->delete($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Halaman Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Halaman Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$halaman = $this->halaman_model->select_all();
		$i = 1;
		$html = '';
		foreach ($halaman as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->judul . '</td>
                    <td>' . $value->penulis . '</td>
                    <td>';
                    switch ($value->status) {
                    	case 0:
                    		$html .= 'Draft';
                    		break;
                    	
                    	default:
                    		$html .= 'Diterbitkan';
                    		break;
                    }
            $html .= '<br>' . $value->dibuat . '</td>
                    <td>
                    	<a class="btn btn-info" href="' . base_url('halaman/'. $value->alias) . '">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-primary" href="' . base_url('halaman/ubah/'.$value->id) . '">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(' . $value->id . ')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
			';
			$i++;
		}
		echo $html;
	}

	public function cari($id)
	{
		$data = $this->halaman_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah_halaman($id)
	{
		$inputs = $this->input->post();
		$data = [];
		$data = array_merge_recursive(
			$inputs,
			[
				'alias' => get_alias($inputs['judul']),
				'tipe' => 'halaman',
				'penulis' => 1,
				'diubah' => date("Y-m-d H:i:s")
			]
		);

		$return = [];
		
		if ($this->halaman_model->update($data, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Halaman Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Halaman Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	protected function cek_data_halaman($judul)
	{
		$halaman = $this->halaman_model->get_by_alias($judul);
		return $halaman;
	}

	public function simpan_halaman()
	{
		$inputs = $this->input->post();
		$data = [];
		$data = array_merge_recursive(
			$inputs,
			[
				'alias' => get_alias($inputs['judul']),
				'tipe' => 'halaman',
				'penulis' => 1,
				'dibuat' => date("Y-m-d H:i:s"),
				'diubah' => date("Y-m-d H:i:s")
			]
		);

		$return = [];
		if ($this->cek_data_halaman(get_alias($inputs['judul'])))
		{
			$return = [
				'cls' => 'danger',
				'msg' => 'Nama Halaman ('. $inputs['judul'] .') sudah ada, silahkan masukan nama halaman yang lain.'
			];
		} else {
			if ($this->halaman_model->insert($data))
			{
				$return = [
					'cls' => 'success',
					'msg' => 'Halaman Berhasil disimpan.'
				];
			} else {
				$return = [
					'cls' => 'failed',
					'msg' => 'Halaman Gagal disimpan.'
				];
			}
		}

		echo json_encode($return);
	}
}
