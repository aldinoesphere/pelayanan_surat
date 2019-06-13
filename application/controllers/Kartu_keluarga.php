<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_keluarga extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['kartu_keluarga_model']);
	}

	public function index()
	{
		$data = [
			'kartu_keluarga' => $this->kartu_keluarga_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/Kartu_keluarga/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah()
	{
		$data = [];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/Kartu_keluarga/tambah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah_ak()
	{
		
	}

	public function simpan_kk()
	{
		$inputs = $this->input->post();
		if ($this->kartu_keluarga_model->insert($inputs))
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
