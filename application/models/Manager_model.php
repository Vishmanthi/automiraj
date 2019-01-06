<?php
class Manager_model extends CI_Model
{
public function getDailySales($date){
        $this->load->database("");
        $this->db->select('service.service_name , count(*) AS con');
        $this->db->from('jobcard_service');
        $this->db->join('jobcard', 'jobcard_service.job_id = jobcard.job_id','left');
        $this->db->join('service', 'jobcard_service.service_id = service.service_id','left');
        $this->db->where('date',$date);
        $this->db->group_by('service.service_name');
        $r=$this->db->get();
        return $r->result();
    }

    public function getWeeklyRevenue($day){

        $this->load->database("");
        // $r=$this->db->query("SELECT date, service.service_name, SUM(service.price) AS rev, AVG(service.price) AS average FROM `jobcard_service` LEFT JOIN `jobcard` ON `jobcard_service`.`job_id` = `jobcard`.`job_id` LEFT JOIN `service` ON `jobcard_service`.`service_id` = `service`.`service_id` WHERE jobcard.date=$day GROUP BY service.service_name");
       
        // return $r->result();
        $this->db->select('date, service.service_name,SUM(service.price) AS rev,service.service_id');
        $this->db->from('jobcard_service');
        $this->db->join('jobcard', 'jobcard_service.job_id = jobcard.job_id','left');
        $this->db->join('service', 'jobcard_service.service_id = service.service_id','left');
        $this->db->where('jobcard.date', $day);
        $this->db->group_by('service.service_name');
        $r=$this->db->get();
        return $r->result();  
    }

    public function getDailySpares($date){
        $this->load->database("");
        $this->db->select('spares.name , sum(jobcard_spare.qty) AS con');
        $this->db->from('jobcard_spare');
        $this->db->join('jobcard', 'jobcard_spare.job_id = jobcard.job_id','left');
        $this->db->join('spares', 'jobcard_spare.spare_id = spares.spare_id','left');
        $this->db->where('date',$date);
        $this->db->group_by('spares.name');
        $r=$this->db->get();
        return $r->result();
    }

    public function create_employee(){
		$this->load->database("");
		$data=array(
			//'title'=>$this->input->post('title'),
			'first_name'=>$this->input->post('firstname'),
			'last_name'=>$this->input->post('lastname'),
			'nic'=>$this->input->post('nic'),
			//'phone'=>$this->input->post('phone'),
			//'email'=>$this->input->post('email'),
			//'address'=>$this->input->post('address')
			// 'username'=>$this->input->post(),
			// 'password'=>$encripted_pass
		);
		$insert_data=$this->db->insert('employee',$data);
		$this->db->where('nic',$this->input->post('nic'));
		//$result=$this->db->get('customer');
        $id=$this->db->get('employee')->row(0)->id;
        $nid="emp".$id;
		$encripted_pass=password_hash($this->input->post('pwd'),PASSWORD_BCRYPT);
		$d2=array(
			'id'=>$nid,
			'username'=>$this->input->post('username'),
			'password'=>$encripted_pass,
            'type'=>$this->input->post('type'),
            'email'=>$this->input->post('email')
		);
		$insert_data2=$this->db->insert('users',$d2);
		if($insert_data && $insert_data2){
			return true;
		}else{
			return false;
		}
	}
 
} 
?>