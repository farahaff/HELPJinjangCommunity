<?php
 require_once("inc/dbcall.php");
  //  var dataString = 'name=' + musername+'pwd='+pwd+'fname='+fname+'memail='+memail+'mlevel='+mlevel+'utype='+$usertype;
$db = new Db();
//get user submitted values
$name = $_POST['username'];
$pwd = $db->makepwd($_POST['pwd']);
$fname = $_POST['fname'];
$jemail = $_POST['jemail'];
$jmobileno = $_POST['jmobileno'];
$qualification = $_POST['qualification'];
$skills = $_POST['skills'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
//end of member data
$sql="INSERT INTO `jobseeker` (`username`, `password`, `fname`, `email`, `mobileNo`, `qualification`, `skills`, `starttime`, `endtime`)
VALUES ('$name' ,'$pwd', '$fname', '$jemail', '$jmobileno', '$qualification', '$skills', '$starttime', '$endtime')";

$db->query($sql);
