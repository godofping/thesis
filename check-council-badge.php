<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "vertrigo", "project_db");

          $qryrejctbadgecouncil = mysqli_query($connection,"select count(*) as cnt2 from council_announcement_table where isApproved = 'No'");
          $resultrejectcouncil = mysqli_fetch_assoc($qryrejctbadgecouncil);
          
          echo array_sum($resultrejectcouncil)." New";
          

?>