<?php

session_start();
date_default_timezone_set('Asia/Manila');

$adminID = $_SESSION['adminID'];

$connection = mysqli_connect("localhost", "root", "", "project_db");

//count how many push notifications deployed to the user.
$qry = mysqli_query($connection, "select count(*) as total from admincsc_announcement_isread_table where adminID = '".$adminID."' ");
$res = mysqli_fetch_assoc($qry);
$whereToStart = $res['total']; //4

//count if there is next announcement
$qry = mysqli_query($connection, "select * from csc_announcement_table where isApproved = 'No' LIMIT " . $whereToStart . ",1 ");

$myObj = new stdClass();

if (mysqli_num_rows($qry) > 0) {
	$qry = mysqli_query($connection, "select * from csc_announcement_table where isApproved = 'No' LIMIT " . $whereToStart . ",1 ");
	$res2 = mysqli_fetch_assoc($qry);
	$csc_announcementID = $res2['csc_announcementID'];

	$myObj->toWhom = $res2['toWhom'];
	$myObj->message = $res2['message'];
	$myObj->subjectann = $res2['subjectann'];
	$myObj->toDisplay = "Yes";

	mysqli_query($connection, "insert into admincsc_announcement_isread_table (adminID,csc_announcementID) values ('" . $adminID . "', '" . $csc_announcementID . "')");

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





