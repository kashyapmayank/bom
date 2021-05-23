<?php include 'functions.php'; 
session_start();//session starts here
 
	if( isset($_GET['slno']) )
	{
		$sno = $_GET['slno'];
		
		
		//echo "<script type='text/javascript'>alert('$cno.$cname.$cmail');</script>";
		if($sno!="")
		{
			$conn=ConnectDB();
		
			$sqlquery= "DELETE FROM drugtbl WHERE slno=".$sno;
			//echo $sqlquery;
			if ($conn->query($sqlquery) === TRUE) 
			{	
			   echo "<script type=\"text/javascript\">alert('Deleted Succesfully..!!') </script>";
			   
			} 
			else 
			{
				echo "Error: " . $sqlquery . "<br>" . $conn->error;
			}			
			$conn->close();
			
			 
		}
		echo "<meta http-equiv='refresh' content='0;url=drugdata.php'>";
		//header("Location: index.php");//use for the redirection to some page
		
	}
	?>