<?php

require_once("inc/dbcall.php");
$db = new Db();
//    var dataString = 'userid=' + userid + '&sessionid=' + sessionid;
$userID = $_POST['userID'];
$jobID = $_POST['jobID'];

$sql = "SELECT * FROM `jobsapplied` WHERE `userID`=" . $userID . " AND `jobID` =" . $jobID;
$result = $db->query($sql);
$numrows = $db->numRows($result);
if ($numrows > 0) {
    echo "You have already applied for this job!";
} else {
    //end of member data
    $sql = "INSERT INTO `jobsapplied` (`userID`, `jobID`) VALUES ($userID, $jobID)";

    $db->query($sql);
    echo "Application Successful!";
}
