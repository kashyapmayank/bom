<?php include 'functions.php'; 
session_start();//session starts here
if(!isset($_SESSION['druguserid']))
	{
		echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
	}
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../../img/tejulogo.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="filtergrid.css">
	<script type="text/javascript" src="tablefilter_all_min.js"></script>
	<script src="script.js"></script>
	<script src="jquery.min.js"></script>
	<script src="propper.min.js"></script>
	<script src="bootstrap.min.js"></script>
    <title>Drug Report</title>
</head>
<script>

	function printRepData()
		{   
			var win = window.open('','','left=0,top=0,toolbar=0,scrollbars=0,status =0');
			var content = "<html><link rel='stylesheet' type='text/css' href='stylesprint.css'><center>";
			content += "<h2>Vennala Clinic</h2>";
			content += "<h2>Drugs Report</h2>";
			content += "<body onload=\"window.print(); window.close();\">";	
			content+="<table id='customersind'><tbody>";
			
			var rows = document.getElementById('customers').getElementsByTagName('tr')
			var lastrow=rows.length-1;
			for (var i = 1; i < rows.length; i++) 
		{	
			cols = rows[i].querySelectorAll("td, th");
			if (rows[i].style.display === "none")
			{
			}
			else
			{
				if(i==1 || i==lastrow)
				{
					content+="<th>";
				}
				else
				{
					content+="<tr>";
				}
				for (var j = 0; j < cols.length; j++) 
				{
					if((i==1 && j==0) || (i==lastrow && j==0)  )
					{
						content+="";
					}
					else
					{
						content+="<td>"+cols[j].innerText+"</td>"
					}
							
				}
				if(i==1 || i==lastrow)
				{
					content+="</th>";
				}
				else
				{
					content+="</tr>";
				}
			}
		}
			//content += document.getElementById("customers").outerHTML ;
			content+="</tbody></table><p>&copy; 2020</p>";
			content+="***This is a Computer Generated Report.***";
			content += "</body></center>";
			content += "</html>";
			win.document.write(content);
			win.document.close();
		}
		
	var http_url = "getdatastock.php";
		function periodic_update(){
			var datastr="";
			try{
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						// Typical action to be performed when the document is ready:
						//console.log(xhttp.responseText);
						document.getElementById("stocks").innerHTML = this.responseText;
						//document.getElementById("datetime").innerHTML = xhttp.responseText;
						var totRowIndex = tf_Tag(tf_Id('customers'), "tr").length;
						var table2_Props = {
							
							//filters_row_index: 1,
							sort: true,  
							 sort_config: {  
								sort_types:['String','String','String','String','US']  
							}, 
							
							col_0	: "none",
							col_1	: "select",
							col_2	: "select",
							col_3	: "select",
							col_4	: "none",
							
							display_all_text: "All",
							//sort_select: true,
							
							//rows_counter: true,
							col_operation: {
								id: ["table8Tot1"],
								col: [4],
								operation: ["sum"],
								write_method: ["innerHTML"],
								exclude_row: [totRowIndex],
								decimal_precision: [2]
							},						
							rows_always_visible: [totRowIndex]
						};
						var tf2 = setFilterGrid("customers", table2_Props);
						
						
					$(function () {
						var $chk = $("#grpChkBox input:checkbox"); 
						var $tbl = $("#customers");
						var $tblhead = $("#customers th");

						$chk.prop('checked', true); 

						$chk.click(function () {
							var colToHide = $tblhead.filter("." + $(this).attr("name"));
							var index = $(colToHide).index();
							$tbl.find('tr :nth-child(' + (index + 1) + ')').toggle();
						});
					});	
					}				
				};
				xhttp.open("GET", http_url, true);
				xhttp.send();
			}catch(err){
				console.log(err);
			}
		}
		periodic_update();
	//setInterval(function(){ periodic_update() }, 60000);
