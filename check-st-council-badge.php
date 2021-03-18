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

	$qrycouncilann = mysqli_query($connection, "select * from council_club_announcement_view where isApproved = 'Yes' and CounID = '".$counID."' ");
      	$rescouncil = mysqli_fetch_assoc($qrycouncilann);

		      $timestartcouncil =  $rescouncil['timeStart'];
		      $timeendcouncil =  $rescouncil['timeEnd'];
		      $timeStartSubmittedcouncil = date('Y-m-d h:i:s', strtotime($timestartcouncil));
		      $timeEndSubmittedcouncil = date('Y-m-d h:i:s', strtotime($timeendcouncil));

		      if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmittedcouncil)){
				echo "New";
			}


?>