<?php
class ServiceHistory extends CI_Controller{
	public function index(){
		$data['main_view']="serviceHistory_view";
		$this->load->view('serviceHistory_view',$data);
	}
	
}
?>