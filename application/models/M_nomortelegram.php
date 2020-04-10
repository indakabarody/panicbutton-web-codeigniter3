<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nomortelegram extends CI_Model {

	function tampil_data()
	{
		return $this->db->get('nomortelegram');
	}

	function input_data($table, $data)
	{
		$this->db->insert($table, $data);
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
}
