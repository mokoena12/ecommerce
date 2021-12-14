<?php
require_once "config_mogolo.php";
$user="";
session_start();
if(isset($_SESSION["logged"]) ){
    $user=$_SESSION["nkwana_user"];

    
}
else{
    $checkout = "Please login Before Proceeding";
    header("Location:login.php?checkout=".$checkout."");
    //$status="<h1 class='text-danger header1'>oops! You are not logged in</h1>";
}

$total = $_GET["price"];

?>



<!DOCTYPE html>
<html>
<head>
<title>Cart>checkout</title>
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
<div class=" fonts container">
    <h3>Total Payment of <?php echo $_GET["price"]?></h3>
<div class="check_out fonts ">
<form method="post" action="thank.php">

<div >
<label for="fname">Fisrt Name</label>
<input  type="text" id="fname" name="fname">
</div>

<input  type="hidden" id="payment1" name="payment1" value="<?php echo $_GET["price"];?>">


<div >
<label for="sname">Surname Name</label>
<input  type="text" id="sname" name="sname">
</div>

<div >
<label for="email">Email</label>
<input type="text" id="email" name="email1" placeholder="eg: weball@gmail.com">
</div>

<div>
<label for="card">Card Number</label>
<input  type="pin" id="card" name="card_num" placeholder="4225 5900 1212 7453">
</div>


<div>

<label for="date">Expiring Date</label>
<input type="date" name ="date1" >

</div>

<div class="mb-4">
<label for="cvc" > CVC Number </label>
<input type="pin" max-length="3" name ="cvc" placeholder="3 numbers at back of card">
</div>
<button type ="submit" class="btn btn-danger mb-2" style ='width:100%;' value ="Pay">
Pay (<?php echo $_GET["price"];?>)
</button>
</form>
</div>
</div>

<div class="joseph-description container pt-3"  >
<p class="text-info">Thank You for visiting Our Online Store we are Trusted Company<br>

We keep serving 1000+ <strong>Customers</strong> Everyday.<br></p>
</div>
</body>
