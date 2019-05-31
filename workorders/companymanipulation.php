<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'newco'){//first if action entity 
	   $name1		= htmlentities($_POST['name']);
	   $name      = strtolower($name1);
	   $reg1		= htmlentities($_POST['reg']);
	   $reg      = strtoupper($reg1);

	   $bank		= htmlentities($_POST['bank']);
	   $acc		= htmlentities($_POST['acc']);
	   $date        =date('d/m/Y h:i:sa');
	   $status="Active";
	   
	   
		
	
    
	
     
     
     
     
     
       $query1			= mysql_query('SELECT * FROM companies WHERE co_reg="'.$reg.'"');
	
	$num_rows		= mysql_num_rows($query1); 
	
	if($num_rows < 1 )
	
	                {//redundancy avoidance  
	                
	               

     
    
 
		$querym= "INSERT INTO companies(co_name,co_reg,co_bank,co_account,co_status,co_date) VALUES 
	                    ('$name','$reg','$bank','$acc','$status','$date')";
	
	
	
	
	
	 $query	=mysql_query($querym);
		

																if($query )
																           {echo 1; }//add if 
																           
																else
																  {	echo mysql_error();}//add else
	  
	  
	                       }//if no units
	      
	      else{echo 2;}//if co
	  
	  
	  
	  
	  
	  
          }	
else
{echo 0;}//first else

?>