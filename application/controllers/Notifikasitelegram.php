<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasitelegram extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "logged in") {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu/v_notifikasi_telegram');
		$this->load->view('footer');
	}
}
