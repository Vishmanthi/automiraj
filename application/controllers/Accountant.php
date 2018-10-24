<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accountant extends CI_Controller {
	
	public function manage_inventory(){
		$this->load->view("accountant_inventory");
	}
	public function manage_supplier(){
		$this->load->view("accountant_supplier");
	}
}

?>