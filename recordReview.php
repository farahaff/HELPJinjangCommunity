<?php

require_once("inc/dbcall.php");
$db = new Db();
//           var dataString = 'uniqueid=' + uniqueid + '&sessionID=' + sessionID + '&comment=' + comment + '&rrate=' + rrate;
$userid = $_POST['uniqueid'];
$sessionId = $_POST['sessionID'];
$msg = $_POST['comment'];
$rating = $_POST['rrate'];

$sql = "SELECT * FROM `tsessions` WHERE `idtable1` =" . $sessionId . " LIMIT 1";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
//end of member data
$sql = "INSERT INTO `review` (`comment`, `rating`, `users_idusers`, `sessionid`,`trainerid`) VALUES ('{$msg}', {$rating}, {$userid}, {$sessionId},{$row['createdby']})";
$db->query($sql);


