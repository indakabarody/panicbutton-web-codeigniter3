<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidStopAlarm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_alarm');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$idAlarm = $this->input->post('idAlarm');
		$where = array(
			'idAlarm' => $idAlarm
		);
		$this->m_alarm->stop_alarm_android('alarm', $where, $idAlarm);
		$response["value"] = 1;
		echo json_encode($response);
	}
}
