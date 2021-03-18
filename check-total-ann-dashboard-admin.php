<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

$qryhey = mysqli_query($connection, "select * from admin_account_view where adminID = ".$_SESSION['adminID']." ");
            $reshey = mysqli_fetch_assoc($qryhey);
            
          $qryrejctbadgecsc = mysqli_query($connection,"select count(*) as cnt1 from csc_announcement_table where isApproved = 'No'");
          $resultrejectcsc = mysqli_fetch_assoc($qryrejctbadgecsc);
          
          echo array_sum($resultrejectcsc)." New";
          

?>





