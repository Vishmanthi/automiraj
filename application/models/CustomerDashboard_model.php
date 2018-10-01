<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class CustomerDashboard_model extends CI_Model{
	
	public function editProfile($nic,$data){
		$this->load->database("");
		$this->db->where('nic', $nic);
		$this->db->update('customer', $data);
		
	}
	public function getCustomerData($userid){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from("customer");
		$this->db->where('id',$userid);
		$result = $this->db->get();
		return $result->result();
	}
	public function changePassword($old,$new){
		$this->load->database("");
		$username=$this->session->username;
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where('username',$username);
		$result = $this->db->get();
		$newPswrd=array(
			'password' => $new
		);
		if($result->num_rows() >0){
			$db_password=$result->row(0)->password;
			if(password_verify($old,$db_password)){
				$this->db->where('username', $username);
				$this->db->update('users', $newPswrd);
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	
}
?>