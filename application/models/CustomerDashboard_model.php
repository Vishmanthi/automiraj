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
	//calendar generation
	public function generate($year,$month){
	
        $conf=array(
            'start_day'=>'sunday',
			'show_next_prev'=>true,
            //'next_prev_url'=>base_url().'Customer/reserveService'
		);
		$conf['template']='
		{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td class="day">{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
		
		

		{cal_cell_content}
		<div class="day_num">{day}</div>
		<div class="cont">{content}</div>
		{/cal_cell_content}

		
		{cal_cell_content_today}
		<div class="highlight day_num">{day}</div>
		<div class="content">{content}</div>
		{/cal_cell_content_today}

        {cal_cell_no_content}<div class="nCont" >{day}</div>{/cal_cell_no_content}
		{cal_cell_no_content_today}
		<div class="highlight day_num">{day}</div>	
		{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
		';
		$this->load->library('calendar',$conf); 
		$cal_data=$this->getReservations($year,$month); 
        return $this->calendar->generate($year,$month,$cal_data);
	}
	public function addReservation($data){
		$this->load->database("");
		$insert_data=$this->db->insert('reservations', $data);
		if($insert_data){
			return true;
		}else{
			return false;
		}
	}

	public function getReservations($year,$month){
		$userid=$this->session->user_id;
		$maxres=4 ;
		$count=0;
		$day;
		$d=0;
		
		$this->load->database("");
		$result=$this->db->select("*")->from("reservations")->like('reservation_date',$year.'/'.$month,'after')->get();
		//$this->db->from("reservations")->like('reservation_date','$year/$month','after');
		//$result = $this->db->get();
		$cal_data=array();
		foreach($result->result() as $row){
			$d=0;
			$day=substr($row->reservation_date,8,2);
			$count=0;
			if($userid==$row->cus_id){
				$cal_data[substr($row->reservation_date,8,2)]="booking";
				$d=substr($row->reservation_date,8,2);
				if(substr($d, 0, 1)=="0"){
					$cal_data[substr($d,1,1)]="booking";
				}
			}
		
		foreach($result->result() as $r){ 
			if($day==substr($r->reservation_date,8,2)){
				$count++;
			}
		}
		if($count>=$maxres){
			if($day!=$d){
				$cal_data[substr($row->reservation_date,8,2)]="N/A";
				if(substr($day, 0, 1)=="0"){
					$cal_data[substr($day,1,1)]="N/A";
				}
			}
			// else{
			// 	$cal_data[substr($row->reservation_date,8,2)]="booking";
			// }
			
			
			
		}
		}
		return $cal_data;
	}

	public function RescheduleRes($id,$data){
		$this->load->database("");
		$this->db->where('id', $id);
		$this->db->update('reservations', $data);
	}
	
	public function getReservationDetails($year,$month){
		$this->load->database("");
		$userid=$this->session->user_id;
		$this->db->select("*");
		$this->db->from("reservations");
		$this->db->like('reservation_date',$year.'/'.$month,'after');
		$this->db->where("cus_id",$userid);
		$result = $this->db->get();
		return $result->result();
	}	
	
	public function deleteReservation($date){
		$this->load->database("");
		$userid=$this->session->user_id;
		$this->db->where('reservation_date',$date);
		$this->db->where('cus_id',$userid);
		$this->db->delete('reservations');

	}

	public function getRescount($day) {
		$this->load->database("");
		$this->db->select('reservation_date, time_slot, count(*) AS con');
        $this->db->from('reservations');
        $this->db->where('reservation_date', $day);
        $this->db->group_by('time_slot');
        $r=$this->db->get();
        return $r->result();  
	}
}
?>