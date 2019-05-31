<?Php
include 'config.php';



if(isset($_POST['action']) && $_POST['action'] == 'accrent'){//isset if
 
	$uid = htmlentities($_POST['acc']);
	   
	

$sql0="SELECT * FROM units WHERE unit_id='$uid' ";
$sql=mysql_query($sql0);

if($sql)
{
     $sql1 = mysql_fetch_assoc($sql);
     $rent=   $sql1["rent"];
     $kodi=   $sql1["lipa_kodi"];
     $output = array($rent,$kodi);
    

  echo json_encode($output); 
     
     

}
else
{

echo json_encode(mysql_error());
}






}//iset if
?>