<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends CI_Controller {

	protected $current_page = [];

	function __construct()
	{
		parent::__construct();
		$this->load->model([
			'kartu_keluarga_model',
			'pendidikan_model',
			'agama_model',
			'hubungan_model',
			'pekerjaan_model',
			'penduduk_model',
			'status_kawin_model'
		]);
	}

	public function index()
	{
		$data = [
			'penduduk' => $this->penduduk_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/penduduk/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah_penduduk()
	{
		$data = [
			'kartu_keluarga' => $this->kartu_keluarga_model->select_all(),
			'pendidikan' => $this->pendidikan_model->select_all(),
			'pekerjaan' => $this->pekerjaan_model->select_all(),
			'agama'	=> $this->agama_model->select_all(),
			'hubungan' => $this->hubungan_model->select_all(),
			'status_kawin' => $this->status_kawin_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/penduduk/tambah_penduduk', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	/**
	* Aksi hapus Penduduk
	*
	* @return $return JSON
	*/
	public function hapus($nik)
	{
		if ($this->penduduk_model->delete($nik))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Data Penduduk Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Data Penduduk Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$penduduk = $this->penduduk_model->select_all();
		$i = 1;
		$html = '';
		foreach ($penduduk as $ak) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $ak->nik . '</td>
                    <td>' . $ak->nama_lengkap . '</td>
                    <td>';
                    switch ($ak->jk) {
                        case '1':
                            $html .= "LAKI-LAKI";
                            break;
                        
                        default:
                            $html .= "PEREMPUAN";
                            break;
                    }
            $html .= '</td>
                    <td>' . $ak->tgl_lahir . '</td>
                    <td>' . $ak->alamat . '</td>
                    <td>
                    	<a class="btn btn-info" href="' . base_url('penduduk/details/'. $ak->nik) 	.'">
                            <i class="fa fa-eye"></i>
                        </a>
                        <button type="button" class="btn btn-primary" onClick="editField(' . $ak->nik . ')">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onClick="deleteField(' . $ak->nik . ')">
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
	* Form ubah Anggota Keluarga
	*
	*/
	public function ubah_penduduk($nik)
	{
		$data = [
			'kartu_keluarga' => $this->kartu_keluarga_model->select_all(),
			'pendidikan' => $this->pendidikan_model->select_all(),
			'pekerjaan' => $this->pekerjaan_model->select_all(),
			'agama'	=> $this->agama_model->select_all(),
			'hubungan' => $this->hubungan_model->select_all(),
			'penduduk' => $this->penduduk_model->get_by_nik($nik),
			'status_kawin' => $this->status_kawin_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/penduduk/ubah_penduduk', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	/**
	* Aksi ubah data penduduk
	*
	* @return $return JSON
	*/
	public function ubah()
	{
		$inputs = $this->input->post();

		$inputs['tgl_lahir'] = date("Y-m-d", strtotime($inputs['tgl_lahir']));
		foreach ($inputs as $key => $value) {
			$inputs[$key] = strtoupper($value);
		}

		if ($this->penduduk_model->update($inputs, $inputs['nik']))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Data Penduduk Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Data Penduduk Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	/**
	* Aksi simpan Data Penduduk
	*
	* @return $return JSON
	*/
	public function simpan_penduduk()
	{
		$inputs = $this->input->post();

		$inputs['tgl_lahir'] = date("Y-m-d", strtotime($inputs['tgl_lahir']));
		foreach ($inputs as $key => $value) {
			$inputs[$key] = strtoupper($value);
		}

		if ($this->penduduk_model->insert($inputs))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Data Penduduk Berhasil disimpan.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Data Penduduk Gagal disimpan.'
			];
		}

		echo json_encode($return);
	}

	/**
	* Lihat details penduduk
	*
	* @return $return void
	*/
	public function details($nik)
	{
		$data = [
			'penduduk' => $this->penduduk_model->get_by_nik($nik)
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/penduduk/details', $data);
		$this->load->view('dashboard/_parts/footer');
	}
}
