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
	echo " <table id='grpChkBox' class='table table-lite table-sm table-bordered w-auto'>	    ";	
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='DISTRIBUTOR'/>DISTRIBUTOR</label></th>       ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVOICE'/>INVOICE NO.</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVDDATE'/>INVOICE DATE</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVDMONTH'/>INV. MONTH</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INVDYEAR'/>INV. YEAR</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='NTAMOUNT'/>NET AMOUNT</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='TOTAMOUNT'/>TOTAL AMOUNT</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='DISCOUNT'/>DISCOUNT</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='PROFIT'/>PROFIT</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='PROFIT_PER'/>PROFIT%</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='GSTTYPE'/>GST TYPE</label></th>        ";
		echo " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='DELETE'/>DELETE</label></th>        ";
	echo " </table><br>	";
		
	echo '<table id="customers" class="table table-striped table-bordered">';
		echo '<tbody><tr>';
			//echo "<th onclick='sortTableNum(0)' style='font-size: 12px' title='Click to Sort'>Sl.No.</th>";
			echo "<th style='font-size: 12px'>Sl.No.</th>";
			echo "<th onclick='sortTable(1)' 		title='Click to Sort' 	class='DISTRIBUTOR'>DISTRIBUTOR</th>";
			echo "<th onclick='sortTable(2)' 		title='Click to Sort' 	class='INVOICE'>INVOICE NO</th>";
			echo "<th onclick='sortTableDate(3)' 	title='Click to Sort' 	class='INVDDATE'>INVOICE DATE</th>";
			echo "<th onclick='sortTableNum(4)' 	title='Click to Sort' 	class='INVDYEAR'>INV. YEAR</th>";
			echo "<th onclick='sortTable(5)' 		title='Click to Sort' 	class='INVDMONTH'>INV. MONTH</th>";
			echo "<th onclick='sortTable(6)' 		title='Click to Sort' 	class='GSTTYPE'>GST TYPE</th>";
			echo "<th onclick='sortTableNum(7)' 	title='Click to Sort' 	class='NTAMOUNT'>NET AMOUNT</th>";
			echo "<th onclick='sortTableNum(8)' 	title='Click to Sort' 	class='TOTAMOUNT'>TOTAL AMOUNT</th>";
			echo "<th onclick='sortTableNum(9)' 	title='Click to Sort' 	class='DISCOUNT'>DISCOUNT</th>";
			echo "<th onclick='sortTableNum(10)' 	title='Click to Sort' 	class='PROFIT'>PROFIT</th>";
			echo "<th onclick='sortTableNum(11)' 	title='Click to Sort' 	class='PROFIT_PER'>PROFIT%</th>";
			echo "<th class='DELETE'>DELETE</th>";
		echo '</tr>';

		//$slno=1;
		//echo"<tbody>";
		$data=GetInvoiceData();
		for ($i=0;$i<count($data["slno"]);$i++)
		{
			$slno				=$data["slno"]				[$i];
			$distributor		=$data["distributor"]		[$i];
			$invoiceno			=$data["invoiceno"]			[$i];
			$invoicedate		=$data["invoicedate"]		[$i];
			$gsttype			=$data["gsttype"]			[$i];
			$netamount			=$data["netamount"]			[$i];
			$totalmrp			=$data["totalmrp"]			[$i];
			$dis				=$data["discount_amt"]		[$i];
			$profit				=$data["profit"]			[$i];
			$profit_per			=(int)($profit*100.0/$netamount);
			
			if($gsttype==1)
			{
				$gsttype="Inclusive";
			}
			else
			{
				$gsttype="Exclusive";
			}
			
			$invd=strtotime($invoicedate);
			$invoicedate=date('d-M-Y',$invd);			
			
			$invoicedateyear=date("Y",$invd);
			$invoicedatemonth=date("M",$invd);

			echo '<tr id="data_sd">';
				echo '<td align="center">				  	 	 </td>'; 
				echo '<td align="center">	'. $distributor	.'</td>'; 
				echo '<td align="center">	'. $invoiceno		.'</td>'; 
				echo '<td align="center">	'. $invoicedate	.'</td>';
				echo '<td align="center">	'. $invoicedateyear	.'</td>';
				echo '<td align="center">	'. $invoicedatemonth	.'</td>';
				echo '<td align="center">	'. $gsttype		.'</td>'; 
				echo '<td align="center" title="" onmouseenter="updateTitle(this)">	'. $netamount		.'</td>'; 
				echo '<td align="center" title="" onmouseenter="updateTitle(this)">	'. $totalmrp	  	.'</td>';
				echo '<td align="center" title="" onmouseenter="updateTitle(this)">	'. $dis	  			.'</td>';
				echo '<td align="center" title="" onmouseenter="updateTitle(this)">	'. $profit			.'</td>';
				echo '<td align="center" title="" onmouseenter="updateTitle(this)">	'. $profit_per		.'</td>';
				echo "<td><a href='deleteinv.php?slno=".$slno."&invno=".$invoiceno."' onclick=\"return confirm('Are you sure you want to delete ?')\"><center><input type='image' src='delete.png' width='18' height='18' alt='Delete' title='Click to Delete'></input></center></a></td>";
			echo '</tr>';			
		}
		echo'</tbody>';
		
		echo '<tr>                                     ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ><b>Total:</b></td>  ';
		echo '	<th align="right" id="table8Tot1" title="" onmouseenter="updateTitle(this)"></td>';        
		echo '	<th align="right" id="table8Tot2" title="" onmouseenter="updateTitle(this)"></td>';
		echo '	<th align="right" id="table8Tot3" title="" onmouseenter="updateTitle(this)"></td>';
		echo '	<th align="right" id="table8Tot4" title="" onmouseenter="updateTitle(this)"></td>';
		echo '	<th align="right" ></th>               ';
		echo '	<th align="right" ></th>               ';
		echo '</tr>';
		echo '</table><br>';

	echo "<button class='btn btn-outline-success' type='button' onClick='printRepData()' style='font-size: 14px;font-weight: bold;'>Print</button>";
	echo "<br>";
	echo'<br>';	
	echo "</center>";
}
	
	
?>	

