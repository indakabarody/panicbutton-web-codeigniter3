<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function tampil_data()
	{
		return $this->db->get('user');
	}

	function update_data($table, $data, $where)
	{
		$this->db->where($where);
        $this->db->update($table, $data);
	}

	function delete_data($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function register_android($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function login_android($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function logout_android($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}


	function update_data_profil_android($table, $data, $idUserOld)
	{
		$this->db->where(array('idUser' => $idUserOld));
        $this->db->update($table, $data);
	}

	function update_kata_sandi_android($table, $data, $idUser)
	{
		$this->db->where(array('idUser' => $idUser));
        $this->db->update($table, $data);
	}
}
