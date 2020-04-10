<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidShowProfileInfo extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_user');
		$this->load->helper('url');
		$this->load->database();
 
	}

	public function index()
	{
		$idUser = $this->input->post('idUser');
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."' LIMIT 1");
		$row = $query->row_array();
		$response["value"] = 1;
		$response["idUser"] = $row['idUser'];
		$response["namaUser"] = $row['namaUser'];
		$response["noHP"] = $row['noHP'];
		echo json_encode($response);
	}
}
