<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiTelegram extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('pagination','form_validation','encryption','session'));
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
