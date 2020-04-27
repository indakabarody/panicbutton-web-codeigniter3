<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alarm extends CI_Model {

	function tampil_data($where)
	{
		$this->db->select('alarm.*, user.*')
						->from('alarm')
						->join('user', 'alarm.idUser = user.idUser')
						->where($where)
						->order_by('alarm.waktu', 'desc');
		return $this->db->get();
	}

	function konfirmasi_alarm($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function minta_pertolongan_android($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function get_notif_android($table, $where)
	{
		$this->db->get_where($table, $where);
	}

	function stop_alarm_android($table, $where, $idAlarm)
	{
		$dataAlarm = $this->db->query("SELECT * FROM ".$table." WHERE idAlarm = '".$idAlarm."' LIMIT 1")->row_array();
		$dataAlarmCount = $this->db->query("SELECT * FROM pesankhusus WHERE idAlarm = '".$idAlarm."'")->num_rows();
		if ($dataAlarm['statusAlarm'] == "Belum Dikonfirmasi") {
			if ($dataAlarmCount > 0) {
				$this->db->where($where);
				$this->db->delete('pesankhusus');
				$this->db->where($where);
				$this->db->delete($table);
			} else {
				$this->db->where($where);
				$this->db->delete($table);
			}
		}
	}
}
