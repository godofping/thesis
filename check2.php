<?php

session_start();
date_default_timezone_set('Asia/Manila');

$stprofID = $_SESSION['stprofID'];

$connection = mysqli_connect("localhost", "root", "", "project_db");

$qrylistofstudentview = mysqli_query($connection, "select * from list_student_view where stprofID = '" . $stprofID . "'");
$reslistofstudentview = mysqli_fetch_assoc($qrylistofstudentview);



//count how many push notifications deployed to the user.
$qry = mysqli_query($connection, "select count(*) as total from council_announcement_isread_table where isApproved = 'Yes' and stprofID = '" . $stprofID . "' and CounID = ". $reslistofstudentview['CounID'] ." ");
$res = mysqli_fetch_assoc($qry);
$whereToStart = $res['total']; //4


//count if there is next announcement
$qry = mysqli_query($connection, "select * from council_announcement_table where CounID = '" . $reslistofstudentview['CounID'] . "' and isApproved = 'Yes' LIMIT " . $whereToStart . ",1 ");



$myObj = new stdClass();

if (mysqli_num_rows($qry) > 0) {
	$qry = mysqli_query($connection, "select * from council_announcement_table where CounID = '" . $reslistofstudentview['CounID'] . "' and isApproved = 'Yes' LIMIT " . $whereToStart . ",1 ");
	$res2 = mysqli_fetch_assoc($qry);
	$council_announcementID = $res2['council_announcementID'];

	$myObj->timeStart = $res2['timeStart'];
	$myObj->timeEnd = $res2['timeEnd'];
	$myObj->toWhom = $res2['toWhom'];
	$myObj->message = $res2['message'];
	$myObj->subjectann = $res2['subjectann'];
	$myObj->isApproved = $res2['isApproved'];
	$myObj->toDisplay = "Yes";

	mysqli_query($connection, "insert into council_announcement_isread_table (council_announcementID,stprofID, CounID, isApproved) values ('" . $council_announcementID . "', '" . $stprofID . "',  '". $reslistofstudentview['CounID'] ."', 'Yes' )");

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





