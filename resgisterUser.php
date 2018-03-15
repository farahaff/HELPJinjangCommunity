<?php

require_once("inc/dbcall.php");
$db = new Db();
//    var dataString = 'userid=' + userid + '&sessionid=' + sessionid;
$userid = $_POST['userid'];
$sessionId = $_POST['sessionid'];

$sql = "SELECT * FROM `registered` WHERE `userid`=" . $userid . " AND `sessionid` =" . $sessionId;
$result = $db->query($sql);
$numrows = $db->numRows($result);
if ($numrows > 0) {
    echo "Already Registered!";
} else {
    //end of member data
    $sql = "INSERT INTO `registered` ( `userid`, `sessionid`) VALUES ($userid, $sessionId)";

    $db->query($sql);
    echo "Successfully Registered";
}



