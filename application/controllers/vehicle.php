<?php
class Vehicle extends CI_Controller{
	public function index(){
		$data['main_view']="addVehicle_view";
		$this->load->model("customer_model");
		$data['cus_det']=$this->customer_model->find_customer();
		$this->load->view('addVehicle_view',$data);
	}

	public function find_customer(){
	 	$this->load->model("customer_model");
		//$a['service']=$this->model->get_data();
		//$a['spare']=$this->model->get_spareData();
	 	$a['cus_det']=$this->customer_model->find_customer();
	 	$data=array(
            		'cus_det'=>$this->customer_model->find_customer()
            );
        $this->session->set_flashdata($data);
	 	//$this->load->view('addVehicle_view',$a);
	 	redirect('index.php/vehicle');
		

	}


	 public function registerVehicle(){
	 	$this->form_validation->set_rules('vehicleno','Vehicle Registration No','trim|required');
	 	$this->form_validation->set_rules('model','Vehicle Make','trim|required');
       // $this->form_validation->set_rules('nic','ID Number','trim|required|in_list[10,12]');
	 	$this->form_validation->set_rules('make','Vehicle Model','trim|required');
	 	$this->form_validation->set_rules('type','Vehicle Type','trim|required');
	 	//$this->form_validation->set_rules('con_pass','Confirm Password','trim|required|matches[password]');
	 
	 	if($this->form_validation->run()==False){
            $data=array(
            		'errors'=>validation_errors()
            );
            $this->session->set_flashdata($data);
            redirect('index.php/vehicle');

	 	}else{
	 		$this->load->model('vehicle_model');
	 		if($this->vehicle_model->create_vehicle()){
				$this->session->set_flashdata('vehReg_success','Vehicle added!!');
				redirect('index.php/vehicle');
			 }else{
				$this->session->set_flashdata('vehReg_failure','The added vehicle is already regitered!!');
				redirect('index.php/vehicle');
			 }
			 }
			
			 // }else{
			 // 	echo "something wrong";
			 // }
			
	 	} 

	
}
?>