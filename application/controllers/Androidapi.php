<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AndroidLogin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_alarm');	
		$this->load->model('m_pesanlaporan');	
		$this->load->model('m_user');
		$this->load->helper('url');
	}

	public function index()
	{
        echo "This is an API for Android application. Nothing's here. Please go back.";
	}

	public function register()
	{
		$idUser = $this->input->post('idUser');
		$namaUser = $this->input->post('namaUser');
		$noHP = $this->input->post('noHP');
		$kataSandi = md5($this->input->post('password'));
		$statusUser = "Aktif";
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."'");
		if ($query->num_rows() < 1) {
			$data = array(
				'idUser' => $idUser,
				'namaUser' => $namaUser,
				'noHP' => $noHP,
				'kataSandi' => $kataSandi,
				'statusUser' => $statusUser
				);
			$this->m_user->register_android('user', $data);
			$response["value"] = 1;
			$response["message"] = "Registrasi Berhasil";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Registrasi Gagal. Silakan masukkan ID User lainnya.";
			echo json_encode($response);
		}
	}

	public function login()
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

	public function sendhelprequest()
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
		$url = ""; //Telegram Bot API
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

	public function sendmessage()
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
		$url = ""; //Telegram Bot API
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

	public function getnotif()
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

	public function stopalarm()
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

	public function showprofileinfo()
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

	public function saveprofileinfo()
	{
		$idUser = $this->input->post('idUser');
		$idUserOld = $this->input->post('idUserOld');
		$namaUser = $this->input->post('namaUser');
		$noHP = $this->input->post('noHP');
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."'");
		if ($query->num_rows() == 0 || $idUser == $idUserOld) {
			$data = array(
				'idUser' => $idUser,
				'namaUser' => $namaUser,
				'noHP' => $noHP
				);
			$this->m_user->update_data_profil_android('user', $data, $idUserOld);
			$response["value"] = 1;
			$response["message"] = "Berhasil menyimpan profil.";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Gagal menyimpan profil. Silakan masukkan ID User lainnya.";
			echo json_encode($response);
		}
	}

	public function changepassword()
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

	public function logout()
	{
		$idUser = $this->input->post('idUser');
		$where = array('idUser' => $idUser);
		$data = array('statusLogin' => 'Logged Out');
		$this->m_user->logout_android('user', $data, $where);
		$response["value"] = 1;
		echo json_encode($response);
	}
}
