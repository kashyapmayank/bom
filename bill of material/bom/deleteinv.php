<?php include 'functions.php'; 
session_start();//session starts here
 
	if( isset($_GET['slno']) )
	{
		$sno 	= $_GET['slno'];
		$invno	= $_GET['invno'];
		
		//echo "<script type='text/javascript'>alert('$sno.$invno');</script>";
		if($sno!="")
		{
			$conn=ConnectDB();		
			$sqlquery= "DELETE FROM invoicetbl WHERE slno=".$sno;
			//echo $sqlquery;
			if ($conn->query($sqlquery) === TRUE) 
			{	
				$sqlquery1= "DELETE FROM drugtbl WHERE invoice='".$invno."'";
				//echo $sqlquery1;
				if ($conn->query($sqlquery1) === TRUE) 
				{	
				   echo "<script type=\"text/javascript\">alert('Deleted Succesfully..!!') </script>";			   
				} 
				else 
				{
					echo "Error: " . $sqlquery . "<br>" . $conn->error;
				}
			   
			   //echo "<script type=\"text/javascript\">alert('Deleted Succesfully..!!') </script>";			   
			} 
			else 
			{
				echo "Error: " . $sqlquery . "<br>" . $conn->error;
			}
			
			
			
			$conn->close();
			 
		}
		echo "<meta http-equiv='refresh' content='0;url=invoicerep.php'>";
		//header("Location: index.php");//use for the redirection to some page
		
	}
	?>