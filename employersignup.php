<?php
 require_once("inc/dbcall.php");
  //var dataString = 'name=' + tusername + '&pwd=' + pwd + '&fname=' + fname + '&memail=' + temail
  // + '&tspecialty=' + tspecialty + '&utype=' + $usertype;
$db = new Db();
//get user submitted values
$name = $_POST['username'];
$pwd = $db->makepwd($_POST['pwd']);
$orgname = $_POST['orgname'];
$industry = $_POST['industry'];
//$type = $_POST['type'];
$empemail = $_POST['empemail'];
$emobileno = $_POST['emobileno'];
//end of member data
$sql="INSERT INTO `employer` (`username`, `password`, `orgname`, `industry`, `email`, `mobileNo`)
VALUES ('$name' ,'$pwd', '$orgname', '$industry', '$empemail', '$emobileno')";

$db->query($sql);
