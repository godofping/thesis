<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

			$qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
	        $rescode = mysqli_fetch_assoc($qrycode);

	        $dpclubcode = $rescode['departmentClubId'];
	    

            $qrydpreject = mysqli_query($connection,"select count(*) as cntdp from department_announcement_table where isApproved = 'Reject' and departmentClubId = '".$dpclubcode."' ");
            $resdpreject = mysqli_fetch_assoc($qrydpreject);


            echo $resdpreject['cntdp'];
?>
