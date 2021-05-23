<?php
function ConnectDB()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bomdb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}
function GetCategory()
{
	$username="";
	$conn=ConnectDB();
	$sql = "SELECT distinct category_item FROM bomtbl";
	$result = $conn->query($sql);
	$rawdata=array();
	$i=0;
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{				
			$rawdata["category"][$i++]= $row["category_item"]	;			
		}				
	}
	$conn->close();	
	return $rawdata;
}
function GetInstruments()
{
	$username="";
	$conn=ConnectDB();
	$sql = "SELECT inst_desc FROM inst_tbl";
	$result = $conn->query($sql);
	$rawdata=array();
	$i=0;
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{				
			$rawdata["instname"][$i++]= $row["inst_desc"]	;			
		}				
	}
	$conn->close();	
	return $rawdata;
}
function GetPCB($inst_id)
{
	$username="";
	$conn=ConnectDB();
	$sql = "SELECT instpcbtbl.pcb_id, pcb_desc FROM instpcbtbl,pcb_tbl WHERE instpcbtbl.inst_id=".$inst_id." and instpcbtbl.pcb_id=pcb_tbl.pcb_id";
	$result = $conn->query($sql);
	$rawdata=array();
	$i=0;
	if ($result->num_col > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{				
			$rawdata["pcb_id"][$i]= $row["pcb_id"]	;	
			$rawdata["pcb_desc"][$i]= $row["pcb_desc"]	;
			$i++;
		}				
	}
	$conn->close();	
	return $rawdata;
}
function GetMakeData($category)
{ 
	$conn=ConnectDB();
	
	
	$rawdata=array();
	if($category=='All')
	{
		$sql = "SELECT distinct make FROM bomtbl";
	}
	else 
	
	{
		$sql = "SELECT distinct make FROM bomtbl where category_item ='".$category."'";
		
	}
	$result = $conn->query($sql);
	$i=0;
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{				
			$rawdata["make"][$i++]= $row["make"]	;			
		}				
	}
	$conn->close();	
	return $rawdata;
	
}

function GetDescription($Make)
{ 
	$conn=ConnectDB();
	
	
	$rawdata=array();
	if($make=='All')
	{
		$sql = "SELECT distinct description FROM bomtbl";
	}
	else 
	
	{
		$sql = "SELECT distinct description FROM bomtbl where make ='".$description."'";
		
	}
	$result = $conn->query($sql);
	$i=0;
	if ($result->num_description > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{				
			$rawdata["description"][$i++]= $row["description"]	;			
		}				
	}
	$conn->close();	
	return $rawdata;
	
}

function CheckUser($induser_id,$induser_pass)
{
	$conn=ConnectDB();
	$sql = "SELECT * FROM usertbl where userid='".$induser_id."' and password='".$induser_pass."'";
	//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$conn->close();
		return true;		
	}
	else
	{
		$conn->close();
		return false;	
	}
}

