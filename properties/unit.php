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
	0 =>'unit_id', 
	1 => 'unit_name',
	2=> 'unit_size',
	
	3=> 'tenant_name',
	4=> 'property_name',
	5=> 'lipa_kodi',
	6=>'rent',
	7=>'status',
	8=>'tenant_mobile'
	
			
);

// getting total number records without any search
$sql = "SELECT units.unit_id,units.unit_name,units.rent,units.unit_size,tenants.tenant_name,tenants.tenant_mobile,properties.property_name,units.lipa_kodi,units.status";
$sql.=" FROM units LEFT JOIN tenants ON units.tenant_id=tenants.tenant_id LEFT JOIN properties ON properties.property_id=units.property_id ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT units.unit_id,units.unit_name,units.rent,units.unit_size,tenants.tenant_name,tenants.tenant_mobile,properties.property_name,units.lipa_kodi,units.status";
$sql.=" FROM units LEFT JOIN tenants ON units.tenant_id=tenants.tenant_id LEFT JOIN properties ON properties.property_id=units.property_id  WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( units.unit_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR units.unit_name LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR units.unit_size LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tenants.tenant_name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tenants.tenant_mobile LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR units.lipa_kodi LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR units.rent LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR units.status LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR properties.property_name LIKE '".$requestData['search']['value']."%' )";
	
	
}
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["unit_id"];
	$nestedData[] = $row["unit_name"];
	$nestedData[] = $row["unit_size"];
	
	$nestedData[] = $row["property_name"];
	$nestedData[] = $row["tenant_name"];
	$nestedData[] = $row["tenant_mobile"];
	$nestedData[] = $row["rent"];
    $nestedData[] = $row["status"];
	$nestedData[] = $row["lipa_kodi"];
	
		
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
