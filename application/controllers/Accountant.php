<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
class Accountant extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('accountant_model');
        $this->load->library('pdf');
    }
	public function dashboard(){
		$data['count']=$this->accountant_model->reorder_count();
		$data['reorder']=$this->accountant_model->reorder_level();
		$this->load->view('accountant_dashboard',$data);
	}
	public function manage_inventory(){
		$this->load->view('accountant_inventory');
	}
	public function manage_supplier(){
		
		$data['supplierData']=$this->accountant_model->all_supplier();
		$this->load->view("accountant_supplier",$data);
	}
	public function add_new(){
		$data['item']=$this->accountant_model->all_item();
		$this->load->view("accountant_addItem",$data);
	}
	public function manage_report(){
		$this->load->view("accountant_report");
	}
	public function add_stock(){
		$info=array(
			'date' => $this->input->post('date'), 
			'item_code'=>$this->input->post('item_code'),
			'brand'=>$this->input->post('brand'),
			'quantity_added' => $this->input->post('qty'),
			'purchase_price' => $this->input->post('p_price'),
			'supplier_id' => $this->input->post('supp_name')
		);
		$qty=$this->input->post('qty');
		
		$this->form_validation->set_rules('item_code', 'Item code', 'required');
		$this->form_validation->set_rules('brand', 'Brand name', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');
		$this->form_validation->set_rules('p_price', 'Purchase price', 'required');
		$this->form_validation->set_rules('supp_name', 'Supplier ID', 'required');
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
		$data['supplierData']=$this->accountant_model->all_supplier();
		$this->load->view("accountant_supplier",$data);
	}
	public function search_supplier(){
		
		$id=$this->input->post('s_id');
		$name=$this->input->post('s_name');
		if($id!=''){
			$this->form_validation->set_rules('s_id', 'Supplier ID', 'callback_supplier_check1');
			if ($this->form_validation->run() == true){
				$data['supplier']=$this->accountant_model->search_supplier1($id);
				$data['supstockData']=$this->accountant_model->supplier_stock1($id);
			}
		}
		else if($name!=''){
			$this->form_validation->set_rules('s_name', 'Supplier name', 'callback_supplier_check2');
			if ($this->form_validation->run() == true){
				$data['supplier']=$this->accountant_model->search_supplier2($name);
				$data['supstockData']=$this->accountant_model->supplier_stock2($name);
			}
		}
		$data['supplierData']=$this->accountant_model->all_supplier();
		$this->load->view('accountant_supplier',$data);
		
		
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
		
		$info=array(
			'no'=>$this->input->post('no'),
			'lane1'=>$this->input->post('lane1'),
			'lane2'=>$this->input->post('lane2'),
			'city'=>$this->input->post('city'),
			'phone'=>$this->input->post('phone'),
			'fax'=>$this->input->post('fax'),
			'email'=>$this->input->post('email')
		);
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
		if($this->input->post('s_name')!=''){
			$name=$this->input->post('s_name');
			if ($this->form_validation->run() == true){
				if($this->accountant_model->update_supplier2($info,$name)){
					$this->session->set_flashdata('supUpsuc', "Supplier updated Successfully!");
				}
				else{
					$this->session->set_flashdata('supUperr', "Error");
				}
			

			}
			else{
				$data['supplier']=$this->accountant_model->search_supplier2($name);
				$data['name']=$name;
				$data['supstockData']=$this->accountant_model->supplier_stock2($name);
			}
			$data['supplierData']=$this->accountant_model->all_supplier();
			$this->load->view('accountant_supplier',$data);
			
		}
		else{
			$id=$this->input->post('s_id');
			if ($this->form_validation->run() == true){
				if($this->accountant_model->update_supplier1($info,$id)){
					$this->session->set_flashdata('supUpsuc', "Supplier updated Successfully!");
				}
				else{
					$this->session->set_flashdata('supUperr', "Error");
				}
				
			}
			else{
				$data['supplier']=$this->accountant_model->search_supplier1($id);
				$data['id']=$id;
				$data['supstockData']=$this->accountant_model->supplier_stock1($id);
			}
			$data['supplierData']=$this->accountant_model->all_supplier();
			$this->load->view('accountant_supplier',$data);
		}
		
	}
	public function add_item(){
		$this->form_validation->set_rules('itemcode', 'Item Code', 'required');
		$this->form_validation->set_rules('itemname', 'Item Name', 'required');
		$this->form_validation->set_message('required', 'Required');
		if ($this->form_validation->run() == true){
			$info=array(
				'spare_id'=>$this->input->post('itemcode'),
				'name'=>$this->input->post('itemname')
			);
			if($this->accountant_model->add_item($info)){
				$this->session->set_flashdata('addsuc', "Item added Successfully!");
			}
			else{
				$this->session->set_flashdata('adderr', "Error!");
			}
		}
		$data['item']=$this->accountant_model->all_item();
		$this->load->view("accountant_addItem",$data);
	}
	public function itemcode_check($str){
		
		$r=$this->accountant_model->search_id($str);
		if($r==false){
			$this->form_validation->set_message('itemcode_check', 'Invalid {field}');
			return false;
		}
		else{
			return true;
		}

	}
	public function add_brand(){
		$this->form_validation->set_rules('item_code', 'Item Code', 'required|callback_itemcode_check');
		$this->form_validation->set_rules('reorder', 'Reorder Level', 'required');
		$this->form_validation->set_rules('sprice', 'Selling Price', 'required');
		$this->form_validation->set_message('required', 'Required');
		if ($this->form_validation->run() == true){
			$info=array(
				'spare_id'=>$this->input->post('item_code'),
				'brand_name'=>$this->input->post('brand'),
				'unit_price'=>$this->input->post('sprice'),
				'quantity'=>0,
				'reorder_level'=>$this->input->post('reorder')
			);
			if($this->accountant_model->add_brand($info)){
				$this->session->set_flashdata('addBsuc', "Brand added Successfully!");
			}
			else{
				$this->session->set_flashdata('addBerr', "Error!");
			}
		}
		$data['item']=$this->accountant_model->all_item();
		$this->load->view("accountant_addItem",$data);
	}
	public function inventory_report(){
		$this->load->library('pdf');
		$basis=$this->input->post('basis');
		$date=$this->input->post('date');
		if($basis=='day'){
			$data['usage']=$this->accountant_model->inventory_reportD($date);
			$html_content=$this->accountant_model->inventory_reportD($date);
			$this->pdf->loadHtml($html_content);
	        $this->pdf->render();
	        $this->pdf->stream("InventoryUsageDaily($date).pdf",array("Attachment"=>0));
		}
		else if($basis=='month'){
			$data['usage']=$this->accountant_model->inventory_reportM($date);
			$html_content=$this->accountant_model->inventory_reportM($date);
			$this->pdf->loadHtml($html_content);
	        $this->pdf->render();
	        $this->pdf->stream("InventoryUsageMonthly(To $date).pdf",array("Attachment"=>0));
		}
		$this->load->view("accountant_report",$data);
	}
}

?>