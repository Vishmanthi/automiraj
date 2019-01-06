<?php
class ServiceHistory extends CI_Controller{
	public function servicehist(){
		
		$this->load->view('serviceHistory_view');
	}
	public function find_jobcard(){
		$this->load->model("jobCard_model");
		$vehicle=$this->input->post('vehicle');
		$data['jobcard']=$this->jobCard_model->find_jobcard($vehicle);
		$this->load->view('serviceHistory_view',$data);
	}

	
}
?>