function LoadPCB(inst_id)
{
	alert(inst_id);
	 var url =  "getpcb.php?inst_id="+inst_id;
			try{
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						
						var resp=xhttp.responseText;
						var obj= JSON.parse(this.responseText);	
						
					
						var html_data="";
						for (var i=0;i<obj.pcb_id.length;i++)
						{
							html_data +='<div class="row-sm-12">';
							html_data +='<label for="pcb'+obj.pcb_id[i]+'">'+obj.pcb_desc[i] +'</label>';
							html_data +='<input type="number" class="form-control" style="text-transform: uppercase;"  id="pcb'+obj.pcb_id[i]+'" name="pcb'+obj.pcb_id[i]+'">';
							html_data +='</div>';
						}
						 
		  document.getElementById("pcb").innerHTML =html_data;
		  
		   
						
						//alert(obj.make.length);
						
					}
				};
				xhttp.open("GET", url, true);
				xhttp.send();
			}
			catch(err){
				//console.log(err);
			} 		
}