<?php
include('header.php');

$qry1 = mysqli_query($connection, "select * from testingTbl where isSend = '0'");

while( $res1 = mysqli_fetch_assoc($qry1)){
$aw = $res1['name'];
$updateThis = $res1['testID'];
mysqli_query($connection, "update testingTbl set isSend = '1' where testID = '". $updateThis ."'");
 ?>





