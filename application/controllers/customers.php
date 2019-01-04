<?php

class Customers extends CI_Controller{
	public function index(){
		//$data['main_view']="addCustomer_view";
		
		$this->load->view('addCustomer_view');
	}

	

	 public function register(){
		// $nic= $this->input->post("nic");
		// $this->valid_nic($nic);
	 	$this->form_validation->set_rules('first_name','First Name','trim|required');
	 	$this->form_validation->set_rules('last_name','Last Name','trim|required');
		//$this->form_validation->set_rules('nic','ID Number','trim|required|regex_match[/[0-9]{12}|[0-9]{9}[V]/]');
		$this->form_validation->set_rules('nic','ID Number','trim|required|callback_valid_nic');
	 	$this->form_validation->set_rules('phone','Phone Number','trim|required|exact_length[10]');
	 	$this->form_validation->set_rules('email','Email','trim|required|valid_email');
	 	$this->form_validation->set_rules('password','Password','trim|required');
	 	$this->form_validation->set_rules('con_pass','Confirm Password','trim|required|matches[password]');
	    
	 	if($this->form_validation->run()==False){
            $data=array(
					'errors'=>validation_errors()
					//'nErr' =>$this->valid_nic($nic)
            );
            $this->session->set_flashdata($data);
            redirect('index.php/customers');

	 	}else{
	 		$this->load->model('customer_model');
	 		$this->customer_model->create_customer();
			 	//echo "customer created";
			 	$this->session->set_flashdata('cusReg_success','New customer added!!');
			 	redirect('index.php/customers');
			 }
			 // }else{
			 // 	echo "something wrong";
			 // }
			
		 } 
		 
		 public function valid_nic($string)
		 {
			 if ( preg_match('/([0-9]{9}[V]|[0-9]{12})/', $string)) 
			 
			 {
				return TRUE;
			 }
			 else
			 {
				$this->form_validation->set_message('valid_nic', 'The NIC No is not in the correct format');
				return FALSE;
			 }
		 } 
	 


	 
}

?>