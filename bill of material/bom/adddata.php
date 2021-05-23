<?php include 'functions.php'; 
session_start();//session starts here

$data = json_decode(file_get_contents('php://input'));

// Converts it into a PHP object
//$data = json_decode($json);
$totalmrp=0;
$distributor=$data->distributor;
$invoice	=$data->invoice	;
$rcvddate	=$data->rcvddate	;
$netamount	=$data->ntamt		;
$gsttype	=$data->gstcheck	;
$discnt		=$data->discnt		;
$discntamt	=$data->discntamt	;
if($discnt=="")
{
	$discnt=0;
	$discntamt=0;
}
for($i=0;$i<count($data->brand);$i++)
{
	$prevqty=0;
	$brand		=$data->brand	[$i];
	$type		=$data->type	[$i];
	$molecule	=$data->molecule[$i];
	$expdate	=$data->expdate	[$i];
	$qty		=$data->qty		[$i];
	$freeqty	=$data->freeqty	[$i];
	$mrp		=$data->mrp		[$i];
	$purmrp		=$data->purmrp	[$i];
	$taxper		=$data->taxper	[$i];
	$itemamt	=$data->itemamt	[$i];
	$totalmrp=$totalmrp+(($qty+$freeqty)*$mrp);
	$prevqty=GetPrevqty($invoice,$brand,$type,$molecule);
	//echo $prevqty;
	DeleteDrug($invoice,$brand,$type,$molecule);
	
	$conn=ConnectDB();
	$sqlquery = "INSERT INTO drugtbl (brand, type, molecule, distributor, rcvddate, expdate, qty, freeqty, invoice, mrp, purprice, tax) 
				VALUES ('".strtoupper($brand)."','".strtoupper($type)."', '".strtoupper($molecule)."', '".strtoupper($distributor)."', 
				'".$rcvddate."', '".$expdate."', ".$qty.", ".$freeqty.", '".strtoupper($invoice)."',".$mrp.", ".$purmrp.",".$taxper.")"; 	
	//echo $sqlquery;
	if ($conn->query($sqlquery) === TRUE) 
	{
		$rawdata["drugresult"][$i]="success";
		if(IsBrandTypeMoleAvailable($brand,$type,$molecule))
		{			
			$qtystock=($qty+$freeqty)-$prevqty;
			$sqlquery2 = "UPDATE stocktbl SET qty=(qty+".$qtystock.") WHERE (brand='".$brand."' and type='".$type."' and molecule='".$molecule."')";
			//echo $sqlquery2;
			if ($conn->query($sqlquery2) === TRUE) 
			{
				$rawdata["stockresult"]="success";
			} 
			else 
			{
				$rawdata["stockresult"]="failed";
				$rawdata["stockerror"]="Error: " . $sqlquery2 . "<br>" . $conn->error;		
			}
		}
		else
		{
			$sqlquery2 = "INSERT INTO stocktbl (brand, type, molecule, qty) 
				VALUES ('".strtoupper($brand)."','".strtoupper($type)."','".strtoupper($molecule)."',".$qty+$freeqty.")";
			//echo $sqlquery1;
			if ($conn->query($sqlquery2) === TRUE) 
			{
				$rawdata["stockresult"]="success";
			} 
			else 
			{
				$rawdata["stockresult"]="failed";
				$rawdata["stockerror"]="Error: " . $sqlquery2 . "<br>" . $conn->error;		
			}
		}
	} 
	else 
	{
		$rawdata["drugresult"][$i]="failed";
		$rawdata["drugerror"][$i]="Error: " . $sqlquery . "<br>" . $conn->error;		
	}	
	$conn->close();
}

$profit=$totalmrp-$netamount;
	DeleteInvoice($invoice);
	
	$conn1=ConnectDB();
	$sqlquery1 = "INSERT INTO invoicetbl (distributor,invoiceno, invoicedate,  gsttype, netamount, totalmrp,discount_per,discount_amt,profit) 
				VALUES ('".strtoupper($distributor)."', '".strtoupper($invoice)."', '".$rcvddate."', ".$gsttype.", ".$netamount.",".$totalmrp.",".$discnt.",".$discntamt.",".($profit+$discntamt).")"; 	
	//echo $sqlquery1;
	if ($conn1->query($sqlquery1) === TRUE) 
	{
		$rawdata["invresult"]="success";
	} 
	else 
	{
		$rawdata["invresult"]="failed";
		$rawdata["inverror"]="Error: " . $sqlquery1 . "<br>" . $conn1->error;		
	}
	$conn1->close();
echo json_encode($rawdata);
	
?>