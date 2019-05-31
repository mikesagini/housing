 <?php
                              include 'config.php';
                              $query=mysql_query("SELECT MAX(transaction_id),tenant_id,balance AS id,tenant_id,balance  FROM all_transactions GROUP BY tenant_id ORDER BY balance DESC");
								if($query){
								while($row=mysql_fetch_array($query))
										  {
										  $tid=$row["tenant_id"];
										  $bbal=$row["balance"];
										  $max=$row["MAX(transaction_id)"];
										 // echo $max."=".$bbal;
										  $query2=mysql_query("SELECT balance FROM all_transactions WHERE transaction_id='$max'");
												 if($query2)
												   {
												   
												   $row2=mysql_fetch_array($query2);
										  
										            $ball=$row2["balance"];

												   
										       echo $max.">".$ball;		   

										       echo "<br/>";
										  
										          }
										  
										  /*
										  $query2			= mysql_query('SELECT * FROM tenants WHERE tenant_id="'.$tid.'"');
	                                                 if(!($query && $query2)){echo mysql_error();}
	                                                 
	                                                 $row3 = mysql_fetch_assoc($query2);
					                                  $name=  $row3["Tenant_name"];
					                                  $mob=  $row3["Tenant_mobile"];
					                                  if(balance < 0)
					                                  {
					                                 echo $name;
				                                         
				                                         }
				                                         else{echo "nope";}

					                          */
					                          
        

										  
										  
										     }
										  }else{echo mysql_error();}
?>