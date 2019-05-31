$(document).ready(function(){
	
	$('#new_caretaker').click(function(){
	$('#editcare').prop("disabled",true);
	$('#addcare').prop("disabled",false);
 $("#caretakers_mod").addClass("fade").modal("show");
	









 });//end new property button
	
	
	
	
		$('#addcare').click(function(){ // 
		var name = $('#caname'); 
		var id = $('#canid'); // 
		var reside = $('#creside'); // 
		var mobile = $('#cmob');
		
       
		var county = $('#ccounty');
		
				
		
		

if(name.val() == ''){ // ...


			name.focus(); // ...


			document.getElementById("n4").innerHTML="Fill in Name";
			
			
			return false;
		}

if((id.val() == '') || (isNaN(id.val()))){ // ...


			id.focus(); // ...


			document.getElementById("i4").innerHTML="Fill in ID";
			return false;
		}

		

if(reside.val() == ''){ // ...


			reside.focus(); // ...


			document.getElementById("r4").innerHTML="Fill in Residence";
			return false;
		}





if(county.val() == ''){ // Check 
			county.focus();
			document.getElementById("co4").innerHTML="select  County";
			return false;
		}
		
if((mobile.val() == '') || (isNaN(mobile.val()))){ // ...


			mobile.focus(); // ...


			document.getElementById("m4").innerHTML="Fill in Phone";
			return false;
		}

		
		
		
	
		if(name.val() != '' && id.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newcare&name='+name.val()+'&id='+id.val() +
			                '&reside='+reside.val()+'&county='+county.val()+'&mobile='+mobile.val();		
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'properties/caretakermanipulation.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#caretakers_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to add caretaker",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#caretakers_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Caretaker Added Successfully",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});



				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#caretakers_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Caretaker already in database!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}
				
				
				
				else{
					//alert('Problem with sql query');
$('#caretakers_mod').modal('hide');
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

