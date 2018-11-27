<?php
class Pdf_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('pdf');
    }
    public function genPDFInvoice(){
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
        $this->pdf->loadHtml('Hello');
        $this->pdf->render();
        $this->pdf->stream("abc.pdf",array("Attachment"=>0));
    }
}
?>