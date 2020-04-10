<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidLogout extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_user');
		$this->load->helper('url');
	}

	public function index()
	{
		$idUser = $this->input->post('idUser');
		$where = array('idUser' => $idUser);
		$data = array('statusLogin' => 'Logged Out');
		$this->m_user->logout_android('user', $data, $where);
		$response["value"] = 1;
		echo json_encode($response);
	}
}
