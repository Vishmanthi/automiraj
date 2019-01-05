<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('home');
		$this->load->view('home_header');
	}
	public function log()
	{
		$this->load->view('login');
	}
	public function customer(){
		$this->load->view('home');
		$this->load->view('customer_header2');
	}
	public function feed(){
		$info=array(
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'message'=>$this->input->post('message')
		);
		$this->load->model('model');
		$this->model->feed($info);
		redirect('welcome');
	}
}
