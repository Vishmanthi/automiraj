<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
class Accountant extends CI_Controller {
	
	public function manage_inventory(){
		$this->load->view('accountant_inventory');
	}
	public function manage_supplier(){
		$this->load->model('accountant_model');
		$data['supplierData']=$this->accountant_model->all_supplier();
		$this->load->view("accountant_supplier",$data);
	}
	public function add_new(){
		$this->load->view("accountant_addItem");
	}
	public function add_stock(){
		$info=array(
			'date' => $this->input->post('date'), 
			'item_code'=>$this->input->post('item_code'),
			'brand'=>$this->input->post('brand'),
			'quantity_added' => $this->input->post('qty'),
			'purchase_price' => $this->input->post('p_price'),
			'supplier_name' => $this->input->post('supp_name')
		);
		$qty=$this->input->post('qty');
		$this->load->model('accountant_model');
		$this->form_validation->set_rules('item_code', 'Item code', 'required');
		$this->form_validation->set_rules('brand', 'Brand name', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');
		$this->form_validation->set_rules('p_price', 'Purchase price', 'required');
		$this->form_validation->set_rules('supp_name', 'Supplier name', 'required');
		$this->form_validation->set_message('required', 'Required');
		if ($this->form_validation->run() == true){
			if($this->accountant_model->add_stock($info,$qty)){
				$this->session->set_flashdata('success', "Stock added Succesfully!");
				
			}
			else{
				$this->session->set_flashdata('error', "Error");
				
			}
			
		}
		$data['searchData']=$this->accountant_model->search($info);
		$data['searchStock']=$this->accountant_model->searchStock($info);
		$data['id']=$info['item_code'];
		$data['brand']=$info['brand'];
		$this->load->view('accountant_inventory',$data);
	}

	public function accountant_search(){
		$info=array(
			'item_code' =>$this->input->post('item_code') , 
			'brand' =>$this->input->post('brand')
		);
		$this->load->model('accountant_model');
		$this->form_validation->set_rules('item_code', 'Item code', 'required|callback_item_check');
		$this->form_validation->set_rules('brand', 'Brand name', 'callback_item_check');
		$this->form_validation->set_message('required', 'Required');
		if ($this->form_validation->run() == false){
			$this->load->view('accountant_inventory');
		}
		else{
			
			$data['searchData']=$this->accountant_model->search($info);
			$data['searchStock']=$this->accountant_model->searchStock($info);
			$this->load->view('accountant_inventory',$data);

		}
	}
	public function item_check($str){
		
		$r=$this->accountant_model->search_id_brand($str);
		if($r==false){
			$this->form_validation->set_message('item_check', 'Invalid {field}');
			return false;
		}
		else{
			return true;
		}

	}
	public function reorder_level(){
		$this->load->model('accountant_model');
		$reorder=$this->input->post('reorder');
		$info=array(
			'item_code'=>$this->input->post('item_code'),
			'brand'=>$this->input->post('brand')
		);
		$this->form_validation->set_rules('item_code', 'Item code', 'required');
		$this->form_validation->set_rules('brand', 'Brand name', 'required');
		$this->form_validation->set_rules('reorder', 'Reorder level', 'required');
		$this->form_validation->set_message('required', 'Required');
		if ($this->form_validation->run() == true){
			$this->accountant_model->reorder($reorder,$info);
		}
		$data['searchData']=$this->accountant_model->search($info);
		$data['searchStock']=$this->accountant_model->searchStock($info);
		$data['id']=$info['item_code'];
		$data['brand']=$info['brand'];
		$this->load->view('accountant_inventory',$data);

	}
	public function sellingPrice(){
		$this->load->model('accountant_model');
		$info=array(
			'item_code'=>$this->input->post('item_code'),
			'brand'=>$this->input->post('brand')
		);
		$selling=$this->input->post('selling');
		$this->form_validation->set_rules('item_code', 'Item code', 'required');
		$this->form_validation->set_rules('brand', 'Brand name', 'required');
		$this->form_validation->set_rules('selling', 'Selling price', 'required');
		$this->form_validation->set_message('required', 'Required');
		if ($this->form_validation->run() == true){
			$this->accountant_model->sellingPrice($selling,$info);
		}
		
		$data['searchData']=$this->accountant_model->search($info);
		$data['searchStock']=$this->accountant_model->searchStock($info);
		$data['id']=$info['item_code'];
		$data['brand']=$info['brand'];
		$this->load->view('accountant_inventory',$data);
		
	}
	public function search_stockid(){
		$this->load->model('accountant_model');
		$id=$this->input->post('stockid');
		$info=array(
			'item_code'=>$this->input->post('item_code'),
			'brand'=>$this->input->post('brand')
		);
		$this->form_validation->set_rules('stockid', 'Stock ID', 'required');
		$this->form_validation->set_message('required', 'Required');
		if ($this->form_validation->run() == true){
			$data['stockData']=$this->accountant_model->search_stockid($id);
			$data['stockid']=$id;
		}
		$data['searchData']=$this->accountant_model->search($info);
		$data['searchStock']=$this->accountant_model->searchStock($info);
		$data['id']=$info['item_code'];
		$data['brand']=$info['brand'];
		$this->load->view('accountant_inventory',$data);
		
	}
	public function edit_stock(){
		$this->load->model('accountant_model');
		$info=array(
			'item_code'=>$this->input->post('item_code'),
			'brand'=>$this->input->post('brand')
		);
		$id=$this->input->post('edid');
		$update=array(
			'quantity_added'=>$this->input->post('qty'),
			'purchase_price'=>$this->input->post('p_price'),
			'supplier_name'=>$this->input->post('supp_name')
		);
		$old=$this->input->post('oldq');
		if($this->accountant_model->edit_stock($update,$id,$info,$old)){
			$this->session->set_flashdata('s_edit', "Stock updated Succesfully!");
		}
		else{
			$this->session->set_flashdata('e_edit', "Error");
		}
		$data['searchData']=$this->accountant_model->search($info);
		$data['searchStock']=$this->accountant_model->searchStock($info);
		$data['id']=$info['item_code'];
		$data['brand']=$info['brand'];
		$this->load->view('accountant_inventory',$data);
	}

	public function add_supplier(){
		$this->load->model('accountant_model');
		$info=array(
			'name'=>$this->input->post('sname'),
			'no'=>$this->input->post('no1'),
			'lane1'=>$this->input->post('lane11'),
			'lane2'=>$this->input->post('lane21'),
			'city'=>$this->input->post('city1'),
			'phone'=>$this->input->post('phone1'),
			'fax'=>$this->input->post('fax1'),
			'email'=>$this->input->post('email1'),
		);
		$this->form_validation->set_rules('sname', 'Supplier name', 'required');
		$this->form_validation->set_rules('no1', 'Number', 'required');
		$this->form_validation->set_rules('lane11', 'Lane 1', 'required');
		$this->form_validation->set_rules('city1', 'City', 'required');
		$this->form_validation->set_rules('phone1', 'Phone', 'required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('fax1', 'Fax', 'min_length[10]|max_length[10]');
		$this->form_validation->set_rules('email1', 'Email', 'trim|valid_email');
		$this->form_validation->set_message('required', 'Required');
		$this->form_validation->set_message('min_length', 'minimum {param}');
		$this->form_validation->set_message('max_length', 'maximum {param}');
		$this->form_validation->set_message('valid_email', 'Invalid email');
		if ($this->form_validation->run() == true){
			if($this->accountant_model->add_supplier($info)){
				$this->session->set_flashdata('sup_succ', "Supplier added Succesfully!");
			}
			else{
				$this->session->set_flashdata('sup_err', "Error");
			}
		}
		$this->load->view("accountant_supplier");
	}
	public function search_supplier(){
		$this->load->model('accountant_model');
		$id=$this->input->post('s_id');
		$name=$this->input->post('s_name');
		if($id!=''){
			$this->form_validation->set_rules('s_id', 'Supplier ID', 'callback_supplier_check1');
			if ($this->form_validation->run() == true){
				$data['supplier']=$this->accountant_model->search_supplier1($id);
				$this->load->view('accountant_supplier',$data);
			}
			else{
				$this->load->view('accountant_supplier');
			}
		}
		else if($name!=''){
			$this->form_validation->set_rules('s_name', 'Supplier name', 'callback_supplier_check2');
			if ($this->form_validation->run() == true){
				$data['supplier']=$this->accountant_model->search_supplier2($name);
				$this->load->view('accountant_supplier',$data);
			}
			else{
				$this->load->view('accountant_supplier');
			}
		}
		else{
			$this->load->view('accountant_supplier');
		}
		
		
	}
	public function supplier_check1($id){
		
		$r=$this->accountant_model->search_supplier1($id);
		if($r==false){
			$this->form_validation->set_message('supplier_check1', 'Invalid {field}');
			return false;
		}
		else{
			return true;
		}

	}
	public function supplier_check2($name){
		
		$r=$this->accountant_model->search_supplier2($name);
		if($r==false){
			$this->form_validation->set_message('supplier_check2', 'Invalid name');
			return false;
		}
		else{
			return true;
		}

	}
	public function update_supplier(){
		$this->load->model('accountant_model');
		$info=array(
			'no'=>$this->input->post('no'),
			'lane1'=>$this->input->post('lane1'),
			'lane2'=>$this->input->post('lane2'),
			'city'=>$this->input->post('city'),
			'phone'=>$this->input->post('phone'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email')
		);
		
		if($this->input->post('s_name')!=''){
			$name=$this->input->post('s_name');
			$this->form_validation->set_rules('no', 'Number', 'required');
			$this->form_validation->set_rules('lane1', 'Lane 1', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('fax', 'Fax', 'min_length[10]|max_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_message('min_length', 'minimum {param}');
			$this->form_validation->set_message('max_length', 'maximum {param}');
			$this->form_validation->set_message('valid_email', 'Invalid email');
			$this->form_validation->set_message('required', 'Required');
			if ($this->form_validation->run() == true){
				if($this->accountant_model->update_supplier2($info,$name)){
					$this->session->set_flashdata('supUpsuc', "Supplier updated Successfully!");
				}
				else{
					$this->session->set_flashdata('supUperr', "Error");
				}
				$this->load->view('accountant_supplier');

			}
			else{
				$data['supplier']=$this->accountant_model->search_supplier2($name);
				$data['name']=$name;
				$this->load->view('accountant_supplier',$data);
			}
			
		}
		else{
			$id=$this->input->post('s_id');
			$this->form_validation->set_rules('no', 'Number', 'required');
			$this->form_validation->set_rules('lane1', 'Lane 1', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('fax', 'Fax', 'min_length[10]|max_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_message('min_length', 'minimum {param}');
			$this->form_validation->set_message('max_length', 'maximum {param}');
			$this->form_validation->set_message('valid_email', 'Invalid email');
			$this->form_validation->set_message('required', 'Required');
			if ($this->form_validation->run() == true){
				if($this->accountant_model->update_supplier1($info,$id)){
					$this->session->set_flashdata('supUpsuc', "Supplier updated Successfully!");
				}
				else{
					$this->session->set_flashdata('supUperr', "Error");
				}
				$this->load->view('accountant_supplier');
			}
			else{
				$data['supplier']=$this->accountant_model->search_supplier1($id);
				$data['id']=$id;
				$this->load->view('accountant_supplier',$data);
			}
			
		}
		
	}
}

?>