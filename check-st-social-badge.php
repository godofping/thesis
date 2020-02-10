<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");

$qrycode = mysqli_query($connection, "select * from student_social_club_view where stprofID = '".$_SESSION['stprofID']."' ");
	        $rescode = mysqli_fetch_assoc($qrycode);

	        

$qrysocialann = mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes' and socialClubId = '".$rescode['socialClubId']."' ");
      $ressocial = mysqli_fetch_assoc($qrysocialann);

      $timestartsocial =  $ressocial['timeStart'];
      $timeendsocial =  $ressocial['timeEnd'];
      $timeStartSubmittedsocial = date('Y-m-d h:i:s', strtotime($timestartsocial));
      $timeEndSubmittedsocial = date('Y-m-d h:i:s', strtotime($timeendsocial));

      if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmittedsocial)){
		echo "New";
	}


?>