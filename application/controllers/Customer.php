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
	public function reserveService(){
		$this->load->view('customer_reserveService'); 
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

}
?>