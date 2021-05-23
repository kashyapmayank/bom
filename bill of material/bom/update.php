<html>
<?php include 'functions.php';
session_start();//session starts here
if(!isset($_SESSION['druguserid']))
	{
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
	
if(isset($_POST['update']))
	{
		$ubrand			=$_POST['brand'];
		$utype			=$_POST['type'];
		$umolecule		=$_POST['molecule'];
		$udistributor	=$_POST['distributor'];
		$urcvddate		=$_POST['rcvddate'];
		$umfgdate		=$_POST['mfgdate'];
		$uexpdate		=$_POST['expdate'];
		$uqty			=$_POST['qty'];
		$ufreeqty		=$_POST['freeqty'];
		$uinvoice		=$_POST['invoice'];
		$umrp			=$_POST['mrp'];
		$upurmrp		=$_POST['purmrp'];
		
			$conn=ConnectDB();
		
			$sqlquery= "DELETE FROM drugtbl WHERE slno=".$_SESSION['slnoupdate'];
			//echo $sqlquery;
			if ($conn->query($sqlquery) === TRUE) 
			{	
				$sqlquery = "INSERT INTO drugtbl (brand, type, molecule, distributor, rcvddate, mfgdate, expdate, qty, freeqty, invoice, mrp, purprice) 
							VALUES ('".strtoupper($ubrand)."', '".strtoupper($utype)."', '".strtoupper($umolecule)."', '".strtoupper($udistributor)."', '".$urcvddate."', '".$umfgdate."', '".$uexpdate."', ".$uqty.",".$ufreeqty.",'".strtoupper($uinvoice)."',".$umrp.",".$upurmrp.")"; 
				//echo $sqlquery;
				if ($conn->query($sqlquery) === TRUE) 
				{
					echo "<script type=\"text/javascript\">alert('Updated Successfully');</script>";
					echo "<meta http-equiv='refresh' content='0;url=drugdata.php'>";
				} 
				else 
				{
					echo "Error: " . $sqlquery . "<br>" . $conn->error;
				}
			}
			else 
			{
				echo "Error: " . $sqlquery . "<br>" . $conn->error;
			}			
			$conn->close();		
		
	}
	
	if(isset($_GET['slno']))
	{
		$sno=$_GET['slno'];	
		$_SESSION['slnoupdate']=$_GET['slno'];			
		$data=GetDataToUpdate($sno);
		if(empty($data))
		{
			 echo "<meta http-equiv='refresh' content='0;url=drugdata.php'>";
		}
		$slno				=$data["slno"]				[0];
		$brand				=$data["brand"]				[0];
		$type  				=$data["type"]  			[0];
		$molecule			=$data["molecule"]			[0];
		$distributor		=$data["distributor"]		[0];
		$rcvddate			=$data["rcvddate"]			[0];
		$mfgdate			=$data["mfgdate"]			[0];
		$expdate			=$data["expdate"]			[0];
		$qty				=$data["qty"]				[0];
		$freeqty			=$data["freeqty"]			[0];
		$invoice			=$data["invoice"]			[0];
		$mrp				=$data["mrp"]				[0];
		$purprice			=$data["purprice"]			[0];
		
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;url=drugdata.php'>";
	}
		

?>
<head lang="en">
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="logo.png" />
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
	<script src="jquery.min.js"></script>
	<script src="propper.min.js"></script>
	<script src="bootstrap.min.js"></script>
    <title>Drug Report</title>
</head>
<script>
jQuery(document).bind("keyup keydown", function(e){
    if(e.ctrlKey && e.keyCode == 80){
		printData();
        return false;
    }
});
document.oncontextmenu = function() {
                return false;
            };
			
window.addEventListener("keydown",function (e) {
    if (e.keyCode === 114 || (e.ctrlKey && e.keyCode === 70)) { 
        e.preventDefault();
		document.getElementById("search").focus();		
    }
});
</script>

<body>
	<nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="#"><b>Drug Update</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav mr-auto justify-content-left">	
                <li class="nav-item" >
                    <a class="nav-link" href="drugdata.php"><button class="btn btn-outline-success">Home</button></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href='logout.php'  onclick=" return confirm('Are You Sure. Do You Want to Logout?')"><button class="btn btn-outline-danger">Logout</button></a>
                </li>
            </ul>
        </div>
    </nav>
<br>
	<div class="container justify-content-between">
		<div class="row justify-content-center">
			<div class="col-md-6 justify-content-between">
				<form role="form" method="post" action="update.php"  style="padding:10px;">			
				<center><b><h3 id='updatesuccess' name='updatesuccess' style='color:green;' value=""></h3></b></center>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="brand">Brand</label>
							<input type="text" class="form-control" style="text-transform: uppercase;"  id="brand" name="brand" value="<?php echo $brand;?>" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="type">Type</label>
							<input type="text" class="form-control" style="text-transform: uppercase;"  id="type" name="type" value="<?php echo $type;?>" required>	
						</div>

						<div class="form-group col-md-6">
							<label for="molecule">Molecule</label>
							<input type="text" class="form-control" style="text-transform: uppercase;"  id="molecule" name="molecule" value="<?php echo $molecule;?>" required>	
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="distributor">Distributor</label>
							<input type="text" class="form-control" style="text-transform: uppercase;"  id="distributor" name="distributor" value="<?php echo $distributor;?>" required>	
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="invoice">Invoice</label>
							<input type="text" class="form-control" style="text-transform: uppercase;"  id="invoice" name="invoice" value="<?php echo $invoice;?>" required>	
						</div>
						<div class="form-group col-md-6">
						  <label for="rcvddate">Received Date</label>
						  <input type='date' class="form-control" style='text-transform: uppercase;'  name='rcvddate' id='rcvddate' min='2010-01-01' value="<?php echo $rcvddate;?>"  required></td>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="mfgdate">Manufactured Date</label>
							<input type="date" class="form-control" style="text-transform: uppercase;"  id="mfgdate" name="mfgdate" value="<?php echo $mfgdate;?>"  required>	
						</div>
						<div class="form-group col-md-6">
						  <label for="expdate">Expiry Date</label>
						  <input type='date' class="form-control" style='text-transform: uppercase;'  name='expdate' id='expdate' min='2010-01-01' value="<?php echo $expdate;?>"  required></td>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="qty">Qty</label>
							<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="qty" name="qty" value="<?php echo $qty;?>" required>	
						</div>

						<div class="form-group col-md-6">
							<label for="freeqty">Free Qty</label>
							<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="freeqty" name="freeqty" value="<?php echo $freeqty;?>" required>	
						</div>
					</div>					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="mrp">MRP</label>
							<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="mrp" name="mrp" step=".01" value="<?php echo $mrp;?>" required>	
						</div>
					
					
						<div class="form-group col-md-6">
							<label for="purmrp">Purchase Price</label>
							<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="purmrp" name="purmrp" step=".01" value="<?php echo $purprice;?>" required>	
						</div>
					</div>
					<center>
						<br><input type="submit" id="update" name="update" value="Update" class="btn btn-primary"></input>
					</center>
				</form>
			</div>
		</div>
	</div>  
</body>
<?php 
	
?>
</html>