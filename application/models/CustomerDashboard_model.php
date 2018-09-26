<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class CustomerDashboard_model extends CI_Model{
	
	public function editProfile($nic,$data){
		$this->load->database("");
		$this->db->where('nic', $nic);
		$this->db->update('customer', $data);
		
	}
	
}
?>