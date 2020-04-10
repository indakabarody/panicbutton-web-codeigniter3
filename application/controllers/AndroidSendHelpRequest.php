<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidSendHelpRequest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_alarm');
		$this->load->model('m_user');
		$this->load->helper(array('url'));
		$this->load->database();
	}

	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		$idAlarm = date("YmdHis");
		$idUser = $this->input->post('idUser');
		$jenis = $this->input->post('keluhan');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$waktu = date("Y-m-d H:i:s");
		$statusTombol = "Aktif";
		$statusAlarm = "Belum Dikonfirmasi";
		$data = array(
			'idAlarm' => $idAlarm,
			'idUser' => $idUser,
			'jenis' => $jenis,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'waktu' => $waktu,
			'statusTombol' => $statusTombol,
			'statusAlarm' => $statusAlarm
		);
		$this->m_alarm->minta_pertolongan_android('alarm', $data);
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."' LIMIT 1");
		$row = $query->row_array();
		$message_text = "<b>Update Pasien Terbaru</b>\n\nKeluhan : ".$jenis."\nNama Pelapor : ".$row['namaUser']."\nNomor HP Pelapor : ".$row['noHP']."\nWaktu : ".$waktu."\n\nInformasi lebih lengkap dapat diakses di Web Admin Panic Button.";
		$url = "https://api.telegram.org/bot1239743651:AAG1mLusHdXdwDlYAx20VGiHuYeegNfh5UI/sendMessage?chat_id=@rspanicbuttonupdate&parse_mode=HTML";
		$url = $url . "&text=" . urlencode($message_text);
		$ch = curl_init();
		$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		$result = curl_exec($ch);
		curl_close($ch);
		$response["value"] = 1;
		$response["idAlarm"] = $idAlarm;
		echo json_encode($response);
	}
}
