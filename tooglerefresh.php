<?php

session_start();
date_default_timezone_set('Asia/Manila');

$connection = mysqli_connect("localhost", "root", "", "project_db");

            $qrycode = mysqli_query($connection, "select * from list_student_view where stprofID = '".$_SESSION['stprofID']."'");
            $rescode = mysqli_fetch_assoc($qrycode);

            $qrydisable = mysqli_query($connection, "select * from  buttontoggle_table ");
            $resdisable = mysqli_fetch_assoc($qrydisable);
            if ($resdisable['toggleonoroff'] == 'OFF') {
            header("Location: index.php");

?>
