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
	0 =>'transaction_id', 
	1 =>'receipt_no',
		
	3=> 'tenant_name',
	
	
	5=> 'property_name',
	6=> 'unit_name',
	7=> 'amount',
	8=> 'date',
	9=> 'balance',
	10=>'trans_status',
	10=>'trans_nature',
	
	
	
			
);

// getting total number records without any search
$sql = "SELECT all_transactions.*,units.*,properties.*,tenants.*,service_transactions.*";
$sql.=" FROM all_transactions LEFT JOIN properties ON all_transactions.property_id=properties.property_id LEFT JOIN units ON units.unit_id=all_transactions.unit_id LEFT JOIN tenants ON all_transactions.tenant_id=tenants.tenant_id LEFT JOIN service_transactions ON service_transactions.service_id=all_transactions.service_id ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT all_transactions.*,units.*,properties.*,tenants.*,service_transactions.*";
$sql.=" FROM all_transactions LEFT JOIN properties ON all_transactions.property_id=properties.property_id LEFT JOIN units ON units.unit_id=all_transactions.unit_id LEFT JOIN tenants ON all_transactions.tenant_id=tenants.tenant_id LEFT JOIN service_transactions ON service_transactions.service_id=all_transactions.service_id WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( all_transactions.transaction_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR service_transactions.receipt_no LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR tenants.tenant_name LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR properties.property_name LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR units.unit_name LIKE '".$requestData['search']['value']."%' ";

$sql.=" OR service_transactions.amount LIKE '".$requestData['search']['value']."%' ";

$sql.=" OR all_transactions.balance LIKE '".$requestData['search']['value']."%' ";
$sql.=" OR all_transactions.trans_date LIKE '".$requestData['search']['value']."%' ";
$sql.=" OR all_transactions.trans_nature LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR all_transactions.trans_status LIKE '".$requestData['search']['value']."%' 
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

	$nestedData[] = $row["transaction_id"];
	$nestedData[] = $row["receipt_no"];
	$nestedData[] = $row["tenant_name"];
	
	
	
	
	$nestedData[] = $row["property_name"];
	$nestedData[] = $row["unit_name"];
	$nestedData[] = $row["amount"];
	$nestedData[] = $row["trans_date"];
	$nestedData[] = $row["balance"];
    $nestedData[] = $row["trans_status"];
    $nestedData[] = $row["trans_nature"];



	
	
	
    
		
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
