<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['artikel_model']);
	}

	public function index()
	{
		
	}

	/*
	* Kumpulan Fungsi Kategori Artikel
	*/

	public function kategori($category_slug)
	{
		$data = [
			'slug' => $category_slug,
			'artikels' => $this->artikel_model->get_post_by_category($category_slug)
		];
		$this->load->view('front/_parts/header-single');
		$this->load->view('front/post-list', $data);
		$this->load->view('front/_parts/footer');
	}

	public function menu_kategori()
	{
		$data = [
			'semua_kategori' => $this->artikel_model->get_all_category()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/artikel/lihat_kategori', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function kategori_ajax_table() {
		$kategori = $this->artikel_model->get_all_category();
		$i = 1;
		$html = '';
		foreach ($kategori as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->nama_kategori . '</td>
                    <td>' . $value->alias . '</td>
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

	public function simpan_kategori()
	{
		$inputs = $this->input->post();
		$data = array_merge_recursive(
					$inputs,
					[
						'alias' => get_alias($inputs['nama_kategori'])
					]
				);
		if ($this->artikel_model->insert_category($data))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Kategori Berhasil disimpan.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Kategori Gagal disimpan.'
			];
		}

		echo json_encode($return);
	}

	public function upload_image() {
		$imageThumb = $this->input->post('imageThumb');
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
	    $imageThumb = str_replace($search, $find, $imageThumb);
	    $imageThumb = str_replace(' ', '+', $imageThumb);
	    $data = base64_decode($imageThumb);
	    $newName = random_string(10) . '.jpg';
	    $patchOriginal = 'uploads/images/post/original/' . $newName;
	    $patchThumbnail = 'uploads/images/post/thumbnail/' . $newName;
	    $upload = uploadOriginalImage($data)
		   			->save($patchOriginal);
		if (!$upload) {
			$result = [
		    	'status' => false,
		    	'cls' => 'failed',
				'msg' => 'Upload thumbnail gagal'
		    ];
		}

		$uploadThumbnail = uploadThumbImage($data)
							->save($patchThumbnail);
		if (!$uploadThumbnail) {
			$result = [
		    	'status' => false,
		    	'cls' => 'failed',
				'msg' => 'Upload thumbnail gagal'
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

	public function hapus_kategori($id)
	{
		if ($this->artikel_model->delete_category($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Kategori Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Kategori Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function cari_kategori($id)
	{
		$data = $this->artikel_model->get_category_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah_kategori($id)
	{
		$inputs = $this->input->post();
		$data = array_merge_recursive(
					$inputs,
					[
						'alias' => get_alias($inputs['nama_kategori'])
					]
				);
		if ($this->artikel_model->update_category($data, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Kategori Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Kategori Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	/*
	* Kumpulan Fungsi Artikel
	*/

	public function single($slug)
	{
		$data = [
			'posts' => $this->artikel_model->get_by_slug($slug)
		];

		$this->load->view('front/_parts/header-single');
		$this->load->view('front/single', $data);
		$this->load->view('front/_parts/footer');
	}

	public function daftar()
	{
		$data = [
			'semua_artikel' => $this->artikel_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/artikel/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah()
	{
		$data = [
			'artikel_kategori' => $this->artikel_model->get_all_category()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/artikel/tambah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function ubah($id)
	{
		$data = [
			'artikel' => $this->artikel_model->get_by_id($id),
			'artikel_kategori' => $this->artikel_model->get_all_category()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/artikel/ubah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->artikel_model->delete($id))
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
		$artikel = $this->artikel_model->select_all();
		$i = 1;
		$html = '';
		foreach ($artikel as $value) {
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
                    	<a class="btn btn-info" href="' . base_url('artikel/'. $value->alias) . '">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-primary" href="' . base_url('artikel/ubah/'.$value->id) . '">
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
		$data = $this->artikel_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah_artikel($id)
	{
		$inputs = $this->input->post();

		$data = [];
		$data = array_merge_recursive(
			$inputs,
			[
				'alias' => get_alias($inputs['judul']),
				'tipe' => 'artikel',
				'penulis' => 1,
				'diubah' => date("Y-m-d H:i:s")
			]
		);

		$return = [];
		
		if ($this->artikel_model->update($data, $id))
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

	protected function cek_data_artikel($judul)
	{
		$artikel = $this->artikel_model->get_by_alias($judul);
		return $artikel;
	}

	public function simpan_artikel()
	{
		$inputs = $this->input->post();
		$data = [];
		$data = array_merge_recursive(
			$inputs,
			[
				'alias' => get_alias($inputs['judul']),
				'tipe' => 'artikel',
				'penulis' => 1,
				'dibuat' => date("Y-m-d H:i:s"),
				'diubah' => date("Y-m-d H:i:s")
			]
		);

		$return = [];
		if ($this->cek_data_artikel(get_alias($inputs['judul'])))
		{
			$return = [
				'cls' => 'danger',
				'msg' => 'Nama Halaman ('. $inputs['judul'] .') sudah ada, silahkan masukan nama artikel yang lain.'
			];
		} else {
			if ($this->artikel_model->insert($data))
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
