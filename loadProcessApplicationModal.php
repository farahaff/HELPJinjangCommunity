<?php

require_once("inc/dbcall.php");
$db = new Db();
$userID = $_POST['userID'];
$jobID = $_POST['jobID'];

$sql2 = "SELECT * FROM `jobseeker` WHERE `userID`=" . $userID . " LIMIT 1";
$result2 = $db->query($sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM `jobposting` WHERE `jobID`=" . $jobID . " LIMIT 1";
$result3 = $db->query($sql3);
$row3 = mysqli_fetch_assoc($result3);

$sql4 = "SELECT * FROM `employer` WHERE `userID`=" . $row3['createdBy'] . " LIMIT 1";
$result4 = $db->query($sql4);
$row4 = mysqli_fetch_assoc($result4);

$uppercase = strtoupper($row4['orgName']);

$startTime = date('h:m A', strtotime($row3['startTime']));
$endTime = date('h:m A', strtotime($row3['endTime']));

echo "<h3 class='text-uppercase'>Applicant</h3>
     <ul class='list-inline'>
     <li>Full Name: {$row2['fullName']}</li>
     <li>Email: {$row2['email']}</li>
     <li>Mobile No: {$row2['mobileNo']}</li>
     <li>Qualifications: {$row2['qualifications']} </li>
     <li>Skills: {$row2['skills']}</li>
     </ul>

     <h3 class='text-uppercase'>{$row3['jobTitle']}</h3>
     <p class='item-intro text-muted'>{$uppercase} <br>({$row4['industry']})</p>
     <ul class='list-inline'>
     <li>Job Description: {$row3['jobDescription']}</li>
     <li>Required Qualifications: {$row3['reqQualifications']}</li>
     <li>Required Skills: {$row3['reqSkills']}</li>
     <li>Timing: {$startTime} - {$endTime} </li>
     <li>Address: {$row3['address']}</li>
     <li>Salary: RM {$row3['salary']}</li>
     <li>Preferences: {$row3['preferences']}</li>
     </ul>

      <div class='col-lg-12 text-center'>
      <br/>

      <div id='success'></div>
              <button class='btn btn-primary btn-md text-uppercase' data-dismiss='modal' onclick='updateApplication({$userID},{$jobID},{$_SESSION['uniqueID']},'Accepted')' style='background-color:green;border-color:green'><i class='fa fa-check-circle'></i> Accept</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button class='btn btn-primary btn-md text-uppercase' data-dismiss='modal' onclick='updateApplication({$userID},{$jobID},{$_SESSION['uniqueID']},'Rejected')'><i class='fa fa-times-circle'></i> Reject</button>
      </div>
  </div>

  </div>";
