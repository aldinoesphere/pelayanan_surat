<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan_surat extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['jenis_surat_model', 'penduduk_model', 'persyaratan_surat_model', 'pelayanan_surat_model']);
	}

    public function tampilan_daftar()
    {
        $data = [
            'data_permohonan' => $this->pelayanan_surat_model->select_all()
        ];

        $this->load->view('dashboard/_parts/header', $data);
        $this->load->view('dashboard/_parts/sidebar', $data);
        $this->load->view('dashboard/pelayanan_surat/lihat');
        $this->load->view('dashboard/_parts/footer');
    }

    public function tampilan_detail($id = 0)
    {
        $data = [
            'detail_permohonan_surat' => $this->pelayanan_surat_model->get_detail_permohonan_surat($id),
            'dokumen_permohonan_surat' => $this->pelayanan_surat_model->get_dokumen_permohonan_surat($id)
        ];

        $this->load->view('dashboard/_parts/header', $data);
        $this->load->view('dashboard/_parts/sidebar', $data);
        $this->load->view('dashboard/pelayanan_surat/detail_permohonan');
        $this->load->view('dashboard/_parts/footer');   
    }

	public function penduduk()
	{
		$data = [
			'jenis_surat' => $this->jenis_surat_model->select_all()
		];
        $this->load->view('front/_parts/header-single');
        $this->load->view('front/pelayanan_surat/pelayanan_surat_view', $data);
        $this->load->view('front/_parts/footer');
	}

    public function ajax_load_form($kode_surat) {
        $jenis_surat = $this->jenis_surat_model->select_by_kode_surat($kode_surat);
        $html = '';
        $i = 1;
        if (!is_null($jenis_surat[0]->persyaratan)) {
            $persyaratan = json_decode($jenis_surat[0]->persyaratan);
            $html .= '<div class="col-md-12 col-sm-12">'
                        . '<h5>DOKUMEN / KELENGKAPAN PENDUDUK YANG DIBUTUHKAN</h5>'
                        . '<table id="hubungan" class="table table-bordered table-hover">'
                        . '<thead>'
                        . '<tr>'
                        . '<th>NO</th>'
                        . '<th>PERSYARATAN</th>'
                        . '<th>DOKUMEN PELENGKAP PERSYARATAN</th>'
                        . '</tr>'
                        . '</thead>'
                        . '<tbody>';
            foreach ($persyaratan as $syarat) {
                $persyaratan_surat = $this->persyaratan_surat_model->get_by_id($syarat);
                $html .= '<tr>'
                        . '<td>' . $i . '</td>'
                        . '<td>' . $persyaratan_surat[0]->nama_persyaratan . '</td>'
                        . '<td>'
                        . '<button class="btn btn-primary upload-btn" type="button"><i class="fa fa-upload"></i> UNGGAH DOKUMEN</button>'
                        . '<input type="file" class="upload-document" name="dokumen[]" accept="' . $this->file_accepted($persyaratan_surat[0]->jenis_dokumen) . '" style="display:none">'
                        . '<input type="hidden" name="id_persyaratan[]" value="'. $persyaratan_surat[0]->id .'">'
                        . '</td>'
                        . '</tr>';
                        $i++;
            }
        }
        $result = [
            'html' => $html
        ];
        echo json_encode($result);
    }

    private function file_accepted($file_type)
    {
        switch ($file_type) {
            case 'application/msword':
                $retun_file_type = '.doc,.docx,.rtf';
                break;
            
            default:
                $retun_file_type = $file_type;
                break;
        }

        return $retun_file_type;
    }

    public function simpan_data()
    {
        $data_input['nik'] = '3212203003950001';
        $data_input['jenis_surat'] = $this->input->post('jenis_surat');
        $data_input['keterangan'] = $this->input->post('keterangan');
        $data_input['no_hp'] = $this->input->post('no_hp');
        if ($this->unggah_dokumen($data_input))
        {
            echo "sukses";
        } else {
            echo "gagal";
        }
    }

	public function tambah()
	{
		$data = [];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/jenis_surat/tambah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function ubah($id)
	{
		$jenis_surat = $this->jenis_surat_model->select_by_id($id);
		$data = [
			'jenis_surat' => $jenis_surat
		];

		if (!is_null($jenis_surat[0]->form_field)) {
			$data['form_field'] = json_decode($jenis_surat[0]->form_field);
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
        $field_id = $this->input->post('id');
        $placeholder = $this->input->post('placeholder');
        $label = $this->input->post('label');
        $type = $this->input->post('type');
        $mandatory = $this->input->post('mandatory');
        $file_template = str_replace(" ", "_", strtolower($nama_surat)) . $file_ext;

        $data_surat = array(
            'kode_surat' => $kode_surat,
            'nama_surat' => $nama_surat,
            'informasi' => $informasi,
            'form_field' => ''
        );

        if (isset($field_id) || isset($label) || isset($type) || isset($mandatory) || isset($placeholder)) {
        	for ($i=0; $i < sizeof($field_id); $i++) { 
        		$form_field[$i] = array(
        			'id' => $field_id[$i],
        			'name' => $field_id[$i],
        			'placeholder' => $placeholder[$i],
        			'class' => 'form-control',
        			'label' => $label[$i],
        			'type' => $type[$i],
        			'required' => $mandatory[$i]
        		);
        	}
        	$data_surat['form_field'] = json_encode($form_field);
        }

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
        $field_id = $this->input->post('id');
        $placeholder = $this->input->post('placeholder');
        $label = $this->input->post('label');
        $type = $this->input->post('type');
        $mandatory = $this->input->post('mandatory');
        $file_template = str_replace(" ", "_", strtolower($nama_surat)) . $file_ext;
        $date = date("Y-m-d H:i:s");

        $data_surat = array(
            'kode_surat' => $kode_surat,
            'nama_surat' => $nama_surat,
            'file_template' => $file_template,
            'informasi' => $informasi,
            'created' => $date
        );

        if (isset($field_id) || isset($label) || isset($type) || isset($mandatory) || isset($placeholder)) {
            for ($i=0; $i < sizeof($field_id); $i++) { 
                $form_field[$i] = array(
                    'id' => $field_id[$i],
                    'name' => $field_id[$i],
                    'placeholder' => $placeholder[$i],
                    'class' => 'form-control',
                    'label' => $label[$i],
                    'type' => $type[$i],
                    'required' => $mandatory[$i]
                );
            }
            $data_surat['form_field'] = json_encode($form_field);
        }

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

    protected function unggah_dokumen($data_input)
    {
        $jumlah_dokumen = count($_FILES['dokumen']['name']);
        $patch = 'uploads/persyaratan/original_files/';
        $config['upload_path']          = $patch;
        $config['allowed_types']        = 'gif|jpg|png|jpeg|doc|docx|rtf|pdf';
        $this->load->library('upload', $config);


        $data['kode_surat'] = $data_input['jenis_surat'];
        $data['nomor_surat'] = '001';
        $data['nik'] = $data_input['nik'];
        $data['no_hp'] = $data_input['no_hp'];
        $data['keterangan'] = $data_input['keterangan'];
        $simpan_permohonan = $this->pelayanan_surat_model->insert($data);

        if ($simpan_permohonan) {
            $return = true;
        } else {
            $return = false;
        }

        for ($i=0; $i < $jumlah_dokumen; $i++) { 
            if(!empty($_FILES['dokumen']['name'][$i])){
                $file_name = $data_input['nik'] . '_' . date('dmY') . '_' . $data_input['jenis_surat'];
                $new_name = $file_name . '_' . $this->input->post('id_persyaratan')[$i] . $this->get_file_extention($_FILES['dokumen']['type'][$i]);
                $_FILES['file']['name'] = $new_name;
                $_FILES['file']['type'] = $_FILES['dokumen']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['dokumen']['error'][$i];
                $_FILES['file']['size'] = $_FILES['dokumen']['size'][$i];
       
                if($this->upload->do_upload('file')){
                    if ($return) {
                        $data_detail['id_permohonan_surat'] = $simpan_permohonan;
                        $data_detail['id_persyaratan'] = $this->input->post('id_persyaratan')[$i];
                        $data_detail['dokumen_persyaratan'] = $new_name;
                        $this->pelayanan_surat_model->simpan_detail_permohonan($data_detail);
                    }
                }
            }
        }

        return $return;
    }

    protected function get_file_extention($file_type)
    {
        switch ($file_type) {
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                $file_extention = '.docx';
                break;

            case 'application/pdf':
                $file_extention = '.pdf';
                break;

            case 'image/gif':
                $file_extention = '.gif';
                break;

            case 'image/jpeg':
                $file_extention = '.jpeg';
                break;

            case 'image/jpg':
                $file_extention = '.jpg';
                break;

            case 'image/pjepg':
                $file_extention = '.pjpeg';
                break;

            case 'image/png':
                $file_extention = '.png';
                break;

            default:
                $file_extention = '.doc';
                break;
        }

        return $file_extention;
    }
}
