<html>
<?php 
include 'functions.php';

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
				
					
					<div class="form-row">
						<div class="form-group col">
							<label for="inst">Select Instrument</label><br>
							<?php 
							echo '<select style="width: 300px; text-transform: uppercase; padding: 5px 5px;margin: 5px 0;box-sizing: border-box;border: 2px solid green;border-radius: 4px;font-size: 20px;" id="inst" name="inst" onchange="LoadPCB(this.value)" required>';								
						
							echo '<option value="0">Select Instrument</option>';
							$instNames=GetInstruments();
							for($i=0;$i<count($instNames["instname"]);$i++)
							{
							  
								echo '<option value="'.($i+1).'">'.$instNames["instname"][$i].'</option>';
							 
							}
							echo '</select>';


							?>	
						</div>

						
							
						
						
					</div>	
					
					
				</form>
			</div>
		</div>
	</div> 
	<div class="row justify-content-center">
		
			
				<div id="pcb" name="pcb">	</div>
			
		
	<center>
						<br><input onclick="periodic_update()" id="add" name="add" class="btn btn-primary" value="Submit"></input>
					</center>
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