function GetUserName($userid)
{
	$username="";
	$conn=ConnectDB();
	$sql = "SELECT * FROM usertbl where userid='".$userid."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		if($row = $result->fetch_assoc()) 
		{				
			$username= $row["username"]	;			
		}				
	}
	$conn->close();	
	return $username;
}
function GetBOMQtyData($acc,$aer,$eirg,$arm,$im,$lem,$n16,$irg,$aem,$category,$make)
{
	
} 
function GetBOMData()
{
	$conn=ConnectDB();
	$sql = "SELECT * FROM bomtbl order by inst_id";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			$rawdata["slno"]			[$i]=$row["slno"]			;
			
			$rawdata["inst_name"]		[$i]=GetInstName($row["inst_id"])			;
			$rawdata["pcb_name"]    	[$i]=GetpcbName($row["inst_id"],$row["pcb_id"] ) 			;
			$rawdata["item_no"]		    [$i]=$row["item_no"]	;
			$rawdata["description"]		[$i]=$row["description"];
			$rawdata["part_no"]	    	[$i]=$row["part_no"]	;
			$rawdata["make"]			[$i]=$row["make"]		;
			$rawdata["package"]			[$i]=$row["package"]	;
			$rawdata["category_item"]	[$i]=$row["category_item"];
			$rawdata["qty_unit"]		[$i]=$row["qty_unit"]	;
			$rawdata["total_qty"]		[$i]=$row["total_qty"]	;
			$rawdata["temp_range"]		[$i]=$row["temp_range"]	;
			$rawdata["msl_level"]		[$i]=$row["msl_level"]	;
			$rawdata["approval"]		[$i]=$row["approval"]	;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 
function GetInstName($inst_id)
{
	$conn1=ConnectDB();
	$sql = "SELECT inst_desc FROM instrumenttbl where inst_id=".$inst_id;
	$result = $conn1->query($sql);
	$inst_desc="";
	if ($result->num_rows > 0) 
	{
		$i=0;
		if($row = $result->fetch_assoc()) 
		{
			$inst_desc=$row["inst_desc"]				;			
		}
		$conn1->close();
		return $inst_desc;
	}
	else
	{
		$conn1->close();
		return $inst_desc;
	}
}
function GetpcbName($inst_id,$pcb_id)
{
	$conn1=ConnectDB();
	$sql = "SELECT pcb_desc FROM pcbtbl where inst_id=".$inst_id." and pcb_id=".$pcb_id;
	$result = $conn1->query($sql);
	$pcb_desc="";
	if ($result->num_rows > 0) 
	{
		$i=0;
		if($row = $result->fetch_assoc()) 
		{
			$pcb_desc=$row["pcb_desc"]				;			
		}
		$conn1->close();
		return $pcb_desc;
	}
	else
	{
		$conn1->close();
		return $pcb_desc;
	}
}
function GetInvoiceData()
{
	$conn=ConnectDB();
	$sql = "SELECT * FROM invoicetbl order by slno";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			$rawdata["slno"]			[$i]=$row["slno"]				;
			$rawdata["distributor"]		[$i]=$row["distributor"]		;
			$rawdata["invoiceno"]		[$i]=$row["invoiceno"]			;
			$rawdata["invoicedate"]		[$i]=$row["invoicedate"]		;
			$rawdata["netamount"]		[$i]=$row["netamount"]			;
			$rawdata["totalmrp"]		[$i]=$row["totalmrp"]			;
			$rawdata["discount_amt"]	[$i]=$row["discount_amt"]		;
			$rawdata["profit"]			[$i]=$row["profit"]				;
			$rawdata["gsttype"]			[$i]=$row["gsttype"]			;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 


function GetStockData()
{
	$conn=ConnectDB();
	$sql = "SELECT * FROM stocktbl order by slno";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			$rawdata["slno"]			[$i]=$row["slno"]				;
			$rawdata["brand"]			[$i]=$row["brand"]				;
			$rawdata["type"]			[$i]=$row["type"]				;
			$rawdata["molecule"]		[$i]=$row["molecule"]			;
			$rawdata["qty"]				[$i]=$row["qty"]				;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 


function GetDistributorList()
{
	$conn=ConnectDB();
	$sql = "SELECT DISTINCT distributor FROM drugtbl order by distributor asc";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			$rawdata["slno"]			[$i]=$row["slno"]				;
			$rawdata["distributor"]		[$i]=$row["distributor"]		;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 

function GetBrandList()
{
	$conn=ConnectDB();
	$sql = "SELECT DISTINCT brand FROM drugtbl order by brand asc";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			//$rawdata["slno"]		[$i]=$row["slno"]		;
			$rawdata["brand"]		[$i]=$row["brand"]		;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 

function GetBrandMoleculeTypeList($brand)
{
	$conn=ConnectDB();
	$sql = "SELECT DISTINCT type, molecule FROM drugtbl where brand='".$brand."' order by rcvddate desc";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		//$i=0;
		if($row = $result->fetch_assoc()) 
		{
			//$rawdata["slno"]		[$i]=$row["slno"]		;
			$rawdata["type"]	=$row["type"]		;
			$rawdata["molecule"]=$row["molecule"]	;
			
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 

function GetTypeList()
{
	$conn=ConnectDB();
	$sql = "SELECT DISTINCT type FROM drugtbl order by type asc";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			//$rawdata["slno"]		[$i]=$row["slno"]		;
			$rawdata["type"]		[$i]=$row["type"]		;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 

function GetMoleculeList()
{
	$conn=ConnectDB();
	$sql = "SELECT DISTINCT molecule FROM drugtbl order by molecule asc";
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			//$rawdata["slno"]			[$i]=$row["slno"]			;
			$rawdata["molecule"]		[$i]=$row["molecule"]		;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 

function GetDataToUpdate($slno)
{
	$conn=ConnectDB();
	$sql = "SELECT * FROM drugtbl where slno=".$slno;
	$result = $conn->query($sql);
	$rawdata=array();
	if ($result->num_rows > 0) 
	{
		$i=0;
		if($row = $result->fetch_assoc()) 
		{
			$rawdata["slno"]			[$i]=$row["slno"]				;
			$rawdata["brand"]			[$i]=$row["brand"]				;
			$rawdata["type"]  			[$i]=$row["type"]  				;
			$rawdata["molecule"]		[$i]=$row["molecule"]			;
			$rawdata["distributor"]		[$i]=$row["distributor"]		;
			$rawdata["rcvddate"]		[$i]=$row["rcvddate"]			;
			$rawdata["mfgdate"]			[$i]=$row["mfgdate"]			;
			$rawdata["expdate"]			[$i]=$row["expdate"]			;
			$rawdata["qty"]				[$i]=$row["qty"]				;
			$rawdata["freeqty"]			[$i]=$row["freeqty"]			;
			$rawdata["invoice"]			[$i]=$row["invoice"]			;
			$rawdata["mrp"]				[$i]=$row["mrp"]				;
			$rawdata["purprice"]		[$i]=$row["purprice"]			;
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
} 

function GetInvoiceDrugData($invoice)
{	
	$rawdata=array();
	$invdata=GetInvoiceDrugData2($invoice);
	if($invdata["result2"]=="yesdata")
	{		
		$rawdata["netamount"]		=$invdata["netamount"]		;
		$rawdata["discount_per"]	=$invdata["discount_per"]	;
		$rawdata["discount_amt"]	=$invdata["discount_amt"]	;
	}
	else
	{
		$rawdata["netamount"]		=0;
		$rawdata["discount_per"]	=0;
		$rawdata["discount_amt"]	=0;
	}
	$conn=ConnectDB();
	$sql = "SELECT * FROM drugtbl where invoice='".$invoice."'";
	$result = $conn->query($sql);
	$rawdata["result"]="nodata";
	if ($result->num_rows > 0) 
	{
		$rawdata["result"]="yesdata";
		$i=0;
		while($row = $result->fetch_assoc()) 
		{
			$rawdata["slno"]			[$i]=$row["slno"]			;
			$rawdata["brand"]			[$i]=$row["brand"]			;
			$rawdata["type"]			[$i]=$row["type"]			;
			$rawdata["molecule"]		[$i]=$row["molecule"]		;
			$rawdata["mfgdate"]			[$i]=$row["mfgdate"]		;
			$rawdata["expdate"]			[$i]=$row["expdate"]		;
			$rawdata["qty"]				[$i]=$row["qty"]			;
			$rawdata["freeqty"]			[$i]=$row["freeqty"]		;
			$rawdata["mrp"]				[$i]=$row["mrp"]			;
			$rawdata["purprice"]		[$i]=$row["purprice"]		;
			$rawdata["tax"]				[$i]=$row["tax"]			;
			if($i==0)
			{
				$rawdata["invoice"]			=$row["invoice"]		;
				$rawdata["taxtype"]			=$row["taxtype"]		;
				$rawdata["distributor"]		=$row["distributor"]	;
				$rawdata["rcvddate"]		=$row["rcvddate"]		;
			}
			$i++;
		}
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
}

function GetInvoiceDrugData2($invoice)
{
	$conn=ConnectDB();
	$sql = "SELECT *FROM invoicetbl where invoiceno='".$invoice."'";
	$result = $conn->query($sql);
	$rawdata=array();
	$rawdata["result2"]="nodata";
	if ($result->num_rows > 0) 
	{
		$rawdata["result2"]="yesdata";		
		if($row = $result->fetch_assoc()) 
		{
			$rawdata["netamount"]		=$row["netamount"]		;
			$rawdata["discount_per"]	=$row["discount_per"]	;
			$rawdata["discount_amt"]	=$row["discount_amt"]	;
		}
		
		$conn->close();
		return $rawdata;		
	}
	else
	{
		$conn->close();
		return $rawdata;	
	}
}

function IsBrandTypeMoleAvailable($brand,$type,$molecule)
{
	$conn=ConnectDB();
	$sql = "SELECT * FROM stocktbl where brand='".$brand."' and type='".$type."' and molecule='".$molecule."'";
	//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		$conn->close();
		return true;		
	}
	else
	{
		$conn->close();
		return false;	
	}
}

function GetPrevqty($invoice,$brand,$type,$molecule)
{
	$prevqty=0;
	$conn=ConnectDB();
	$sql = "SELECT (qty+freeqty) as prevqty FROM drugtbl where invoice='".$invoice."' and brand='".$brand."' and type='".$type."' and molecule='".$molecule."'";
	//echo $sql;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		if($row = $result->fetch_assoc()) 
		{
			$prevqty=(int)$row["prevqty"];
			$conn->close();		
		}			
	}
	else
	{
		$prevqty=0;
		$conn->close();			
	}
	return $prevqty;
}

function DeleteDrug($invoice,$brand,$type,$molecule)
{
	$conn=ConnectDB();
	$sql = "Delete FROM drugtbl where invoice='".$invoice."' and brand='".$brand."' and type='".$type."' and molecule='".$molecule."'";
	//echo $sql;
	if ($conn->query($sql) === TRUE) 
	{	
		return true;			   
	} 	
	return false;
}

function DeleteInvoice($invoice)
{
	$conn=ConnectDB();
	$sql = "Delete FROM invoicetbl where invoiceno='".$invoice."'";
	//echo $sql;
	if ($conn->query($sql) === TRUE) 
	{	
		return true;			   
	} 	
	return false;
}
?>