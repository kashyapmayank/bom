<html>
<?php include 'functions.php';
	session_start();//session starts here
	//if(!isset($_SESSION['druguserid']))
	//{
	//	echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
	//}
	
	$month = date('m');
	$day = date('d');
	$year = date('Y');
	
	date_default_timezone_set('Asia/Kolkata');
	$today = $year . '-' . $month . '-' . $day;
?>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../../img/tejulogo.png" />
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
	<script src="script.js?1"></script>
	<script src="jquery.min.js"></script>
	<script src="propper.min.js"></script>
	<script src="bootstrap.min.js"></script>
	<script src="angular.min.js"></script>
    <title>Drug Report</title>
</head>
<script>
$(document).ready(function () { 

$('#invoice').on("keypress", function(e) {
        if (e.keyCode == 13) {
            $('#btn_inv').click();
			
            return false; // prevent the button click from happening
        }
});
	// Denotes total number of rows 
	var rowIdx = 1; 

	// jQuery button click event to add a row 
	$('#addBtn').on('click', function () { 

		// Adding a row inside the tbody. 
		$('#tbody').append(`<tr id="R${++rowIdx}"> 
				<td class="row-index text-center"> 
					<input type="text" list="typelist" class="form-control" style="text-transform: uppercase;"  id="type${rowIdx}" name="type${rowIdx}" required>
				</td>
				<td>
					<!--<label for="Brand">Brand</label>-->
					<input type="text" list="brandlist" class="form-control" style="text-transform: uppercase;"  id="brand${rowIdx}" name="brand${rowIdx}" onchange="SetMolType(this.id,this.value)" required>	
				</td>				
				<td>
					<!--<label for="molecule">Molecule</label>-->
					<input type="text" list="moleculelist" class="form-control" style="text-transform: uppercase;"  id="molecule${rowIdx}" name="molecule${rowIdx}" required>	
				</td>
				<td>
					<!--<label for="expdate">Expiry Date</label>-->
					<input type='date' class="form-control" style='text-transform: uppercase;'  name='expdate${rowIdx}' id='expdate${rowIdx}' min='<?php echo $today;?>'   required></td>
				</td>
				<td>
					<!--<label for="qty">Qty</label>-->
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="qty${rowIdx}" name="qty${rowIdx}" onkeyup="SetItemAmt(this.id,this.value)"  oninput="SetItemAmt(this.id,this.value)" required>	
				</td>
				<td>
					<!--<label for="freeqty">Free Qty</label>-->
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="freeqty${rowIdx}" name="freeqty${rowIdx}" required>	
				</td>
				<td>
					<!--<label for="mrp">MRP</label>-->
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="mrp${rowIdx}" name="mrp${rowIdx}" step=".01" required>	
				</td>
				<td>
					<!--<label for="purmrp">Rate</label>-->
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="purmrp${rowIdx}" name="purmrp${rowIdx}" step=".01" onkeyup="SetItemAmt(this.id,this.value)"  oninput="SetItemAmt(this.id,this.value)" required>	
				</td>
				<td>
					<!--<label for="purmrp">Tax %</label>-->
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="taxper${rowIdx}" name="taxper${rowIdx}" step=".01" onkeyup="SetItemAmt(this.id,this.value)"  oninput="SetItemAmt(this.id,this.value)" required>	
				</td>
				<td>
					<!--<label for="purmrp">Amount</label>-->
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="itemamt${rowIdx}" name="itemamt${rowIdx}" step=".01" required>	
				</td>
				<td class="text-center"> 
					<img class="remove" src='delete.png' width='25px' height='25px' style='cursor:hand;' title='Click to Delete Row'></img> 
				</td> 
			</tr>`); 
	}); 

	// jQuery button click event to remove a row. 
	$('#tbody').on('click', '.remove', function () { 

		// Getting all the rows next to the row 
		// containing the clicked button 
		var child = $(this).closest('tr').nextAll(); 

		// Iterating across all the rows 
		// obtained to change the index 
		child.each(function () { 

		// Getting <tr> id. 
		var id = $(this).attr('id'); 

		// Getting the <p> inside the .row-index class. 
		var idx = $(this).children('.row-index').children('p'); 

		// Gets the row number from <tr> id. 
		var dig = parseInt(id.substring(1)); 

		// Modifying row index. 
		//idx.html(`Row ${dig - 1}`); 

		// Modifying row id. 
		//$(this).attr('id', `R${dig - 1}`); 
		}); 

		// Removing the current row. 
		$(this).closest('tr').remove(); 

		// Decreasing total number of rows by 1. 
		//rowIdx--; 
	}); 
	});

