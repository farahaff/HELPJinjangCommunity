
<?php  
 require_once("inc/dbcall.php");
  //var dataString = 'name=' + tusername + '&pwd=' + pwd + '&fname=' + fname + '&memail=' + temail 
  // + '&tspecialty=' + tspecialty + '&utype=' + $usertype;
$db = new Db();
//get user submitted values 
$name = $_POST['name'];
$pwd = $db->makepwd($_POST['pwd']);
$fname = $_POST['fname'];
$temail = $_POST['memail'];
$tspecialty = $_POST['tspecialty'];
$utype = $_POST['utype'];
//end of member data
$sql="INSERT INTO `users` (`username`, `password`, `fname`, `email`, `address`, `usertype`) 
VALUES ('$name' ,'$pwd', '$fname', '$temail', 'no', $utype)";
$db->query($sql);
//get last inserted user id
$userid = $db->getUserID();

//get the user id generated by db ,to insret into speciality table
$sql = "INSERT INTO `usrspeciality` (`speciality`, `users_idusers`) 
VALUES ('$tspecialty', $userid)";
$db->query($sql);