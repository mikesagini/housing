 
      <?php
      
	include ("config.php");
	
	if(isset($_POST["trans_import"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$prov = $filesop[1];
			$code = $filesop[0];
			$date = $filesop[2];
			$acc = $filesop[3];
			$amt = $filesop[4];
			

       $query1			= mysql_query('SELECT * FROM service_transactions WHERE code="'.$code.'"');
	
	  $num_rows		= mysql_num_rows($query1); 
	
	  if($num_rows < 1 )
	
	                {//no such
			$sql = mysql_query("INSERT INTO service_transactions(provider,code,date,account,amount) VALUES ('$prov','$code','$date','$acc','$amt')");
			$c = $c + 1;
			         }
			         else{
			         continue;}//such
			         
		
		
		}//while
		
		
		
		
			if($sql){
				echo '<script type="text/javascript">window.location = "finance.php"; </script>';
							}
			else{
				echo '<script type="text/javascript">window.location = "finance.php"; </script>';
			}

	}
	
	else {echo "err";}
?>
