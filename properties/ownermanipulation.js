$(document).ready(function(){
	
	$('#new_owner').click(function(){
	$('#editowner').prop("disabled",true);
	$('#addowner').prop("disabled",false);
 $("#owners_mod").addClass("fade").modal("show");
	









 });//end new property button
	
	
	
	
		$('#addowner').click(function(){ // 
		var name = $('#oname'); 
		var id = $('#nid'); // 
		var reside = $('#oreside'); // 
		var mobile = $('#omob');
		
       
		var county = $('#ocounty');
		
				
		
		

if(name.val() == ''){ // ...


			name.focus(); // ...


			document.getElementById("n3").innerHTML="Fill in Name";
			
			
			return false;
		}

if((id.val() == '') || (isNaN(id.val()))){ // ...


			id.focus(); // ...


			document.getElementById("i3").innerHTML="Fill in ID";
			return false;
		}

		

if(reside.val() == ''){ // ...


			reside.focus(); // ...


			document.getElementById("r3").innerHTML="Fill in Residence";
			return false;
		}





if(county.val() == ''){ // Check 
			county.focus();
			document.getElementById("co3").innerHTML="select  County";
			return false;
		}
		
if((mobile.val() == '') || (isNaN(mobile.val()))){ // ...


			mobile.focus(); // ...


			document.getElementById("m3").innerHTML="Fill in Phone";
			return false;
		}

		
		
		
	
		if(name.val() != '' && id.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newowner&name='+name.val()+'&id='+id.val() +
			                '&reside='+reside.val()+'&county='+county.val()+'&mobile='+mobile.val();		
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'properties/ownermanipulation.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#owners_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to add owner",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#owners_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Owner Added Successfully",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});



				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#owners_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Owner already in database!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}
				
				
				
				else{
					//alert('Problem with sql query');
$('#owners_mod').modal('hide');
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

