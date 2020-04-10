<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_user');
		$this->load->helper('url');
		$this->load->database();
	}

	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
		$idAlarm = date("YmdHis");
		$idUser = "indaka";
		$jenis = "Kecelakaan";
		$latitude = "1000";
		$longitude = "1000";
		$waktu = date("Y-m-d H:i:s");
		$statusTombol = "Aktif";
		$statusAlarm = "Belum Dikonfirmasi";

		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."' LIMIT 1");
		$row = $query->row_array();
		$message_text = "*Update Pasien Terbaru*<br>
						Keluhan : ".$jenis."<br>
						Nama Pelapor : ".$row['namaUser']."<br>
						Nomor HP Pelapor : ".$row['noHP']."<br>
						Waktu : ".$waktu."<br>
						<br>
						Informasi lebih lengkap dapat diakses di Web Admin Panic Button.
						";
		
		echo $message_text;
	}
}
