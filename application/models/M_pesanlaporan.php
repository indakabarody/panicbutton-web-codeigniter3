<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanlaporan extends CI_Model {

	function tampil_data($where)
	{
		$this->db->select('pesankhusus.*, alarm.*, user.*')
						->from('pesankhusus')
						->join('alarm', 'pesankhusus.idAlarm = alarm.idAlarm')
						->join('user', 'pesankhusus.idUser = user.idUser')
						->where($where)
						->order_by('pesankhusus.waktu', 'desc');
		return $this->db->get();
	}

	function tampil_jumlah_pesan($where)
	{
		$this->db->select('pesankhusus.*, alarm.*, user.*')
						->from('pesankhusus')
						->join('alarm', 'pesankhusus.idAlarm = alarm.idAlarm')
						->join('user', 'pesankhusus.idUser = user.idUser')
						->where($where)
						->order_by('pesankhusus.waktu', 'desc');
		return $this->db->get();
	}

	function kirim_pesan_android($table, $data)
	{
		$this->db->insert($table, $data);
	}

	function baca_pesan($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function hapus_pesan($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
