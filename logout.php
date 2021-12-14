<?php
$user="";
session_start();
if(isset($_SESSION["nkwana_user"])){

    destroy_session_and_data();
    $status="<h1 class='text-success header1'>Thank You For Logging Out</h1>";
    
}
else{
    $status="<h1 class='text-danger header1'>oops! You are not logged in</h1>";
}





function destroy_session_and_data()
{
$_SESSION = array();
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();
}
?>



<!DOCTYPE html>
<html>
<head>
<title>Demo online shoping/SignUp</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style/joseph.css">
<link rel="stylesheet" type="text/css" href="style/desktop.css">
<link rel="stylesheet" type="text/css" href="style/tablet.css">
<link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="font/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta http-equiv="refresh" content="">

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/nkwana.js"></script>
<script src="bootstrap-4.0.0-dist\js\popper.min.js"></script>
<script src="bootstrap-4.0.0-dist\js\bootstrap.min.js"></script>
<script src="js\angular.min.js"></script>


<noscript>Your device does not support javascript</noscript>

<meta name="author" content="Belmiro Mohlala"/>
<meta name="description" content="Logout of Nkwana Store">
<meta name="keywords" content="Nkwana Store SignUp">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 


<style>

    body{
        background-color:rgba(97, 85, 85,0.1);
    }
    </style>
</head>

<body  >

<div class="container-fluid mp-4 pt-3">
<?php

echo $status;
?>
<br>
<h3>

<a href = "joseph.php" >Click here to go to the main page</a>

</h3>
</div>


<div class="joseph-description container pt-3" style="display:none;" >
<p class="text-info">Thank You for visiting Our Online Store we are Trusted Company<br>

We keep serving 1000+ <strong>Customers</strong> Everyday.<br></p>
</div>


 



    </body>
<html>