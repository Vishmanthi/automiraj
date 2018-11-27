<?php
class Cashier_model extends CI_Model
{

    public function getJobCard($jobid){
        $this->load->database("");
        $this->db->select('*');
        $this->db->from('spares');
        $this->db->where('job_id',$jobid);
        $r=$this->db->get();
         return $r->result();
    }

    public function getJobService($jobid){
        $this->load->database("");
        $this->db->select('*');
        $this->db->from('jobcard_service');
        $this->db->join('service', 'jobcard_service.service_id = service.service_id','right');
        $this->db->where('job_id',$jobid);
        $r=$this->db->get();
        return $r->result();
    }

    public function getJobSpare($jobid){
        $this->load->database("");
        $this->db->select('*');
        $this->db->from('jobcard_spare');
        $this->db->join('spares', 'jobcard_spare.spare_id = spares.spare_id','left');
        $this->db->join('spares_brand', 'jobcard_spare.spare_id = spares_brand.spare_id AND jobcard_spare.brand = spares_brand.brand_name','left');
        $this->db->where('job_id',$jobid);
        $r=$this->db->get();
        return $r->result();
    }



}
?>