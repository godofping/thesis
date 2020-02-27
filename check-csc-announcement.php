<?php 

include 'connection.php';


$message = "";

$timestart = date('Y-m-d h:i:s', strtotime($_POST['timestart']));
$timeend = date('Y-m-d h:i:s', strtotime($_POST['timeend']));
$addedtimestart = date('Y-m-d h:i:s',  strtotime('+59 minutes', strtotime($timestart)));
$venue = $_POST['venue'];
$cbval = $_POST['cbval'];

//(date('Y-m-d h:i:s', strtotime("+59 minutes",$_POST['timestart'])) < $timeend)


if ($cbval == 1)
{
	if (($timestart < $timeend) and (date("Y-m-d h:i:s") < $timestart and date("Y-m-d h:i:s") < $timeend) and ($addedtimestart < $timeend))
	{
		
	}
	else
	{
		$message = "Please check the date or time if its correct.";
	}
}
else
{

		//time start is greater than time end; not the same date; timestart and timeend is already elapsed; interval is less than 1 hour
	if (($timestart < $timeend) and (date('Y-m-d', strtotime($_POST['timestart'])) == date('Y-m-d', strtotime($_POST['timeend']))) and (date("Y-m-d h:i:s") < $timestart and date("Y-m-d h:i:s") < $timeend) and ($addedtimestart < $timeend))
	{
		
	}
	else
	{
		$message = "Please check the date or time if its correct.";
	}
}


 $qry= mysqli_query($connection, "select * from dsa_announcement_view  where isApproved = 'Yes' and ((timeStart <= '" . $timestart . "' and timeEnd > '" . $timestart . "') or (timeStart < '" . $timeend . "' and timeEnd >= '" . $timeend . "') or (timeStart > '" . $timestart . "' and timeEnd < '" . $timeend . "')) and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {
 	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};

 $qry= mysqli_query($connection, "select * from csc_announcement_view where isApproved = 'Yes' and  ((timeStart <= '" . $timestart . "' and timeEnd > '" . $timestart . "') or (timeStart < '" . $timeend . "' and timeEnd >= '" . $timeend . "') or (timeStart > '" . $timestart . "' and timeEnd < '" . $timeend . "')) and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};

$qry= mysqli_query($connection, "select * from council_club_announcement_view where isApproved = 'Yes' and ((timeStart <= '" . $timestart . "' and timeEnd > '" . $timestart . "') or (timeStart < '" . $timeend . "' and timeEnd >= '" . $timeend . "') or (timeStart > '" . $timestart . "' and timeEnd < '" . $timeend . "')) and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};


$qry= mysqli_query($connection, "select * from departmental_club_announcement_view  where isApproved = 'Yes' and ((timeStart <= '" . $timestart . "' and timeEnd > '" . $timestart . "') or (timeStart < '" . $timeend . "' and timeEnd >= '" . $timeend . "') or (timeStart > '" . $timestart . "' and timeEnd < '" . $timeend . "')) and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};

$qry= mysqli_query($connection, "select * from social_club_announcement_view where isApproved = 'Yes' and ((timeStart <= '" . $timestart . "' and timeEnd > '" . $timestart . "') or (timeStart < '" . $timeend . "' and timeEnd >= '" . $timeend . "') or (timeStart > '" . $timestart . "' and timeEnd < '" . $timeend . "')) and venueID = '" . $venue . "' ");

while ($res123 = mysqli_fetch_assoc($qry)) {

	$message .= "You have a conflict with the ".  $res123['subjectann'] . " in this time schedule from " .  date('F d, Y h:i A', strtotime($res123['timeStart'])) . " until ". date('F d, Y h:i A', strtotime($res123['timeEnd'])) . " at ". $res123['venueName'] ."<br>";

};




echo $message;

 ?>