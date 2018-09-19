<?php

class Users extends CI_Controller{
	public function login(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[1]');
		// echo $this->input->post('username');
		if($this->form_validation->run()==FALSE){
			$data=array(
				'errors'=>validation_errors()
			);
			$this->session->set_flashdata($data);
				redirect('Welcome/log');
		}else{
			$this->load->model('customer_model');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$login=$this->customer_model->login_user($username,$password);
			if($login){
				$user_data=array(
					'user_id'=>$login,
					'username'=>$username,
					'logged_in'=>true
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success','You are now logged in!!');
				redirect('customers');
			}else{
				$this->session->set_flashdata('login_fail','Sorry you are not allowed!!');
				redirect('Welcome');
			}
		}

	}

	

}
?>