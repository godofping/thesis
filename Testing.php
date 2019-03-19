<?php

	
if ($_SERVER['REQUEST_METHOD']=='POST') {
	
	$accountID = $_POST['accountID'];

	require_once 'cone.php';

	$sql = "select * from studenttbl where StudentID = '". $accountID ."'";

	$response = mysqli_query($connec, $sql);

	$result = array();
	$result['read'] = array();


	if (mysqli_fetch_assoc($response) > 0) {


		if ($row = mysqli_fetch_assoc($response)) {
		
			array_push($result["read"], $h);

			$result["success"] = "1";
			echo json_encode($result);

		}


		// $result["success"] = "1";
		// $result["message"] = "success";
		// echo json_encode($result);

	}else{
			$result["success"] = "0";
			$result["message"] = "Error!";
		
			echo json_encode($result);
			mysqli_close($connec);
		}




}

?>