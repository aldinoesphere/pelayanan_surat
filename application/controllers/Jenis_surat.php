<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_surat extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->current_page = [
				'page_active' => [
					'key' => 'jenis_surat',
					'value' => 'Jenis Surat'
				]
			];
		$this->load->model(['jenis_surat_model']);
	}

	public function index()
	{
		$data = [
			'jenis_surat' => $this->jenis_surat_model->select_all()
		];
		$data = array_merge_recursive($data, $this->current_page);
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view('dashboard/jenis_surat/lihat', $data);
		$this->load->view('dashboard/footer');
	}

	public function tambah()
	{
		$data = [];
		$data = array_merge_recursive($data, $this->current_page);
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view('dashboard/jenis_surat/tambah', $data);
		$this->load->view('dashboard/footer');
	}

	public function tambah_ak()
	{
		
	}

	public function simpan_kk()
	{
		$inputs = $this->input->post();
		if ($this->jenis_surat_model->insert($inputs))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Kartu Keluarga Berhasil disimpan.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Kartu Keluarga Gagal disimpan.'
			];
		}

		echo json_encode($return);
	}
}
