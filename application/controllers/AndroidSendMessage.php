<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidSendMessage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pesanlaporan');
		$this->load->helper(array('url'));
	}

	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		$idAlarm = $this->input->post('idAlarm');
		$idUser = $this->input->post('idUser');
		$pesan = $this->input->post('pesanKhusus');
		$waktu = date("Y-m-d H:i:s");
		$statusPesan = "Unread";
		$data = array(
			'idAlarm' => $idAlarm,
			'idUser' => $idUser,
			'pesan' => $pesan,
			'waktu' => $waktu,
			'statusPesan' => $statusPesan
		);
		$this->m_pesanlaporan->kirim_pesan_android('pesankhusus', $data);
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."' LIMIT 1");
		$rowUser = $query->row_array();
		$query2 = $this->db->query("SELECT * FROM alarm WHERE idAlarm = '".$idAlarm."' LIMIT 1");
		$rowAlarm = $query2->row_array();
		$message_text = "<b>Update Pesan Terbaru</b>\n\nPesan : ".$pesan."\nNama Pelapor : ".$rowUser['namaUser']."\nKeluhan : ".$rowAlarm['jenis']."\nWaktu : ".$waktu."\n\nInformasi lebih lengkap dapat diakses di Web Admin Panic Button.";
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
		echo json_encode($response);
	}
}
