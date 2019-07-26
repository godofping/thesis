<?php 

include('connection.php');

if (isset($_POST['from']) and $_POST['from'] == 'login') {
	
	$qry = mysqli_query($connection, "select * from admin_view where username = '" . $_POST['username'] . "' and password = '" . $_POST['password'] . "'");

	if (mysqli_num_rows($qry) > 0) {
		$res = mysqli_fetch_assoc($qry);

		$_SESSION['adminId'] = $res['adminId'];
		header("Location: admin-dashboard.php");
	}
	else
	{
		$qry = mysqli_query($connection, "select * from student_account_table where StudentID = '" .$_POST['username']. "' and StudentPassword = '" .$_POST['password']. "' ");

		if (mysqli_num_rows($qry) > 0) {
			$res = mysqli_fetch_assoc($qry);

			$_SESSION['accID'] = $res['accID'];


			$qry = mysqli_query($connection, "select * from std_prof_view where accID = '" .$res['accID']. "' ");

			if (mysqli_num_rows($qry) > 0) {
				$res1 = mysqli_fetch_assoc($qry);
			
			$_SESSION['stprofID'] = $res1['stprofID'];
			$_SESSION['last_time'] = time();
			 header("Location: students-dashboard.php");


			}else{

			header("Location: student-registration-new.php");

			}

		}
		else
		{
			header("Location: index.php?status=login-failed");
		}

	}
}

