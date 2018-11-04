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
		$r=$this->db->query('select service_id,service_name,description,price from service');
		return $r->result();
	}
	public function get_spareData()
	{
		$this->load->database("");
		$r=$this->db->query('select * from spares');
		return $r->result();
	}
	public function get_spareBrandDetails()
	{
		$this->load->database("");
		$this->db->select('*');
		$this->db->from('spares');
		$this->db->join('spares_brand','spares.spare_id=spares_brand.spare_id','left');
		//$this->db->where('spares.name',$spare_item);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}

	}
}

?>