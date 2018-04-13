<?php

require_once("inc/dbcall.php");
$db = new Db();

$userID = $_POST['userID'];
$jobID = $_POST['jobID'];
$employerID = $_POST['employerID'];

//$sql = "INSERT INTO `application` (`userID`, `jobID`, `employerID`, `decision`, `status`) VALUES ($userID, $jobID, $employerID, $decision, $decision)";
$sql = "UPDATE `application` SET "
        . "`employerID` = '{$_POST['employerID']}' "
        . ", `status` = 'Accepted'" .
        " WHERE `application`.`jobID` =" . $jobID . " AND `application`.`userID` =" . $userID ;

$sql2 = "UPDATE `jobposting` SET "
        . "`status` = 'closed' " .
        " WHERE `jobposting`.`jobID` =" . $jobID;

$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
echo $sql;

$result2 = $db->query($sql2);
$row2 = mysqli_fetch_assoc($result2);
echo $sql2;
