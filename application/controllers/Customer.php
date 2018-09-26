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
		$this->load->view('customer_editProfile'); 
	}
	public function reserveService(){
		$this->load->view('customer_reserveService'); 
	}
	public function serviceHistory(){
		$this->load->view('customer_serviceHistory'); 
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
		
	}

}
?>