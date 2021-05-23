<?php include 'functions.php';
session_start();

$data=GetDrugData();
if(empty($data))
{
	 echo "<b><br><h2 style='color:red;'>Oops...!! No Recors Found...!!</h2></b>";
	 echo "<meta http-equiv='refresh' content='5;url=adddruginv.php'>";
}
else
{			
	//echo " <table id='grpChkBox' class='table table-lite table-sm table-bordered w-auto'>	    ";	
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='DISTRIBUTOR'/>DISTRIBUTOR</label></th>       ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVOICE'/>INVOICE NO.</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVDDATE'/>INVOICE DATE</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVDMONTH'/>INV. MONTH</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVDYEAR'/>INV. YEAR</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='NTAMOUNT'/>NET AMOUNT</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='TOTAMOUNT'/>TOTAL AMOUNT</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='DISCOUNT'/>DISCOUNT</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='PROFIT'/>PROFIT</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='PROFIT_PER'/>PROFIT%</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='GSTTYPE'/>GST TYPE</label></th>        ";
	//	echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='DELETE'/>DELETE</label></th>        ";
	//echo " </table><br>	";
		
	echo '<table id="customers" class="table table-striped table-bordered">';
		echo '<tbody><tr>';
			//echo "<th onclick='sortTableNum(0)' style='font-size: 12px' title='Click to Sort'>Sl.No.</th>";
			echo "<th style='font-size: 12px'>Sl.No.</th>";
			echo "<th onclick='sortTable(1)' 		title='Click to Sort' 	class='BRAND'>BRAND</th>";
			echo "<th onclick='sortTable(2)' 		title='Click to Sort' 	class='TYPE'>TYPE</th>";
			echo "<th onclick='sortTable(3)' 		title='Click to Sort' 	class='MOLECULE'>MOLECULE</th>";
			echo "<th onclick='sortTableNum(4)' 	title='Click to Sort' 	class='QTY'>QTY</th>";
		echo '</tr>';

		//$slno=1;
		//echo"<tbody>";
		$data=GetStockData();
		for ($i=0;$i<count($data["slno"]);$i++)
		{
			$slno			=$data["slno"]		[$i];
			$brand			=$data["brand"]		[$i];
			$type			=$data["type"]		[$i];
			$molecule		=$data["molecule"]	[$i];
			$qty			=$data["qty"]		[$i];
			
			echo '<tr id="data_sd">';
				echo '<td align="center">				  	  </td>'; 
				echo '<td align="center">	'. $brand		.'</td>'; 
				echo '<td align="center">	'. $type		.'</td>'; 
				echo '<td align="center">	'. $molecule	.'</td>';
				echo '<td align="center" title="" onmouseenter="updateTitle(this)"> 	'. $qty			.'</td>';
			echo '</tr>';			
		}
		echo'</tbody>';
		
		echo '<tr>                                     ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ><b>Total:</b></td>  ';
		echo '	<th align="right" id="table8Tot1" title="" onmouseenter="updateTitle(this)"></td>';  
		echo '</tr>';
		echo '</table><br>';

	echo "<button class='btn btn-outline-success' type='button' onClick='printRepData()' style='font-size: 14px;font-weight: bold;'>Print</button>";
	echo "<br>";
	echo'<br>';	
	echo "</center>";
}
	
	
?>	

