<?php
class JobCard extends CI_Controller{
	public function index(){
		$this->load->model("model");
		$a['service']=$this->model->get_data();
		$a['spare']=$this->model->get_spareData();
		$this->load->view('jobCard_view',$a);
	}
	
}
?>