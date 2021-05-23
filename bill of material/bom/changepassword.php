<html>
<?php
session_start();//session starts here
if(!isset($_SESSION['sduserid']))
	{
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}

?>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="icon" type="image/png" href="sd.ico" />
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
    <title>Change Password</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }

.fa {
  
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.input-icons i { 
            position: absolute; 
			padding: 10px;
			margin-left: 75%;
        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 
        } 
          
        .icon { 
            padding: 10px; 
            color: green; 
            min-width: 50px; 
            text-align: center; 
        } 
          
        .input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center; 
        } 

.fa-bullseye:before {
  content: "\f140";
}
.fa-eye:before {
  content: "\f06e";
}
.fa-eye-slash:before {
  content: "\f070";
}
.fa-eyedropper:before {
  content: "\f1fb";
}
</style>
<script>
function viewPasswordOld()
{
  var passwordInput = document.getElementById('passwordOld');
  var passStatus = document.getElementById('pass-statusOld');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}

function viewPasswordNew()
{
  var passwordInput = document.getElementById('passwordNew');
  var passStatus = document.getElementById('pass-statusNew');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}

function viewPasswordCnf()
{
  var passwordInput = document.getElementById('passwordCnf');
  var passStatus = document.getElementById('pass-statusCnf');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}

</script>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="changepassword.php">
                        <fieldset>
                            <div class="input-icons"  >
                                <i id="pass-statusOld" class="fa fa-eye" aria-hidden="true" onClick="viewPasswordOld()"></i><input class="form-control" placeholder="Old Password" name="oldpass" type="password" id="passwordOld" autofocus>
                            </div>
                            <div class="input-icons">
                                <i id="pass-statusNew" class="fa fa-eye" aria-hidden="true" onClick="viewPasswordNew()"></i><input class="form-control" placeholder="New Password" name="newpass" type="password" id="passwordNew" value="">
                            </div>
							<div class="input-icons">
                                <i id="pass-statusCnf" class="fa fa-eye" aria-hidden="true" onClick="viewPasswordCnf()"></i><input class="form-control" placeholder="Confirm Password" name="cnfpass" type="password" id="passwordCnf" value=""></input>
                            </div>
                                <input class="btn btn-lg btn-success btn-block" onClick="return confirm('Are You sure you want to Change Password..?');" type="submit" value="Change" name="change" >
								<input class="btn btn-lg btn-info btn-block" type="button" onClick="window.location.href='index.php'" value="Cancel" name="Cancel" >

                            <!-- Change this to a button or input when using this as a form -->
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                        </fieldset>
                    </form>
					<!--<center><b>Doesn't Have ID ?</b> <br></b><a href="registration.php">Register here</a></center>for centered text-->
                </div>
				<!--<p style="color:red;"><?php echo $_SESSION['msg1']="";?></p>-->
            </div>
        </div>
    </div>
</div>



<?php

if(isset($_POST['change']))
{
    $user_id=$_SESSION['sduserid'];
    $user_oldpass=$_POST['oldpass'];
	$user_newpass=$_POST['newpass'];
	$user_cnfpass=$_POST['cnfpass'];

	if($user_oldpass=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the Old Password..!')</script>";  
		exit();//this use if first is not work then other will not show  
    }  
  if($user_newpass=='')  
    {  
        echo"<script>alert('Please enter the New Password..!')</script>";  
		exit();  
    }  
    if($user_cnfpass=='')  
    {  
        echo"<script>alert('Please enter the Confirm Password..!')</script>";  
		exit();  
    }
	if($user_newpass!=$user_cnfpass)  
    {  
        echo"<script>alert('New Password & Confirm Password are not Matching..!')</script>";  
		exit();  
    }
	$conn1=odbc_connect('sddsn','','');	
	$sql="SELECT sdusrpwd FROM usrtbl where sdusrpwd='$user_oldpass' AND sdusrid='$user_id'";
    //$check_user="select * from usrtbl WHERE usrid='$user_id' AND usrpwd='$user_oldpass'";
	
    $rs1=odbc_exec($conn1,$sql);

    if(odbc_fetch_row($rs1)>0)
    {
		$query="update usrtbl set sdusrpwd='$user_newpass' where sdusrid='$user_id'";
		$rs2=odbc_exec($conn1,$query);
		echo "<script>alert('Password Changed Successfully.!')</script>";
		echo"<script>window.open('index.php','_self')</script>";		 
		
    }
    else
    {
        echo "<script>alert('Old Password is Incorrect.!')</script>";  
    }
	
}
?>

</body>

</html>

