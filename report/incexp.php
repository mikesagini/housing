
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
$query = "SELECT properties.property_name,income_expense.*,SUM(income_expense.inc_amount),SUM(income_expense.exp_amount) ";
$query.=  " FROM properties  LEFT JOIN income_expense ON properties.property_id=income_expense.property_id ";
$query.="  GROUP BY property_name ORDER BY property_name ASC " ;
$result = mysql_query($query) or die( "<script type='text/javascript'> alert(" . mysql_error(). "  )</script>");
if(!$result){echo "<script type='text/javascript'> alert(" . mysql_error(). ")</script>";}
// get data and store in a json array
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
$prop[] = array($row['property_name' ]);

$inc[] = array($row['SUM(income_expense.inc_amount)']);
$exp[] = array($row['SUM(income_expense.exp_amount)']);

}
//echo json_encode($teams);
?>
