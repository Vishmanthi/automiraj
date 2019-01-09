<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Accountant_model extends CI_Model{
	function __construct() {
        parent::__construct();
        $this->load->database("");
    }
	public function add_stock($info,$qty){
		$this->load->database("");
		$insert_data=$this->db->insert('stock', $info);
		$this->db->set('quantity', 'quantity+'.(int)$qty,false);
		$this->db->where('spare_id',$info['item_code']);
		$this->db->where('brand_name',$info['brand']);
		$update=$this->db->update('spares_brand');
		if($insert_data && $update){
			return true;
		}else{
			return false;
		}
	}
	public function search($info){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('spares as s');
		$this->db->join("spares_brand as sb","sb.spare_id=s.spare_id");
		$this->db->where('lower(s.spare_id)',strtolower($info['item_code']));
		$this->db->where('lower(sb.brand_name)',strtolower($info['brand']));
		$result = $this->db->get();
		return $result->result();
		
	}
	public function search_id_brand($str){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('spares_brand');
		$this->db->where('lower(spare_id)',strtolower($str));
		$this->db->or_where('lower(brand_name)',strtolower($str));
		$result = $this->db->get();
		if($result->num_rows() >0){
			return true;
		}
		else{
			return false;
		}
	}
	public function search_id($str){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('spares');
		$this->db->where('lower(spare_id)',strtolower($str));
		$result = $this->db->get();
		if($result->num_rows() >0){
			return true;
		}
		else{
			return false;
		}
	}

	public function searchStock($info){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('stock');
		$this->db->where('lower(item_code)',strtolower($info['item_code']));
		$this->db->where('lower(brand)',strtolower($info['brand']));
		$result = $this->db->get();
		return $result->result();
	}
	public function reorder($reorder,$info){
		$this->load->database("");
		$this->db->set('reorder_level',$reorder);
		$this->db->where('spare_id',$info['item_code']);
		$this->db->where('brand_name',$info['brand']);
		$update=$this->db->update('spares_brand');
		if($update){
			return true;
		}
		else{
			return false;
		}
	}
	public function sellingPrice($selling,$info){
		$this->load->database("");
		$this->db->set('unit_price',$selling);
		$this->db->where('spare_id',$info['item_code']);
		$this->db->where('brand_name',$info['brand']);
		$update=$this->db->update('spares_brand');
		if($update){
			return true;
		}
		else{
			return false;
		}

	}
	public function search_stockid($id){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('stock');
		$this->db->where('id',$id);
		$result = $this->db->get();
		return $result->result();
	}
	public function edit_stock($update,$id,$info,$old){
		$this->load->database("");
		$this->db->where('id',$id);
		$update1=$this->db->update('stock',$update);
		if($old>=$update['quantity_added']){
			$d=(int)$old-(int)$update['quantity_added'];
			$this->db->set('quantity','quantity-'.(int)$d,false);
		}
		else{
			$d=(int)$update['quantity_added']-(int)$old;
			$this->db->set('quantity','quantity+'.(int)$d,false);
		}
		$this->db->where('spare_id',$info['item_code']);
		$this->db->where('brand_name',$info['brand']);
		$update2=$this->db->update('spares_brand');
		if($update1 && $update2){
			return true;
		}
		else{
			return false;
		}
	}
	public function add_supplier($info){
		$this->load->database("");
		$insert_data=$this->db->insert('supplier', $info);
		if($insert_data){
			return true;
		}
		else{
			return false;
		}
	}
	public function search_supplier1($id){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('supplier');
		$this->db->where('id',$id);
		$result = $this->db->get();
		return $result->result();
	}
	public function search_supplier2($name){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('supplier');
		$this->db->where('lower(name)',strtolower($name));
		$result = $this->db->get();
		return $result->result();
	}
	public function update_supplier1($info,$id){
		$this->load->database("");
		$this->db->where('id',$id);
		$update=$this->db->update('supplier',$info);
		if($update){
			return true;
		}
		else{
			return false;
		}

	}
	public function update_supplier2($info,$name){
		$this->load->database("");
		$this->db->where('lower(name)',strtolower($name));
		$update=$this->db->update('supplier',$info);
		if($update){
			return true;
		}
		else{
			return false;
		}

	}
	public function all_supplier(){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('supplier');
		$result = $this->db->get();
		return $result->result();
	}
	public function supplier_stock1($id){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('stock');
		$this->db->where('supplier_id',$id);
		$result = $this->db->get();
		return $result->result();
	}
	public function supplier_stock2($name){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('stock as s');
		$this->db->join("supplier as su","su.id=s.supplier_id");
		$this->db->where('su.name',$name);
		$result = $this->db->get();
		return $result->result();
	}
	public function reorder_level(){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('spares_brand');
		$this->db->where('quantity<=','reorder_level',false);
		$result = $this->db->get();
		return $result->result();
	}
	public function reorder_count(){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from('spares_brand');
		$this->db->where('quantity<=','reorder_level',false);
		$result = $this->db->get();
		return $result->num_rows();
	}
	public function add_item($info){
		$insert=$this->db->insert("spares",$info);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	public function add_brand($info){
		$insert=$this->db->insert("spares_brand",$info);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	public function all_item(){
		$this->db->select("*");
		$this->db->from('spares as s');
		$this->db->join("spares_brand as sb","sb.spare_id=s.spare_id");
		$result = $this->db->get();
		return $result->result();
	}
	public function daily_report($date){
		$this->db->select("js.spare_id,js.brand,SUM(js.qty) as Quantity_Used");
		$this->db->from('jobcard as j');
		$this->db->join("jobcard_spare as js","js.job_id=j.job_id");
		$this->db->where('j.date',$date);
		$this->db->group_by(array("js.spare_id", "js.brand"));
		$result = $this->db->get();
		return $result->result();
	}
	public function monthly_report($date){
		$datem=date('Y-m-d', strtotime('-30 days',strtotime($date)));
		$this->db->select("js.spare_id,js.brand,SUM(qty) as Quantity_Used");
		$this->db->from('jobcard as j');
		$this->db->join("jobcard_spare as js","js.job_id=j.job_id");
		$this->db->where("j.date >=",$datem);
		$this->db->where("j.date <=",$date);
		$this->db->group_by(array("spare_id", "brand"));
		$result = $this->db->get();
		return $result->result();
	}
	public function inventory_reportD($date){
		$daily=$this->accountant_model->daily_report($date);
		$output='<!DOCTYPE html>
        <html>
        <head>
            <title>Cashier dashboard</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <style>
            .dblUnderlined { border-bottom: 3px double; }
            </style>
        </head>
        <body>';
        $output.='<div class="text-center"><h2>Daily Inventory Usage</h2></div><br><br><div class="row"><div class="text-left"><h5>Date:'.$date.'</h5></div>
        </div><br><label style="margin-bottom: 12px;"><b>Items</b></label>
        <div style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
            <div style="margin-bottom: 19px;float:left;"></div>
            <div style="float: right;margin-bottom: 19px;"></div>
            <table class="table">
                <tr>
          <th scope="col">Item Code</th>
          <th scope="col">Brand Name</th>
          <th scope="col">Quantity Used</th>
          
                </tr><tbody>';
                foreach($daily as $s){
					$output.='	
                    <tr>
                      <td>'.$s->spare_id .'</td>
                      <td>'.$s->brand.'</td>
                      <td>'. $s->Quantity_Used.'</td>
                      
                    </tr>';
                   }
                $output.='</tbody></table></div>';
                
               
                
               
                $output.='</body></html>';
                return $output;
	}
	public function inventory_reportM($date){
		$monthly=$this->accountant_model->monthly_report($date);
		$datem=date('Y-m-d', strtotime('-30 days',strtotime($date)));
		$output='<!DOCTYPE html>
        <html>
        <head>
            <title>Cashier dashboard</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <style>
            .dblUnderlined { border-bottom: 3px double; }
            </style>
        </head>
        <body>';
        $output.='<div class="text-center"><h2>Monthly Inventory Usage</h2></div><br><br><div class="row"><div class="text-left"><h5>Date: From '.$datem.' to '.$date.'</h5></div>
        </div><br><label style="margin-bottom: 12px;"><b>Items</b></label>
        <div style="padding: 15px 20px 15px 10px;border: 1px solid lightgrey;border-radius: 3px;background-color:white;">
            <div style="margin-bottom: 19px;float:left;"></div>
            <div style="float: right;margin-bottom: 19px;"></div>
            <table class="table">
                <tr>
          <th scope="col">Item Code</th>
          <th scope="col">Brand Name</th>
          <th scope="col">Quantity Used</th>
                </tr><tbody>';
                foreach($monthly as $s){
					$output.='	
                    <tr>
                      <td>'.$s->spare_id .'</td>
                      <td>'.$s->brand.'</td>
                      <td>'. $s->Quantity_Used.'</td>
                     
                    </tr>';
                   }
                $output.='</tbody></table></div>';
                
               
                
               
                $output.='</body></html>';
                return $output;
	}

}