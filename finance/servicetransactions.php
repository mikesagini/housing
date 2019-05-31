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
	0 =>'service_id', 
	1 =>'receipt_no',
		
	3=> 'provider',
	
	4=> 'code',
	5=> 'date',
	6=> 'account',
	7=> 'amount',
	
	
	
			
);

// getting total number records without any search
$sql = "SELECT service_id,receipt_no,provider,code,date,account,amount";
$sql.=" FROM service_transactions  ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT service_id,receipt_no,provider,code,date,account,amount";
$sql.=" FROM service_transactions   WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( service_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR receipt_no LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR provider LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR code LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR date LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR account LIKE '".$requestData['search']['value']."%' ";

$sql.=" OR amount LIKE '".$requestData['search']['value']."%'
 
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

	$nestedData[] = $row["service_id"];
	$nestedData[] = $row["receipt_no"];
	$nestedData[] = $row["provider"];
	
	
	$nestedData[] = $row["code"];
	
	$nestedData[] = $row["date"];
	$nestedData[] = $row["account"];
	$nestedData[] = $row["amount"];
	
   




	
	
	
    
		
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
