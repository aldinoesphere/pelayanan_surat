<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan_surat extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model(['persyaratan_surat_model']);
	}

	public function index()
	{
		$data = [
			'persyaratan_surat' => $this->persyaratan_surat_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/persyaratan_surat/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

    public function ajax_table() {
        $persyaratan_surat = $this->persyaratan_surat_model->select_all();
        $i = 1;
        $html = '';
        foreach ($persyaratan_surat as $persyaratan) {
            $html .= '
                <tr>
                    <td>' . $i . '</td>
                    <td>' . $persyaratan->nama_persyaratan . '</td>
                    <td>' . $persyaratan->jenis_dokumen . '</td>
                    <td>
                        <button type="button" class="btn btn-primary" onClick="editField(' . $persyaratan->id . ')">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onClick="deleteField(' . $persyaratan->id . ')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            ';
            $i++;
        }
        echo $html;
    }

    public function cari($id)
    {
        $data = $this->persyaratan_surat_model->get_by_id($id);
        echo json_encode($data[0]);
    }

    public function simpan_persyaratan_surat()
    {
        $inputs = $this->input->post();
        $return = [];
        if ($this->persyaratan_surat_model->insert($inputs))
        {
            $return = [
                'cls' => 'success',
                'msg' => 'Persyaratan Surat Berhasil disimpan.'
            ];
        } else {
            $return = [
                'cls' => 'failed',
                'msg' => 'Persyaratan Surat Gagal disimpan.'
            ];
        }

        echo json_encode($return);
    }

    public function ubah_persyaratan_surat($id)
    {
        $inputs = $this->input->post();
        $return = [];
        if ($this->persyaratan_surat_model->update($inputs, $id))
        {
            $return = [
                'cls' => 'success',
                'msg' => 'Persyaratan Surat Berhasil diubah.'
            ];
        } else {
            $return = [
                'cls' => 'failed',
                'msg' => 'Persyaratan Surat Gagal diubah.'
            ];
        }

        echo json_encode($return);
    }

    public function hapus_persyaratan_surat($id)
    {
        $return = [];
        if ($this->persyaratan_surat_model->delete($id))
        {
            $return = [
                'cls' => 'success',
                'msg' => 'Persyaratan Surat Berhasil dihapus.'
            ];
        } else {
            $return = [
                'cls' => 'failed',
                'msg' => 'Persyaratan Surat Gagal dihapus.'
            ];
        }

        echo json_encode($return);
    }
}
