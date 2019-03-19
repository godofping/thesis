<?php

	
// if ($_SERVER['REQUEST_METHOD']=='POST') {
	
	$UserID = $_POST['UserID'];

	require_once 'cone.php';

	$qry = mysqli_query($connec, "select * from studentinfoview where UserID = '". $UserID ."'");

	


	if (mysqli_num_rows($qry) > 0) {
		
	
		echo "success";

	}else{
			
		
	echo "error";
		}




	//while ($row = mysqli_fetch_assoc($response)) {
		

		//echo $row["StudentID"];
		
	//	if ($accountID == $row["StudentID"]) {
			

			// $h['studentsID'] = $row['StudentID'];

  	// 		array_push($result["read"], $h);
			
		//}
		


	//}



// 	if (mysqli_num_rows($response) > 0) {

// 			 $row = mysqli_fetch_assoc($response);


// 			 	$h['studentsID'] = $row['studentID'];

//  			 	array_push($result["read"], $h);
// 				$result["success"] = "1";
// 				$result["message"] = "success";
// 				echo json_encode($result);
// }
// else { 

// 		$result["success"] = "0";
// 		$result["message"] = "Error!";
		
// 		echo json_encode($result);
// 		mysqli_close($connec);


// }

// }

?>