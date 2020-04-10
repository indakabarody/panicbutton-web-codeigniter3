<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidSaveProfileInfo extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_user');
		$this->load->helper('url');
	}

	public function index()
	{
		$idUser = $this->input->post('idUser');
		$idUserOld = $this->input->post('idUserOld');
		$namaUser = $this->input->post('namaUser');
		$noHP = $this->input->post('noHP');
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."'");
		if ($query->num_rows() == 0 || $idUser == $idUserOld) {
			$data = array(
				'idUser' => $idUser,
				'namaUser' => $namaUser,
				'noHP' => $noHP
				);
			$this->m_user->update_data_profil_android('user', $data, $idUserOld);
			$response["value"] = 1;
			$response["message"] = "Berhasil menyimpan profil.";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menyimpan profil. Silakan masukkan ID User lainnya.";
			echo json_encode($response);
		}
	}
}
