<?php include 'functions.php'; 
session_start();//session starts here
  if(!isset($_SESSION['druguserid']))
	{
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="icon" type="image/png" href="bom.icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="filtergrid.css">
	<script type="text/javascript" src="tablefilter_all_min.js"></script>
	<script src="script.js"></script>
	<script src="scriptbom.js"></script>
	<script src="jquery.min.js"></script>
	<script src="propper.min.js"></script>
	<script src="bootstrap.min.js"></script>
    <title>Bill of Material</title>
</head>
<script>
var http_url = "getdata.php";
		function periodic_update(){
			var datastr="";
			$('#deletesuccess').show();
			try{
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						// Typical action to be performed when the document is ready:
						//console.log(xhttp.responseText);
						var html_data="";
						html_data+= " <table id='grpChkBox' class='table table-lite table-sm table-bordered w-auto'>	    ";	
							//html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='INSTNAME'/>INST. NAME</label></th>       ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='PCBID'/>PCB ID</label></th>        ";
							//html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='ITEMNO'/>ITEM NO</label></th>        ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='DESCRIPTION'/>DESCRIPTION</label></th>        ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='PARTNO'/>PART NO</label></th>        ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='MAKE'/>MAKE</label></th>        ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='PACKAGE'/>PACKAGE</label></th>        ";
							//html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='CATEGORYITEM'/>CATEGORY ITEM</label></th>        ";
							//html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='QTYUNIT'/>QTY UNIT</label></th>        ";
							//html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='TOTALQTY'/>TOTAL QTY</label></th>        ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='TEMPRANGE'/>TEMP RANGE</label></th>        ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='MSLLEVEL'/>MSL LEVEL</label></th>        ";
							html_data += " <th onClick=''><label style='cursor:pointer; padding:5px;' title='Click to Hide/Show'><input type='checkbox' style='cursor:pointer;' title='Click to Hide/Show' name='APPROVAL'/>APPROVAL</label></th>        ";
						html_data +=" </table><br>	";
						var obj= JSON.parse(this.responseText);	
						
						html_data +="<table id='customers' class='table table-striped table-bordered'><tbody><tr>";
							html_data += " <th onClick='' class=''/>Sl No</th>       ";
							html_data += " <th onClick='' class='INSTNAME'/>INST. NAME</th>       ";
							html_data += " <th onClick='' class='PCBID'/>PCB ID</th>        ";
							//html_data += " <th onClick='' class='ITEMNO'/>ITEM NO</th>        ";
							html_data += " <th onClick='' class='DESCRIPTION'/>DESCRIPTION</th>        ";
							html_data += " <th onClick='' class='PARTNO'/>PART NO</th>        ";
							html_data += " <th onClick='' class='MAKE'/>MAKE</th>        ";
							html_data += " <th onClick='' class='PACKAGE'/>PACKAGE</th>        ";
							html_data += " <th onClick='' class='CATEGORYITEM'/>CATEGORY ITEM</th>        ";
							html_data += " <th onClick='' class='QTYUNIT'/>QTY UNIT</th>        ";
							html_data += " <th onClick='' class='TOTALQTY'/>TOTAL QTY</th>        ";
							html_data += " <th onClick='' class='TEMPRANGE'/>TEMP RANGE</th>        ";
							html_data += " <th onClick='' class='MSLLEVEL'/>MSL LEVEL</th>        ";
							html_data += " <th onClick='' class='APPROVAL'/>APPROVAL</th>        ";
						html_data += "</tr>";
						
						for (var i=0;i<obj.slno.length;i++)
						{
							html_data += "<tr><td align='center'></td>";
							html_data += "<td align='left'>"+obj.inst_name[i]+"</td>";
							html_data += "<td align='left'>"+obj.pcb_name[i]+"</td>";
							//html_data += "<td align='left'>"+obj.item_no[i]+"</td>";
							html_data += "<td align='left'>"+obj.description[i]+"</td>";
							html_data += "<td align='left'>"+obj.part_no[i]+"</td>";
							html_data += "<td align='left'>"+obj.make[i]+"</td>";
							html_data += "<td align='left'>"+obj.package[i]+"</td>";
							html_data += "<td align='center'>"+obj.category_item[i]+"</td>";
							html_data += "<td align='right'>"+obj.qty_unit[i]+"</td>";
							html_data += "<td align='right'>"+obj.total_qty[i]+"</td>";
							html_data += "<td align='center'>"+obj.temp_range[i]+"</td>";
							html_data += "<td align='center'>"+obj.msl_level[i]+"</td>";
							html_data += "<td align='center'>"+obj.approval[i]+"</td></tr>";
							
						}
						
						html_data += '</tbody>';
						html_data += '<tr>                                     ';
						html_data += '	<th align="right" ></th>               ';
						html_data += '	<th align="right" ></th>               ';
						html_data += '	<th align="right" ></th>               ';
						html_data += '	<th align="right" ></th>               ';
						html_data += '	<th align="right" ></th>               ';
						html_data += '	<th align="right" ></th>               ';
						html_data += '	<th align="right" ></th>               ';
						//html_data += '	<th align="right" ></th>               ';
						//html_data += '	<th align="right" ></th>               ';
						html_data += '	<th align="right" ><b>Total:</b></td>  ';
						html_data += '	<th align="right" title="" onmouseenter="updateTitle(this)" id="table8Tot1"></td>';        
						html_data += '	<th align="right" title="" onmouseenter="updateTitle(this)" id="table8Tot2"></td>';
						html_data += '	<th align="right" ></td>			   ';
						html_data += '	<th align="right" ></td>			   ';
						html_data += '	<th align="right" ></td>			   ';
						html_data += '</tr>';
						html_data += "</table><br>";
						html_data += "<button class='btn btn-md btn-outline-info' type='button' onClick='printRepData()' style='font-size: 14px;font-weight: bold;'>Print</button>";
						//console.log(html_data);
						document.getElementById("bomdata").innerHTML =html_data;
						$('#deletesuccess').hide();
						$('#printdata1').css({display: 'block'});
						$('#printdata2').css({display: 'block'});
						
						var totRowIndex = tf_Tag(tf_Id('customers'), "tr").length;
						var table2_Props = {
							
							//filters_row_index: 1,
							sort: true,  
							 sort_config: {  
								sort_types:['String','String','String','String','String','String','US','US','US','US','US']  
							}, 
							
							col_0	: "none",
							col_1	: "select",
							col_2	: "select",
							col_3	: "select",
							col_4	: "select",
							col_5	: "select",
							col_6	: "select",
							col_7	: "select", 
							col_8	: "none", 
							col_9	: "none", 
							col_10	: "none", 
							col_11	: "select", 
							col_12	: "select", 
							col_13	: "select", 
							
							display_all_text: "All",
							//sort_select: true,
							
							//rows_counter: true,
							col_operation: {
								id: ["table8Tot1", "table8Tot2"],
								col: [8,9],
								operation: ["sum", "sum"],
								write_method: ["innerHTML", "innerHTML"],
								exclude_row: [totRowIndex],
								decimal_precision: [2, 2]
							},						
							rows_always_visible: [totRowIndex]
						};
						var tf2 = setFilterGrid("customers", table2_Props);
						$(function () 
						{
							var $chk = $("#grpChkBox input:checkbox"); 
							var $tbl = $("#customers");
							var $tblhead = $("#customers th");

							$chk.prop('checked', true); 

							$chk.click(function () {
								var colToHide = $tblhead.filter("." + $(this).attr("name"));
								var index = $(colToHide).index();
								$tbl.find('tr :nth-child(' + (index + 1) + ')').toggle();
							});
							
							$("#search").on("keyup", function() {
							var value = $(this).val().toLowerCase();
							$("#searchbody tr").filter(function() {
							  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						  });
						});
					}
				};
				xhttp.open("GET", http_url, true);
				xhttp.send();
			}
			
			catch(err){
				console.log(err);
			}
		}
		periodic_update();
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
<nav class="navbar navbar-expand-sm navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="#"><b>BILL OF MATERIAL <?php echo "(".$_SESSION['adminusername'].")";?></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav mr-auto justify-content-left">				
				<li class="nav-item" id="printdata1" style="display:none;">
				<?php date_default_timezone_set('Asia/Kolkata');
					$exportFileName="BOM_".date("d-M-Y")."Book1.csv";?>
                    <a class="nav-link" href="#"><button class="btn btn-outline-success" onClick= 'exportTableToCSV("<?php echo $exportFileName; ?>")'>Export</button></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href='requirement.php'><button class="btn btn-outline-danger">Requirement</button></a>
                </li>
				<li class="nav-item" id="printdata2" style="display:none;">
                    <a class="nav-link" href="#"><button onclick="printRepData()" class="btn btn-outline-success">Print</button></a>
                </li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#portfolioModal1"><button class="btn btn-outline-success">Change Pwd</button></a>								
				</li>
				<li class="nav-item">
                    <a class="nav-link" href='logout.php'><button class="btn btn-outline-danger">Logout</button></a>
                </li>
            </ul>
        </div>
    </nav>
<br>
<center>	
	<div id="bomdata" name="bomdata">
	
	</div>
	<h3 id='deletesuccess' style='color:red';><img src="images/loading18.gif"/></h3>
</center>
<footer class="footer p-1" id="footerPrint">
	<?php 	
		date_default_timezone_set('Asia/Kolkata');
		$copyYear=date("Y");
		?>		
		<center><p class="mt-1 mb-1 text-muted"> &copy; <?php echo $copyYear;?>&nbsp; <a href="mailto:manti_madhu@ecil.co.in">RID Software Development Team</a></p></center>	
</footer>

<!-- Portfolio Modal  Change Password-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" name="portfolioModal1"  tabindex="-1" role="dialog" aria-labelledby="#portfolioModal0Label" aria-hidden="true">
            <div class="modal-dialog modal-m" role="form">
                <div class="modal-content">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-primary mb-0">Change Password</h2>  <br>                                  
                                    <!-- Portfolio Modal - Text--><form class="form-signin" role="form" method="post" action="bomdata.php"> 
									  <label for="pwdusername" class="sr-only">User Name</label>
									  <input type="text"  name="pwdusername" id="pwdusername" class="form-control" placeholder="User Name" value="<?php echo $_SESSION['druguserid']; ?>" readonly>
									  <label></label>
									  <label for="pwdoldpwd" class="sr-only">Old Password</label>
									  <input type="password"  name="pwdoldpwd" id="pwdoldpwd" class="form-control" placeholder="Old Password" value="" required autofocus>
									  <label></label>
									  <label for="pwdnewpwd" class="sr-only">New Password</label>
									  <input type="password"  name="pwdnewpwd" id="pwdnewpwd" class="form-control" placeholder="New Password" value="" required>
									  <label></label>
									  <label for="pwdcnfpwd" class="sr-only">Confirm Password</label>
									  <input type="password" name="pwdcnfpwd" id="pwdcnfpwd" class="form-control" placeholder="Confirm Password" value="" required><br>
									  <input class="btn btn-lg btn-success btn-block" type="submit" value="Change Password" name="changepwd" >	
									  <button class="btn btn-lg btn-info btn-block" href="#" data-dismiss="modal"><i class="fas fa-times fa-fw"></i>Cancel</button>
									  <br>
									  <b><label id="chngpwdstatus" name="chngpwdstatus" style="color:red;" value=""></label></b>
									  <p class="mt-3 mb-3 text-muted">&copy; 2021</p>								
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
<?php 
if(isset($_POST['changepwd'])) 
{
	$pwdoldpwd		= $_POST['pwdoldpwd'];
	$pwdnewpwd		= $_POST['pwdnewpwd'];
	$pwdcnfpwd		= $_POST['pwdcnfpwd'];
		
	$druguser_pass_old=	$_SESSION['druguserpwd'];	
	
	if($pwdoldpwd==$druguser_pass_old)
    {
		if($pwdnewpwd==$pwdcnfpwd)
		{
			$conn=ConnectDB();
			$sqlquery= "UPDATE usertbl set password='".$pwdnewpwd."' WHERE userid='".$_SESSION['druguserid']."'";
			//echo $sqlquery;
			if ($conn->query($sqlquery) === TRUE) 
			{	
				$_SESSION['druguserpwd']=$pwdnewpwd;
				echo "<div class='text-center'>";
				echo '<script>document.getElementById("chngpwdstatus").innerHTML="Password Changed Successfully...!!! "; myFunction();
				  $(document).ready( function() {
					$("#chngpwdstatus").delay(5000).fadeOut();
				  });</script>';
				echo "<meta http-equiv='refresh' content='5;url=bomdata.php'>";
				echo "</div>";
			}
			else 
			{
				echo "Error: " . $sqlquery . "<br>" . $conn->error;
			}			
			$conn->close();	
			
		}
		else
		{			
			echo '<script>document.getElementById("chngpwdstatus").innerHTML="Passwords Not Matching...!!! "; myFunction();
				  $(document).ready( function() {
					$("#chngpwdstatus").delay(5000).fadeOut();
				  });</script>';
		}
	}
	else
	{			
		echo '<script>document.getElementById("chngpwdstatus").innerHTML="Old Password Incorrect...!!! "; myFunction();$(document).ready( function() {
					$("#chngpwdstatus").delay(5000).fadeOut();
				  });</script>';
	}
}

?>