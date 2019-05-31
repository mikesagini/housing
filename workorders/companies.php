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
	0 =>'co_id', 
	1 => 'co_name',
	2=> 'co_reg',
	
	3=> 'co_bank',
	4=> 'co_account',
	5=> 'co_status'
	
	
			
);

// getting total number records without any search
$sql = "SELECT co_id,co_name,co_reg,co_bank,co_account,co_status";
$sql.=" FROM companies ";

//if(!mysql_query($sql){echo mysql_error();})
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT co_id,co_name,co_reg,co_bank,co_account,co_status";
$sql.=" FROM companies WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( co_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR co_name LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR co_reg LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR co_bank LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR co_account LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR co_status LIKE '".$requestData['search']['value']."%' 
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

	$nestedData[] = $row["co_id"];
	$nestedData[] = $row["co_name"];
	$nestedData[] = $row["co_reg"];
	
	$nestedData[] = $row["co_bank"];
	$nestedData[] = $row["co_account"];
	$nestedData[] = $row["co_status"];
	
    
		
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
