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
<div class="top">
<div class="menu">
        <div class="menu2">
            <div class="menu1"></div>
            <div class="menu1"></div>
            <div class="menu1"></div>
        </div>

    </div>
<div class="logo"><img src="img/logo.PNG" alt="logo"></div>
    <div class="title1">
        <h1 >Items In Cart  <i class="fa fa-shopping-cart"></i> </h1>
    </div>
	<div class="total_price">
<span class="total">Total:</span> R<?php
$total32 = "0.00";
$sql32 = "SELECT SUM(item_price) FROM weball1 WHERE id_user = '$user' ;";
$items32 = $conn->query($sql32);
$rows32 = $items32 -> num_rows;
if($rows32>0){
while($row=$items32->fetch_assoc()){
    $total32= $row['SUM(item_price)'];
}

}
echo $total32;


?></div>
</div>
<div class="dropdown_content">
<div class="cancel-manu">&times </div>
            <div class="dropdown_content1">
                <ul>
                    <li><a href="joseph.php">Home</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#about">Contact us</a></li>
                </ul>
            </div>
        </div>

    
<div class="fonts items123 container-fluid  ">



<br>
<div class="men">
   
    <div class="men_outfits" >
         
<?php
$sql_stock = " SELECT item_number FROM weball1 WHERE id_user = '$user' ;";
$selected_items = $conn->query($sql_stock);
$items1 = $selected_items -> num_rows;

if( $items1 == "0"){
echo "<h3>Your Cart is empty</h3>" ;


}
else{

    echo "<h3>You have ".$items1." items in your cart </h3> ";
}

?>
            <div class="outfits">
            
               
<?php

$sql_stock11 = "SELECT item_number,item_price,item_n FROM weball1 WHERE id_user = '$user' ;";
$selected_items1 = $conn->query($sql_stock11);
$rows11 = $selected_items1 -> num_rows;
if($rows11>0){
while($row=$selected_items1->fetch_assoc()){
   echo "<div class='dress'>
    <div class='price'>".$row['item_price']."</div>
    <div class='name'>".$row['item_n']."</div>
    <img alt='".$row['item_number']."' src=img/".$row['item_number'].".jpeg >
    <button  onclick=remove_botton('".$row['item_number']."')><strong>Remove</strong></button>
    </div>

    
    
    ";
}

}
else{
    echo "<h3 class='text-danger'>Please go back and <br>add items in your cart</h3>";
}

?>
                
                
    
            </div>
    
        </div>
    </div>
    <div class="men">
<h3 class="text-primary">Supported Method of Payments </h3>
<div class="payment_methods mt-4 pb-3">

<img src="img/EFT.jpg">
<img src="img/visa.png">
<img src="img/master_card.png">
<div id="payment_response" class="bg-info">


</div>
</div>
<div class="forms">
<form method="post" action="checkout.php?price=<?php echo $total32?>">
<input type="hidden" id="total_price" name="total_price" value="<?php echo $total32;?>">
<button type ="submit" class="btn btn-danger mb-2" style ='width:100%;' value ="CHECKOUT(Total R<?php echo $total32;?>)">
CHECKOUT(Total R<?php echo $total32;?>)
</button>
</div>

    </div>

<?php
/*
$sql = CREATE TABLE customers(

    id VARCHAR(200) NOT NULL,
    first_name VARCHAR(200) NOT NULL,
    last_name VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    created_at DATETIME

)

$sql = CREATE TABLE transactions(
    id VARCHAR(200) NOT NULL,
    customer_id VARCHAR(200) NOT NULL,
    product TEXT NOT NULL,
    amount int(200) NOT NULL,
    Currency TINYTEXT NOT NULL,
    Status TINYTEXT NOT NULL,
    created_at DATETIME



    
    )*/

?>
<div class="joseph-description container pt-3"  >
<p class="text-info">Thank You for visiting Our Online Store we are Trusted Company<br>

We keep serving 1000+ <strong>Customers</strong> Everyday.<br></p>
</div>


 



    </body>
<html>