<?php
class Manager extends CI_Controller {
	public function index(){
		
		 $this->load->view('manager_dashboard'); 
    }

    public function addUser(){
		
        $this->load->view('add_user'); 
   }


    public function dailyServices(){
        $date=$this->input->post("day");
        if(!$date){
            $newDate=date("Y-m-d");
        }else{
            $newDate = date("Y-m-d", strtotime($date));
        }
        
        $this->load->model('Manager_model');
		$data['countSer']=$this->Manager_model->getDailySales($newDate);
        $this->load->view('dailyServices',$data); 
   }

   public function salesAnalysis(){
    //$day1=date('Y-m-d');
    $date=$this->input->post("day");
    $date=$this->input->post("day");
        if(!$date){
            $newDate=date("Y-m-d");
        }else{
            $newDate = date("Y-m-d", strtotime($date));
        }
    $day1=$newDate;
   // $day1='2019-01-01';
    $time = strtotime("$day1 -1 days");
    $day2= date("Y-m-d", $time);
    $time = strtotime("$day2 -1 days");
    $day3= date("Y-m-d", $time);
    $time = strtotime("$day3 -1 days");
    $day4= date("Y-m-d", $time);
    $time = strtotime("$day4 -1 days");
    $day5= date("Y-m-d", $time);
    $this->load->model('Manager_model');
    $data['weeklyRev1']=$this->Manager_model->getWeeklyRevenue($day1);
    $data['weeklyRev2']=$this->Manager_model->getWeeklyRevenue($day2);
    $data['weeklyRev3']=$this->Manager_model->getWeeklyRevenue($day3);
    $data['weeklyRev4']=$this->Manager_model->getWeeklyRevenue($day4);
    $data['weeklyRev5']=$this->Manager_model->getWeeklyRevenue($day5);
    
    $r1=$this->Manager_model->getWeeklyRevenue($day1);
    $r2=$this->Manager_model->getWeeklyRevenue($day2);
    $r3=$this->Manager_model->getWeeklyRevenue($day3);
    $r4=$this->Manager_model->getWeeklyRevenue($day4);
    $r5=$this->Manager_model->getWeeklyRevenue($day5);
   $da1=array();
   $da1['b001']=0;
   $da1['e001']=0;
   $da1['in001']=0;
   $da1['ex001']=0;
   $da1['f001']=0;
   $da1['avg']=0;
    foreach($r1 as $r){
        $da1[$r->service_id] = $r->rev;
        $da1['avg']+=$r->rev;
    }
    $da1['avg']= $da1['avg']/5;
    $da1['date']=$day1;
    $da2=array();
    $da2['b001']=0;
    $da2['e001']=0;
    $da2['in001']=0;
    $da2['ex001']=0;
    $da2['f001']=0;
    $da2['avg']=0;
    foreach($r2 as $r){
        $da2[$r->service_id] = $r->rev;
        $da2['avg']+=$r->rev;
    }
    $da2['avg']= $da2['avg']/5;
    $da2['date']=$day2;
    $da3=array();
    $da3['b001']=0;
    $da3['e001']=0;
    $da3['in001']=0;
    $da3['ex001']=0;
    $da3['f001']=0;
    $da3['avg']=0;
    foreach($r3 as $r){
        $da3[$r->service_id] = $r->rev;
        $da3['avg']+=$r->rev;
    }
    $da3['avg']= $da3['avg']/5;
    $da3['date']=$day3;
    $da4=array();
    $da4['b001']=0;
    $da4['e001']=0;
    $da4['in001']=0;
    $da4['ex001']=0;
    $da4['f001']=0;
    $da4['avg']=0;
    foreach($r4 as $r){
        $da4[$r->service_id] = $r->rev;
        $da4['avg']+=$r->rev;
    }
    $da4['avg']= $da4['avg']/5;
    $da4['date']=$day4;
    $da5=array();
    $da5['b001']=0;
    $da5['e001']=0;
    $da5['in001']=0;
    $da5['ex001']=0;
    $da5['f001']=0;
    $da5['avg']=0;
    foreach($r5 as $r){
        $da5[$r->service_id] = $r->rev;
        $da5['avg']+=$r->rev;
    }
    $da5['avg']= $da1['avg']/5;
    $da5['date']=$day5;
   
    $data['weeklyRev1']=$da1;
    $data['weeklyRev2']=$da2;
    $data['weeklyRev3']=$da3;
    $data['weeklyRev4']=$da4;
    $data['weeklyRev5']=$da5;
    $this->load->view('revenueAnalysis',$data); 
}

public function dailySpares(){
    $date=$this->input->post("day");
    $date=$this->input->post("day");
        if(!$date){
            $newDate=date("Y-m-d");
        }else{
            $newDate = date("Y-m-d", strtotime($date));
        }
    $this->load->model('Manager_model');
    $data['countSer']=$this->Manager_model->getDailySpares($newDate);
    $this->load->view('dailySparesUsage',$data); 
}

public function customercare(){
    $this->load->model('manager_model');
    $data['count']=$this->manager_model->customer_count();
    $data['cus']=$this->manager_model->customercare();
    $this->load->view('manager_cc',$data);
}
public function removeMessage(){
    $this->load->model('manager_model');
    $name=$this->input->post("name");
    $email=$this->input->post("email");
    $message=$this->input->post("message");
    $this->manager_model->removeMessage($name,$email,$message);
    $data['count']=$this->manager_model->customer_count();
    $data['cus']=$this->manager_model->customercare();
    $this->load->view('manager_cc',$data);
}
public function email(){
    $this->load->model('manager_model');
    $to=$this->input->post("to");
    $subject=$this->input->post("subject");
    $message=$this->input->post("message");
    $this->form_validation->set_rules('to', 'To', 'required');
    $this->form_validation->set_rules('message', 'Message', 'required');
    $this->form_validation->set_message('required', 'Required');
    if ($this->form_validation->run() == true){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'sasini.vidarshi14@gmail.com',
            'smtp_pass' => 'sasinisumudu',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        // Set to, from, message, etc.
        $this->email->from('sasini.vidarshi14@gmail.com', 'Manager Automiraj');
        $this->email->to($to); 

        $this->email->subject($subject);
        $this->email->message($message); 

        $result = $this->email->send();
        if($result){
            $this->session->set_flashdata('success', "Email sent Succesfully!");
        }
        else{
            $this->session->set_flashdata('error', "Error occured sending email!");
        }
    }
    $data['count']=$this->manager_model->customer_count();
    $data['cus']=$this->manager_model->customercare();
    $this->load->view('manager_cc',$data);
    

}


public function regUser(){
    // $nic= $this->input->post("nic");
    // $this->valid_nic($nic);
     $this->form_validation->set_rules('firstname','First Name','trim|required');
     $this->form_validation->set_rules('lastname','Last Name','trim|required');
    //$this->form_validation->set_rules('nic','ID Number','trim|required|regex_match[/[0-9]{12}|[0-9]{9}[V]/]');
    $this->form_validation->set_rules('nic','NIC No','trim|required|callback_valid_nic');
    // $this->form_validation->set_rules('phone','Phone Number','trim|required|exact_length[10]');
     $this->form_validation->set_rules('email','Email','trim|required|valid_email');
     $this->form_validation->set_rules('pwd','Password','trim|required');
     $this->form_validation->set_rules('cpwd','Confirm Password','trim|required|matches[pwd]');
    
     if($this->form_validation->run()==False){
        $data=array(
                'errors'=>validation_errors()
                //'nErr' =>$this->valid_nic($nic)
        );
        $this->session->set_flashdata($data);
        redirect('index.php/Manager/addUser');

     }else{
         $this->load->model('Manager_model');
         $this->Manager_model->create_employee();
             //echo "customer created";
             $this->session->set_flashdata('cusReg_success','New employee added!!');
             redirect('index.php/Manager/addUser');
         }
         // }else{
         // 	echo "something wrong";
         // }
        
     } 
     
     public function valid_nic($string)
     {
         if ( preg_match('/([0-9]{9}[V]|[0-9]{12})/', $string)) 
         
         {
            return TRUE;
         }
         else
         {
            $this->form_validation->set_message('valid_nic', 'The NIC No is not in the correct format');
            return FALSE;
         }
     }
     
     
     public function sentPromotions(){
        $this->load->view("addPromotions");

    }
    public function getdataPromotions(){
        $Item= $_POST["Item"];
            $Brand= $_POST["Brand"];
            $Promotion= $_POST["Promotion"];
            $this->load->Model('promotionModel');
            $this->promotionModel->getPromotions($Item,$Brand,$Promotion);
            $this->load->view("addPromotions");
           }
    public function getdataPromotions1(){
        $this->load->Model('promotionModel');
        $result=$this->promotionModel->getData();
        return $result;
    }
    public function loadPromotionSection(){
        $data["list"]=$this->getdataPromotions1();
        $this->load->view("home",$data);
    }
    public function deletPromotion(){
        $Id =$_POST['cord'];
        $this->load->Model('promotionModel');
        $this->promotionModel->deleteData($Id);
        $this->load->view('addPromotions');
        //redirect('../Manager/')
        //$this->load->view("home");
    }


}

?>