<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Accountant_model extends CI_Model{
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
		$this->db->where('name',$name);
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
		$this->db->where('name',$name);
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
}