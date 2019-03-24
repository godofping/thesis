<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");

$qrylistofstudentview = mysqli_query($connection, "select * from student_social_table where stprofID = '" . $stprofID . "'");
$reslistofstudentview = mysqli_fetch_assoc($qrylistofstudentview);



//count how many push notifications deployed to the user.
$qry = mysqli_query($connection, "select count(*) as total from social_announcement_isread_table where isApproved = 'Yes' and stprofID = '" . $stprofID . "' and socialClubId = ". $reslistofstudentview['socialClubId'] ." ");
$res = mysqli_fetch_assoc($qry);
$whereToStart = $res['total']; //4


//count if there is next announcement
$qry = mysqli_query($connection, "select * from social_announcement_table where socialClubId = '" . $reslistofstudentview['socialClubId'] . "' and isApproved = 'Yes' LIMIT " . $whereToStart . ",1 ");



$myObj = new stdClass();

if (mysqli_num_rows($qry) > 0) {
	$qry = mysqli_query($connection, "select * from social_announcement_table where socialClubId = '" . $reslistofstudentview['socialClubId'] . "' and isApproved = 'Yes' LIMIT " . $whereToStart . ",1 ");
	$res2 = mysqli_fetch_assoc($qry);
	$social_announcementID = $res2['social_announcementID'];

	$myObj->dateAnnounced = $res2['dateAnnounced'];
	$myObj->toWhom = $res2['toWhom'];
	$myObj->message = $res2['message'];
	$myObj->isApproved = $res2['isApproved'];
	$myObj->toDisplay = "Yes";

	mysqli_query($connection, "insert into social_announcement_isread_table (social_announcementID,stprofID, socialClubId, isApproved) values ('" . $social_announcementID . "', '" . $stprofID . "',  '". $reslistofstudentview['socialClubId'] ."', 'Yes' )");

	$myJSON = json_encode($myObj);

	echo $myJSON;

}
else
{
	$myObj->toDisplay = "No";
	$myJSON = json_encode($myObj);
	echo $myJSON;

}



?>





