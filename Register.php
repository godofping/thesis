<?php

	$dbname = "dbthesis";
	$msqlusername = "root";
	$msqlpassword = "vertrigo";
	$servername = "localhost";

	$conn = mysqli_connect($servername, $msqlusername, $msqlpassword, $dbname);

	if ($conn) {
 	// $image = $_POST["image"];
 	// $photo = $_POST["PICTURE"];
 	// $ID = $_POST["ID"];
 	// $Password = $_POST["Password"];
 	$Fname = $_POST["Edit_Fname"];
 	$Mname = $_POST["Edit_Mname"];
 	$Lname = $_POST["Edit_Lname"];
 	

	// $upload_path = "uploads/$ID.jpg";

	// $finalPath = $upload_path;

 	$sql2 = "insert into studenttbl(fname, mname, lname) values ('$Fname' , '$Mname' , '$Lname')";
 	

 	if (mysqli_query($conn,$sql2)) {
 		
 		//file_put_contents($upload_path, base64_decode($image));
 		echo json_encode(array('response'=>'Accrount Successfully Created'));

 	}
 	}else{
 		echo json_encode(array('response'=>'Account Created failed'));
 	}	

?>