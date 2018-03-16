<?php

$flavor = $_COOKIE['corn'];

setcookies("bbq", $flavor, time() -3600);

if (isset($_COOKIE['flavor']))

?>