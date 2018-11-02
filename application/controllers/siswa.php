<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('model_siswa');
	}

	public function index()
	{
		$data['siswa'] = $this->model_siswa->get_siswa();
		$data['c_siswa'] = $this->model_siswa->count_siswa();
		$this->load->view('index', $data);
	}

	public function simpan_data() {
		$this->model_siswa->simpan_data();
		$data['siswa'] = $this->model_siswa->get_siswa();
		$data['c_siswa'] = $this->model_siswa->count_siswa();
		$this->load->view('index', $data);
	}

	public function edit_data($id) {
		$data['data'] = $this->model_siswa->get_edit_data($id);
		$data['siswa'] = $this->model_siswa->get_siswa();
		$data['c_siswa'] = $this->model_siswa->count_siswa();
		$this->load->view('siswa', $data);
	}

	public function eksekusi_edit() {
		$this->model_siswa->eksekusi_edit();
	}
	public function hapus_data($id) {
		$this->model_siswa->hapus_data($id);
	}
}