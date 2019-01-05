<?php
class Vehicle_model extends CI_Model{
	
	public function create_vehicle(){
		$this->load->database("");
		$this->db->where('nic',$this->input->post('nic'));
		$id=$this->db->get('customer')->row(0)->id;
		$data=array(
			
			'cus_id'=>$id,
			'veh_reg_no'=>$this->input->post('vehicleno'),
			'type'=>$this->input->post('type'),
			'make'=>$this->input->post('make'),
			'model'=>$this->input->post('model')
		//	'additional'=>$this->input->post('additional')
			
		);
		$db_debug = $this->db->db_debug; 

        $this->db->db_debug = FALSE;  
		$insert_data=$this->db->insert('vehicle',$data);
		
		if($insert_data){
			return true;
		}else{
			return false;
		}
	}
 
	
	
}
 
?>