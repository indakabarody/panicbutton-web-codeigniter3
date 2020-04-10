<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidLogin extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_user');
		$this->load->helper('url');
 
	}

	public function index()
	{
		$idUser = $this->input->post('idUser');
		$kataSandi = md5($this->input->post('password'));
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."' AND kataSandi = '".$kataSandi."'");
		if ($query->num_rows() == 1) {
			$where = array('idUser' => $idUser);
			$data = array('statusLogin' => 'Logged In');
			$this->m_user->login_android('user', $data, $where);
			$response["value"] = 1;
			$response["message"] = "Login Berhasil";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Login Gagal";
			echo json_encode($response);
		}
	}
}
