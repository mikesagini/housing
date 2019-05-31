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
	0 =>'issue_id', 
	1 =>'tenant_name',
	2=> 'issue',
	
	3=> 'category',
	4=> 'date_raised',
	5=> 'issue_status',
	6=> 'property_name',
	7=> 'unit_name',
	
	
	
			
);

// getting total number records without any search
$sql = "SELECT tenant_issues.issue,tenant_issues.category,tenant_issues.date_raised,tenant_issues.issue_status,tenants.tenant_name,tenant_issues.issue_id,properties.property_name,units.unit_name ";
$sql.=" FROM tenant_issues LEFT JOIN tenants ON tenant_issues.tenant_id=tenants.tenant_id LEFT JOIN units ON tenant_issues.unit_id=units.unit_id LEFT JOIN properties ON properties.property_id=units.property_id ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT tenant_issues.issue,tenant_issues.category,tenant_issues.date_raised,tenant_issues.issue_status,tenants.tenant_name,tenant_issues.issue_id,properties.property_name,units.unit_name ";
$sql.=" FROM tenant_issues LEFT JOIN tenants ON tenant_issues.tenant_id=tenants.tenant_id LEFT JOIN units ON tenant_issues.unit_id=units.unit_id LEFT JOIN properties ON properties.property_id=units.property_id WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( tenant_issues.issue_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR tenants.tenant_name LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR tenant_issues.issue LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR  tenant_issues.category LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR  tenant_issues.date_raised LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR  properties.property_name LIKE '".$requestData['search']['value']."%' ";
   $sql.=" OR  units.unit_name LIKE '".$requestData['search']['value']."%' ";


	
	$sql.=" OR  tenant_issues.issue_status LIKE '".$requestData['search']['value']."%' 
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

	$nestedData[] = $row["issue_id"];
	$nestedData[] = $row["tenant_name"];
	$nestedData[] = $row["property_name"];

    $nestedData[] = $row["unit_name"];
	$nestedData[] = $row["issue"];
	
	$nestedData[] = $row["category"];
	$nestedData[] = $row["date_raised"];
	$nestedData[] = $row["issue_status"];
	




	
	
	
    
		
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

