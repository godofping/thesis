<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

			$qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
	        $rescode = mysqli_fetch_assoc($qrycode);

	        $counID = $rescode['CounID'];
	        $councilName = $rescode['CounName'];
	        $dpclubcode = $rescode['departmentcode'];
	        $dpclubName = $rescode['departmentClubName'];

			$qrycscreject = mysqli_query($connection,"select count(*) as cntcsc from csc_announcement_table where isApproved = 'Reject' ");
            $rescscreject = mysqli_fetch_assoc($qrycscreject);
            

			$qrycouncilreject = mysqli_query($connection,"select count(*) as cntcouncil from council_announcement_table where CounID = '".$rescode['CounID']."' and isApproved = 'Reject' ");
            $rescouncilreject = mysqli_fetch_assoc($qrycouncilreject);


            $qrydpreject = mysqli_query($connection,"select count(*) as cntdp from department_announcement_table where isApproved = 'Reject' and departmentClubId = '".$dpclubcode."' ");
            $resdpreject = mysqli_fetch_assoc($qrydpreject);


            $qryssocial = mysqli_query($connection, "select * from list_social_club_view where stprofID = ".$_SESSION['accID']." ");
            $ressocial = mysqli_fetch_assoc($qryssocial);

            $qrysocialreject = mysqli_query($connection,"select count(*) as cntsocial from social_announcement_table where isApproved = 'Reject' and socialClubId = '".$ressocial['socialClubId']."' "); 
            $ressocialreject = mysqli_fetch_assoc($qrysocialreject);

             $qrycscpos = mysqli_query($connection, "select * from csc_members_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");
     
            $rejectkaputa = [];

            if(mysqli_num_rows($qrycscpos) > 0)
            {
                array_push($rejectkaputa, $rescscreject['cntcsc']);
            }

            $qyrcouncilpos = mysqli_query($connection,"select * from council_officers_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");
        
      

            if (mysqli_num_rows($qyrcouncilpos)>0) 
              {
                array_push($rejectkaputa, $rescouncilreject['cntcouncil']);
            
              }

            $qyrdepartpos = mysqli_query($connection,"select * from departmental_officersandmembers_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");


            if (mysqli_num_rows($qyrdepartpos) > 0) {
                array_push($rejectkaputa, $resdpreject['cntdp']);
              
            }

            $qyrsocialpos = mysqli_query($connection,"select * from social_officerandmembers_table where stprofID = '".$_SESSION['stprofID']."' and perpost = 'Yes' ");

        
            if (mysqli_num_rows($qyrsocialpos)>0) {
               array_push($rejectkaputa, $ressocialreject['cntsocial']);
       
            }
        
            echo array_sum($rejectkaputa);
?>