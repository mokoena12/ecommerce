<?php

$servername = "localhost";
$password = "";
$username = "root";
$DBname = "mogolo";


$conn = new mysqli($servername,$username,$password,$DBname);

//Check connection


if($conn->connect_error)
    {
	    die("connection failed:");
    }
	
	$target_dir= "uploads/"; //specifies the directory where the file is going to be placed
	
	
	
?>