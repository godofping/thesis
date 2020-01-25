<?php 

	include 'connection.php';
	
	$message = "";

	$studentname = $_POST['studentname'];

	$qry = mysqli_query($connection,"select * from list_student_view where fullName = '".$studentname."' ");
	$resname = mysqli_fetch_assoc($qry);

	if ($resname['fullName'] != $studentname) {
		$message .= "Please Select a Registered Student";
	}

	echo $message;

 ?>