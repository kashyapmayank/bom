<html>
<?php 
include 'functions.php';
session_start();//session starts here
if(!isset($_SESSION['druguserid']))
	{
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>	
<head lang="en">
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../../img/tejulogo.png" />
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
	<script src="jquery.min.js"></script>
	<script src="propper.min.js"></script>
	<script src="bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
    <title>Requirement</title>
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
        <a class="navbar-brand" href="#"><b>Monitor's Requirement</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav mr-auto justify-content-left">	
                <li class="nav-item" >
                    <a class="nav-link" href="drugdata.php"><button class="btn btn-outline-success">Home</button></a>
                </li>
            </ul>
        </div>
    </nav>
<br>
	<div class="container justify-content-between">
		<div class="row justify-content-center">
			<div class="col-md-12 justify-content-center">
				<form role="form" style="padding:10px;">			
				<center><b><h3 id='addsuccess' name='addsuccess' style='color:green;' value=""></h3></b></center>
					<div class="form-row">
						<div class="form-group col">
							<label for="brand">Accident monitor</label>
							<input type="number" class="form-control" style="text-transform: uppercase;"  id="acc" name="acc">
						</div>
						<div class="form-group col">
							<label for="brand">Aerosol monitor</label>
							<input type="number" class="form-control" style="text-transform: uppercase;"  id="aer" name="aer">
						</div>
						<div class="form-group col">
							<label for="type">Ext. IRG Monitor</label>
							<input type="number" class="form-control" style="text-transform: uppercase;"  id="eirg" name="eirg" >	
						</div>

						
					</div>
					
					<div class="form-row">
						<div class="form-group col">
							<label for="molecule">Area Radiation Monitor</label>
							<input type="number" class="form-control" style="text-transform: uppercase;"  id="arm" name="arm">	
						</div>
						<div class="form-group col">
							<label for="distributor">Iodine Monitor</label>
							<input type="number" class="form-control" style="text-transform: uppercase;"  id="im" name="im">	
						</div>
					
						<div class="form-group col">
							<label for="invoice">Liquid Effluent Monitor </label>
							<input type="number" class="form-control" style="text-transform: uppercase;"  id="lem" name="lem" >	
						</div>
						
					</div>
					
					<div class="form-row">
						<div class="form-group col">
							<label for="qty">N16 & Gross Gamma Monitor</label>
							<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="n16" name="n16">	
						</div>

						<div class="form-group col">
							<label for="freeqty">IRG Monitor</label>
							<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="irg" name="irg">	
						</div>
						<div class="form-group col">
							<label for="mrp">Automated Environment Radiation Monitor</label>
							<input type="number" class="form-control" min="0" style="text-transform: uppercase;"  id="aem" name="aem" >	
						</div>
					</div>					
					<div class="form-row">
						<div class="form-group col">
							<label for="category">Category</label><br>
							<?php 
							echo '<select style="width: 300px; text-transform: uppercase; padding: 5px 5px;margin: 5px 0;box-sizing: border-box;border: 2px solid green;border-radius: 4px;font-size: 20px;" id="category" name="category" onchange="LoadMakes(this.value)" required>';								
						
							echo '<option value="All">ALL</option>';
							$catNames=GetCategory();
							for($i=0;$i<count($catNames["category"]);$i++)
							{
							  
								echo '<option value="'.$catNames["category"][$i].'">'.$catNames["category"][$i].'</option>';
							 
							}
							echo '</select>';


							?>	
						</div>

						<div class="form-group col">
							<label for="make">Make</label>
							<div id="make" name="make">	</div>
						</div>
						
					</div>		
					<center>
						<br><input onclick="periodic_update()" id="add" name="add" class="btn btn-primary" value="Submit"></input>
					</center>
				</form>
			</div>
		</div>
	</div>  
	<script>
	
		//periodic_update();
	//setInterval(function(){ periodic_update() }, 60000);
</script>
<style>
.navbar-nav { 
	flex-flow: row wrap;
}
.nav-item{
	padding-left:10px;
}
</style>
<br>
<center>	
	<div id="bomdata" name="bomdata">
	
	</div>
	
</center>
</body>

</html>