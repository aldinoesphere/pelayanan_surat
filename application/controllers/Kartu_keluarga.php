<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_keluarga extends CI_Controller {

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
			'kartu_keluarga' => $this->kartu_keluarga_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/Kartu_keluarga/lihat', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function tambah()
	{
		$data = [];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/Kartu_keluarga/tambah', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function details($no_kk)
	{
		$kk = $this->kartu_keluarga_model->get_by_no_kk($no_kk);
		$ak = $this->penduduk_model->get_by_no_kk($kk[0]->no_kk);
		$data = [
			'kartu_keluarga' => $kk,
			'anggota_keluarga' => $ak
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/Kartu_keluarga/details', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function hapus($id)
	{
		if ($this->kartu_keluarga_model->delete($id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Kartu Keluarga Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Kartu Keluarga Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	public function cari($id)
	{
		$data = $this->kartu_keluarga_model->get_by_id($id);
		echo json_encode($data[0]);
	}

	public function ubah($id)
	{
		$inputs = $this->input->post();
		if ($this->kartu_keluarga_model->update($inputs, $id))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Kartu Keluarga Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Kartu Keluarga Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	public function ajax_table() {
		$kartu_keluarga = $this->kartu_keluarga_model->select_all();
		$i = 1;
		$html = '';
		foreach ($kartu_keluarga as $value) {
			$html .= '
				<tr>
                    <td>' . $i . '</td>
                    <td>' . $value->no_kk . '</td>
                    <td>' . $value->alamat . '</td>
                    <td>' . $value->rt . '</td>
                    <td>' . $value->rw . '</td>
                    <td>
                    	<a class="btn btn-info" href="' . base_url('kartu_keluarga/details/'. $value->id) 	.'">
                            <i class="fa fa-eye"></i>
                        </a>
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

	public function simpan_kk()
	{
		$inputs = $this->input->post();
		if ($this->kartu_keluarga_model->insert($inputs))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Kartu Keluarga Berhasil disimpan.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Kartu Keluarga Gagal disimpan.'
			];
		}

		echo json_encode($return);
	}

	/**
	* Fungsi - fungsi Anggota Keluarga (Penduduk)
	*
	*
	*/


	/**
	* Form tambah Anggota Keluarga
	*
	*/
	public function tambah_anggota_keluarga($no_kk)
	{
		$data = [
			'no_kk' => $no_kk,
			'pendidikan' => $this->pendidikan_model->select_all(),
			'pekerjaan' => $this->pekerjaan_model->select_all(),
			'agama'	=> $this->agama_model->select_all(),
			'hubungan' => $this->hubungan_model->select_all(),
			'status_kawin' => $this->status_kawin_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/kartu_keluarga/tambah_ak', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	/**
	* Form ubah Anggota Keluarga
	*
	*/
	public function ubah_anggota_keluarga($nik)
	{
		$data = [
			'pendidikan' => $this->pendidikan_model->select_all(),
			'pekerjaan' => $this->pekerjaan_model->select_all(),
			'agama'	=> $this->agama_model->select_all(),
			'hubungan' => $this->hubungan_model->select_all(),
			'penduduk' => $this->penduduk_model->get_by_nik($nik),
			'status_kawin' => $this->status_kawin_model->select_all()
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/kartu_keluarga/ubah_ak', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	/**
	* Aksi simpan Anggota Keluarga
	*
	* @return $return JSON
	*/
	public function simpan_ak()
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
				'msg' => 'Anggota keluarga Berhasil disimpan.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Anggota keluarga Gagal disimpan.'
			];
		}

		echo json_encode($return);
	}

	/**
	* Aksi ubah Anggota Keluarga
	*
	* @return $return JSON
	*/
	public function ubah_ak()
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
				'msg' => 'Anggota keluarga Berhasil diubah.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Anggota keluarga Gagal diubah.'
			];
		}

		echo json_encode($return);
	}

	/**
	* Aksi hapus Anggota Keluarga
	*
	* @return $return JSON
	*/
	public function hapus_ak($nik)
	{
		if ($this->penduduk_model->delete($nik))
		{
			$return = [
				'cls' => 'success',
				'msg' => 'Anggota Keluarga Berhasil dihapus.'
			];
		} else {
			$return = [
				'cls' => 'failed',
				'msg' => 'Anggota Keluarga Gagal dihapus.'
			];
		}

		echo json_encode($return);
	}

	/**
	* Lihat details per Anggota Keluarga
	*
	* @return $return void
	*/
	public function detail_ak($nik)
	{
		$data = [
			'penduduk' => $this->penduduk_model->get_by_nik($nik)
		];
		$this->load->view('dashboard/_parts/header', $data);
		$this->load->view('dashboard/_parts/sidebar', $data);
		$this->load->view('dashboard/Kartu_keluarga/detail_ak', $data);
		$this->load->view('dashboard/_parts/footer');
	}

	public function ajax_table_ak() {
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
            $html .= '</td><td>';
            		if ($ak->kode_hubungan) {
            			$html .= '<i class="fa fa-star text-warning"></i>';
            		}
            $html .= $ak->nama_hubungan . '</td>
                    <td>
                    	<a class="btn btn-info" href="' . base_url('kartu_keluarga/detail_ak/'. $ak->nik) 	.'">
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
}
