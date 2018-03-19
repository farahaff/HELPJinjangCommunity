<?php
 require_once("inc/dbcall.php");
  //  var dataString = 'name=' + musername+'pwd='+pwd+'fname='+fname+'memail='+memail+'mlevel='+mlevel+'utype='+$usertype;
$db = new Db();
//get user submitted values
$username = $_POST['username'];
$password = $db->makepwd($_POST['password']);
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$mobileNo = $_POST['mobileNo'];
$qualifications = $_POST['qualifications'];
$skills = $_POST['skills'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$preferredSalary = $_POST['preferredSalary'];
$healthConditions = $_POST['healthConditions'];
//$resume = $_POST['resume'];
//end of member data
$sql="INSERT INTO `jobSeeker` (`username`, `password`, `fullName`, `email`, `mobileNo`, `qualifications`, `skills`, `startTime`, `endTime`, `preferredSalary`, `healthConditions`)
VALUES ('$username' ,'$password', '$fullName', '$email', '$mobileNo', '$qualifications', '$skills', '$startTime', '$endTime', '$preferredSalary', '$healthConditions')";

$db->query($sql);
