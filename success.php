<!DOCTYPE html>
<html>
<head>
<title>Nkwana online shoping/SignUp/status</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style/joseph.css">
<link rel="stylesheet" type="text/css" href="style/desktop.css">
<link rel="stylesheet" type="text/css" href="style/tablet.css">
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist\bootstrap-5.0.0-beta1-dist\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="font/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta http-equiv="refresh" content="">

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/nkwana.js"></script>
<script src="bootstrap-5.0.0-beta1-dist\bootstrap-5.0.0-beta1-dist\js\bootstrap.min.js"></script>

<noscript>Your device does not support javascript</noscript>

<meta name="author" content="Belmiro Mohlala"/>
<meta name="description" content="Create Account of Nkwana Store and Start Shopping Online/results">
<meta name="keywords" content="Nkwana Store SignUp/results">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 



</head>

<body  onload="modal_advert()">

<div class="top">
<div class="menu">
        <div class="menu2">
            <div class="menu1"></div>
            <div class="menu1"></div>
            <div class="menu1"></div>
        </div>

    </div>
<div class="logo"><img src="img/logo.PNG" alt="logo"></div>
    <div class="title">
        <h1 style='width:100%;left:40%;'> New Account Status</h1>
    </div>
	
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
		
<div class="container-fluid pt-3" id="success">

					   <h1 style='color:green;'>Account Created Successfully</h1>
			           <p><a href='joseph.php'>click here to go to main page then login</a></p>
					   
					   
<div class="container-fluid mp-4 border">
<h3>Your Personal details are captured as follows</h3>
<table class="table table-bordered">
<tr><th>Username</th><th>Email</th> </tr>
<tr><td><?php echo  $_GET['username']  ?></td><td><?php echo  $_GET['email'] ?></td> </tr>
</table>
</div>
</div>


		
</body>
</html>