<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_logalarm extends CI_Model {

	function tampil_data()
	{
		$this->db->select('alarm.*, user.*')
						->from('alarm')
						->join('user', 'alarm.idUser = user.idUser')
						->order_by('alarm.waktu', 'desc');				
		return $this->db->get();
	}
}
