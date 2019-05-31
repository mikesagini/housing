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
	0 =>'property_id', 
	1 => 'property_name',
	2=> 'storeys',
	3=> 'units',
	4=> 'owner_name',
	5=> 'caretaker_name',
	6=> 'location',
	7=> 'county',
	
			
);

// getting total number records without any search
$sql = "SELECT properties.property_id,properties.property_name,properties.storeys,properties.units,owners.owner_name,caretakers.caretaker_name,properties.location,properties.county";
$sql.=" FROM properties LEFT JOIN owners ON owners.owner_id=properties.owner_id LEFT JOIN caretakers on caretakers.caretaker_id=properties.caretaker_id ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT properties.property_id,properties.property_name,properties.storeys,properties.units,owners.owner_name,caretakers.caretaker_name,properties.location,properties.county";
$sql.=" FROM properties LEFT JOIN owners ON owners.owner_id=properties.owner_id LEFT JOIN caretakers on caretakers.caretaker_id=properties.caretaker_id   WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( properties.property_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR properties.property_name LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR properties.storeys LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR properties.units LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR owners.owner_name LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR caretakers.caretaker_name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR properties.county LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR properties.location LIKE '".$requestData['search']['value']."%' )";
	
	
}
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["property_id"];
	$nestedData[] = $row["property_name"];
	$nestedData[] = $row["storeys"];
	$nestedData[] = $row["units"];
	$nestedData[] = $row["owner_name"];
	$nestedData[] = $row["caretaker_name"];
	$nestedData[] = $row["location"];
    $nestedData[] = $row["county"];
		
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
