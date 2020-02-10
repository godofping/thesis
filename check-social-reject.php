<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");

			$qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
	        $rescode = mysqli_fetch_assoc($qrycode);

	        $qryssocial = mysqli_query($connection, "select * from list_social_club_view where stprofID = ".$_SESSION['accID']." ");
            $ressocial = mysqli_fetch_assoc($qryssocial);

            $qrysocialreject = mysqli_query($connection,"select count(*) as cntsocial from social_announcement_table where isApproved = 'Reject' and socialClubId = '".$ressocial['socialClubId']."' ");
            $ressocialreject = mysqli_fetch_assoc($qrysocialreject);

            echo $ressocialreject['cntsocial'];
?>
