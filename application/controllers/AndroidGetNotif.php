<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidGetNotif extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_alarm');
		$this->load->helper('url');
	}

	public function index()
	{
		$idAlarm = $this->input->post('idAlarm');
		$query = $this->db->query("SELECT * FROM alarm WHERE idAlarm = '".$idAlarm."' AND statusAlarm = 'Dikonfirmasi'");
		if ($query->num_rows() == 1) {
			$response["value"] = 1;
			$response["message"] = "Pertolongan telah dikonfirmasi.";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			echo json_encode($response);
		}
	}
}
