<?php

class Cashier extends CI_Controller {
	public function index(){
		$this->load->model("model");
		$a['service']=$this->model->get_data();
		$a['spare']=$this->model->get_spareData();
		$a['spare_brand']=$this->model->get_spareBrandDetails();
		$this->load->view('cashier_dashboard',$a);
	}

	public function searchJobCard(){
		$jobid=$this->input->post('jobcardno');
		$this->load->model('Cashier_model');
		$data['services']=$this->Cashier_model->getJobService($jobid);
		$data['spares']=$this->Cashier_model->getJobSpare($jobid);
		$this->load->view('cashier_dashboard',$data);
	}

}

?>