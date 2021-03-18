<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

$qryheydashboard = mysqli_query($connection, "select * from admin_account_view where adminID = ".$_SESSION['adminID']." ");
            $resheydashboard = mysqli_fetch_assoc($qryheydashboard);

          $qryrejctbadge1 = mysqli_query($connection,"select count(*) as cnt1 from csc_announcement_table where isApproved = 'No'");
            $resultreject1 = mysqli_fetch_assoc($qryrejctbadge1);
            $qryrejctbadge2 = mysqli_query($connection,"select count(*) as cnt2 from council_announcement_table where isApproved = 'No'");
            $resultreject2 = mysqli_fetch_assoc($qryrejctbadge2);
            $qryrejctbadge3 = mysqli_query($connection,"select count(*) as cnt3 from department_announcement_table where isApproved = 'No'");
            $resultreject3 = mysqli_fetch_assoc($qryrejctbadge3);
            $qryrejctbadge4 = mysqli_query($connection,"select count(*) as cnt4 from social_announcement_table where isApproved = 'No'");
            $resultreject4 = mysqli_fetch_assoc($qryrejctbadge4);

            $a=array($resultreject1['cnt1'],$resultreject2['cnt2'],$resultreject3['cnt3'],$resultreject4['cnt4']);

            echo array_sum($a);

?>


          
           



