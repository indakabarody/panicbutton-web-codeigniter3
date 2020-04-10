<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidCheckConnection extends CI_Controller {

	public function index()
	{
		$requestConn = $this->input->post('requestConn');
		if ($requestConn == "Ini request") {
			$response["value"] = 1;
			$response["message"] = "Connecting Sukses";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Connecting Gagal";
			echo json_encode($response);
		}
	}
}
