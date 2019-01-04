<?php
class Cashier_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }
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

    public function getJobDetails($jobid){
        $ser=$this->Cashier_model->getJobService($jobid);
        $spare=$this->Cashier_model->getJobSpare($jobid);
        $output='<!DOCTYPE html>
        <html>
        <head>
            <title>Cashier dashboard</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <style>
            .dblUnderlined { border-bottom: 3px double; }
            </style>
        </head>
        <body>';
        $output.='<div class="text-center"><h2>Invoice</h2></div><br><br><div class="row"><div class="text-left"><h5>Date:  '.date('Y/m/d').'</h5></div>
        <div class="text-right"><h5>Jobcard No:  '.$jobid.'</h5></div></div><br><label style="margin-bottom: 12px;"><b>Services</b></label>
        <div style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
            <div style="margin-bottom: 19px;float:left;"></div>
            <div style="float: right;margin-bottom: 19px;"></div>
            <table class="table">
                <tr>
          <th scope="col">Service</th>
          <th scope="col">Description</th>
          <th scope="col">Amount</th>
                </tr><tbody>';
                $payable=0;
                $discount=0;
                foreach($ser as $s){
					$output.='	
                    <tr>
                      <td>'.$s->service_name .'</td>
                      <td>'.$s->description.'</td>
                      <td>'. $s->price.'</td>
                     
                    </tr>';
                    $payable+=$s->price;
                    $discount+=$s->price*($s->discount/100);
                   }
                $output.='<tr>
                <td>Discount</td>
                <td></td>
                <td>('.$discount.')</td>
                </tr>';
                $output.='<tr>
                <td>Payable</td>
                <td></td>
                <td>'.($payable-$discount).'</td>
                </tr>';
                $output.='</table></div>';
                $output.='<label style="margin-bottom: 12px;"><b>Spares</b></label>
				<div style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
					<div style="margin-bottom: 19px;float:left;"></div>
                    <div style="float: right;margin-bottom: 19px;"></div>
                    	<table class="table">
                <tr>
                  <th scope="col">Spare Item</th>
                  <th scope="col">Brand</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Price</th>
                 
                </tr><tbody>';
                $payable2=0;
                foreach($spare as $sp){
					$output.='<tr>
					  	
                    <td>'. $sp->name.'</td>
                    
                       <td >'. $sp->brand.'</td>
                   
                        
                       <td>'.$sp->unit_price.'</td>
                        
                       <td>'. $sp->qty.'</td>
                       <td>'. $sp->qty*$sp->unit_price.'</td></tr>';
                       $payable2+=($sp->qty*$sp->unit_price);
                  
                 
                }
                $output.='<tr>
                <td>Total</td>
                <td></td>
                <td></td>
                <td></td>
                <td>'.$payable2.'</td>
                </tr>';
                $output.='<tr>
                <td>Total Payable</td>
                <td></td>
                <td></td>
                <td></td>
                <td class="dblUnderlined">'.($payable2+$payable-$discount).'</td>
                </tr>';
                
                $output.='</tbody></table></div>';
               
                
               
                $output.='</body></html>';
                return $output;
                
    }

    public function updateDiscount($jobid,$s_id,$dis){
      $this->load->database("");
      $this->db->set('discount', $dis);
      $this->db->where('job_id', $jobid);
      $this->db->where('service_id', $s_id);
      $this->db->update('jobcard_service');
     
      return true ;
  }



}
?>