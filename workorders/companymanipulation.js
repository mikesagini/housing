$(document).ready(function(){
	
	$('#new_company').click(function(){
	$('#editco').prop("disabled",true);
	$('#addco').prop("disabled",false);
 $("#company_mod").addClass("fade").modal("show");
	









 });//end new property button
	
	
	
	
		$('#addco').click(function(){ // 
		var name = $('#cname'); 
		var reg = $('#creg'); // 
		var acc = $('#cacc'); //
		var bank = $('#cbank'); //  
		
		
				
		
		

if(name.val() == ''){ // ...


			name.focus(); // ...


			document.getElementById("n2").innerHTML="Fill in Name";
			
			
			return false;
		}

		

if(reg.val() == ''){ // ...


			reg.focus(); // ...


			document.getElementById("reg2").innerHTML="registration required";
			return false;
		}


if(bank.val() == ''){ // ...


			bank.focus(); // ...


			document.getElementById("ba2").innerHTML="insert bank ";
			return false;
		}


if(acc.val() == ''){ // ...


			acc.focus(); // ...


			document.getElementById("ac2").innerHTML="Insert account ";
			return false;
		}
		
		
		
	
		if(name.val() != '' && reg.val() != '' )
		{ // Check 			
		                  var UrlToPass = 'action=newco&name='+name.val()+'&reg='+reg.val() +
			                '&acc='+acc.val()+'&bank='+bank.val();		
			                
	$.ajax({ // 
			type : 'POST',
			
			data : UrlToPass,
			url  :'workorders/companymanipulation.php',
			success: function(responseText){ // 
				if(responseText == 0){
					

		/*begin notification*/			
				$('#company_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Failed to add company",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/			
					
					
					
				}
				else if(responseText == 1){
					
$('#company_mod').modal('hide');

MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Company Added Successfully",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});



				}
				
				else if(responseText==2)
				
				{
				
	/*begin notification*/			
				$('#company_mod').modal('hide');	
MsgPop.closeAll(); //...

MsgPop.displaySmall =true; //...

MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Company already in database!",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/	
				
				
				}
				
				
				
				else{
				alert(responseText);
$('#company_mod').modal('hide');
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

