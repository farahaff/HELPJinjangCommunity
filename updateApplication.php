<?php

require_once("inc/dbcall.php");
$db = new Db();

$userID = $_POST['userID'];
$jobID = $_POST['jobID'];
$employerID = $_POST['employerID'];
$decision = $_POST['decision'];

//    var dataString = 'sessionid=' + id + '&udate=' + udate + '&utime=' + utime + '&ufee=' + ufee + '&uclassStatus=' + uclassStatus + '&uclassType=' + uclassType;
/*$sql = "UPDATE `application` SET "
        . "`employerID` = '{$employerID}' "
        . ", `decision` = '{$decision}' " .
        " WHERE `application`.`jobID` =" . $jobID; //. " AND `application`.`userID` =" . $userID;
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);

*/

//$sql = "INSERT INTO `application` (`userID`, `jobID`, `employerID`, `decision`, `status`) VALUES ($userID, $jobID, $employerID, $decision, $decision)";
$sql = "UPDATE `application` SET "
        . "`employerID` = '{$_POST['jobtitle']}' "
        . ", `decision` = '{$_POST['jobdescription']}' "
        . ", `status` = '{$_POST['reqqualification']}'" .
        " WHERE `application`.`jobID` =" . $jobID;

$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
echo $sql;
