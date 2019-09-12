<?php 

include 'connection.php';


$message = "";

$timestart = date('Y-m-d h:i:s', strtotime($_POST['timestart']));
$timeend = date('Y-m-d h:i:s', strtotime($_POST['timeend']));
$venue = $_POST['venue'];

$qry= mysqli_query($connection, "select * from dsa_announcement_view  where isApproved = 'Yes' and timeStart between '" . $timestart . "' and '" . $timeend . "' and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};

 $qry= mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes' and  timeStart between '" . $timestart . "' and '" . $timeend . "' and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};

$qry= mysqli_query($connection, "select * from council_club_announcement_view where isApproved = 'Yes' and  timeStart >= '" . $timestart . "' and timeEnd < '" . $timeend . "' and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};


$qry= mysqli_query($connection, "select * from departmental_club_announcement_view  where isApproved = 'Yes' and  timeStart between '" . $timestart . "' and '" . $timeend . "' and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};

$qry= mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes' and  timeStart between '" . $timestart . "' and '" . $timeend . "' and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};





echo $message;

 ?>