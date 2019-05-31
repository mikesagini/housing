
<?php
#Include the connect.php file
$hostname = "localhost" ;
$database = "project" ;
$username = "root" ;
$password = "";

#Connect to the database
//connection String
$connect = mysql_connect($hostname, $username, $password)
or die( 'Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False){
   print "can't find $database" ;
}
$query = "SELECT properties.property_name,COUNT(properties.property_name),tenant_issues.unit_id ";
$query.=  " FROM tenant_issues LEFT JOIN units ON units.unit_id=tenant_issues.unit_id  ";
$query.=" LEFT JOIN properties ON properties.property_id=units.property_id " ;
$query.=" GROUP BY property_name ORDER BY property_name ASC " ;

$result = mysql_query($query) or die( "<script type='text/javascript'> alert(" . mysql_error(). "  )</script>");
if(!$result){echo "<script type='text/javascript'> alert(" . mysql_error(). ")</script>";}
// get data and store in a json array
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
$prope[] = array($row['property_name' ]);

$time[] = array($row['COUNT(properties.property_name)']);


}
//echo json_encode($teams);
?>
