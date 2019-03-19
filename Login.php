<?php
include 'cone.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	$UserID = $_POST['edit_ID'];
	$password = $_POST['edit_Password'];


	$sql = "select Account_ID, UserID, UserPassword from accounttbl where UserID = '$UserID' and UserPassword = '$password' ";

	$response = mysqli_query($connec, $sql);

	$result = array();
	$result['login'] = array();

	if ( mysqli_num_rows($response) == 1) {

		$row = mysqli_fetch_assoc($response);
		
		if ($response = mysqli_query($connec, $sql)) {
			
			$index['password'] = $row['UserPassword'];
			$index['id'] = $row['UserID'];
			$index['accountID'] = $row['Account_ID'];
			

			array_push($result['login'], $index);

			$result["success"] = "1";
			$result["message"] = "success";
		

			echo json_encode($result);
			mysqli_close($connec);

		}else {

			$result["success"] = "0";
			$result["message"] = "Error";
		
			echo json_encode($result);
			mysqli_close($connec);

		}


	}

}

?>