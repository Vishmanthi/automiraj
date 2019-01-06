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
    public function find_jobcard($vehicle){
        $this->load->database("");
        $this->db->select("*");
        $this->db->from("jobcard");
        $this->db->where('vehicle_no',$vehicle);
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