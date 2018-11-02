<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	public function get_siswa()
	{
		/*$data = $this->db->get('siswa');
		return $data;*/

		$data= $this->db->query("SELECT * FROM siswa");
		return $data->result();
	}

	public function get_edit_data($id) {
		$data = $this->db->query("SELECT * FROM siswa WHERE id = '$id'");
		return $data->result();
	}

	public function count_siswa() {
		$data = $this->db->query("SELECT * FROM siswa");
		return $data->num_rows();
	}

	public function simpan_data() {
		/*Upload image configuration*/
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size'] = '2048000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = url_title($this->input->post('photo'));
			$this->upload->initialize($config);
			$this->upload->do_upload('photo');
			$data = $this->upload->data();

			$data = array(
				'id'       => "",
				'nama'     => $this->input->post('nama'),
				'nis'      => $this->input->post('nis'),
				'jurusan'  => $this->input->post('jurusan'),

				'photo'    => $data['file_name']
				);

			$this->db->insert('siswa', $data);
			redirect('siswa/index');
	}

	public function eksekusi_edit() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['max_size'] = '2048000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = url_title($this->input->post('photo'));
			$this->upload->initialize($config);
			$this->upload->do_upload('photo');
			$data = $this->upload->data();

			$id = $this->input->post('id');
			$data = array(
				'id'       => "",
				'nama'     => $this->input->post('nama'),
				'nis'      => $this->input->post('nis'),
				'jurusan'  => $this->input->post('jurusan'),

				'photo'    => $data['file_name']
				);

			$this->db->where('id', $id);
			$this->db->update('siswa', $data);
			redirect('siswa/index');
	}

	public function hapus_data($id) {
		$this->db->query("DELETE FROM siswa WHERE id = '$id'");
		redirect('siswa/index');
	}
}