<?php

require_once("inc/dbcall.php");
$db = new Db();

$userID = $_POST['userID'];
$jobID = $_POST['jobID'];
$employerID = $_POST['employerID'];

//$sql = "INSERT INTO `application` (`userID`, `jobID`, `employerID`, `decision`, `status`) VALUES ($userID, $jobID, $employerID, $decision, $decision)";
$sql = "UPDATE `application` SET "
        . "`employerID` = '{$_POST['employerID']}' "
        . ", `status` = 'Rejected'" .
        " WHERE `application`.`jobID` =" . $jobID . " AND `application`.`userID` =" . $userID ;


$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
echo $sql;
