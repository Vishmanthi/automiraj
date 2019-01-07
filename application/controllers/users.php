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
					'user_id' =>$login[0],
					'username'=>$username,
					'logged_in'=>true,
					'type' =>$login[1]
				);
				$this->session->set_userdata($user_data);
				if($login[1]=='service adviser'){
					$this->session->set_flashdata('login_success','You are now logged in!!');
					redirect('/customers/customer');
				}
				elseif ($login[1]=='customer') {
					$this->session->set_flashdata('login_success','You are now logged in!!');
					redirect('/customer/reserveService');
				}
				elseif ($login[1]=='cashier') {
					$this->session->set_flashdata('login_success','You are now logged in!!');
					redirect('/Cashier/jobcardView');
				}
				elseif ($login[1]=='manager') {
					$this->session->set_flashdata('login_success','You are now logged in!!');
					redirect('/Manager');
				}
				elseif($login[1]=='accountant'){
					$this->session->set_flashdata('login_success','You are now logged in!!');
					redirect('/accountant/dashboard');
				}
				else{
					redirect('welcome');
				}

			}else{
				$this->session->set_flashdata('login_fail','Sorry you are not allowed!!');
				//$this->load->view('home_header');
				//$this->load->view('home');
				redirect('welcome');
			}
		}

	}

	public function resetPassword(){
		if(isset($_POST['email']) && !empty($_POST['email'])){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			if($this->form_validation->run()==FALSE){
				$this->load->view('resetPass_view',array('error'=>'Please enter a valid email address'));
			}else{
				$email=trim($this->input->post('email'));
				$this->load->model('customer_model');
				$result=$this->customer_model->email_exists($email);
				if($result){
					$this->send_reset_password_email($email,$result);
					$this->load->view('view_reset_password_sent',array('email'=>$email));
					//$this->load->view("welcome");

				}else{
					$this->load->view('resetPass_view',array('error'=>'Email Address not registered!!'));
				}
			}
		}else{
			$this->load->view('resetPass_view');
		}
	}

	private function send_reset_password_email($email,$username){
		

 		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'vishmanthifernando@gmail.com',
			'smtp_pass' => 'Vish@1995',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap' => TRUE
);
		$this->load->library('email',$config);
		$email_code=md5($this->config->item('salt').$username);
		$this->email->set_mailtype('html');
		$this->email->from('vishmanthifernando@gmail.com','Auto Miraj');
		$this->email->to($email);
		$this->email->subject('Please reset your password');
		$message="<!DOCTYPE html>
		<html>
		<title>W3.CSS</title>
		<meta name='viewport' content='width=device-width, initial-scale=1>
		<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>
		<body>";
		$message.="<p>Dear ".$username."</p>";
		$message.="<p>We want to help you to reset your password!!Please<strong><a href='".base_url()."users/reset_password_form/".$email."/".$email_code."'>Click here</a></strong> to reset your password</p>";
		$message.="<p>Thank you</p>";
		$message.="<p>The Auto Miraj Team</p>";
		$message.="</body></html>";
		$this->email->message($message);
		$this->email->set_newline("\r\n");
		$this->email->send();
		$this->email->print_debugger();

	}

	public function reset_password_form($email,$email_code){
		if(isset($email,$email_code)){
			$email=trim($email);
			$email_hash=sha1($email.$email_code);
			$this->load->model('customer_model'); 
			$verified=$this->customer_model->verify_reset_password_code($email,$email_code);
			if($verified){
				$this->load->view('updatePass_view',array('email_hash'=>$email_hash,'email_code'=>$email_code,'email'=>$email));

			}else{
				$this->load->view('resetPass_view',array('error'=>'There was a problem with your link.Please click it again or request to reset your password again','email'=>$email));
			}
		}
	}

	public function update_password(){
		if(!isset($_POST['email'],$_POST['email_hash'])||$_POST['email_hash']!==sha1($_POST['email'].$_POST['email_code'])){
			die("Error updating password!!");
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_hash','Email Hash','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|matches[password_conf]');
		$this->form_validation->set_rules('password_conf','Confirmed Password','trim|required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('updatePass_view');
		}else{
			$this->load->model('customer_model');
			$result=$this->customer_model->update_password();
			if($result){
				$this->load->view('updatePassSuccess');
				//redirect("../");
			}else{
				$this->load->view('updatePass_view',array('error'=>'Problem updating your password. Please contact'.$this->config->item('vishmanthifernando@gmail.com')));
			}
		}

	}

	public function resetPass(){
		$this->load->view('resetPass_view');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('welcome');
	}



	

}
?>