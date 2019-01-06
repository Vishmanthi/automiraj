<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
	}
	public function editProfile(){
		$this->load->model("customerDashboard_model");
		$userid=$this->session->user_id;
		$data['cusData']=$this->customerDashboard_model->getCustomerData($userid);
		$this->load->view('customer_editProfile',$data); 
	}
	public function reserveService($year=null,$month=null){
		if(!$year){
			$year=date("Y");
		}
		if(!$month){
			$month=date("m");
		}
		$this->load->model('customerDashboard_model');
        $data['calendar']=$this->customerDashboard_model->generate($year,$month);
		$userid=$this->session->user_id;
		$data['cusData']=$this->customerDashboard_model->getCustomerData($userid);
		$data['resData']=$this->customerDashboard_model->getReservations($year,$month);
		$data['detRes']=$this->customerDashboard_model->getReservationDetails($year,$month);
		$data['year']=$year; 
		$data['month']=$month;
		$this->load->view('customer_reserveService',$data); 
	}
	public function serviceHistory(){
		$this->load->model("customerDashboard_model");
		$userid=$this->session->user_id;
		$vehicle_no=$this->input->post('vehicle_no');
		$data['vehicleData']=$this->customerDashboard_model->getVehicleData($userid);
		$data['service']=$this->customerDashboard_model->getServiceHistory($vehicle_no);
		$this->load->view('customer_serviceHistory',$data);
	}
	public function editProfileDetails(){
		$this->load->model("customerDashboard_model");
		$nic= $this->input->post('nic');
		$dat = array(
			'title' => $this->input->post('title'),
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'phone' => $this->input->post('cno'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('add')
		);
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('cno', 'Phone', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('email', 'First Name', 'trim|valid_email');
		$this->form_validation->set_rules('add', 'Address', 'required');
		$this->form_validation->set_message('required', 'Required');
		$this->form_validation->set_message('min_length', 'minimum {param}');
		$this->form_validation->set_message('max_length', 'maximum {param}');
		$this->form_validation->set_message('valid_email', 'Invalid email');
		if ($this->form_validation->run() == true){
			if($this->customerDashboard_model->editProfile($nic,$dat)){
				$this->session->set_flashdata('customerUpdate_success','Details Updated!');
			}
			else{
				$this->session->set_flashdata('customerUpdate_error','Error!');
				
			}
		}
		$data['cusData']=$this->customerDashboard_model->getCustomerData1($nic);
		$this->load->view('customer_editProfile',$data);
		
		
		
		
		
	}
	public function changePassword(){
		$this->load->model("customerDashboard_model");
		$old=$this->input->post('old');
		$nic= $this->input->post('nic');
		
		$this->form_validation->set_rules('old', 'Old Password', 'required');
		$this->form_validation->set_rules('new', 'New Password', 'required');
		$this->form_validation->set_rules('repNew', 'Repeat New Password', 'required|matches[new]');
		$this->form_validation->set_message('required', 'Required');
		$this->form_validation->set_message('matches', 'Does not match password');
		if ($this->form_validation->run() == true){
			$encripted_new=password_hash($this->input->post('new'),PASSWORD_BCRYPT);
			if($this->customerDashboard_model->changePassword($old,$encripted_new)){
				$this->session->set_flashdata('pass_success','Password Changed!');
			}
			else{
				$this->session->set_flashdata('pass_error','Error!');
			}
		}
		$data['cusData']=$this->customerDashboard_model->getCustomerData1($nic);
		$this->load->view('customer_editProfile',$data);
	}
	public function getServiceHistory(){
		$this->load->model("customerDashboard_model");
		$vehicle_no=$this->input->post('vehicle_no');
		$data['serviceHis']=$this->customerDashboard_model->getServiceHistory($vehicle_no);
		$this->load->view('customer_serviceHistory',$data); 
	}

	public function Reservation(){
		$this->load->model("customerDashboard_model");
		$day=$this->input->post('res_date');
		$userid=$this->session->user_id;
		$time=$this->input->post("time");
		
		$data = array(
			'cus_id'=> $userid,
			'veh_no' => $this->input->post('veh_no'),
			'reservation_date' => $this->input->post('res_date'),
			'add_date' => date("Y/m/d"),
			'title' => $this->input->post('title'),
			'time_slot'=>$this->input->post('time')

		);
		// $this->customerDashboard_model->addReservation($data);
		// $this->session->set_flashdata('reservation_success','Reservation Added Successfully!');
		// redirect('index.php/customer/reserveService');
		$resC=$this->customerDashboard_model->getRescount($day);
		//print_r($resC);
		if(!empty($resC)){
			foreach($resC as $r){
				if($r->time_slot==$time){
					if($r->con<2){
						$this->customerDashboard_model->addReservation($data);
						$this->session->set_flashdata('reservation_success','Reservation Added Successfully!');
						redirect('index.php/customer/reserveService');
					}else{
						$this->session->set_flashdata('reservation_failure','This time slot is anavailable on this day!');
						redirect('index.php/customer/reserveService');
					}
				
				}else{
					$this->customerDashboard_model->addReservation($data);
					 $this->session->set_flashdata('reservation_success','Reservation Added Successfully!');
					redirect('index.php/customer/reserveService');
			
		}
		}
	}else{
		$this->customerDashboard_model->addReservation($data);
		 $this->session->set_flashdata('reservation_success','Reservation Added Successfully!');
		redirect('index.php/customer/reserveService');
	}	
	}

	public function Reschedule(){
		$this->load->model("customerDashboard_model");
		$id= $this->input->post('id');
		$day=$this->input->post('re_date');
		$time=$this->input->post('time');
		$data=array(
			'title'=>$this->input->post('title'),
			'reservation_date' => $this->input->post('re_date'),
			'time_slot'=>$this->input->post('time')
		);
		$resC=$this->customerDashboard_model->getRescount($day);
		if(!empty($resC)){
			foreach($resC as $r){
				if($r->time_slot==$time){
					if($r->con<2){
						$this->customerDashboard_model->RescheduleRes($id,$data);
						$this->session->set_flashdata('reschedule_success','Rescheduled Successfully!');
						redirect('index.php/customer/reserveService');
					}else{
						$this->session->set_flashdata('reservation_failure','This time slot is anavailable on this day!');
						redirect('index.php/customer/reserveService');
					}
				
				}else{
					$this->customerDashboard_model->RescheduleRes($id,$data);
					$this->session->set_flashdata('reschedule_success','Rescheduled Successfully!');
					redirect('index.php/customer/reserveService');
			
				}
			}
	}else{
		$this->customerDashboard_model->RescheduleRes($id,$data);
		$this->session->set_flashdata('reschedule_success','Rescheduled Successfully!');
		redirect('index.php/customer/reserveService');
	}	

	}

	public function DeleteRes(){
		$d=$this->input->post("date");
		//$str_arr = explode ("-", $d); 
		//$date=implode("/",$str_arr);
		$this->load->model("customerDashboard_model");
		$this->customerDashboard_model->deleteReservation($d);
		redirect('index.php/customer/reserveService');
	}

}
?>