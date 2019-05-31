<?php
include 'config.php'; 

if(isset($_POST['action']) && $_POST['action'] == 'signup'){ //
	$username 		= htmlentities($_POST['username']); //
	$password 		= htmlentities($_POST['password']); // 
	$id 		= htmlentities($_POST['id']); //
	 $date        =date('d/m/Y h:i:sa'); 


	$query			= mysql_query('SELECT * FROM users WHERE username = "'.$username.'"'); // Check the table with posted credentials
	$num_rows		= mysql_num_rows($query); // 
		if($num_rows > 0){ // 
		echo 2;
	                   } 
	else {
		$query2="UPDATE users SET username='$username', password='$password',date_added='$date' WHERE unational_id='$id'";
		if(mysql_query($query2))
		    {
		    
		    echo 1;
		    
		    }
	   else{echo 0;}
		
		
		
	    }
}
?>