<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");


$qrylistofstudentview = mysqli_query($connection, "select * from social_officerandmembers_view where stprofID = '" . $stprofID . "' and perpost = 'Yes' ");
$reslistofstudentview = mysqli_fetch_assoc($qrylistofstudentview);

if (mysqli_num_rows($qrylistofstudentview)) {

	//count how many push notifications deployed to the user.
	$qry = mysqli_query($connection, "select count(*) as total from socialreject_announcement_table where isApproved = 'Reject' and stprofID = '" . $stprofID . "' ");
	$res = mysqli_fetch_assoc($qry);
	$whereToStart = $res['total']; //4

	//count if there is next announcement
$qry = mysqli_query($connection, "select * from social_announcement_table where isApproved = 'Reject' LIMIT " . $whereToStart . ",1 ");

$myObj = new stdClass();

if (mysqli_num_rows($qry) > 0) {
	$qry = mysqli_query($connection, "select * from social_announcement_table where  isApproved = 'Reject' LIMIT " . $whereToStart . ",1 ");
	$res2 = mysqli_fetch_assoc($qry);
	$social_announcementID = $res2['social_announcementID'];

	$myObj->timeStart = $res2['timeStart'];
	$myObj->timeEnd = $res2['timeEnd'];
	$myObj->toWhom = $res2['toWhom'];
	$myObj->message = $res2['message'];
	$myObj->subjectann = $res2['subjectann'];
	$myObj->isApproved = $res2['isApproved'];
	$myObj->toDisplay = "Yes";

	mysqli_query($connection, "insert into socialreject_announcement_table (stprofID, socialClubId, social_announcementID, isApproved) values ('" . $stprofID . "', '".$reslistofstudentview['socialClubId']."' , '" . $social_announcementID . "', 'Reject')");

	$myJSON = json_encode($myObj);

	echo $myJSON;

}
else
{
	$myObj->toDisplay = "No";
	$myJSON = json_encode($myObj);
	echo $myJSON;

}
	
}else{
	$myObj->toDisplay = "No";
	$myJSON = json_encode($myObj);
	echo $myJSON;
}








?>





