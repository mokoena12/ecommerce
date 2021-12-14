<?php

require_once "config_mogolo.php";

//Sanitizing All input variables

function sanitize($value){
	
	$s_value = ucfirst(strtolower(filter_var($value,FILTER_SANITIZE_STRING)));
	
	return $s_value;
	
}
//------------------------------------------------

$user="";
session_start();
if(isset($_SESSION["logged"]) ){
    $user=$_SESSION["nkwana_user"];

    
}
else{
    $checkout = "Please login Before Proceeding";
    header("Location:login.php?checkout=".$checkout."");
}



?>



<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
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
<h2>Hi, <?php echo sanitize($_POST["fname"])." ".sanitize($_POST["sname"])."<br>";?> </h2>
<h1 class='text-success header1'>Your Payment is successful</h1>
<p class="text-warning">You will receive corresponding emails for your purchase</p>
<br>
<h3>

<a href = "joseph.php" >Click here to go to the main page</a>

</h3>
</div>


<div class="joseph-description container pt-3" style="display:none;" >
<p class="text-info">Thank You for visiting Our Online Store we are Trusted Company<br>

We keep serving 1000+ <strong>Customers</strong> Everyday.<br></p>
</div>


<?php
 $checkout = "";
if(isset($_POST["email1"])){
    $name = $_POST["fname"];
    $surname = sanitize($_POST["sname"]);
    $total = $_POST["payment1"];

					   $to = $_POST["email1"];
					   $subject ="Invoice";

					   $message = "
					   <html>
					   <head>
					   <title>Invoice</title>
					 </head>
					 <body style='background-color:rgba(97, 85, 85,0.1)'>
					 <h1>Good day</h1>
					 <p>Hi, <br><strong>".$name." ".$surname."</strong><br><br>
					  Your Payment at <strong style='color:red;'>Demo Online shopping</strong> was Successful
                      and We have recieved total payment of R".$total."<br></p>
                      <br>
                      <br>
					 <p><a href='joseph.php?' 
					 style='background-color:red; color:white;border-radius:3px;font-weight:bold;font-size:12px;padding:5px;text-decoration:none;box-shadow:3px 3px 2px black;'>Visit Store</a></p>



					 </body>

					   </html>
					   ";
					   $headers = "MIME-version:1.0"."\r\n";
					   $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
					   $headers .= "info@weball.co.za"."\r\n";

					   mail($to,$subject,$message,$headers);

					   if (mail($to,$subject,$message,$headers)===TRUE){
						  // echo "I'm fine";

					   }
					   else{
                        $checkout = "Please login Before Proceeding";
					   }
					
			}
		
					   
		
		
?>
<?php echo  $checkout;?>

    </body>
<html>