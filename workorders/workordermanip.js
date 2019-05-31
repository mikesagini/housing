  
  
  $(document).ready(function(){


 



  
  
  
  
  
  
$(document).ready(function(){
	
	$('#new_workorder').click(function(){
	$('#editwork').prop("disabled",true);
	$('#addwork').prop("disabled",false);
 $("#workorder_mod").addClass("fade").modal("show");
	









 });//end new property button
	
	
	//add tenant
	
		$('#addwork').click(function(){ // 
		
		

	
     	
		var iss = $('#wissue');
     	var sum = $('#wsum');
        var due = $('#ddue');
     	var comp = $('#wco');
     	var cost = $('#wcost');

				
	if((iss.val()=='' )){ // Check 
			iss.focus();
			document.getElementById("wis2").innerHTML="Select  Issue";
			return false;
		}


if(sum.val() == ''){ // ...


			sum.focus(); // ...


			document.getElementById("ws2").innerHTML="Fill in summary";
			
			
			return false;
		}
		
		
if(due.val() == ''){ // ...


			//prop.focus(); // ...


			document.getElementById("dd2").innerHTML="Select date";
			
			
			return false;
		}

if(comp.val() ==''){ // Check 
			comp.focus();
			document.getElementById("com2").innerHTML="Select  company";
			return false;
		}

if((cost.val() == '') || (isNaN(cost.val()))){ // ...


			cost.focus(); // ...


			document.getElementById("cst2").innerHTML="Fill in cost";
			return false;
		}

	
 
		
		
		
	
		if(cost.val() != '' && iss.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newwork&sum='+sum.val()+'&due='+due.val()+'&comp='+comp.val()
		                  +'&iss='+iss.val()+'&cost='+cost.val();
		              //alert(UrlToPass);    
		                  	
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'workorders/workordermanip.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#workorder_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to open workorder",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#workorder_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Workorder Successfully opened",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

             
         
				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#workorder_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"warning",
Content:"WorkOrder In progress",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}
				
				

				
				
				else{
					alert(responseText);
$('#workorder_mod').modal('hide');
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"database error!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});

				}
			}
			});
		}
		return false;
	});
});

 //add tenant end 
  
  });//doc load
  
  
  
  
  
  
  
  