function numberInWords (num) 
{
	var dot=false;
	if(num.toString().includes("."))
	{
		dot=true;
		var dec= num.toString().split(".");		
		num=parseInt(dec[0]);
	}
	if(num == 0)
	{ 
		return '';
	}
	//alert(num);
	var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
	var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];
   
	if ((num = num.toString()).length > 12) return 'Overflow';
    n = ('00000000000' + num).substr(-12).match(/^(\d{3})(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
	//console.log('n', n)
    if (!n) return; 
	var str = '';
	if(n[1] != 0){
		if(n[1] < 100)
		{
			str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Hundred ' : '';
		}
		else
		{
			str +=    a[n[1][0]] + ' ' + b[n[1][1]] + ' ' + a[n[1][2]] + 'Hundred ';
		}
	}
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Crore ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Lakh ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Thousand ' : '';
    str += (n[5] != 0) ? (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'Hundred ' : '';
    str += (n[6] != 0) ? ((str != '') ? '& ' : '') + (a[Number(n[6])] || b[n[6][0]] + ' ' + a[n[6][1]]) + '' : '';
	//console.log('str', str)
	var str1 = '';
	if(dot)
	{
		if(dec[1].length==1)
			num=parseInt(dec[1])*10;
		else
			num=parseInt(dec[1]);
		if ((num = num.toString()).length > 12) return 'Overflow';
		n = ('00000000000' + num).substr(-12).match(/^(\d{3})(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
		//console.log('n', n)
		if (!n) return; 		
		if(n[1] != 0){
			if(n[1] < 100)
			{
				str1 += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Hundred ' : '';
			}
			else
			{
				str1 +=    a[n[1][0]] + ' ' + b[n[1][1]] + ' ' + a[n[1][2]] + 'Hundred ';
			}
		}
		str1 += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Crore ' : '';
		str1 += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Lakh ' : '';
		str1 += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Thousand ' : '';
		str1 += (n[5] != 0) ? (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'Hundred ' : '';
		str1 += (n[6] != 0) ? ((str != '') ? '& ' : '') + (a[Number(n[6])] || b[n[6][0]] + ' ' + a[n[6][1]]) + '' : '';
		//console.log('str', str)
	}
    if(str1=="")
	{
		return str + 'Rupees';
	}
	else
	{
		return str + 'Rupees' + str1+ " Paise";
	}
}  
function forDecimal(dec)
{
	
}
function addEventListner(obj){
	try{
		if(window.addEventListener) {
		   // Normal browsers
		   obj.addEventListener('DOMSubtreeModified', contentChanged, false);
		} else{
			if(window.attachEvent) {
			  // IE
			  obj.attachEvent('DOMSubtreeModified', contentChanged);
			}
		}
	}
	catch(err){
	}
}

function removeEventListner(obj){
	try{
		if(window.removeEventListener) {
		   // Normal browsers
		   obj.removeEventListener('DOMSubtreeModified', contentChanged, false);
		} else{
			if(window.detachevent) {
			  // IE
			  obj.detachevent('DOMSubtreeModified', contentChanged);
			}
		}
	}
	catch(err){
	}
}

addEventListner(document.getElementById('table8Tot1'));
function contentChanged(event) {
   // this function will run each time the content of the DIV changes
   //console.log('fdgdfg', this.innerHTML);
   if((this.innerHTML > 999) && (this.innerHTML.includes(',') == false))
   {
	removeEventListner(this);
		//this.innerHTML = this.innerHTML  ;
		//console.log('n', this.innerHTML);
		let num = this.innerHTML;
		if ((num = num.toString()).length > 12) return 'overflow';
		let n = ('00000000000' + num).substr(-12).match(/^(\d{3})(\d{2})(\d{2})(\d{2})(\d{3})$/);
		
		 n.shift();
		 while(n[0] == 0){
			 n.shift();
		 }		 
		n[0] = parseInt(n[0]) +''; 
		//console.log('n', n.join(','));
		this.innerHTML = n.join(',');
	addEventListner(this);
   }
}
 
function updateTitle(obj){
	event.preventDefault();
	let stringData = obj.innerHTML;;
	//stringData = "999,87,65,43,210"; 
	stringData = stringData.replace(/,/g,''); 
	//console.log('stringData', stringData);
	obj.title = numberInWords(parseFloat(stringData)); 
}
	
jQuery(document).bind("keyup keydown", function(e){
    if(e.ctrlKey && e.keyCode == 80){
		printRepData();
        return false;
    }
});
		
document.oncontextmenu = function() {
                return false;
            };

	(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
	
	
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
        <a class="navbar-brand" href="#"><b>Drug Report Stock<?php echo "(".$_SESSION['adminusername'].")";?></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav mr-auto justify-content-left">				
				<li class="nav-item" >
				<?php date_default_timezone_set('Asia/Kolkata');
					$exportFileName="StockReport_".date("d-M-Y").".csv";?>
                    <a class="nav-link" href="#"><button class="btn btn-outline-success" onClick= 'exportTableToCSV("<?php echo $exportFileName; ?>")'>Export</button></a>
                </li>
				<li class="nav-item" >
                    <a class="nav-link" href="invoicerep.php"><button class="btn btn-outline-success">Invoice Data</button></a>
                </li>
				<li class="nav-item" >
                    <a class="nav-link" href="drugdata.php"><button class="btn btn-outline-success">Drugdata</button></a>
                </li>
				<li class="nav-item" >
                    <a class="nav-link" href="adddruginv.php"><button class="btn btn-outline-success">Add</button></a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href='../mgmt.php'><button class="btn btn-outline-info">Home</button></a>
                </li>
            </ul>
        </div>
    </nav>
<br>
<center>	
	<div id="stocks" name="stocks">
	
	</div>
</center>
<footer class="footer p-1" id="footerPrint">
	<?php 	
		date_default_timezone_set('Asia/Kolkata');
		$copyYear=date("Y");
		?>		
		<center><p class="mt-1 mb-1 text-muted"> &copy; <?php echo $copyYear;?>&nbsp; <a href="mailto:help@jogulamba.in">Jogulamba Services</a></p></center>	
</footer>
</body>
</html>
