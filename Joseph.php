<?php
require_once "functions.php";
require_once "config_mogolo.php";

$user=$login_avator=$login_btn="";
session_start();
$curent_user = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION["logged"]) ){
    $user=$_SESSION["nkwana_user"];
    $login_avator="<button type='button' class='useravator btn btn-primary' data-toggle='modal' data-target='#myModal'>
    <div class='username'>". $user."</div>
 
    <img src='img/riba.png'  alt='avator'>
</button>";
}

else{
    $login_btn = "<div class='login'><a href='login.php'>Login</a></div>";
    $_SESSION["nkwana_user"] = $curent_user;
    $user =  $curent_user;
}




/*
if(isset($_SESSION["nkwana_user"])){ 

    $items = array();
    setcookie($cookie_name,$cookie_value, "/" );


}*/

/*
//create database to store stock
sql = 'CREATE TABLE stock(
item_number VARCHAR(200) NOT NULL,
item_description TEXT NOT NULL,
item_price VARCHAR(200)

);';*/

?>



<!DOCTYPE html>
<html>
<head>
<title>Demo online shoping</title>
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

<noscript>Your device does not support javascript</noscript>

<meta name="author" content="Belmiro Mohlala"/>
<meta name="description" content="This is official website for Nkwana Online store, Shop Your favorite outfits today">
<meta name="keywords" content="Nkwana online shopping">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 



</head>

<body >
<div class="top" >
<div id = "add_cart_results"></div>
<div class="logo"><img src="img/logo.PNG" alt="logo"></div>
<?php echo $login_btn;?>
    <div class="title">
        <h1>DEMO<span class="phones">, SHOPPING </span> <span class="desktop">e-Store</span> </h1>
    </div>
	
    <div class="search">
        <input type="text" id="search"  placeholder="search...">
        <button onclick="seach()">
		    <i class="fa fa-search"></i>
		</button>
    </div>
    
	<div class="cart">
        <a href="card.php">
		    <i class="fa fa-shopping-cart"></i>
		</a>
    </div>
    <div class="items" id="items_stock"> 
      <?php 
      
      $sql_stock = " SELECT item_number FROM weball1 WHERE id_user = '$user' ;";
      $selected_items = $conn->query($sql_stock);
      $items1 = $selected_items -> num_rows;
      echo $items1;
      
      
      ?> 
     
    
    </div>

    <div class="menu">
        <div class="menu2">
            <div class="menu1"></div>
            <div class="menu1"></div>
            <div class="menu1"></div>
        </div>

    </div>

    

</div>

<section>

<div class="dropdown_content">
<div class="cancel-manu">&times; </div>
            <div class="dropdown_content1">
                <ul>
                    <li><a href="stock.html">Available stock</a></li>
                    <li><a href="#about">About us</a></li> 
                    <li><a href="register.php">Sign Up</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>



</section>


<section>



    <?php

//directory to check how many categories we have in our stock
$dir = "stock/";
$paper = scandir($dir);
$stock = array();
$int = count($paper);

for( $i=2; $i<$int; $i++){
   $j = ($i - 2);
$stock[$j] = $paper[$i];

}
//Loop to create classes of categories we have
for( $i=0; $i<sizeof($stock); $i++){
    
    echo"<div class='men'>
    <div class='men_outfits' >
    <h2>".$stock[$i]." outfits</h2>
    <div class='outfits'>
    ";
    $dress1 = "stock/".$stock[$i]."/";
    $dress2 = scandir($dress1);
$int1 = count($dress2);
//loop to check the number of items in a certain categories 
for( $j=2; $j<$int1; $j++){
    //$j1 = ($j - 2);
    $file_item_number = basename($dress1.$dress2[$j],".jpeg"); //find item number without file extension
    $dress_p = findPrice($file_item_number,$conn1);
    $dress_n = findname($file_item_number,$conn1);
    $add_botton = "\"add_botton('$file_item_number',$dress_p,'$dress_n')\"";
    

    echo "<div class='dress'>
   
    <div class='price'>R". $dress_p."</div>
    <div class='name'>". $dress_n."</div>
    <img alt='$file_item_number' src='stock/$stock[$i]/$file_item_number.jpeg' >
    <button class='price_button' onclick=$add_botton >Add to cart</button>
   
    
    ";


    echo "
    </div>
    ";
 
}



 

    echo "
    </div>
    </div>
    </div>
    ";
 }



?>

</section>






<section>
<div class="contact" id="contact">

<div id="contact1">
<p><span class="contact3">About Demo online shopping</span></p>
    <p> <strong>Nkwana</strong> is online shopping store, that offers free delivery.<br> We have many branches all over South Africa.<p>
</div>


<div id="about">
<p><span class="about1">CONTACT INFORMATION</span></p>

   <p><i class="fa fa-phone" style="font-size:12px;"></i> <strong>Phone</strong>: (+27) 66 021 3188 </p>

   <p><i class="fa fa-whatsapp" style="font-size:12px; color:green"></i> <strong>WhatsApp</strong>: (+27) 66 021 3188 </p>
    
   <p><i class="fa fa-facebook" style="font-size:12px; color:blue;"></i> <strong>Facebook</strong>: <span clss="about1">Joseph Nkwana</span> </p>

    
 
</div>

<div class="messages">
<p id="numb"></p>
</div>
<!--
<div class="welcome.php">
<h2>I'm about to output something</h2>
<p>welcome to my <?php echo"profile(Belmiro Mohlala) ".date("l")." <strong>I was testing that function</strong >" ?></p>
</div>-->
<div id="contact1">
    <p>Copyright<strong>&copy;&reg;</strong>2020<span>Joseph Nkwana</span>.All Rights Reserved</p>
    <p>Powered by <a href="http://www.weballtechnologies.co.za">WebAll Technologies</a></p>
</div>


</div>
</section>
<div class="freed">

we offer free delivery

</div>

<div class="offer">

35% off

</div>

<!--THis is the avator -->
<div class="container">
    <!-- Button to Open the Modal -->
    
  <?php echo $login_avator?>
    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Hi, <?php echo $user?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
           <p class="text-primary">To ensure that your account is safe, please <strong>Sign out</strong></p>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <div class='logout'><a href='logout.php'>Sign Out</a></div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          
        </div>
      </div>
    </div>
    
  </div>
  <!--The Avator ends here         ....................................

  Start of Sliding show-->
  <div class="slideitem container mp-4 border">

  </div>
<?php
$conn->close(); ?>
</body>
</html>