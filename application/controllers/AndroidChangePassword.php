<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidChangePassword extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_user');
		$this->load->helper('url');
	}

	public function index()
	{
		$idUser = $this->input->post('idUser');
		$kataSandiLama = md5($this->input->post('passwordLama'));
		$kataSandi = md5($this->input->post('password'));
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."'");
		$row = $query->row_array();
		if ($query->num_rows() == 1) {
			if ($kataSandiLama == $row['kataSandi']) {
				$data = array(
					'kataSandi' => $kataSandi
					);
				$this->m_user->update_kata_sandi_android('user', $data, $idUser);
				$response["value"] = 1;
				$response["message"] = "Berhasil menyimpan password.";
				echo json_encode($response);
			} else {
				$response["value"] = 0;
				$response["message"] = "Gagal menyimpan password. Password lama salah.";
				echo json_encode($response);
			}
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menyimpan password. Profil tidak tersedia.";
			echo json_encode($response);
		}
	}
}
