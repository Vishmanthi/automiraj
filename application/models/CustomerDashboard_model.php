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
	public function getVehicleData($userid){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from("vehicle");
		$this->db->where('cus_id',$userid);
		$result = $this->db->get();
		return $result->result();
	}
	public function getServiceHistory($vehicle_no){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from("jobcard");
		$this->db->where('vehicle_no',$vehicle_no);
		$this->db->order_by("date", "desc");
		$result = $this->db->get();
		$array1=array();$array2=array(array(array()));
		if ($result->num_rows() >0) {
			for ($i=0; $i < $result->num_rows(); $i++) { 
				$array1[$i]=$result->row($i)->job_id;
				$array2[$i][0][1]=$array1[$i];
				$array2[$i][0][0]=$result->row($i)->date;
			}
			for ($i=0; $i < $result->num_rows(); $i++) { 
				$this->db->select("*");
				$this->db->from("jobcard_service as js");
				$this->db->join("service as s","s.service_id=js.service_id");
				$this->db->where('js.job_id',$array1[$i]);
				$r = $this->db->get();
				if($r->num_rows() >0){
					

					for ($j=0; $j < $r->num_rows(); $j++) { 
						$array2[$i][1][$j]=$r->row($j)->service_name;
					}
				}
				
			}
			for ($i=0; $i < $result->num_rows(); $i++) { 
				$this->db->select("*");
				$this->db->from("jobcard_spare as jp");
				$this->db->join("spares as sp","sp.spare_id=jp.spare_id");
				$this->db->where('jp.job_id',$array1[$i]);
				$r = $this->db->get();
				if($r->num_rows() >0){
					

					for ($j=0; $j < $r->num_rows(); $j++) { 
						$array2[$i][2][$j]=$r->row($j)->name;

					}
				}
				
			}
		}
		else{
			return false;
		}
		
		return $array2;
	}
	
	
	
}
?>