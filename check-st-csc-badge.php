<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");

$qrycscann = mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes'");
      $rescsc = mysqli_fetch_assoc($qrycscann);

      $timestartcsc =  $rescsc['timeStart'];
      $timeendcsc =  $rescsc['timeEnd'];
      $timeStartSubmittedcsc = date('Y-m-d h:i:s', strtotime($timestartcsc));
      $timeEndSubmittedcsc = date('Y-m-d h:i:s', strtotime($timeendcsc));

      if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmittedcsc)){
		echo "New";
	}


?>