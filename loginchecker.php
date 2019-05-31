<?php
include 'sessions.php';
 
/*
function encrypt($string){
	return base64_encode(base64_encode(base64_encode($string)));
}

function decrypt($string){
	return base64_decode(base64_decode(base64_decode($string)));
}
*/
if(isset($_POST['action']) && $_POST['action'] == 'login'){ 
	$username 		= htmlentities($_POST['username']); 
	$password 		= htmlentities($_POST['password']);
	  
	$query			= mysql_query('SELECT * FROM users WHERE username = "'.$username.'" AND password = "'.$password.'" '); // Check the table with posted credentials
	$num_rows		= mysql_num_rows($query);  
	if($num_rows <= 0){ // 
		echo 0;
	} else {
		$fetch = mysql_fetch_array($query);
		
		$userid= $fetch['user_id'];
		$uname= $fetch['username'];
		$date=date('d/m/Y h:i:sa');
		$tolog="INSERT INTO activity_log (user_id,log_in) VALUES ('$userid','$date')";
		if(mysql_query($tolog))
		
		{//to logif
		
		 $sessionq="SELECT * FROM activity_log WHERE log_in='$date'";
		 if(mysql_query($sessionq))
		   {
		 $session = mysql_fetch_array(mysql_query($sessionq));

		$_SESSION['id'] 		= $session['log_id'];
		$_SESSION['category'] 	= $fetch['category'];
		$_SESSION['uname'] 	=  $fetch['username'];
		$_SESSION['n_id']       =$fetch['unational_id'];
			$_SESSION['uid'] =$userid;
		
		  if($_SESSION['category']=="employee" || $_SESSION['category']=="administrator" )
		     {
		       echo 1;
		     }
		    else{echo 3;}
		
		    }//session if 
		    else{echo 0;}//session else
		}//to log if
		else{echo mysql_error();}//to lof else
	}
}
?>