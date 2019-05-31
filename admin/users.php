<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */

$date=date('d/m/Y');
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'user_id', 
	1 => 'unational_id',
	2=> 'username',
	3=>'password',
	4=>'category',
	5=>'date_added'
	
	
	
			
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM users ";

//if(!mysql_query($sql){echo mysql_error();})
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT *";
$sql.=" FROM users WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( user_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR unational_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR date_added LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR username LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR category LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR password LIKE '".$requestData['search']['value']."%' 
	 )";
	
	
}
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["user_id"];
	$nestedData[] = $row["unational_id"];
	$nestedData[] = $row["username"];
	
	$nestedData[] = $row["password"];
	$nestedData[] = $row["category"];
	$nestedData[] = $row["date_added"];

	
	
    
		
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
