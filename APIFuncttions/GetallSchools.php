<?php


$servername = "mysql-cluster-3-mysql-master.database.svc.cluster.local:3306";
$username = "profighting-85c581";
$password = "bhWV8IIL8Nqb6t-0Flpa";
$dbname = "504316_97815f5880b946b92142461c2260f300";
$conn = mysqli_connect($servername, $username, $password, $dbname);



$items = getItems($price, $conn);
if (empty($items))
    {
        jsonResponse(200, "Items Not Found", NULL);
    }
    else
    {
        jsonResponse(200, "Item Found", $items);

        
    }




function jsonResponse($status, $status_message, $data)
	{
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	$json_response = json_encode($response, JSON_PRETTY_PRINT);
	echo $json_response;
	}

function getItems($price, $conn)
	{
    
	$sql = " SELECT  *  FROM fights ";
    
    
	$resultset = mysqli_query($conn, $sql) 
	$data = array();
	while ($rows = mysqli_fetch_assoc($resultset))
		{
		$data[] = $rows;
		}

	return $data;
	}

?>