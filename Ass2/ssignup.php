<?php  
 require_once("inc/dbcall.php");
  //  var dataString = 'name=' + musername+'pwd='+pwd+'fname='+fname+'memail='+memail+'mlevel='+mlevel+'utype='+$usertype;
$db = new Db();
//get user submitted values 
$name = $_POST['name'];
$pwd = $db->makepwd($_POST['pwd']);
$fname = $_POST['fname'];
$memail = $_POST['memail'];
$mlevel = $_POST['mlevel'];
$utype = $_POST['utype'];
//end of member data
$sql="INSERT INTO `users` (`username`, `password`, `fname`, `email`, `address`, `level`, `usertype`) 
VALUES ('$name' ,'$pwd', '$fname', '$memail', 'no',$mlevel, $utype)";

$db->query($sql);
