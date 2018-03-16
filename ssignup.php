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
$utype = $_POST['utype'];
//end of member data
$sql="INSERT INTO `users` (`username`, `password`, `fname`, `email`, `mobileNo`, `usertype`)
VALUES ('$name' ,'$pwd', '$fname', '$jemail', '$jmobileno', $utype)";

$db->query($sql);
