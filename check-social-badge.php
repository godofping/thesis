<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

          $qryrejctbadgesocial = mysqli_query($connection,"select count(*) as cnt4 from social_announcement_table where isApproved = 'No'");
          $resultrejectsocial = mysqli_fetch_assoc($qryrejctbadgesocial);
  
          echo array_sum($resultrejectsocial)." New";
          

?>