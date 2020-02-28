<?php 

include 'connection.php';


$message = "";

$timestart = date('Y-m-d h:i:s', strtotime($_POST['timestart']));
$timeend = date('Y-m-d h:i:s', strtotime($_POST['timeend']));
$addedtimestart = date('Y-m-d h:i:s',  strtotime('+60 minutes', strtotime($timestart)));
$venue = $_POST['venue'];
$cbval = $_POST['cbval'];

//(date('Y-m-d h:i:s', strtotime("+59 minutes",$_POST['timestart'])) < $timeend)




//time start is greater than time end;   
if ($timestart > $timeend)
{
	$message .= "Date time start is higher than date time end.";
}
else
{
	//not the same date;
	if (date('Y-m-d', strtotime($_POST['timestart'])) != date('Y-m-d', strtotime($_POST['timeend']))) 
	{
		$message .= "Date time start and date time end are not the same.";
	} 
	else 
	{
		//timestart and timeend is already elapsed;
		if ((date("Y-m-d H:i:s") > date('Y-m-d H:i:s', strtotime($_POST['timestart']))) or (date("Y-m-d H:i:s") > date('Y-m-d H:i:s', strtotime($_POST['timeend'])))) 
		{
			// $message .= date("Y-m-d h:i:s") . " > " . date('Y-m-d H:i:s', strtotime($_POST['timestart']));
			$message .= "timestart and timeend is already elapsed";
		} 
		else 
		{
			//interval is less than 1 hour
			if ($addedtimestart > $timeend) 
			{
				$message .= "Date time start and date time end should have 1 hour interval.";
			} 
			else 
			{
				//if not emergency
				if ($cbval == 0) 
				{
					//if todays date is the same with submitted date time start and end
					if (date('Y-m-d', strtotime($_POST['timestart'])) == date('Y-m-d') or date('Y-m-d', strtotime($_POST['timeend'])) == date('Y-m-d')) 
					{
						$message .= "Date time start and date time end should not the same with todays date. <br>If its emergency you should check the checkbox.";
					} 
					else 
					{
						
					}
				} 
				else
				{
					# code...
				}
				
				
			}
			
		}
		
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