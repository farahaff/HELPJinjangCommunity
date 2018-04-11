<?php

require_once("inc/dbcall.php");
$db = new Db();
$sql = "SELECT * FROM `jobposting` WHERE `jobID` =" . $_POST['jobID'] . " LIMIT 1";
$result = $db->query($sql);
$row = mysqli_fetch_assoc($result);
//employer
$sql2 = "SELECT * FROM `employer` WHERE `userID`=" . $row['createdBy'] . " LIMIT 1";
$result2 = $db->query($sql2);
$employer = mysqli_fetch_assoc($result2);

$startTime = date('h:m A', strtotime($row['startTime']));
$endTime = date('h:m A', strtotime($row['endTime']));

//get the session type mma,sport,dance
$rowctype = mysqli_fetch_assoc($result2);
$uppercase = strtoupper($employer['orgName']);

echo "<h3 class='text-uppercase'>{$row['jobTitle']}</h3>
     <p class='item-intro text-muted'>{$uppercase} <br>({$employer['industry']})</p>
     <ul class='list-inline'>
     <li>Job Description: {$row['jobDescription']}</li>
     <li>Required Qualifications: {$row['reqQualifications']}</li>
     <li>Required Skills: {$row['reqSkills']}</li>
     <li>Timing: {$startTime} - {$endTime} </li>
     <li>Address: {$row['address']}</li>
     <li>Salary: RM {$row['salary']}</li>
     <li>Preferences: {$row['preferences']}</li>
     </ul>
     <div class='col-lg-12 text-center'>
     <button class='btn btn-primary btn-md' data-dismiss='modal' onclick='applyJob({$_SESSION['uniqueID']},{$_POST['jobID']})' type='button'>
     <i class='fa fa-check'></i> Apply</button></div>";
