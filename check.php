<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");

//count how many push notifications deployed to the user.
$qry = mysqli_query($connection, "select count(*) as total from dsa_announcement_isread_table where stprofID = '" . $stprofID . "' ");
$res = mysqli_fetch_assoc($qry);
$whereToStart = $res['total']; //4


//count if there is next announcement
$qry = mysqli_query($connection, "select * from dsa_announcement_table LIMIT " . $whereToStart . ",1 ");


$myObj = new stdClass();

if (mysqli_num_rows($qry) > 0) {
	$qry = mysqli_query($connection, "select * from dsa_announcement_table LIMIT " . $whereToStart . ",1 ");
	$res2 = mysqli_fetch_assoc($qry);
	$dsaAnnouncementID = $res2['dsaAnnouncementID'];

	$myObj->dateAnnounced = $res2['dateAnnounced'];
	$myObj->toWhom = $res2['toWhom'];
	$myObj->message = $res2['message'];
	$myObj->toDisplay = "Yes";

	mysqli_query($connection, "insert into dsa_announcement_isread_table (stprofID, dsaAnnouncementID) values ('" . $stprofID . "', '" . $dsaAnnouncementID . "')");

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





