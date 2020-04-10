<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapelapor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('pagination','form_validation','encryption','session'));
		if ($this->session->userdata('status') != "logged in") {
			redirect('login');
		}
	}

	public function index()
	{
		$data['dataPelapor'] = $this->m_user->tampil_data()->result();
		$this->load->view('header');
		$this->load->view('menu/v_data_pelapor', $data);
		$this->load->view('footer');
	}

	public function edit()
	{
		$idUser = $this->input->post('idUser');
		$namaUser = $this->input->post('namaUser');
		$noHP = $this->input->post('noHP');
		$data = array(
			'namaUser' => $namaUser,
			'noHP' => $noHP
		);
		$where = array('idUser' => $idUser);
		$this->m_user->update_data('user', $data, $where);
		$this->session->set_flashdata('success','Berhasil mengubah data.');
		redirect('datapelapor');
	}

	public function delete($idUser)
	{	
		$query = $this->db->query("SELECT * FROM user WHERE idUser = '".$idUser."'");
		$row = $query->row_array();
		$dataAlarmCount = $this->db->query("SELECT * FROM alarm WHERE idUser = '".$idUser."'")->num_rows();
		$dataPesanKhususCount = $this->db->query("SELECT * FROM pesankhusus WHERE idUser = '".$idUser."'")->num_rows();
		if ($row['statusLogin'] != "Logged In") {
			$where = array('idUser' => $idUser);
			if ($dataAlarmCount == 0 && $dataPesanKhususCount == 0) {
				$this->m_user->delete_data('user', $where);
				$this->session->set_flashdata('success','Berhasil menghapus data.');
				redirect('datapelapor');
			} else {
				$this->session->set_flashdata('error','Gagal menghapus data.');
				redirect('datapelapor');
			}
		} else {
			$this->session->set_flashdata('error','Gagal menghapus data. Pelapor sedang login.');
			redirect('datapelapor');
		}
	}
}
