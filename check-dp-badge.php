<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

          $qryrejctbadgedp = mysqli_query($connection,"select count(*) as cnt3 from department_announcement_table where isApproved = 'No'");
          $resultrejectdp = mysqli_fetch_assoc($qryrejctbadgedp);
          
          echo array_sum($resultrejectdp)." New";
          

?>


          
           



