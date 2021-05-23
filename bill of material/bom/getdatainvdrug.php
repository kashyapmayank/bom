<?php include 'functions.php'; 
session_start();//session starts here
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

$invoice		= $data->invoice;
$data= GetInvoiceDrugData($invoice);
echo json_encode($data);
	
?>