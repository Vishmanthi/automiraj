<?php
class JobCard extends CI_Controller{
	public function job(){
		$this->load->model("model");
		$a['service']=$this->model->get_data();
		$a['spare']=$this->model->get_spareData();
		$a['spare_brand']=$this->model->get_spareBrandDetails();
		$this->load->view('jobCard_view',$a);
	}

	public function genJobcard(){
		$this->load->model('jobCard_model');
		//echo $this->jobCard_model->addJobCard ();
		// if($this->jobCard_model->addJobCard ()->db->error()){
		// 	//$this->session->set_flashdata('job_success','Added jobcard successfully!!'); 
		// 	$this->session->set_flashdata('job_failure','Sorry!! The jobcard no already exists!!'); 
		// 	redirect('Jobcard');
		// }
		// else{
		// 	$this->session->set_flashdata('job_success','Added jobcard successfully!!'); 
		// 	redirect('Jobcard');
		// }



		//echo $this->jobCard_model->addJobCard ();
		if($this->jobCard_model->addJobCard ()){
			$this->session->set_flashdata('job_success','Added jobcard successfully!!'); 
		}
		else{
			$this->session->set_flashdata('job_failure','Sorry!! The jobcard no already exists!!'); 
			redirect('JobCard/job');
			//$this->load->view('jobcard_view');
		}
		$this->load->model("model");
		$a['service']=$this->model->get_data();
		$a['spare']=$this->model->get_spareData();
		$a['spare_brand']=$this->model->get_spareBrandDetails();
		$this->load->view('jobCard_view',$a);
	}

	
	
}
?>