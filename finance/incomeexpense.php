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
	0 =>'ref_id', 
	1 =>'ie_date',
		
	3=> 'income',
	
	
	5=> 'inc_amount',
	6=> 'expense',
	7=> 'exp_amount',
	8=> 'property_name',
	9=> 'unit_name',
	
	
	
			
);

// getting total number records without any search
$sql = "SELECT income_expense.*,properties.property_name,units.* ";
$sql.=" FROM income_expense LEFT JOIN units ON units.unit_id=income_expense.unit_id LEFT JOIN properties ON income_expense.property_id=properties.property_id ";
$query=mysqli_query($conn, $sql) or die("queue.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "SELECT income_expense.*,properties.property_name,units.* ";
$sql.=" FROM income_expense LEFT JOIN units ON units.unit_id=income_expense.unit_id  LEFT JOIN properties ON income_expense.property_id=properties.property_id  WHERE 1=1";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( income_expense.ref_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR income_expense.ie_date LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR income_expense.income LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR income_expense.inc_amount LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR income_expense.expense LIKE '".$requestData['search']['value']."%' ";

$sql.=" OR income_expense.exp_amount LIKE '".$requestData['search']['value']."%' ";

$sql.=" OR properties.property_name LIKE '".$requestData['search']['value']."%' ";
$sql.=" OR units.unit_name LIKE '".$requestData['search']['value']."%' 
 
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

	
     $nestedData[] = $row["ref_id"];
	$nestedData[] = $row["ie_date"];
	$nestedData[] = $row["income"];
	
	
	
	
	$nestedData[] = $row["inc_amount"];
	$nestedData[] = $row["expense"];
	$nestedData[] = $row["exp_amount"];
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
