<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataNomorTelegram extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_nomortelegram');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('pagination','form_validation','encryption','session'));
		if ($this->session->userdata('status') != "logged in") {
			redirect('login');
		}
	}

	public function index()
	{
		$data['dataNomorTelegram'] = $this->m_nomortelegram->tampil_data()->result();
		$this->load->view('header');
		$this->load->view('menu/v_data_nomor_telegram', $data);
		$this->load->view('footer');
	}

	public function add()
	{
		$nomorTelegram = $this->input->post('nomorTelegram');
		$namaPemilik = $this->input->post('namaPemilik');
		$data = array(
			'nomorTelegram' => $nomorTelegram,
			'namaPemilik' => $namaPemilik
		);
		$this->m_nomortelegram->input_data('nomortelegram', $data);
		$this->session->set_flashdata('success','Berhasil menambahkan data.');
		redirect('datanomortelegram');
	}

	public function edit()
	{
		$idNomorTelegram = $this->input->post('idNomorTelegram');
		$nomorTelegram = $this->input->post('nomorTelegram');
		$namaPemilik = $this->input->post('namaPemilik');
		$data = array(
			'nomorTelegram' => $nomorTelegram,
			'namaPemilik' => $namaPemilik
		);
		$where = array('idNomorTelegram' => $idNomorTelegram);
		$this->m_nomortelegram->update_data('nomortelegram', $data, $where);
		$this->session->set_flashdata('success','Berhasil mengubah data.');
		redirect('datanomortelegram');
	}

	public function delete($idNomorTelegram)
	{
		$where = array('idNomorTelegram' => $idNomorTelegram);
		$this->m_nomortelegram->delete_data('nomortelegram', $where);
		$this->session->set_flashdata('success','Berhasil menghapus data.');
		redirect('datanomortelegram');
	}
}
