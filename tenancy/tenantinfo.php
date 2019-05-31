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
	0 =>'tenant_id', 
	1 =>'tenant_name',
	2=> 'tnational_id',
	
	3=> 'tenant_address',
	4=> 'tenant_county',
	5=> 'tenant_mobile',
	6=> 'property_name',
	7=> 'unit_name',
	8=> 'lease_status',
	9=> 'date',
	10=>'county'
	
	
	
	
	
			
);

// getting total number records without any search
$sql = "SELECT tenants.tenant_id,tenants.tenant_name,tenants.tnational_id,tenants.tenant_address,tenants.tenant_county,tenants.tenant_mobile,tenants.lease_status,tenants.date,properties.property_name,units.unit_name";
$sql.=" FROM tenants LEFT JOIN properties ON tenants.property_id=properties.property_id LEFT JOIN units ON units.unit_id=tenants.unit_id ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT tenants.tenant_id,tenants.tenant_name,tenants.tnational_id,tenants.tenant_address,tenants.tenant_county,tenants.tenant_mobile,tenants.lease_status,tenants.date,properties.property_name,units.unit_name";
$sql.=" FROM tenants LEFT JOIN properties ON tenants.property_id=properties.property_id LEFT JOIN units ON units.unit_id=tenants.unit_id  WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( tenants.tenant_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR tenants.tenant_name LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR tenants.tnational_id LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tenants.tenant_address LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tenants.tenant_county LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tenant_county LIKE '".$requestData['search']['value']."%' ";

$sql.=" OR tenants.lease_status LIKE '".$requestData['search']['value']."%' ";
$sql.=" OR properties.property_name LIKE '".$requestData['search']['value']."%' ";
$sql.=" OR units.unit_name LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR tenants.tenant_mobile LIKE '".$requestData['search']['value']."%' 
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

	$nestedData[] = $row["tenant_id"];
	$nestedData[] = $row["tenant_name"];
	$nestedData[] = $row["tnational_id"];
	
	$nestedData[] = $row["tenant_address"];
	$nestedData[] = $row["tenant_county"];
	$nestedData[] = $row["tenant_mobile"];
	$nestedData[] = $row["property_name"];
	$nestedData[] = $row["unit_name"];
	$nestedData[] = $row["lease_status"];
	$nestedData[] = $row["date"];




	
	
	
    
		
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
