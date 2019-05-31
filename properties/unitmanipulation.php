<?php

include 'config.php';


if(isset($_POST['action']) && $_POST['action'] == 'newunit'){//first if action entity 
	   $name1		= htmlentities($_POST['name']);
	   $name      = strtolower($name1);
	   $size		= htmlentities($_POST['size']);
	   $rent		= htmlentities($_POST['rent']);
	   $prop		= htmlentities($_POST['property']);
	   $date        =date('d/m/Y h:i:sa');
	   $status="Unoccupied";
	   
	   
		
	
    
	
     
     
     
     
     
       $query1			= mysql_query('SELECT * FROM units WHERE unit_name="'.$name.'" AND unit_size="'.$size.'" AND property_id="'.$prop.'"');
	
	$num_rows		= mysql_num_rows($query1); 
	
	if($num_rows < 1 )
	
	                {//redundancy avoidance  
	                
	               

     
    
	                    
     $query1			= mysql_query('SELECT * FROM units WHERE 1 ');
	
	$num_rows		= mysql_num_rows($query1); 
	
	if($num_rows < 1 )
	
	                {//if no units  
	                
	                
         $kodis=123456;
 
		$querym= "INSERT INTO units(unit_name,unit_size,property_id,lipa_kodi,rent,status,date) VALUES 
	                    ('$name','$size','$prop','$kodis','$rent','$status','$date')";
	
	
	
	
	
	$query	=mysql_query($querym);
		

	if($query )
	           {echo 1; }//add if 
	           
	else
	  {	echo 0;}//add else
	  
	  
	      }//if no units
	      
	      
	  else
	  
	    {//else units available
	    
	    
	    $kodiquery= mysql_query('SELECT MAX(unit_id) FROM units');
	    $rowk = mysql_fetch_assoc($kodiquery);
        $kodi=  $rowk["MAX(unit_id)"];

	    
	    $lipaquery= mysql_query('SELECT lipa_kodi FROM units WHERE unit_id = "'.$kodi.'"  ');
	
     
     
     
     
     if($lipaquery ){// id if
     $rowp = mysql_fetch_assoc($lipaquery);
     $lipa=  $rowp["lipa_kodi"];
	  }
     else{echo 0; return false;}//id else
     
         $kodis=intval($lipa)+1;
     
          $querym= "INSERT INTO units(unit_name,unit_size,property_id,lipa_kodi,rent,status,date) VALUES 
	                    ('$name','$size','$prop','$kodis','$rent','$status','$date')";
	    
	    
	    $query3	=mysql_query($querym);
	   if($query3 )
	           {echo 1; }//add if 
	           
	else
	  {	echo 0;}//add else
 
	    
	    
	    
	  }//else units available
	    
	     }//if redundancy avoidance
	   else
	  {	echo 2;}// else redundancy avoidance
  
	  
	  
	  
	  
		}//first if action entity	
		
		
					
else
{echo 0;}//first else

?>