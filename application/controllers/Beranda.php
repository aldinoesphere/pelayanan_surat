<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('pengaturan_model');
	}

	public function index()
	{
		$data = [
			'banners' => $this->pengaturan_model->get_banners()
		];
		$this->load->view('front/_parts/header');
		$this->load->view('front/_parts/banner', $data);
		$this->load->view('front/_parts/content', $data);
		$this->load->view('front/_parts/footer');
	}
}