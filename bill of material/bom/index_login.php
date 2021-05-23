<?php include 'functions.php'; 
session_start();//session starts here
session_destroy();
session_start();

?>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="icon" type="image/png" href="logo.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="jquery.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="bootstrap.min.js"></script>
    <title>Login</title>
</head>
<style>
        .input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center; 
        } 
</style>
<body>
 <nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="#"><b>Drug Report</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav mr-auto justify-content-left">	
                <li class="nav-item" >
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#portfolioModal0"><button class="btn btn-outline-success">About</button></a>
                </li>
            </ul>
        </div>
    </nav>
<br>
<center>

<div class="container justify-content-between">
    <div class="row justify-content-center">
        <div class="col-md-4 justify-content-between">
            <div class="login-panel card panel-success" style="padding:10px;">
                <div class="panel-heading " style="padding:10px;">
                    <h3 class="panel-title">Sign In</h3>
                </div>
                <div class="card">
                    <form role="form" method="post" action="index.php"  style="padding:10px;">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="User ID" name="druguserid" id="druguserid"  type="text" autofocus required>
                            </div>
                            <div class="input-icons">
                                <input class="form-control" placeholder="Password" name="drugpass" id="drugpass" type="password" value="" id="password" required>
                            </div>
                                <br><input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login">                           
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div><br><br>
	<b><h4><label id="pwdstatus" name="pwdstatus" style="color:red;" value=""></label></h4></b>
</div>
<footer class="footer p-1">			
			<center><p id="CopyRight" class="mt-1 mb-1 text-muted"> © 2020&nbsp; <a href="mailto:help@jogulamba.in">Jogulamba Services</a></p></center>
		
</footer>
</center>
</body>

</html>

<?php

if(isset($_POST['login']))
{
    $druguser_id=$_POST['druguserid'];
    $druguser_pass=$_POST['drugpass'];
	$status=CheckUser($druguser_id,$druguser_pass);

    if($status)
    {
		$_SESSION['druguserid']=$druguser_id;
		$_SESSION['druguserpwd']=$druguser_pass;
        echo "<script>window.open('drugdata.php','_self')</script>";
        //here session is used and value of $user_email store in $_SESSION.
    }
    else
    {
        echo '<script>document.getElementById("pwdstatus").innerHTML="User ID or Password Incorrect...!!! ";
				  $(document).ready( function() {
					$("#pwdstatus").delay(5000).fadeOut();
				  });</script>';
    }
}
?>