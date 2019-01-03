<?php
class Manager extends CI_Controller {
	public function index(){
		
		 $this->load->view('manager_dashboard'); 
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
    foreach($r1 as $r){
        $da1[$r->service_id] = $r->rev;
    }
    $da1['date']=$day1;
    $da2=array();
    $da2['b001']=0;
    $da2['e001']=0;
    $da2['in001']=0;
    $da2['ex001']=0;
    foreach($r2 as $r){
        $da2[$r->service_id] = $r->rev;
    }
    $da2['date']=$day2;
    $da3=array();
    $da3['b001']=0;
    $da3['e001']=0;
    $da3['in001']=0;
    $da3['ex001']=0;
    foreach($r3 as $r){
        $da3[$r->service_id] = $r->rev;
    }
    $da3['date']=$day3;
    $da4=array();
    $da4['b001']=0;
    $da4['e001']=0;
    $da4['in001']=0;
    $da4['ex001']=0;
    foreach($r4 as $r){
        $da4[$r->service_id] = $r->rev;
    }
    $da4['date']=$day4;
    $da5=array();
    $da5['b001']=0;
    $da5['e001']=0;
    $da5['in001']=0;
    $da5['ex001']=0;
    foreach($r5 as $r){
        $da5[$r->service_id] = $r->rev;
    }
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
}

?>