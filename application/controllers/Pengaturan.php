<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['pengaturan_model']);
	}

	public function umum()
	{
		$data['pengaturan'] = $this->pengaturan_model->get_settings();
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/pengaturan/umum', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function simpan_pengaturan()
	{
		$query = $this->pengaturan_model->simpan_pengaturan();
		if ($query) {
			$return = [
					'cls' => 'success',
					'msg' => 'Pengaturan Berhasil disimpan.'
				];
		}
		echo json_encode($return);
	}

	/**
	 * Pengaturan Banner
	 */

	public function banner()
	{
		$data['banners'] = $this->pengaturan_model->get_banners();
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/pengaturan/banner', $data);
		$this->load->view('dashboard/_parts/footer');	
	}

	public function tambah_banner()
	{
		$data = [];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/pengaturan/tambah_banner', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function upload_banner()
	{
		$banner = $this->input->post('imageBanner');
	    $search = [
	    	'data:image/png;base64,',
	    	'data:image/jpg;base64,',
	    	'data:image/jpeg;base64,',
	    	'data:image/gif;base64,'
	    ];
	    $find = [
	    	'',
	    	'',
	    	'',
	    	''
	    ];
	    $banner = str_replace($search, $find, $banner);
	    $banner = str_replace(' ', '+', $banner);
	    $data = base64_decode($banner);
	    $newName = random_string(20) . '.jpg';
	    $patchOriginal = 'uploads/images/banner/' . $newName;
	    $upload = upload_banner($data)
		   			->save($patchOriginal);

		if (!$upload) {
			$result = [
		    	'status' => false,
		    	'cls' => 'failed',
				'msg' => 'Upload banner gagal'
		    ];
		} else {
			$result = [
		    	'status' => true,
		    	'value'	 => base_url($patchOriginal),
		    	'fileName'	 => $newName
		    ];
		}

	    echo json_encode($result);
	}

	public function simpan_banner()
	{
		$input = $this->input->post();
		if ($this->pengaturan_model->save_banner($input)) {
			$return = [
				'cls' => 'success',
				'msg' => 'Banner Berhasil disimpan.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Banner Gagal disimpan.'
			];
		}

		echo json_encode($return);
	}

	public function hapus_banner($id)
	{
		$banner = $this->pengaturan_model->get_banner($id);
		if (file_exists('./uploads/images/banner/'.$banner[0]->link_banner)){
			unlink('./uploads/images/banner/'.$banner[0]->link_banner);
		}

		if ($this->pengaturan_model->delete_banner($id)) {
			$return = [
				'cls' => 'success',
				'msg' => 'Banner Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Banner Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function banner_ajax_table()
	{
		$html = '';
		$i = 1;
		$banners = $this->pengaturan_model->get_banners();
		foreach ($banners as $banner) {
			$html .= '<tr>
                        <td>'. $i .'</td>
                        <td>' . $banner->link_banner . '</td>
                        <td>
                            <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField(' . $banner->id . ')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>';
		}

		echo $html;
	}

	/**
	 * Eof Banner settings
	 */

	/**
	 * User settings
	 */
	public function daftar_pengguna()
	{
		
	}
}