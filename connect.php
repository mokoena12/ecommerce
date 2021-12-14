<?php
$hostname = 'localhost';
$user = 'root';
$pass=''; 
$db = 'ecommerce';


$conn = new mysqli($hostname,$user,$pass,$db);

//Check connection

if($conn->connect_error){
	
	die("Failed to connect ".$conn->connect_error);
}

?>