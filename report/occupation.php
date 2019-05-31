
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
$query = "SELECT activity_log.user_id,users.username,COUNT(activity_log.user_id) ";
$query.=  " FROM activity_log LEFT JOIN users ON activity_log.user_id=users.user_id GROUP BY username ORDER BY username ASC" ;

$result = mysql_query($query) or die( "<script type='text/javascript'> alert(" . mysql_error(). "  )</script>");
if(!$result){echo "<script type='text/javascript'> alert(" . mysql_error(). ")</script>";}
// get data and store in a json array
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
$user[] = array($row['username' ]);

$times[] = array($row['COUNT(activity_log.user_id)']);


}
//echo json_encode($teams);
?>
