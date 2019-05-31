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
	0 =>'owner_id', 
	1 => 'owner_name',
	2=> 'onational_id',
	
	3=> 'owner_residence',
	4=> 'owner_county',
	5=> 'owner_mobile',
	
	
			
);

// getting total number records without any search
$sql = "SELECT owner_id,owner_name,onational_id,owner_residence,owner_county,owner_mobile";
$sql.=" FROM owners ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT owner_id,owner_name,onational_id,owner_residence,owner_county,owner_mobile";
$sql.=" FROM owners  WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( owner_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR owner_name LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR onational_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR owner_residence LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR owner_county LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR owner_mobile LIKE '".$requestData['search']['value']."%' 
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

	$nestedData[] = $row["owner_id"];
	$nestedData[] = $row["owner_name"];
	$nestedData[] = $row["onational_id"];
	
	$nestedData[] = $row["owner_residence"];
	$nestedData[] = $row["owner_county"];
	$nestedData[] = $row["owner_mobile"];
	
    
		
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
