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
		$data = array(
			'title' => $this->input->post('title'),
			'first_name' => $this->input->post('fname'),
			'last_name' => $this->input->post('lname'),
			'phone' => $this->input->post('cno'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('add')
		);
		$this->customerDashboard_model->editProfile($nic,$data);
		$this->session->set_flashdata('customerUpdate_success','Details Updated!');
		redirect('index.php/customer/editProfile');
	}
	public function changePassword(){
		$this->load->model("customerDashboard_model");
		$old=$this->input->post('old');
		$encripted_new=password_hash($this->input->post('new'),PASSWORD_BCRYPT);
		$this->customerDashboard_model->changePassword($old,$encripted_new);
		redirect('index.php/customer/editProfile');
	}
	public function getServiceHistory(){
		$this->load->model("customerDashboard_model");
		$vehicle_no=$this->input->post('vehicle_no');
		$data['serviceHis']=$this->customerDashboard_model->getServiceHistory($vehicle_no);
		$this->load->view('customer_serviceHistory',$data); 
	}

	public function Reservation(){
		$this->load->model("customerDashboard_model");
		$userid=$this->session->user_id;
		$data = array(
			'cus_id'=> $userid,
			'veh_no' => $this->input->post('veh_no'),
			'reservation_date' => $this->input->post('res_date'),
			'add_date' => date("Y/m/d"),
			'title' => $this->input->post('title')
		);
		$this->customerDashboard_model->addReservation($data);
		$this->session->set_flashdata('reservation_success','Reservation Added Successfully!');
		redirect('index.php/customer/reserveService');
	}

	public function Reschedule(){
		$this->load->model("customerDashboard_model");
		$id= $this->input->post('id');
		$data=array(
			'title'=>$this->input->post('title'),
			'reservation_date' => $this->input->post('re_date')
		);
		$this->customerDashboard_model->RescheduleRes($id,$data);
		$this->session->set_flashdata('reschedule_success','Rescheduled Successfully!');
		redirect('index.php/customer/reserveService');
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