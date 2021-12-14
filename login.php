
<?php

require_once "connect.php";
$pasword_username_err=$login=$login_err=$button="";

//Sanitizing All input variables

function sanitize($value){
	
	$s_value = filter_var($value,FILTER_SANITIZE_STRING);
	
	return $s_value;
	
}
//------------------------------------------------


if($_SERVER["REQUEST_METHOD"]== "POST"){
	
	
	
	if(isset($_POST["login_page"])){
		$salt1 = "@_/";
		$salt2 = "#_/";
		$password = $_POST["password"];
		
	$sql="SELECT id FROM accounts WHERE pasword=? AND username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$param_pasword,$param_username);	
		$param_pasword = hash('ripemd128',"$salt1$password$salt2");
        $param_username = sanitize(ucfirst(strtolower(trim($_POST["username"]))));
		 
		if($stmt->execute()==true){
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows==1){
				session_start();
				$_SESSION["nkwana_user"] = ucfirst(strtolower($_POST["username"]));
				$user = ucfirst($_SESSION["nkwana_user"]);
                $_SESSION["logged"] = "user";
				$button="";
				setcookie('username',$user,time() + 60*60*24*7,'/');

				//setcookie('logged',$user,time(),'/');

				header("location:joseph.php");
			}
			
			else{
			$pasword_username_err="<strong>Your Pasword/Username combination is wrong</strong>";
             			
			}
			
		}
		else{
			$login_err="<script>alert('<p style='color:red'>We encountered error while processing your login details please try again later</p>')</script>";
		}
		$stmt->close();
	}

}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<title>Demo online shoping/Login</title>
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
<meta name="description" content="Login Nkwana Online Store">
<meta name="keywords" content="Nkwana online login">
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
<div class="logo"><img src="img/logo.png" alt="logo"></div>
    <div class="title1">
        <h1 >Demo Online store/Login</h1>
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
        
	
<div class="modal_login" >
<div class="bg-light" style="border-radius:3px;">
        <h3 class="text-danger">
<?php
if(isset($_GET["checkout"])){
echo $_GET["checkout"];

}
?>

    </h3>
</div>
    
 <form method="post" action="" >
    <fieldset>
            <legend>Fill your login details below:</legend>
            <p><label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </p>

            <p><label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
			</p>
			<input type="hidden" name="login_page" value="login_page">

            <p><input type="submit" name="submit" id="submit" value="Login" class="button"></p>
			
			<div style="color:red"> <?php echo $pasword_username_err; echo $login_err ?></div>
			
            <p><a href="register.php">create new account</a></p>
            <p><a href="resetpassword.php">reset password</a></p>

    </fieldset>

  </form>
</div>
	
	
	
	
	
</body>
</html>