</script>
<body onselectstart='return false'>
	<nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="#"><b>Drug Add</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav mr-auto justify-content-left">	
                <li class="nav-item" >
                    <a class="nav-link" href="invoicerep.php"><button class="btn btn-outline-success">Home</button></a>
                </li>
            </ul>
        </div>
    </nav>
<br>

	<div class="justify-content-between " ng-app="" style="margin-left:30px; margin-right:20px;">
		<form role="form" method="post" id="adddataform" name="adddataform" action="adddrug.php"  style="padding:10px;">
			<div class="row">
				<div class="form-group col-md-3">
					<label for="invoice">Invoice No</label>
					<input type="text" class="form-control" style="text-transform: uppercase;"  id="invoice" name="invoice" required>
				</div>
				<div class="form-group col-md-3">
					<label for="btn_inv" style="opacity:0.0;">Enter</label><br>
					<input type="button" id="btn_inv" name="btn_inv" class="btn btn-md btn-primary" onclick="GetInvoiceDeatils()" value="Enter"/>
				</div>
			</div>
		<div id="invretdata" name="invretdata" style="display:none;">
			<div class="row">
				<div class="form-group col-md-3">
					<label for="rcvddate">Received Date</label>
					<input type='date' class="form-control" style='text-transform: uppercase;'  name='rcvddate' id='rcvddate' min='2010-01-01' required></td>
				</div>
				<div class="form-group col-md-3">
					<label for="ntamt">Invoice Amount</label>
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;" ng-model="ntamt" id="ntamt" name="ntamt" step=".01" onkeyup="SetDis(this.value)" oninput="SetDis(this.value)" required>	
				</div>
				<div class="form-group col-md-3">
					<label for="discnt">Discount %</label>
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;" ng-model="discnt" id="discnt" name="discnt" step=".01" onkeyup="SetDisAmt(this.value)" oninput="SetDisAmt(this.value)" required>	
				</div>
				<div class="form-group col-md-3">
					<label for="discnt">Discount Amount (Rs)</label>
					<input type="number" class="form-control" min="0" style="text-transform: uppercase;" ng-model="discntamt" id="discntamt" name="discntamt" step=".01" onkeyup="SetDisAmtPer(this.value)" oninput="SetDisAmtPer(this.value)" required>	
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="distributor">Distributor</label>
					<!--<input type="text" class="form-control" style="text-transform: uppercase;"  id="distributor" name="distributor" required>-->
					<input class="form-control" list="distributorlist" type="text" style="text-transform: uppercase;" id="distributor" name="distributor" placeholder="" required>
					<datalist id="distributorlist" >
					<?php 
						$distributorlist=GetDistributorList();
						for($i=0;$i<count($distributorlist["slno"]);$i++)
						{
						  echo '<option value="'.$distributorlist["distributor"][$i].'"></option>';
						}		
					?>				
					</datalist>					
				</div>
				<div class="form-group col-md-3">
					<div class="form-check">
					  <label style="opacity:0">GST Inclusive </label><br>
					  <input class="form-check-input" type="checkbox" value="" id="gstcheck" name="gstcheck" onclick="GstChange(this.value)" >
					  <label class="form-check-label" for="gstcheck" style="cursor:hand;"><b>GST Inclusive</b> </label></input>
					</div>					
				</div>
			</div>
			<div class="row justify-content-center">				
				<div class="col-md-12 form-group">
					<div class="table table-responsive"> 
						<table class="table table-bordered"  id="drugdatatbl" name="drugdatatbl"> 
							<thead> 
							<tr> 
								<th class="text-center">Type</th> 
								<th class="text-center">Brand</th> 
								<th class="text-center">Molecule</th> 
								<th class="text-center">Expiry Date</th> 
								<th class="text-center">Qty</th> 
								<th class="text-center">Free Qty</th> 
								<th class="text-center">MRP</th> 
								<th class="text-center">Purchase Rate</th> 
								<th class="text-center">GST%</th> 
								<th class="text-center">Amount</th> 
							</tr> 
							</thead> 
							<tbody id="tbody"> 
							<tr id="R1">
								<td>
									<!--<label for="type">Type</label>-->
									<input type="text" list="typelist" class="form-control" style="text-transform: uppercase; width:150px;"  id="type1" name="type1" required>
									<datalist id="typelist" >
									<?php 
										$typelist=GetTypeList();
										for($i=0;$i<count($typelist["type"]);$i++)
										{
										  echo '<option value="'.$typelist["type"][$i].'"></option>';
										}		
									?>				
									</datalist>
								</td>
								<td>
									<!--<label for="brand">Brand</label>-->
									<input list="brandlist" type="text" class="form-control" style="text-transform: uppercase; width:250px;"  id="brand1" name="brand1" onchange="SetMolType(this.id,this.value)" required>
									<datalist id="brandlist" >
									<?php 
										$brandlist=GetBrandList();
										for($i=0;$i<count($brandlist["brand"]);$i++)
										{
										  echo '<option value="'.$brandlist["brand"][$i].'"></option>';
										}		
									?>				
									</datalist>
								</td>
								<td>
									<!--<label for="molecule">Molecule</label>-->
									<input type="text" list="moleculelist" class="form-control" style="text-transform: uppercase; width:250px;"  id="molecule1" name="molecule1" required>
									<datalist id="moleculelist" >
									<?php 
										$moleculelist=GetMoleculeList();
										for($i=0;$i<count($moleculelist["molecule"]);$i++)
										{
										  echo '<option value="'.$moleculelist["molecule"][$i].'"></option>';
										}		
									?>				
									</datalist>
								</td>
								<td>
									<!--<label for="expdate">Expiry Date</label>-->
									<input type='date' class="form-control" style='text-transform: uppercase;'  name='expdate1' id='expdate1' min='<?php echo $today;?>' required>
								</td>
								<td>
									<!--<label for="qty">Qty</label>-->
									<input type="number" class="form-control" min="0" style="text-transform: uppercase; " id="qty1" name="qty1" onkeyup="SetItemAmt(this.id,this.value)"  oninput="SetItemAmt(this.id,this.value)" required>	
								</td>
								<td>
									<!--<label for="freeqty">Free Qty</label>-->
									<input type="number" class="form-control" min="0" style="text-transform: uppercase; " id="freeqty1" name="freeqty1" required>	
								</td>
								<td>
									<!--<label for="mrp">MRP</label>-->
									<input type="number" class="form-control" min="0" style="text-transform: uppercase; " id="mrp1" name="mrp1" step=".01" required>	
								</td>
								<td>
									<!--<label for="purmrp">Rate</label>-->
									<input type="number" class="form-control" min="0" style="text-transform: uppercase; " id="purmrp1" name="purmrp1" step=".01" onkeyup="SetItemAmt(this.id,this.value)"  oninput="SetItemAmt(this.id,this.value)" required>	
								</td>
								<td>
									<!--<label for="taxper">Tax %</label>-->
									<input type="number" class="form-control" min="0" style="text-transform: uppercase; " id="taxper1" name="taxper1" step=".01" onkeyup="SetItemAmt(this.id,this.value)"  oninput="SetItemAmt(this.id,this.value)" required>	
								</td>
								<td>
									<!--<label for="itemamt">Amount</label>-->
									<input type="number" class="form-control" min="0" style="text-transform: uppercase; "  id="itemamt1" name="itemamt" step=".01" onkeyup="SetItemAmt(this.id,this.value)"  oninput="SetItemAmt(this.id,this.value)" required>	
								</td>
							</tr>
							</tbody> 
						</table> 
					</div> 
						<button class="btn btn-md btn-info"	id="addBtn" type="button"> 	Add new Row </button> 			
					<center>
						<br><input type="button" id="add_new" name="add_new" class="btn btn-primary" onclick="AddDataScript()" value="Submit"/>
					</center>
				</div>
			</div>
		</div>
		</form>			
	</div>  
</body>
</html>