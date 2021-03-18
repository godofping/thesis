<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "", "project_db");

$qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
	        $rescode = mysqli_fetch_assoc($qrycode);

	        $counID = $rescode['CounID'];
	        $councilName = $rescode['CounName'];
	        $dpclubcode = $rescode['departmentcode'];
	        $dpclubName = $rescode['departmentClubName'];

$qrydpann = mysqli_query($connection, "select * from departmental_club_announcement_view where isApproved = 'Yes' and departmentClubId = '".$rescode['departmentClubId']."' ");
      $resdpann = mysqli_fetch_assoc($qrydpann);

      $timestartdp =  $resdpann['timeStart'];
      $timeenddpd =  $resdpann['timeEnd'];
      $timeStartSubmitteddp = date('Y-m-d h:i:s', strtotime($timestartdp));
      $timeEndSubmitteddp = date('Y-m-d h:i:s', strtotime($timeenddpd));

      if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmitteddp)){
		echo "New";
	}


?>