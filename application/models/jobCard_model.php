<?php
class jobCard_model extends CI_Model
{
	public function addJobCard()
	{
        $this->load->database("");
        $data=array(
            'job_id'=>$this->input->post("jobcardno"),
            'vehicle_no'=>$this->input->post("vehicleno"),
            'date'=>date("Y/m/d"),
            'odometer_read'=>$this->input->post("odometerR")
        );
        
       // $this->db->insert('jobcard',$data);
       $db_debug = $this->db->db_debug; 

        $this->db->db_debug = FALSE;  
        
        
        $insert_data=$this->db->insert('jobcard',$data);
        // if($this->db->_error_message()){
        //     return false;
        // }
        // $error = $this->db->error();
        // if (isset($error['message'])) {
        //     return false;
        // }
    
        $r=$this->db->query('select service_id,service_name from service');
        $r->result();
        $j_id=$this->input->post("jobcardno");
        $s_id;
        foreach($r->result() as $row){
            if($this->input->post($row->service_id)){
                $s_id=$row->service_id;
                $d=array(
                    'job_id'=>$j_id,
                    'service_id'=>$s_id,
                    'discount'=>0
                );
                $insert_data2=$this->db->insert('jobcard_service',$d);
                
            }
           
        }
        // $this->db->select('*');
        // $this->db->from('spares');
        // $this->db->join('spares_brand', 'spares.spare_id = spares_brand.spare_id','right');
        // $r2= $this->db->get();
        // $r2->result();
        $r2=$this->db->query('select * from spares');
        $r2->result();
        $j_id=$this->input->post("jobcardno");
        foreach($r2->result() as $row){
            if($this->input->post($row->spare_id)){
                $s_id=$row->spare_id;
                $d=array(
                    'job_id'=>$j_id,
                    'spare_id'=>$s_id,
                    'brand'=>$this->input->post($row->name),
                    'qty'=>$this->input->post('q'.$row->spare_id)

                );
                $insert_data3=$this->db->insert('jobcard_spare',$d);
                
            }
           
        }
     return $insert_data;
    }

   
}
?>