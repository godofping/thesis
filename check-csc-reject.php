<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

			$qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
	        $rescode = mysqli_fetch_assoc($qrycode);


			$qrycscreject = mysqli_query($connection,"select count(*) as cntcsc from csc_announcement_table where isApproved = 'Reject' ");
            $rescscreject = mysqli_fetch_assoc($qrycscreject);
     
          	
            echo $rescscreject['cntcsc'];
?>
