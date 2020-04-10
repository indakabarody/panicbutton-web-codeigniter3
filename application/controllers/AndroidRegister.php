<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidRegister extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_user');
		$this->load->helper('url');
	}

	public function index()
	{
		$idUser = $this->input->post('idUser');
		$namaUser = $this->input->post('namaUser');
		$noHP = $this->input->post('noHP');
		$kataSandi = md5($this->input->post('password'));
		$statusUser = "Aktif";
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."'");
		if ($query->num_rows() < 1) {
			$data = array(
				'idUser' => $idUser,
				'namaUser' => $namaUser,
				'noHP' => $noHP,
				'kataSandi' => $kataSandi,
				'statusUser' => $statusUser
				);
			$this->m_user->register_android('user', $data);
			$response["value"] = 1;
			$response["message"] = "Registrasi Berhasil";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Registrasi Gagal. Silakan masukkan ID User lainnya.";
			echo json_encode($response);
		}
	}
}
