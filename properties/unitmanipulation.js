$(document).ready(function(){
	
	$('#new_unit').click(function(){
	$('#editunit').prop("disabled",true);
	$('#addunit').prop("disabled",false);
 $("#units_mod").addClass("fade").modal("show");
	









 });//end new property button
	
	
	
	
		$('#addunit').click(function(){ // 
		var name = $('#uname'); 
		var size = $('#usize'); // 
		var property = $('#uprop'); //
		var rent = $('#urent'); //  
		
		
				
		
		

if(name.val() == ''){ // ...


			name.focus(); // ...


			document.getElementById("u2").innerHTML="Fill in Name";
			
			
			return false;
		}

		

if(size.val() == ''){ // ...


			size.focus(); // ...


			document.getElementById("s2").innerHTML="select in type";
			return false;
		}


if(property.val() == ''){ // ...


			property.focus(); // ...


			document.getElementById("up2").innerHTML="select property ";
			return false;
		}
if((rent.val() == '') || (isNaN(rent.val()))){ // ...


			rent.focus(); // ...


			document.getElementById("re2").innerHTML="Fill rent ";
			return false;
		}


		
		
		
	
		if(name.val() != '' && size.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newunit&name='+name.val()+'&size='+size.val() +
			                '&property='+property.val()+'&rent='+rent.val();		
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'properties/unitmanipulation.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#units_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to add unit",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#units_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Unit Added Successfully",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});



				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#units_mod').modal('hide');	
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
					//alert('Problem with sql query');
$('#units_mod').modal('hide');
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

