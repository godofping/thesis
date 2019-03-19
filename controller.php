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
			
			header("Location: students-dashboard.php");

			}else{

			header("Location: student-fillup-information.php");

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
	
	mysqli_query($connection, "insert into student_account_table (StudentID, StudentPassword) values ('". $_POST['StudentID'] ."' , '" . $_POST['StudentPassword'] . "')");

	header("Location: add-student-account.php");
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

	mysqli_query($connection, "update studentprofile_table set fname = '".$_POST['fname']."', address = '".$_POST['address']."', email = '".$_POST['email']."', contactnum = '".$_POST['contractnum']."', birthday = '".$_POST['birthday']."', gender = '".$_POST['gender']."' where accID = '".$_POST['accID']."'");

	header("Location: manage-acc.php");

}

if (isset($_POST['from']) and $_POST['from'] == 'change-pass') {
	
	mysqli_query($connection,"update student_account_table set StudentPassword = '" . $_POST['StudentPassword'] . "' where accID = '" . $_POST['accID'] . "' ");

	header("Location: manage-acc.php");

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


	foreach($_POST['socialClubName'] as $selected){
		
		mysqli_query($connection,"insert into student_social_table (stprofID, socialClubid) values ('".$res['stprofID']."', '".$selected."')");

		
		header("Location: students-dashboard.php");

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
	
   		mysqli_query($connection, "insert into council_officers_table (CounID, position, stprofID) values ('".$_POST['CounID']."','".$_POST['casedposition']."', '".$_POST['stprofID']."')");

	header("Location: cased.php");
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
	
		mysqli_query($connection, "insert into dsaannouncement_table (dateAnn, toRecever, message) values ('".$_POST['date']."', '".$_POST['to']."', '".$_POST['message']."')");

		//echo "insert into dsaannouncement_table dateAnn, toRecever, message) values ('".$_POST['date']."', '".$_POST['to']."', '".$_POST['message']."')";

		 header("Location: creat-announcement.php");
}


 ?>