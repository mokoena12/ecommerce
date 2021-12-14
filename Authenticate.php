<?php

require_once "login1.php";
require_once "connect.php";

if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
	
	$un_temp = mysql_entities_fix_string($conn,$_SERVER['PHP_AUTH_USER']);
	$pw_temp = mysql_entities_fix_string($conn,$_SERVER['PHP_AUTH_pw']);
	
	
}

$_COOKIE



?>