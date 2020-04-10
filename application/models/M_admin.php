<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	
	function tampil_data($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data($table, $data, $where)
	{
		$this->db->where($where);
        $this->db->update($table, $data);
	}
}
