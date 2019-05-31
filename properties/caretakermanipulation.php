<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'newcare'){//first if 
	   $name1		= htmlentities($_POST['name']);
	   $name      = strtolower($name1);
	   $id		= htmlentities($_POST['id']);
	   $reside		= htmlentities($_POST['reside']);
	   $mobile		= htmlentities($_POST['mobile']);
	
	   $county		= htmlentities($_POST['county']);
	   $date        =date('d/m/Y h:i:sa');
	   $cat="caretaker";
		
	
    $query1			= mysql_query('SELECT * FROM caretakers WHERE cnational_id="'.$id.'" ');
	
	$num_rows		= mysql_num_rows($query1); 
	
	if($num_rows < 1 )
	
	                {//if no such owner
 
		
	
	
	
	
	
	$query	=mysql_query("INSERT INTO caretakers (caretaker_name,cnational_id,caretaker_residence,caretaker_county,caretaker_mobile,date) VALUES 
	                    ('$name','$id','$reside','$county','$mobile','$date')");
		

	if($query )
	           {
	           
$query11		= mysql_query("INSERT INTO users(unational_id,category) VALUES ('$id','$cat') ");                

  if($query11){echo 1;}
  else{echo 0;}




 }//add if 
	           
	else
	  {	echo 0;}//add else
	  
	  
		
		
                   }//no such owner
                   
                  else
                 {echo 2;}//such owner
 
                }//first if action entity 
  			
					
else
{echo 0;}//first else

?>