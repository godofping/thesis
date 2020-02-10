<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");

			$qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
	        $rescode = mysqli_fetch_assoc($qrycode);

	        $counID = $rescode['CounID'];

			$qrycouncilreject = mysqli_query($connection,"select count(*) as cntcouncil from council_announcement_table where CounID = '".$counID."' and isApproved = 'Reject' ");
            $rescouncilreject = mysqli_fetch_assoc($qrycouncilreject);
     
          	
            echo $rescouncilreject['cntcouncil'];
?>
