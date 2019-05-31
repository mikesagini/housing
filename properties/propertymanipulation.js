$(document).ready(function(){


	
	$('#new_property').click(function(){
	$('#editprop').prop("disabled",true);
	$('#addprop').prop("disabled",false);
 $("#properties_mod").addClass("fade").modal("show");
	

 });//end new property button
	
	
	
	
		$('#addprop').click(function(){ // 
		var name = $('#pname'); 
		var storey = $('#storey'); // 
		var units = $('#units'); // 
		var owner = $('#powner');
		var care= $('#pcare');
		var location = $('#plocation');
       
		var county = $('#pcounty');
		
				
		
		

if(name.val() == ''){ // ...


			name.focus(); // ...


			document.getElementById("n1").innerHTML="Fill in Name";
			
			
			return false;
		}

if((storey.val() == '') || (isNaN(storey.val()))){ // ...


			storey.focus(); // ...


			document.getElementById("s1").innerHTML="Fill in Storeys";
			return false;
		}

if((units.val() == '') || (isNaN(units.val()))){ // ...


			units.focus(); // ...


			document.getElementById("u1").innerHTML="Fill in Units";
			return false;
		}
		

if(owner.val() == ''){ // ...


			owner.focus(); // ...


			document.getElementById("o1").innerHTML="select in owner";
			return false;
		}


if(care.val() == ''){ // ...


			care.focus(); // ...


			document.getElementById("c1").innerHTML="select caretaker ";
			return false;
		}


if(location.val() == ''){ // ...


			location.focus(); // ...


			document.getElementById("l1").innerHTML="Fill in Location";
			return false;
		}

if(county.val() == ''){ // Check 
			county.focus();
			document.getElementById("co1").innerHTML="select  County";
			return false;
		}

		
		
		
	
		if(name.val() != '' && units.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newprop&name='+name.val()+'&storey='+storey.val() +
			                '&units='+units.val() +'&owner='+owner.val()+'&care='+care.val() +'&location='+location.val()+
			                '&county='+county.val();		
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'properties/propertymanipulation.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#properties_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to add property",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#properties_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Property Added Successfully",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});



				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#properties_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"property already in database!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}
				
				
				
				else{
					//alert('Problem with sql query');
$('#properties_mod').modal('hide');
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

