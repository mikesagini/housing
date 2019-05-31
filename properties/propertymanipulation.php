<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'newprop'){//first if 
	   $name1		= htmlentities($_POST['name']);
	   $name      = strtolower($name1);
	   $storey		= htmlentities($_POST['storey']);
	   $units		= htmlentities($_POST['units']);
	   $owner		= htmlentities($_POST['owner']);
	   $caretaker		= htmlentities($_POST['care']);
	   $loc		= htmlentities($_POST['location']);
	    $location   = strtolower($loc);
	   $county		= htmlentities($_POST['county']);
	   $date        =date('d/m/Y h:i:sa');
		
	
    
		
	
	
	
	
	
	$query	=mysql_query("INSERT INTO properties(property_name,storeys,units,owner_id,caretaker_id,location,county,date) VALUES 
	                    ('$name','$storey','$units','$owner','$caretaker','$location','$county','$date')");
		

	if($query )
	           {echo 1; }//add if 
	           
	else
	  {	echo 0;}//add else
	  
	  
		}//first if action entity			
					
else
{echo 0;}//first else

?>