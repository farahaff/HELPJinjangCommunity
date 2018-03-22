<?php
require_once 'inc/dbcall.php';
session_start();
unset($_SESSION["home"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: index.php");
?>
