<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('status') == "logged in") {
			redirect('alarm');
		} else {
			$this->load->view('v_login');
		}
	}

	public function auth()
	{
		$idAdmin = $this->input->post('idAdmin');
		$kataSandi = md5($this->input->post('kataSandi'));
		$where = array(
			'idAdmin' => $idAdmin,
			'kataSandi' => $kataSandi
			);
		$dataAdminCount = $this->m_login->auth_check("admin", $where)->num_rows();
		if ($dataAdminCount == 1) {
			$data_session = array(
				'admin' => $idAdmin,
				'status' => "logged in"
				);
			$this->session->set_userdata($data_session);
			redirect('alarm');
		} else {
			$this->session->set_flashdata('error','Login gagal. ID Admin atau kata sandi salah!');
			redirect('login');
		}
	}

	function ubahsandi()
	{
		$idAdmin = $this->input->post('idAdmin');
		$kataSandiLama = md5($this->input->post('kataSandiLama'));
		$kataSandi = md5($this->input->post('kataSandi'));
		$konfirmasiKataSandi = md5($this->input->post('konfirmasiKataSandi'));
		$where = array(
			'idAdmin' => $idAdmin,
			'kataSandi' => $kataSandiLama
		);
		$dataAdminCount = $this->m_admin->tampil_data('admin', $where)->num_rows();
		if ($dataAdminCount == 1) {
			if ($kataSandi == $konfirmasiKataSandi) {
				$data = array('kataSandi' => $kataSandi);
				$this->m_admin->update_data('admin', $data, $where);
				$this->session->set_flashdata('success','Berhasil mengubah kata sandi.');
				redirect('alarm');
			} else {
				$this->session->set_flashdata('error','Ubah kata sandi gagal. Silakan periksa kata sandi baru.');
				redirect('alarm');
			}
		} else {
			$this->session->set_flashdata('error','Ubah kata sandi gagal. Silakan periksa kata sandi lama.');
			redirect('alarm');
		}
		
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
