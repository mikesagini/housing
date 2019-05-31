

<?php
 include 'config.php';
                                     
   

$query = mysql_query("SELECT * FROM owners ORDER BY owner_name ASC");
while($fetch = mysql_fetch_array($query))
{
$output[] = array ($fetch[0],$fetch[1]);
}
echo json_encode($output);

  ?> 