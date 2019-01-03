<?php
class JobCard extends CI_Controller{
	public function index(){
		$this->load->model("model");
		$a['service']=$this->model->get_data();
		$a['spare']=$this->model->get_spareData();
		$a['spare_brand']=$this->model->get_spareBrandDetails();
		$this->load->view('jobCard_view',$a);
	}

	public function genJobcard(){
		$this->load->model('jobCard_model');
		 $this->jobCard_model->addJobCard ();
		 redirect('Jobcard');
	}

	
	
}
?>