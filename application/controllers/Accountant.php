<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accountant extends CI_Controller {
	public function index(){
		$this->load->view("accountant_inventory");
	}
}

?>