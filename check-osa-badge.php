<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "", "project_db");

$qryosaann = mysqli_query($connection, "select * from dsa_announcement_view order by dsaAnnouncementID desc");
      $resosaann = mysqli_fetch_assoc($qryosaann);

      $timestartosa =  $resosaann['timeStart'];
      $timeendosa =  $resosaann['timeEnd'];
      $timeStartSubmittedosa = date('Y-m-d h:i:s', strtotime($timestartosa));
      $timeEndSubmittedosa = date('Y-m-d h:i:s', strtotime($timeendosa));

	if (strtotime(date('Y-m-d h:i:s'))<strtotime($timeEndSubmittedosa)){
		echo "New";
	}
 



?>





