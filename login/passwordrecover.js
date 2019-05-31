$(document).ready(function(){

	$('#recover').click(function(){ // 
		var username = $('#usename'); // 
		var pass1 = $('#pass1'); //
		var pass2 = $('#pass2'); //
		var id = $("#staffname").find("option:selected").attr("value"); //

		

		
		
		
			
	if(id == null || id=="ID"){ // 
			//name.focus(); // focus to the filed
			
						/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"select your ID",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/

			
			return false;
		}

	 
		if(username.val() == ''){ // 
			username.focus(); // focus to the filed
						
			
						/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"choose a username",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/

			return false;
			
		}
		
		
		
		
		
    if(pass1.val() == '' || pass1.val().length <6  ){ // Check the password values is empty or not
			pass1.focus();
						/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Enter a new password(min 6 characters) ",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/

			return false;
		}
if(pass2.val() == '' || pass2.val().length <6){ // Check the password values is empty or not
			pass2.focus();
						/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"re-enter that password(min 6 characters)",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/

			return false;
		}
		if(pass1.val() != pass2.val()){ // Check the password values is empty or not
			pass1.focus();
						/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"Passwords dont match,please reenter them",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/

			return false;
		}



		if(username.val() != '' && pass2.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=signup&username='+username.val()+'&password='+pass2.val()+'&id='+id;
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'login/passwordrecover.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
							/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"error(1)",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/
																		
				}
				else if(responseText == 1){
					/*begin notification*/			
					
	/*end notification*/
		window.location = 'login.php';
		MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"success",
Content:"Account created successfully,login now",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
	
				}
				else if(responseText == 2){
						/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"username already exists",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/
																		
				}

				else{
								/*begin notification*/			
					
MsgPop.closeAll(); // Removes messages and resets MsgPop object
MsgPop.displaySmall =true; // Global switch that makes messages full screen
MsgPop.position = "bottom-right";
MsgPop.open({
Type:"error",
Content:"error(2)",
AfterClose:function(){
MsgPop.displaySmall = true;
}
});
		/*end notification*/
				}
			}
			});
		}
		return false;
	});
});
