<?php

class Cashier extends CI_Controller {
	public function index(){
		// $this->load->model("model");
		// $a['service']=$this->model->get_data();
		// $a['spare']=$this->model->get_spareData();
		// $a['spare_brand']=$this->model->get_spareBrandDetails();
		// $this->load->view('cashier_dashboard',$a);
	}

	public function jobcardView(){
		$this->load->model("model");
		$a['service']=$this->model->get_data();
		$a['spare']=$this->model->get_spareData();
		$a['spare_brand']=$this->model->get_spareBrandDetails();
		$this->load->view('cashier_dashboard',$a);
	}
 
	public function searchJobCard($jid=0){
		$jobid=$this->input->post('jobcardno');
		$this->session->set_flashdata('jobid',$jobid);
		if(isset($jobid)||$jid){
			if($jid){
				$jobid=$jid;
			}
			$this->load->model('Cashier_model');
			$data['jobid']=$jobid;
			$data['vehno']=$this->Cashier_model->getVehicleNo($jobid);
			$data['services']=$this->Cashier_model->getJobService($jobid);
			$data['spares']=$this->Cashier_model->getJobSpare($jobid);
			$this->load->view('cashier_dashboard',$data);
		}
		
	}

	public function genPDFInvoice(){
		$jobid=$this->input->post('jobcardno');
		$this->load->model('Cashier_model');
		$html_content=$this->Cashier_model->getJobDetails($jobid);
        // $obj_pdf=new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF_8',false);
        // $obj_pdf->SetCreator(PDF_CREATOR);
        // $obj_pdf->SetTitle("Invoice");
        // $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
        // $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        // $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
        // $obj_pdf->SetDefaultMonospacedFont('helvetica');
        // $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
        // $obj_pdf->setPrintHeader(false);
        // $obj_pdf->setPrintFooter(false);
        // $obj_pdf->setAutoPageBreak(TRUE,10);
        // $obj_pdf->setFont('helvetica','',12);

        // $content='iii';
        // $obj_pdf->writeHTML($content);
        // ob_clean();
        // $obj_pdf->Output("sample.pdf","I");
        $this->pdf->loadHtml($html_content);
        $this->pdf->render();
        $this->pdf->stream("invoice.pdf",array("Attachment"=>0));
    }

	public function updateDisc(){
		try{
		    $jobid=$this->input->post('jid');
			$sid=$this->input->post('sid');
			$disc=$this->input->post('discount');
			$this->session->set_flashdata('update_success','Added discount successfully!!'); 
			$this->load->model('Cashier_model');
			$this->Cashier_model->updateDiscount($jobid,$sid,$disc);
			//$jid=$this->session->flashdata('jobid');
			redirect('Cashier/searchJobCard/'.$jobid);
			// if($this->session->flashdata('jobid')){
			// 	$this->load->model('Cashier_model');
			// 	$data['jobid']=$this->session->flashdata('jobid');
			// 	$data['services']=$this->Cashier_model->getJobService($this->session->flashdata('jobid'));
			// 	$data['spares']=$this->Cashier_model->getJobSpare($this->session->flashdata('jobid'));
			// 	$this->load->view('cashier_dashboard',$data);
			// }
		}catch(Exception $e){
			$e;
		}
		// $jobid=$this->input->post('jid');
		//  $sid=$this->input->post('sid');
		//  $disc=$this->input->post('d'.$sid);
		// $this->load->model('Cashier_model');
		// $this->Cashier_model->updateDiscount($jobid,$sid,$disc);
		//redirect("Cashier/searchJobCard");  
	}


}

?>