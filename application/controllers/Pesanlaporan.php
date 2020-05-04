<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanlaporan extends CI_Controller {
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
		$data = array('statusPesan' => 'Read');
		$where = array('statusPesan' => 'Unread');
		$this->m_pesanlaporan->baca_pesan('pesankhusus', $data, $where);
		$this->load->view('header');
		$this->load->view('menu/v_pesan_laporan');
		$this->load->view('footer');
	}

	public function tabelPesan()
	{
		$where = array('statusAlarm' => 'Belum Dikonfirmasi');
		$data['dataPesanLaporan'] = $this->m_pesanlaporan->tampil_data($where)->result();
		$this->load->view('menu/v_pesan_laporan_tabel', $data);
	}

	public function jumlahPesan()
	{
		$where = array(
			'statusPesan' => 'Unread',
			'statusAlarm' => 'Belum Dikonfirmasi'
		);
		$data['pesanCount']  = $this->m_pesanlaporan->tampil_jumlah_pesan($where)->num_rows();
		if ($data['pesanCount'] > 0) {
			echo "<span class='right badge badge-danger'>".$data['pesanCount']."</span>";
		}
	}

	function hapusPesan($idPesanKhusus)
	{
		$where = array('idPesanKhusus' => $idPesanKhusus);
		$this->m_pesanlaporan->hapus_pesan('pesankhusus', $where);
		$this->session->set_flashdata('success','Berhasil menghapus.');
		redirect('pesanlaporan');
	}
}
