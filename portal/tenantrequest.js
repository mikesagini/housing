$(document).ready(function(){
	
	$('#new_req').click(function(){
 $("#req_mod").addClass("fade").modal("show");
	









 });//end new property button
	
	
	
	
		$('#makereq').click(function(){ // 
		var issue = $('#iss'); 
		var cat = $('#catg'); // 
		var nid = $('#nid'); //
		
		
				
		
		

if(issue.val() == ''){ // ...


			issue.focus(); // ...


			document.getElementById("i2").innerHTML="Fill in issue";
			
			
			return false;
		}

		

if(cat.val() == ''){ // ...


			cat.focus(); // ...


			document.getElementById("c2").innerHTML="select in category";
			return false;
		}


	
	
		if(nid.val() != '' && issue.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newreq&iss='+issue.val()+'&cat='+cat.val()+'&nid='+nid.val();		
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'portal/tenantrequest.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#req_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to make request",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#req_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Success Making Request",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});



				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#req_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"unit already in database!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}
				
				
				
				else{
					alert(responseText);
$('#req_mod').modal('hide');
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

