<?php

	$dbname = "dbthesis";
	$msqlusername = "root";
	$msqlpassword = "vertrigo";
	$servername = "localhost";

	$conn = mysqli_connect($servername, $msqlusername, $msqlpassword, $dbname);

	if ($conn) {
 	
 	$Fname = $_POST["Edit_Fname"];
 	$Mname = $_POST["Edit_Mname"];
 	$Lname = $_POST["Edit_Lname"];
 	
 	$sql2 = "insert into studenttbl(fname, mname, lname) values ('$Fname' , '$Mname' , '$Lname')";
 	

 	if (mysqli_query($conn,$sql2)) {
 		
 		echo json_encode(array('response'=>'Account Successfully Created'));

 	}
 	}else{
 		echo json_encode(array('response'=>'Account Created failed'));
 	}	

?>