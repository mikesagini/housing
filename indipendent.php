<?php

include 'config.php';



     $stat="Closed" ;		
	
    $query1			= mysql_query("SELECT * FROM workorders WHERE work_status !='$stat'");
    $query=mysql_num_rows($query1); 
   
   
     for($i=0;$i<=$query;$i++)  {
        $q=mysql_fetch_array($query1);
        
        $date        =date('d/m/Y');
        $datew=$q["date_due"];
        $id=$q["work_id"];

        
        $dat=explode("/",$date);
        $dat2=explode("/",$datew);
        
        if(($dat[0]+$dat[1]+$dat[2])>=($dat2[0]+$dat2[1]+$dat2[2]))
          {
       $upd=mysql_query("UPDATE workorders SET work_status='$stat' WHERE work_id='$id' ");
        if(!$upd){echo mysql_error();}   
          
          }
          else{}
          
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       }
    
	         