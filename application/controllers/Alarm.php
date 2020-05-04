<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alarm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		if ($this->session->userdata('status') != "logged in") {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu/v_alarm');
		$this->load->view('footer');
	}

	public function tabelAlarm()
	{
		$where = array('statusAlarm' => "Belum Dikonfirmasi");
		$data['alarmCount']  = $this->m_alarm->tampil_data($where)->num_rows();
		$data['dataAlarm'] = $this->m_alarm->tampil_data($where)->result();
		$this->load->view('menu/v_alarm_tabel', $data);
	}

	public function modalAlarm()
	{
		$where = array('statusAlarm' => "Belum Dikonfirmasi");
		$data['alarmCount']  = $this->m_alarm->tampil_data($where)->num_rows();
		$data['dataAlarm'] = $this->m_alarm->tampil_data($where)->result();
		$this->load->view('menu/v_alarm_modal', $data);
	}

	public function jumlahAlarm()
	{
		$where = array('statusAlarm' => "Belum Dikonfirmasi");
		$data['alarmCount']  = $this->m_alarm->tampil_data($where)->num_rows();
		if ($data['alarmCount'] > 0) {
			echo "<span class='right badge badge-danger'>".$data['alarmCount']."</span>";
		}
	}

	public function judulHalaman()
	{
		$where = array('statusAlarm' => "Belum Dikonfirmasi");
		$data['alarmCount']  = $this->m_alarm->tampil_data($where)->num_rows();
		$where = array('statusPesan' => "Unread");
		$data['pesanCount']  = $this->m_pesanlaporan->tampil_jumlah_pesan($where)->num_rows();
		$jumlahNotif = $data['alarmCount'] + $data['pesanCount'];
		if ($jumlahNotif > 0) {
			echo "(".$jumlahNotif.") RS Panic Button";
		} else {
			echo "RS Panic Button";
		}
	}

	public function confirm($idAlarm)
	{
		$data = array('statusAlarm' => "Dikonfirmasi");
		$where = array('idAlarm' => $idAlarm);
		$this->m_alarm->konfirmasi_alarm('alarm', $data, $where);
		$this->session->set_flashdata('success','Berhasil mengkonfirmasi.');
		redirect('alarm');
	}

	public function reject($idAlarm)
	{
		$data = array('statusAlarm' => "Ditolak");
		$where = array('idAlarm' => $idAlarm);
		$this->m_alarm->konfirmasi_alarm('alarm', $data, $where);
		$this->session->set_flashdata('success','Berhasil menolak.');
		redirect('alarm');
	}
}
