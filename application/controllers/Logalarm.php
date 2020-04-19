<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logalarm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_logalarm');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('pagination','form_validation','encryption','session'));
		if ($this->session->userdata('status') != "logged in") {
			redirect('login');
		}
	}

	public function index()
	{
		$data['dataLogAlarm'] = $this->m_logalarm->tampil_data()->result();
		$this->load->view('header');
		$this->load->view('menu/v_log_alarm', $data);
		$this->load->view('footer');
	}

	public function laporan()
	{
		$data['dataLogAlarm'] = $this->m_logalarm->tampil_data()->result();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = 'laporan-log-alarm-'.date('YmdHis');
		$this->pdf->load_view('v_laporan_pdf', $data);
	}
}