if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	
	session_destroy();
	header("Location: index.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'add-course') {
	
	mysqli_query($connection, "insert into course_table (CourseName,CounID , departmentClubId) values ('".$_POST['courseName']."', '".$_POST['CounID']."', '".$_POST['departmentId']."')");



	header("Location: add-course.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-social-club') {
	
	mysqli_query($connection, "insert into social_club_table (socialClubName) values ('" . $_POST['socialClubName'] . "')");
	
	header("Location: social-clubs.php");

}


if (isset($_POST['from']) and $_POST['from'] == 'add-department-club') {
	
	mysqli_query($connection, "insert into departmental_club_table (departmentClubName) values (' " . $_POST['departmentClubName'] . " ')");

	header("Location: departmental-clubs.php");
}


if (isset($_POST['from']) and $_POST['from'] == 'add-student-account') {

	// $sql_u = "select * from student_account_table where StudentID = '".$_POST['StudentID']."'";
	// $res_u = mysqli_query($connection, $sql_u);
	$qryaccount =  mysqli_query($connection, "select * from student_account_table where StudentID = '".$_POST['StudentID']."' ");
	// $resultaccount = mysqli_fetch_assoc($qryaccount);
	if (mysqli_num_rows($qryaccount) > 0) {
		header("Location: add-student-account.php?status=register-failed");
	}else{
		mysqli_query($connection, "insert into student_account_table (StudentID, StudentPassword) values ('". $_POST['StudentID'] ."' , '123')");
		header("Location: add-student-account.php");
	}

	  


	
}

if (isset($_POST['from']) and $_POST['from'] == 'edit-course-name') {
	
	mysqli_query($connection, "update course_table set CourseName = '".$_POST['courseName']."' , CounID = '".$_POST['CounID']."' , departmentClubId = '".$_POST['departmentId']."'  where CourseID = '".$_POST['courseID']."'");

	header("Location: add-course.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'edit-student-account') {
	
	mysqli_query($connection, "update student_account_table set StudentID = '" . $_POST['StudentID'] . "', StudentPassword = '" . $_POST['StudentPassword'] . "' where accID = '" . $_POST['accID'] . "'");

	header("Location: add-student-account.php");
}


if (isset($_POST['from']) and $_POST['from'] == 'edit-student-profile') {

	mysqli_query($connection, "update studentprofile_table set fname = '".$_POST['fname']."', mname = '".$_POST['mname']."' , lname = '".$_POST['lname']."' , address = '".$_POST['address']."', email = '".$_POST['email']."', pandg = '".$_POST['pandg']."', religion = '".$_POST['religion']."', tribe = '".$_POST['tribe']."', contactnum = '".$_POST['contractnum']."', birthday = '".$_POST['birthday']."', gender = '".$_POST['gender']."' where accID = '".$_POST['accID']."'");

	header("Location: manage-acc.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'change-pass') {
	
	// $confirmPassword = $_POST['confirmPassword'];

	// if ($_POST['StudentPassword'] == $confirmPassword) {
		mysqli_query($connection,"update student_account_table set StudentPassword = '" . $_POST['StudentPassword'] . "' where accID = '" . $_POST['accID'] . "' ");
		header("Location: manage-acc.php");
	// }else{
	// 	header("Location: manage-acc.php?status=Incorrect-Password");
	// }

	

}

if (isset($_POST['from']) and $_POST['from'] == 'delete-student-account') {
	
	mysqli_query($connection, "update student_account_table set isDeleted = '1' where accID = '" . $_POST['accID'] . "'");

	header("Location: add-student-account.php");
}

// if (isset($_POST['from']) and $_POST['from'] == 'delete-course-name') {
	
// 	mysqli_query($connection, "")

// }

if (isset($_POST['from']) and $_POST['from'] == 'register_student_info') {
	
	$target_dir = "img/";
		$IMG = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["IMG"]["name"]);
		$imageFileType = strtolower(pathinfo($IMG,PATHINFO_EXTENSION));
   		move_uploaded_file($_FILES["IMG"]["tmp_name"], $IMG);



	mysqli_query($connection,"update student_account_table set StudentPassword = '".$_POST['newpassword']."' where accID = '" . $_SESSION['accID'] . "'");

	mysqli_query($connection,"insert into studentprofile_table (fname,address,email,contactnum,birthday,gender, accID, IMG) values('".$_POST['fname']."' , '".$_POST['address']."' , '".$_POST['email']."' , '".$_POST['contractnum']."','".$_POST['birthday']."','".$_POST['gender']."', '" . $_SESSION['accID'] . "', '".$IMG."')");

	 header("Location: course.php");

}

if (isset($_POST['from']) and $_POST['from'] =='choose-course') {
	
	mysqli_query($connection, "update studentprofile_table set CourseID = '" . $_POST['CourseID'] . "' where accID = '".$_SESSION['accID']."'");


	header("Location: choose-social-club.php");
}

if (isset($_POST['from']) and $_POST['from'] =='choose-social-club') {
	
	$qry = mysqli_query($connection, "select * from studentprofile_table where accID = '".$_SESSION['accID']."'");

	$res = mysqli_fetch_assoc($qry);

	if (!empty($_POST['socialClubName'])) {

		foreach($_POST['socialClubName'] as $selected)
		
		mysqli_query($connection,"insert into student_social_table (stprofID, socialClubid) values ('".$res['stprofID']."', '".$selected."')");
		
			header("Location: students-dashboard.php");
	}else
			{
				header("Location: choose-social-club.php?status=choose-failed");
			}

	
}

if (isset($_POST['from']) and $_POST['from'] =='add-calendar') {
	
	$target_dir = "img/";
		$calendarIMGname = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["calendarIMGname"]["name"]);
		$imageFileType = strtolower(pathinfo($calendarIMGname,PATHINFO_EXTENSION));
   		move_uploaded_file($_FILES["calendarIMGname"]["tmp_name"], $calendarIMGname);

   		mysqli_query($connection, "update calendar_table set calendarIMGname = '".$calendarIMGname."'");

	header("Location: activity-calendar.php");
}

if (isset($_POST['from']) and $_POST['from'] =='add-csc-member') {
	
   		mysqli_query($connection, "insert into csc_members_table (stprofID, position) values ('".$_POST['stprofID']."', '".$_POST['cscposition']."')");

	header("Location: csc.php");
}

if (isset($_POST['from']) and $_POST['from'] =='add-cased-member') {
	
   		mysqli_query($connection, "insert into council_officers_table (CounID, position, stprofID) values ('".$_POST['CounID']."','".$_POST['nursingposition']."', '".$_POST['stprofID']."')");

	header("Location: nursing.php");
}

//Regiser Officers from Departmental Club
if (isset($_POST['from']) and $_POST['from'] == 'register-DP-officer') {
	
		mysqli_query($connection, "insert into departmental_officersandmembers_table (departmentClubId, position, stprofID) values ('".$_POST['departmentClubId']."', 'Mayor', '".$_POST['stMayorIDdp']."')");

		mysqli_query($connection, "insert into departmental_officersandmembers_table (departmentClubId, position, stprofID) values ('".$_POST['departmentClubId']."', 'Vice Mayor', '".$_POST['stVMayorIDdp']."')");

		mysqli_query($connection, "insert into departmental_officersandmembers_table (departmentClubId, position, stprofID) values ('".$_POST['departmentClubId']."', 'Treasurer', '".$_POST['stTreasurerIDdp']."')");

		mysqli_query($connection, "insert into departmental_officersandmembers_table (departmentClubId, position, stprofID) values ('".$_POST['departmentClubId']."', 'Secrectary', '".$_POST['stSecrectaryIDdp']."')");

		header("Location: departmental-clubs.php");
}

//Regiser Officers from Social Club
if (isset($_POST['from']) and $_POST['from'] == 'register-social-officer') {
	
		mysqli_query($connection, "insert into social_officerandmembers_table (socialClubId, position, stprofID) values ('".$_POST['socialClubId']."', 'Mayor', '".$_POST['stMayorIDsocial']."')");

		mysqli_query($connection, "insert into social_officerandmembers_table (socialClubId, position, stprofID) values ('".$_POST['socialClubId']."', 'Vice Mayor', '".$_POST['stVMayorIDsocial']."')");

		mysqli_query($connection, "insert into social_officerandmembers_table (socialClubId, position, stprofID) values ('".$_POST['socialClubId']."', 'Treasurer', '".$_POST['stTreasurerIDsocial']."')");

		mysqli_query($connection, "insert into social_officerandmembers_table (socialClubId, position, stprofID) values ('".$_POST['socialClubId']."', 'Secrectary', '".$_POST['stSecrectaryIDsocial']."')");

		header("Location: social-clubs.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'dsa-announcement') {
	
		mysqli_query($connection, "insert into dsa_announcement_table (dateSubmit, toWhom, message, timeStart, timeEnd, subjectann, venueID) values ('".date('Y-m-d H:i:s')."', '".$_POST['to']."', '".$_POST['message']."', '".$_POST['timestart']."', '".$_POST['timeend']."', '".$_POST['subject']."','".$_POST['venueID']."' )");

		 header("Location: creat-announcement.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'csc-announcement') {
	
		mysqli_query($connection, "insert into csc_announcement_table (dateSubmit, toWhom, message, timeStart, timeEnd, subjectann, venueID) values ('".date('Y-m-d H:i:s')."' ,'".$_POST['to']."', '".$_POST['message']."' , '".$_POST['timestart']."', '".$_POST['timeend']."', '".$_POST['subject']."', '".$_POST['venueID']."')");

		 header("Location: csc-announcement.php");
}


if (isset($_GET['from']) and $_GET['from'] == 'approve-csc-announcement') {
	
		mysqli_query($connection, "update csc_announcement_table set isApproved = 'Yes' where csc_announcementID = '" . $_GET['csc_announcementID'] . "'");

		 header("Location: view-csc-announcement.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'dp-announcement') {
	
		mysqli_query($connection, "insert into department_announcement_table (dateSubmit, toWhom, message, departmentClubId, timeStart, timeEnd, subjectann,venueID) values ('".date('Y-m-d H:i:s')."', '".$_POST['to']."', '".$_POST['message']."', '".$_POST['departmentClubId']."','".$_POST['timestart']."','".$_POST['timeend']."','".$_POST['subject']."','".$_POST['venueID']."' )");

		 header("Location: departmental-clubs-announcement.php");
}


if (isset($_GET['from']) and $_GET['from'] == 'approve-dpclub-announcement') {
	
		mysqli_query($connection, "update department_announcement_table set isApproved = 'Yes' where DannouncementID = '" . $_GET['DannouncementID'] . "'");

		 header("Location: view-departmental-club-announcement.php");
}

if (isset($_GET['from']) and $_GET['from'] == 'reject-dpclub-announcement') {



		mysqli_query($connection, "update department_announcement_table set isApproved = 'Reject', annreason = '".$_GET['annreason']."' where DannouncementID = '" . $_GET['DannouncementID'] . "'");

		echo "update department_announcement_table set isApproved = 'Reject', annreason = '".$_GET['annreason']."' where DannouncementID = '" . $_GET['DannouncementID'] . "'";

		 // header("Location: view-departmental-club-announcement.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'social-clubs-announcement') {
	
		mysqli_query($connection, "insert into social_announcement_table (dateSubmit, toWhom, message, socialClubId, timeStart, timeEnd, venueID, subjectann) values ('".date('Y-m-d H:i:s')."', '".$_POST['to']."', '".$_POST['message']."', '".$_POST['socialClubId']."', '".$_POST['timestart']."', '".$_POST['timeend']."', '".$_POST['venueID']."', '".$_POST['subject']."' )");

		 header("Location: socialclub-announcement.php");
}

if (isset($_GET['from']) and $_GET['from'] == 'approve-socialclub-announcement') {
	
		mysqli_query($connection, "update social_announcement_table set isApproved = 'Yes' where socialClubId = '" . $_GET['socialClubId'] . "'");

		 header("Location: view-social-club-announcement.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'deparmental-council-announcement') {
	
		mysqli_query($connection, "insert into council_announcement_table (dateSubmit, toWhom, message, CounID, timeStart, timeEnd, subjectann, venueID) values ('".date('Y-m-d H:i:s')."' , '".$_POST['to']."', '".$_POST['message']."', '".$_POST['CounID']."', '".$_POST['timestart']."','".$_POST['timeend']."','".$_POST['subject']."','".$_POST['venueID']."')");

		 header("Location: departmental-council-announce.php");
}

if (isset($_GET['from']) and $_GET['from'] == 'approve-departmentalcouncil-announcement') {
	
		mysqli_query($connection, "update council_announcement_table set isApproved = 'Yes' where CounID = '" . $_GET['CounID'] . "'");

		 header("Location: view-council-announcement.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'add-venue') {
	
		mysqli_query($connection, "insert into venue_table (venueName) values ('".$_POST['venueName']."')");

		header("Location: venue.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'edit-venue-name') {
	
		mysqli_query($connection, "update venue_table set venueName ='".$_POST['venueName']."' ");

		header("Location: venue.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'delete-venue-name') {
	
		mysqli_query($connection, "delete from venue_table where venueID = '".$_POST['venueID']."' ");

		 header("Location: venue.php");
}

if (isset($_POST['from']) and $_POST['from'] == 'register_student_information') {
	
		

   		mysqli_query($connection,"update student_account_table set StudentPassword = '".$_POST['newpassword']."' where accID = '" . $_SESSION['accID'] . "'");

   		$target_dir = "img/";
		$IMG = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["IMG"]["name"]);
		$imageFileType = strtolower(pathinfo($IMG,PATHINFO_EXTENSION));
   		move_uploaded_file($_FILES["IMG"]["tmp_name"], $IMG);
   		
   		mysqli_query($connection,"insert into studentprofile_table (fname,mname,lname,address,email,pandg,religion,tribe,contactnum,birthday,gender, accID, IMG, CourseID) values('".$_POST['fname']."' , '".$_POST['mname']."' , '".$_POST['lname']."' , '".$_POST['address']."' , '".$_POST['email']."' , '".$_POST['pandg']."', '".$_POST['religion']."', '".$_POST['tribe']."', '".$_POST['contractnum']."','".$_POST['birthday']."','".$_POST['gender']."', '" . $_SESSION['accID'] . "', '".$IMG."', '".$_POST['CourseID']."')");


   		$qry = mysqli_query($connection, "select * from studentprofile_table where accID = '".$_SESSION['accID']."'");

		$res = mysqli_fetch_assoc($qry);

	 	foreach($_POST['socialClubName'] as $selected)
		
		mysqli_query($connection,"insert into student_social_table (stprofID, socialClubid) values ('".$res['stprofID']."', '".$selected."')");
		
		session_destroy();

		header("Location: account-succesfully-created.php");

}
if (isset($_POST['from']) and $_POST['from'] == 'success-created') {

		header("Location: index.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'edit-studnet-admin') {
	mysqli_query($connection, "update studentprofile_table set fname = '".$_POST['fname']."', mname = '".$_POST['mname']."' , lname = '".$_POST['lname']."' , address = '".$_POST['address']."', CourseID = '".$_POST['CourseID']."', email = '".$_POST['email']."', pandg = '".$_POST['pandg']."', religion = '".$_POST['religion']."', tribe = '".$_POST['tribe']."', contactnum = '".$_POST['contractnum']."', birthday = '".$_POST['birthday']."', gender = '".$_POST['gender']."' where stprofID = '".$_POST['stprofID']."'");

		header("Location: list-student.php");

}



 ?>
