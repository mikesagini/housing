<?Php
@$cat_id=$_GET['cat_id'];

/// Preventing injection attack //// 
if(!is_numeric($cat_id)){
echo "Data Error";
exit;
 }



$dbhost_name = "localhost"; // Your host name 
$database = "project";       // Your database name
$username = "root";            // Your login userid 
$password = ""; 

$stats="Occupied";          // Your password 
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$sql="SELECT  unit_name,unit_id,lipa_kodi,rent FROM units WHERE property_id='$cat_id' AND status!='$stats'";
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data'=>$result);
echo json_encode($main);
?>