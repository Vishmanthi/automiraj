<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);

$context = stream_context_create([ 
	'ssl' => [ 
		'verify_peer' => FALSE, 
		'verify_peer_name' => FALSE,
		'allow_self_signed'=> TRUE 
	] 
]);
$dompdf->setHttpContext($context);
class Pdf extends Dompdf{
    public function __construct(){
        parent::__construct();
       
    }
}
?>