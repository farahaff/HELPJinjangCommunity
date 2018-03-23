<?php

require_once("inc/dbcall.php");
$db = new Db();
$jobID = $_POST['jobID'];
//    var dataString = 'sessionid=' + id + '&udate=' + udate + '&utime=' + utime + '&ufee=' + ufee + '&uclassStatus=' + uclassStatus + '&uclassType=' + uclassType;
$sql = "UPDATE `jobposting` SET "
        . "`jobTitle` = '{$_POST['jobtitle']}' "
        . ", `jobDescription` = '{$_POST['jobdescription']}' "
        . ", `reqQualifications` = '{$_POST['reqqualification']}'"
        . ", `reqSkills` = '{$_POST['reqskills']}'"
        . ", `startTime` = '{$_POST['starttime']}'"
        . ", `endTime` = '{$_POST['endtime']}' "
        . ", `address` = '{$_POST['address']}' "
        . ", `salary` = '{$_POST['salary']}'"
        . ", `preferences` = '{$_POST['preferences']}'" .
        " WHERE `jobposting`.`jobID` =" . $jobID;
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
echo $sql;
