<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayanan_surat extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['jenis_surat_model', 'penduduk_model']);
	}

	public function penduduk()
	{
		$data = [
			'jenis_surat' => $this->jenis_surat_model->select_all()
		];
		$this->load->view('front/pelayanan_surat/pelayanan_surat_view', $data);
	}

    public function ajax_load_form($kode_surat) {
        $jenis_surat = $this->jenis_surat_model->select_by_kode_surat($kode_surat);
        $html = '';
        if (!is_null($jenis_surat[0]->form_field)) {
            $form_field = json_decode($jenis_surat[0]->form_field);
            foreach ($form_field as $field) {
                $html .= '
                    <div class="form-group">
                        <label for="' . strtolower($field->label) . '"> ' . strtoupper($field->label) . '</label>
                        ';
                        if ($field->type == 'text' || $field->type == 'checkbox' || $field->type == 'radio') {
                            $html .='<input type="' . $field->type .'" id="' . $field->id .'" name="' . $field->id .'" class="' . $field->class .'" placeholder="' . $field->placeholder .'" ' . $field->required .'>';
                        }
                $html .= '
                    </div>
                ';
            }
            $html .= '
                <button class="btn btn-primary" type="submit">Ajukan</button>
            ';
        }
        $result = [
            'html' => $html,
            'informasi' => $jenis_surat[0]->informasi
        ];
        echo json_encode($result);
    }

    public function simpan_data()
    {
        $nik = $this->input->post('nik');
        $kode_surat = $this->input->post('kode_surat');
        $data_post = $this->input->post();
        $data_penduduk = $this->penduduk_model->get_by_nik($nik);
        if (is_array($data_penduduk) && (sizeof($data_penduduk) <= 0)) {
            $this->session->set_flashdata('error', 'NIK Penduduk belum terdaftar, silahkan hubungi kelurahan setempat.');
            redirect(base_url('pelayanan_surat/penduduk/'));
        }

        $data_field = array();
        foreach ($data_post as $key => $value) {
            $data_field["{{".$key."}}"] = $value;
        }

        echo "<pre>";
        var_dump($data_field);
        echo "</pre>";
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
}
