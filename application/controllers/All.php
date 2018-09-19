<?php

class All extends CI_Controller{
	public function index(){
		//$data['main_view']="addCustomer_view";
		
		
	}
	public function customer(){
		$this->load->view('addCustomer_view');
		
		
	}
}
?>