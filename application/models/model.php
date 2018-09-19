<?php
class Model extends CI_Model
{
	public function insert_data($a,$b)
	{
		$this->load->database("");
		$this->db->insert($a,$b);
	}
	public function get_data()
	{
		$this->load->database("");
		$r=$this->db->query('select service_name,description,price from service');
		return $r->result();
	}
	public function get_spareData()
	{
		$this->load->database("");
		$r=$this->db->query('select name from spares');
		return $r->result();
	}
}

?>