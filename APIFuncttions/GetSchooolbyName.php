
<?php

if(!empty($_GET['Name'])) {
    $Name=$_GET['Name'];

$servername = "mysql-cluster-3-mysql-master.database.svc.cluster.local:3306";
$username = "martial-art-store-85ee43";
$password = "vLIn-grSEvH-VZff6ZMH";
$dbname = "505420_df89c79c6898550b47850f934b125f1a";
$conn = mysqli_connect($servername, $username, $password, $dbname);



$sql = "SELECT * FROM `MartialArtSchools` WHERE Name LIKE '%". $Name ."%'";
    

$resultset = mysqli_query($conn, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($resultset))
	{
	 $data[] = $row;
	}
    if (empty($data))
    {
        jsonResponse(200, "Items Not Found", NULL);
    }
    else{  jsonResponse(200,"Item Found",$data);}
  
	


}
else{jsonResponse(400,"Invalid Request",NULL);
}
function jsonResponse($status, $status_message, $data)
	{
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	$json_response = json_encode($response, JSON_PRETTY_PRINT);
	echo $json_response;
	}
?>