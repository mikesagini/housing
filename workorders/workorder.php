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
	0 =>'work_id', 
	1 => 'issue',
	2=> 'summary',
	
	3=> 'date_opened',
	4=> 'date_due',
	5=> 'work_status',
	6=>'co_name',
	7=>'work_cost',
	8=>'property_name',
	9=>'unit_name'
	
			
);

// getting total number records without any search
$sql = "SELECT workorders.work_id,tenant_issues.issue,workorders.summary,workorders.work_cost,workorders.date_opened,workorders.date_due,workorders.work_status,companies.co_name,properties.property_name,units.unit_name ";
$sql.=" FROM workorders LEFT JOIN tenant_issues ON workorders.issue_id=tenant_issues.issue_id LEFT JOIN companies  ON workorders.co_id=companies.co_id LEFT JOIN units ON units.unit_id=tenant_issues.unit_id LEFT JOIN properties ON properties.property_id=units.unit_id ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT workorders.work_id,tenant_issues.issue,workorders.summary,workorders.work_cost,workorders.date_opened,workorders.date_due,workorders.work_status,companies.co_name,properties.property_name,units.unit_name ";
$sql.=" FROM workorders LEFT JOIN tenant_issues ON workorders.issue_id=tenant_issues.issue_id LEFT JOIN companies  ON workorders.co_id=companies.co_id LEFT JOIN units ON units.unit_id=tenant_issues.unit_id LEFT JOIN properties ON properties.property_id=units.property_id  WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( workorders.work_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR tenant_issues.issue LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR workorders.summary LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR workorders.work_cost LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR workorders.date_opened LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR workorders.date_due LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR workorders.work_status LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR companies.co_name LIKE '".$requestData['search']['value']."%' ";
 $sql.=" OR units.unit_name LIKE '".$requestData['search']['value']."%' ";

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

	$nestedData[] = $row["work_id"];
	$nestedData[] = $row["issue"];
	$nestedData[] = $row["summary"];
	
	$nestedData[] = $row["date_opened"];
	$nestedData[] = $row["date_due"];
	$nestedData[] = $row["work_status"];
	$nestedData[] = $row["co_name"];
	$nestedData[] = $row["work_cost"];
    $nestedData[] = $row["property_name"];
	$nestedData[] = $row["unit_name"];
	
		
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
