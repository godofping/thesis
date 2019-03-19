<?php

$dbname = "dbthesis";
$msqlusername = "root";
$msqlpassword = "vertrigo";
$servername = "localhost";

$connec = mysqli_connect($servername, $msqlusername, $msqlpassword, $dbname);
 
 if ($connec) {
 	//echo "Connection Success";
 }else{
 	//echo "ngongo";
 }

?>