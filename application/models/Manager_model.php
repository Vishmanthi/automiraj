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
} 
?>