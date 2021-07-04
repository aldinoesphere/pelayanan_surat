<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model(['pegawai_model']);
	}

	public function index()
	{
		echo 'wohe';
		// $data = [
		// 	'semua_pegawai' => $this->pegawai_model->select_all()
		// ];
		// $this->load->view('dashboard/_parts/header', $data);
		// $this->load->view('dashboard/_parts/sidebar', $data);
		// $this->load->view('dashboard/pegawai/lihat', $data);
		// $this->load->view('dashboard/_parts/footer');
	}

	public function daftar_pengguna()
	{
		echo 'wohe';
		// $data = [
		// 	'semua_pegawai' => $this->pegawai_model->select_all()
		// ];
		// $this->load->view('dashboard/_parts/header', $data);
		// $this->load->view('dashboard/_parts/sidebar', $data);
		// $this->load->view('dashboard/pegawai/lihat', $data);
		// $this->load->view('dashboard/_parts/footer');
	}

	public function tambah()
	{
		$data = [
			'semua_jabatan' => get_all_jabatan()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/pegawai/tambah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function upload_image() {
		$photo = $this->input->post('photo');
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
	    $photo = str_replace($search, $find, $photo);
	    $photo = str_replace(' ', '+', $photo);
	    $data = base64_decode($photo);
	    $newName = random_string(10) . '.jpg';
	    $patchOriginal = 'uploads/images/pegawai/original/' . $newName;
	    $patchThumbnail = 'uploads/images/pegawai/thumbnail/' . $newName;
	    $upload = uploadOriginalImage($data)
		   			->save($patchOriginal);
		if (!$upload) {
			$result = [
		    	'status' => false,
		    	'cls' => 'failed',
				'msg' => 'Upload photo gagal'
		    ];
		}

		$uploadThumbnail = uploadThumbImage($data)
							->save($patchThumbnail);
		if (!$uploadThumbnail) {
			$result = [
		    	'status' => false,
		    	'cls' => 'failed',
				'msg' => 'Upload photo gagal'
		    ];
		}

		if ($upload && $uploadThumbnail) {
			$result = [
		    	'status' => true,
		    	'value'	 => base_url($patchOriginal),
		    	'fileName'	 => $newName
		    ];
		}
	    echo json_encode($result);
	}

	public function hapus($id)
	{
		$data_pegawai = $this->pegawai_model->get_by_id($id);
		if ($this->pegawai_model->delete($id))
		{
			$file_photo = $data_pegawai[0]->link_photo;
			if ($this->delete_image($file_photo)) {
				$return = [
					'cls' => 'success',
					'msg' => 'Pegawai Berhasil dihapus.'
				];
			} else {
				$return = [
					'cls' => 'warning',
					'msg' => 'Pegawai Berhasil dihapus, file photo '.$file_photo.' gagal dihapus'
				];
			}
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Pegawai Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function delete_image($file_photo) {
		$thumbnail_photo = 'uploads/images/pegawai/thumbnail/'.$file_photo;
		$original_photo = 'uploads/images/pegawai/original/'.$file_photo;
		if (file_exists($thumbnail_photo) && file_exists($original_photo)){
			if (unlink($thumbnail_photo) && unlink($original_photo)) {
				return true;
			}
		}

		return false;
	}

	public function ajax_table() {
		$data_pegawai = $this->pegawai_model->select_all();
		$i = 1;
		$html = '';
		foreach ($data_pegawai as $pegawai) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $pegawai->nip . '</td>
                    <td>' . $pegawai->nama_pegawai . '</td>
                    <td>' . get_jabatan($pegawai->id_jabatan) . '</td>
                    <td>
                        <button type="button" class="btn btn-primary" onClick="editField(' . $pegawai->id . ')">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onClick="deleteField(' . $pegawai->id . ')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
			';
			$i++;
		}
		echo $html;
	}

	public function ubah($id)
	{
		$data = [
			'data_pegawai' => $this->pegawai_model->get_by_id($id),
			'semua_jabatan' => get_all_jabatan()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/pegawai/ubah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function update($id)
	{
		$inputs = $this->input->post();
		$return = [];

		$inputs['tgl_lahir'] = date("Y-m-d", strtotime($inputs['tgl_lahir']));
		if ($inputs['link_photo'] == '')
		{
			unset($inputs['link_photo']);
		}
		
		if ($this->pegawai_model->update($inputs, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Pegawai Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Pegawai Gagal diubah.'
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

		$inputs['tgl_lahir'] = date("Y-m-d", strtotime($inputs['tgl_lahir']));
		if ($inputs['link_photo'] == '')
		{
			unset($inputs['link_photo']);
		}
		
		if ($this->pegawai_model->insert($inputs))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Pegawai Berhasil disimpan.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Pegawai Gagal disimpan.'
			];
		}
		echo json_encode($return);
	}
}
