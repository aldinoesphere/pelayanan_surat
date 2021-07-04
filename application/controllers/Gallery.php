<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['gallery_model']);
	}

	public function daftar_foto()
	{
		$data = [
			'galleries' => $this->gallery_model->select_all_foto()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/gallery/daftar_foto', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function ubah_album_foto($id)
	{
		$data = [
			'galleries' => $this->gallery_model->get_gallery_by_id($id)
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/gallery/ubah_album_foto', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function upload_foto() 
	{
		$image = $this->input->post('image_data');
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
        $image = str_replace($search, $find, $image);
        $image = str_replace(' ', '+', $image);
        $data = base64_decode($image);
        $newName = random_string(20) . '.jpg';
        $file = 'uploads/images/gallery/foto/' . $newName;
        $success = file_put_contents($file, $data);
        $html = '
            <div class="preview">
                <div class="icon-group">
                    <a href="javascript:void(0);" class="btn btn-danger remove" dataimage="' . $newName . '"><i class="fa fa-remove"></i></a>
                    <a href="javascript:void(0);" class="btn btn-transparen check" dataimage="' . $newName . '"><i class="fa fa-check"></i></a>
                </div>
                <input type="hidden" name="link_foto[]" value="' . $newName . '">
                <img src="' . base_url() . $file . '">
            </div>
        ';
        echo json_encode($html);
	}

	public function tambah_album_foto()
	{
		$this->load->view('dashboard/_parts/header');
		$this->load->view('dashboard/_parts/sidebar');
		$this->load->view('dashboard/gallery/tambah_album_foto');
		$this->load->view('dashboard/_parts/footer');	
	}

	public function simpan_gallery()
	{
		$title       = $this->input->post('judul');
        $description = $this->input->post('deskripsi');
        $coverAlbum  = $this->input->post('cover_album');
        $images      = $this->input->post('link_foto');
        $date 		 = date("Y-m-d H:i:s");
        $data = [
        	'judul'			=> $title,
        	'deskripsi'		=> $description,
        	'dibuat'		=> $date,
        	'cover_album'	=> $coverAlbum,
        	'kategori'		=> 0,
        	'links_url'		=> serialize($images)
        ];

        if ($this->gallery_model->save_gallery($data)) {
	        $return = [
				'cls' => 'success',
				'msg' => 'Album Foto Berhasil disimpan.'
			];
        } else {
        	$return = [
				'cls' => 'failed',
				'msg' => 'Album Foto Gagal disimpan.'
			];
        }

        echo json_encode($return);
	}

	public function update_album_foto($id)
	{
		$title       = $this->input->post('judul');
        $description = $this->input->post('deskripsi');
        $coverAlbum  = $this->input->post('cover_album');
        $images      = $this->input->post('link_foto');
        $date 		 = date("Y-m-d H:i:s");
        $data = [
        	'judul'			=> $title,
        	'diubah'		=> $date,
        	'cover_album'	=> $coverAlbum,
        	'kategori'		=> 0,
        	'links_url'		=> serialize($images)
        ];

        if ($description) {
        	$data['deskripsi'] = $description;
        }

        if ($this->gallery_model->update_gallery_foto($data, $id)) {
	        $return = [
				'cls' => 'success',
				'msg' => 'Album Foto Berhasil disimpan.'
			];
        } else {
        	$return = [
				'cls' => 'failed',
				'msg' => 'Album Foto Gagal disimpan.'
			];
        }

        echo json_encode($return);
	}

	public function hapus_foto()
	{
		$file_name = $this->input->post('file_name');
		if (file_exists(get_link_foto($file_name))) {
			if (unlink(get_link_foto($file_name)))
			{
				echo json_encode(true);
			} else {
				echo json_encode(false);
			}
		} else {
			echo json_encode(false);
		}
	}

	public function hapus_album_foto($id)
	{
		$galleries = $this->gallery_model->get_gallery_by_id($id);
		foreach ($galleries as $gallery) {
			$files = unserialize($gallery->links_url);
			foreach ($files as $file) {
				if (file_exists(get_link_foto($file))) {
					unlink(get_link_foto($file));
				}
			}
		}
		if ($this->gallery_model->delete_gallery($id)) {
			$return = [
				'cls' => 'success',
				'msg' => 'Album Foto Berhasil dihapus.'
			];
        } else {
        	$return = [
				'cls' => 'failed',
				'msg' => 'Album Foto Gagal dihapus.'
			];
        }

		echo json_encode($return);
	}

	public function album_foto_ajax_table() {
		$galleries = $this->gallery_model->select_all_foto();
		$i = 1;
		$html = '';
		foreach ($galleries as $gallery) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $gallery->judul . '</td>
                    <td style="white-space: nowrap;width: 35%;">
			            <div class="col-md-3">
			                <img src="' . base_url(get_link_foto($gallery->cover_album)). '" style="width: 100%;">
			            </div>
			        </td>
                    <td>
                        <a class="btn btn-danger" href="javascript:void(0)" onClick="deleteField('. $gallery->id . ')">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a class="btn btn-primary" href="'. base_url('gallery/ubah_album_foto/' . $gallery->id) . '">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
			';
			$i++;
		}
		echo $html;
	}

	/**
	*
	* Gallery video
	* 
	*/
	
	public function daftar_video()
	{
		$data = [
			'galleries' => $this->gallery_model->select_all_video()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/gallery/daftar_video', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah_album_video()
	{
		$this->load->view('dashboard/_parts/header');
		$this->load->view('dashboard/_parts/sidebar');
		$this->load->view('dashboard/gallery/tambah_album_video');
		$this->load->view('dashboard/_parts/footer');	
	}

	public function simpan_gallery_video()
	{
		$title       = $this->input->post('judul');
        $description = $this->input->post('deskripsi');
        $coverAlbum  = $this->input->post('cover_album');
        $videos      = $this->input->post('link_videos');
        $date 		 = date("Y-m-d H:i:s");
        $data = [
        	'judul'			=> $title,
        	'deskripsi'		=> $description,
        	'dibuat'		=> $date,
        	'cover_album'	=> $coverAlbum,
        	'kategori'		=> 1,
        	'links_url'		=> serialize($videos)
        ];

        if ($this->gallery_model->save_gallery($data)) {
	        $return = [
				'cls' => 'success',
				'msg' => 'Album video Berhasil disimpan.'
			];
        } else {
        	$return = [
				'cls' => 'failed',
				'msg' => 'Album video Gagal disimpan.'
			];
        }

        echo json_encode($return);
	}

	public function ubah_album_video($id)
	{
		$data = [
			'galleries' => $this->gallery_model->get_gallery_by_id($id)
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/gallery/ubah_album_video', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function update_album_video($id)
	{
		$title       = $this->input->post('judul');
        $description = $this->input->post('deskripsi');
        $coverAlbum  = $this->input->post('cover_album');
        $link_videos = $this->input->post('link_videos');
        $date 		 = date("Y-m-d H:i:s");
        $data = [
        	'judul'			=> $title,
        	'diubah'		=> $date,
        	'cover_album'	=> $coverAlbum,
        	'kategori'		=> 1,
        	'links_url'		=> serialize($link_videos)
        ];

        if ($description) {
        	$data['deskripsi'] = $description;
        }

        if ($this->gallery_model->save_gallery($data)) {
	        $return = [
				'cls' => 'success',
				'msg' => 'Album video Berhasil disimpan.'
			];
        } else {
        	$return = [
				'cls' => 'failed',
				'msg' => 'Album video Gagal disimpan.'
			];
        }

        echo json_encode($return);
	}
}
