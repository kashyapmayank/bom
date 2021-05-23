

	function printRepData()
		{   
			var win = window.open('','','left=0,top=0,toolbar=0,scrollbars=0,status =0');
			var content = "<html><link rel='stylesheet' type='text/css' href='stylesprint.css'><center>";
			content += "<h2>BILL OF MATERIAL Report</h2>";
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
			content+="</tbody></table><p>&copy; 2021</p>";
			content+="***This is a Computer Generated Report.***";
			content += "</body></center>";
			content += "</html>";
			win.document.write(content);
			win.document.close();
		}
		
	
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
addEventListner(document.getElementById('table8Tot2'));
addEventListner(document.getElementById('table8Tot3'));
addEventListner(document.getElementById('table8Tot4'));
addEventListner(document.getElementById('table8Tot5'));
addEventListner(document.getElementById('table8Tot6'));
addEventListner(document.getElementById('table8Tot7'));
addEventListner(document.getElementById('table8Tot8'));
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
	
	