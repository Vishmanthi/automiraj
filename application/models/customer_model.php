<?php
class Customer_model extends CI_Model{
	public function login_user($username,$password){
		$this->load->database("");
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where('username',$username);
		

		//$r=$this->db->query('select * from users where username=?',$username);

		$result = $this->db->get();
		//$row = $r->row();
		if($result->num_rows() > 0){
			$userType=$result->row(0)->type;
			$db_password=$result->row(0)->password;
			$nicNo=$result->row(0)->id;
			$arr = array($nicNo,$userType);
			if(password_verify($password,$db_password)&&(($userType=='service adviser')||($userType=='customer')||($userType=='cashier')||($userType=='manager'))){
				return $arr;
				//return true;
			}
			else{
				return false;
			}
		}else{
			return false;
		}
		
          
		//$db_password=$row->password;
		//$db_password=$result->row(0)->password;
		//if(($result->num_rows() > 0) && password_verify($password,$db_password)){
			//return $result->row(0)->id;
			//return true;
		//}else{
			//return false;
		//}


	}
	public function create_customer(){
		$this->load->database("");
		$data=array(
			'title'=>$this->input->post('title'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'nic'=>$this->input->post('nic'),
			'phone'=>$this->input->post('phone'),
			//'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address')
			// 'username'=>$this->input->post(),
			// 'password'=>$encripted_pass
		);
		$insert_data=$this->db->insert('customer',$data);
		$this->db->where('nic',$this->input->post('nic'));
		//$result=$this->db->get('customer');
		$id=$this->db->get('customer')->row(0)->id;
		$encripted_pass=password_hash($this->input->post('password'),PASSWORD_BCRYPT);
		$d2=array(
			'id'=>$id,
			'username'=>$this->input->post('first_name'),
			'password'=>$encripted_pass,
			'type'=>'customer',
			'email'=>$this->input->post('email')
		);
		$insert_data2=$this->db->insert('users',$d2);
		if($insert_data && $insert_data2){
			return true;
		}else{
			return false;
		}
	}

	public function email_exists($email){
		$sql="SELECT username, email FROM users WHERE email='{$email}' LIMIT 1";
		$result=$this->db->query($sql);
		$row=$result->row();
		return ($result->num_rows()===1 && $row->email) ? $row->username:false;
	}

	public function verify_reset_password_code($email,$code){
		$sql="SELECT username, email FROM users WHERE email='{$email}' LIMIT 1";
		$result=$this->db->query($sql);
		$row=$result->row();
		if($result->num_rows()===1){
			return ($code==md5($this->config->item('salt').$row->username))?true:false;
		}else{
			return false;
		}
	}

	public function update_password(){
		$email=$this->input->post('email');
		$password=password_hash($this->input->post('password'),PASSWORD_BCRYPT);
		$sql="UPDATE users SET password='{$password}' WHERE email='{$email}' LIMIT 1";
		$this->db->query($sql);
		if($this->db->affected_rows()===1){
			return true;
		}else{
			return false;
		}
	}
 
	public function find_customer(){
		$this->load->database("");
		$this->db->where('nic',$this->input->post('nic'));
		$r=$this->db->get('customer');
		return $r->result();
	}
	
}
 
?>