<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_surat extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['jenis_surat_model', 'persyaratan_surat_model']);
	}

	public function index()
	{
		$data = [
			'jenis_surat' => $this->jenis_surat_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/jenis_surat/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah()
	{
		$data = [];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/jenis_surat/tambah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

    public function ajax_persyaratan_surat()
    {
        $persyaratan_surat = $this->persyaratan_surat_model->select_all();
        $persyaratan_surat_html = '<div class="item-field col-md-12">'
        . '<div class="col-md-10 col-sm-10 form-group">'
        . '<label class="control-label">Persyaratan</label>'
        . '<select class="form-control select2" name="persyaratan[]">'
        . '<option value="0">Pilih Persyaratan Surat</option>';
        foreach ($persyaratan_surat as $persyaratan) {
            $persyaratan_surat_html .= '<option value="'. $persyaratan->id .'">'. $persyaratan->nama_persyaratan .'</option>';
        }
        $persyaratan_surat_html .= '</select>'
        . '</div>'
        . '<div class="col-md-2 btn-remove">'
        . '<a href="javascript:void(0)" class="btn btn-danger remove-item-field">'
        . '<i class="fa fa-minus-circle"></i>'
        . '</a>'
        . '</div>'
        . '</div>';

        $result['html'] = $persyaratan_surat_html;

        echo json_encode($result);
    }

	public function ubah($id)
	{
		$jenis_surat = $this->jenis_surat_model->select_by_id($id);
		$data = [
			'jenis_surat' => $jenis_surat,
            'persyaratan_surat' => $this->persyaratan_surat_model->select_all()
		];

		if (!is_null($jenis_surat[0]->persyaratan)) {
			$data['persyaratan'] = json_decode($jenis_surat[0]->persyaratan);
		}

		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/jenis_surat/ubah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		$data_jenis_surat = $this->jenis_surat_model->select_by_id($id);
		$file = "./template_surat/".$data_jenis_surat[0]->file_template;
		if (file_exists($file)) {
			if (unlink($file)) {
				if ($this->jenis_surat_model->delete($id))
				{
					$return = [
						'cls' => 'success',
						'msg' => 'Jenis surat Berhasil dihapus.'
					];
				} else { //else of delete record from database
					$return = [
						'cls' => 'failed',
						'msg' => 'Jenis surat Gagal dihapus.'
					];
				}
			} else { //else of unlink
				$return = [
					'cls' => 'failed',
					'msg' => 'File template gagal dihapus.'
				];
			}
		} else { //else of file_exists
			if ($this->jenis_surat_model->delete($id))
			{
				$return = [
					'cls' => 'success',
					'msg' => 'Jenis surat Berhasil dihapus.'
				];
			} else { //else of delete record from database
				$return = [
					'cls' => 'failed',
					'msg' => 'Jenis surat Gagal dihapus.'
				];
			}
		}

		echo json_encode($return);
	}

	/**
     * do_upload
     * Upload Template
     *
     * @param  $file_template string
     * @return boolean
     */
    public function do_upload($file_template)
    {
        $patch = 'template_surat/';
        $config['upload_path'] = $patch;
        $config['allowed_types'] = 'rtf';
        $config['file_name'] = $file_template;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("file-template")) {
            return true;
        } else {
            return false;
        }
    }

    public function ajax_table() {
		$jenis_surat = $this->jenis_surat_model->select_all();
		$i = 1;
		$html = '';
		foreach ($jenis_surat as $surat) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $surat->kode_surat . '</td>
                    <td>' . $surat->nama_surat . '</td><td>';
                    if (!$surat->file_template) {
                        $html .= "-";
                    } else {
                        $html .= $surat->file_template;
                    }
            $html .='</td>
                    <td>
                        <a class="btn btn-primary" href="' . base_url("jenis_surat/ubah/".$surat->id) . '">
                        	<i class="fa fa-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-danger" onClick="deleteField(' . $surat->id . ')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
			';
			$i++;
		}
		echo $html;
	}

    /**
     * update
     * Add data plugin with ajax
     *
     * @return $result json
     */
    public function update($id)
    {
        $nama_surat = $this->input->post('nama_surat');
        $file_ext = '.rtf';
        $kode_surat = $this->input->post('kode_surat');
        $informasi = $this->input->post('informasi');
        $persyaratan = $this->input->post('persyaratan');
        $file_template = str_replace(" ", "_", strtolower($nama_surat)) . $file_ext;

        $data_surat = array(
            'kode_surat' => $kode_surat,
            'nama_surat' => strtoupper($nama_surat),
            'informasi' => $informasi,
            'persyaratan' => json_encode($persyaratan)
        );

        if ($_FILES['file-template']['size'] > 0) {
        	$newFileTemplate = pathinfo('template_surat/'.basename($_FILES['file-template']['name']), PATHINFO_EXTENSION);
        	$supportFileType = strtolower($newFileTemplate);

        	if ( $supportFileType == 'rtf' ) {
        		$old_file_template = $this->jenis_surat_model->select_by_id($id);
	        	$file = "./template_surat/".$old_file_template[0]->file_template;
	        	if (file_exists($file)) {
	        		unlink($file);
	        	}
        	}

        	if ($this->do_upload($file_template)){
        		$data_surat['file_template'] = $file_template;
        		$result = $this->update_data_jenis_surat($data_surat, $id);
        	} else {
        		$result = array(
	                'msg' => 'Mohon maaf file type ('.$supportFileType.') untuk template tidak didukung.',
	                'cls' => 'warning'
	            );
        	}
        } else {
        	$result = $this->update_data_jenis_surat($data_surat, $id);
        }
        
        echo json_encode($result);
    }

    protected function update_data_jenis_surat($data_surat, $id) {
    	if ($this->jenis_surat_model->update($data_surat, $id)) {
        	$result = array(
                'msg' => 'Jenis surat berhasil ditambahkan.',
                'cls' => 'success'
            );
        } else {
            $result = array(
            'msg' => 'Jenis surat gagal ditambahkan',
            'cls' => 'error'
            );
        }

        return $result;
    }

	/**
     * simpan_surat
     * Add data plugin with ajax
     *
     * @return $result json
     */
    public function simpan_surat()
    {
        $nama_surat = $this->input->post('nama_surat');
        $file_ext = '.rtf';
        $kode_surat = $this->input->post('kode_surat');
        $informasi = $this->input->post('informasi');
        $persyaratan = $this->input->post('persyaratan');
        $file_template = str_replace(" ", "_", strtolower($nama_surat)) . $file_ext;
        $date = date("Y-m-d H:i:s");

        $data_surat = array(
            'kode_surat' => $kode_surat,
            'nama_surat' => strtoupper($nama_surat),
            'file_template' => $file_template,
            'persyaratan' => json_encode($persyaratan),
            'informasi' => $informasi,
            'created' => $date
        );

        if ($this->do_upload($file_template)) {
        	if ($this->jenis_surat_model->insert($data_surat)) {
            	$result = array(
	                'msg' => 'Jenis surat berhasil ditambahkan.',
	                'cls' => 'success'
	            );
	        } else {
	            $result = array(
    	            'msg' => 'Jenis surat gagal ditambahkan',
    	            'cls' => 'error'
	            );
	        }
        } else {
        	$newFileTemplate = pathinfo('template_surat/'.basename($_FILES['file-template']['name']), PATHINFO_EXTENSION);
        	$supportFileType = strtolower($newFileTemplate);

            $result = array(
                'msg' => 'Mohon maaf file type ('.$supportFileType.') untuk template tidak didukung.',
                'cls' => 'warning'
            );
        }
        echo json_encode($result);
    }
}
