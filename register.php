<?php
require_once "connect.php";
$submit=$result1=$email_err=$email_err1=$img_err1=$username_err=$server_err=$pass_err=$test=$button="";
$belmiro=1;


function sanitize($value){
	
	$s_value = filter_var($value,FILTER_SANITIZE_STRING);
	
	return $s_value;
	
}

/*
$user="<span style='color:red;'>NO ACCOUNT</span>";

if(isset($_COOKIE["username"])){
	$user="<span style='color:red;'>Logged Out</span>";
	$button="<p class='login'><a href='#login' style='color:white;background-color:red;
	text-decoration:none;'> Login </a></p>";
}

if(isset($_COOKIE["username"])){
	
	session_start();
	
	if(isset($_SESSION["username"])){
	
	$user = ucfirst($_SESSION["username"]);
	$button="";
	
}
else{
	$user="<span style='color:red;'>Logged Out</span>";
	$button="<p class='login'><a href='#login' style='color:white;background-color:red;
	text-decoration:none;'> Login </a></p>";
}

}
else{
	$user="<span style='color:red;'>NO ACCOUNT</span>";
}*/




if($_SERVER["REQUEST_METHOD"]== "POST"){
	
	$salt1 = "@_/";
		$salt2 = "#_/";
	
             // Confirming Email 
		$confirm_mail = "@gmail.com";
		$get_email = $_POST["email"];
		
	if(strpos($get_email,$confirm_mail) !== false){
			
			$email_err1 = "";
			
		}
		
		else {
			$email_err1="Invalid email format, NB: only gmail accounts are allowed";
			$belmiro=0;
		}
		  //validate email
	  
		if($_POST["email"] !== $_POST["email1"]){
			$email_err = "emails don't match";
			$belmiro = 0;
		}
		
		//validating password
		
	 if(trim($_POST["password1"]) !== trim($_POST["password"])){
		 
		 $pass_err="Your passwords don't match";
		 $belmiro=0;
	 }
	 
    if(strlen(trim($_POST["password1"])) < 6){
		 $pass_err="Your password must be at least 6 character";
		  $belmiro=0;
		}
		
		
		//validate username 
		$sql="SELECT id FROM accounts WHERE username=?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $param_username);
		$param_username =sanitize(ucfirst(strtolower(trim($_POST["Username"]))));
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows ==1){
			$username_err="<span style='color:red'>username is Already taken</span>";
			$belmiro=0;
		}
		$stmt->close();

//-------------------------------------------------------------------------

	
		if($belmiro == 1){
			$sql1="INSERT INTO accounts(username,fname,pasword,surname,email,town,city,postal,country,street,genter,dateT)
			values(?,?,?,?,?,?,?,?,?,?,?,?);";
			$stmt1 = $conn->prepare($sql1);
			$stmt1->bind_param("sssssssissss",$username,$name,$token,$surname,$email,$town,$city,$postal,$country,$street,$gender,$date);
			//set parameters to execute
			$username=sanitize(ucfirst(strtolower(trim($_POST["Username"]))));
			$password = $_POST["password"];
			$token = hash('ripemd128',"$salt1$password$salt2");
			$name=$_POST["first_name"];
			$surname=trim($_POST["surname_name"]);
			$email=trim($_POST["email"]);
			$street=$_POST["street_name"];
			$city=$_POST["Province"];
			$town = $_POST["Town"];
			$postal = $_POST["Postal_code"];
			$country = $_POST["Country"];
			$gender = $_POST["gender"];
			$date = date("D jS \of F Y h:i:s A");
			setcookie('username',$username,time()+ 60*60*24*800,'/');
			
			if($stmt1->execute()){
				
				header("location:success.php?username=$username&email=$email");
			
					
			}
			
			else{
				echo "<script>alert('error encountered while connecting to database')</script>";
			}
			$stmt1->close();
					   
		}
		
	
		else{
			$server_err="<br><span style='color:red; font-size:12px;'>Please correct your mistakes</span>";
		}
		

	
	
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
<link rel="stylesheet" type="text/css" href="bootstrap-5.0.0-beta1-dist\bootstrap-5.0.0-beta1-dist\css\bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="font/css/font-awesome.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta http-equiv="refresh" content="">

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/nkwana.js"></script>
<script src="bootstrap-5.0.0-beta1-dist\bootstrap-5.0.0-beta1-dist\js\bootstrap.min.js"></script>

<noscript>Your device does not support javascript</noscript>

<meta name="author" content="Belmiro Mohlala"/>
<meta name="description" content="Create Account of Nkwana Store and Start Shopping Online">
<meta name="keywords" content="Nkwana Store SignUp">
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
        <h1 style='width:100%;left:40%;'>Create New  Account</h1>
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


<?php
echo $result1;


?>



<div class="form_data">
<form action="" method="post" onsubmit="return verification()" enctype="multipart/form-data">
<div class="form_register">
<div>
<fieldset>
<legend>Personal details</legend>
<p><?php echo $server_err; ?></p>

<p><label for="first_name">First Name:</label><input type="text" name="first_name" id="first_name" required></p>

<p><label for="surname_name">Surname:</label><input type="text" name="surname_name" id="surname_name" required></p>

<p><label for="email">Email Adress:</label><input type="text" name="email" id="email" required><span style="color:red"><?PHP  echo $email_err1 ?></span></p>

<p><label for="email1">Confirm Email:</label><input type="text" name="email1" id="email1" required><span style="color:red"><?PHP  echo $email_err ?></span></p>

</fieldset>
</div>

<div>
<fieldset>
<legend>Physical Adress</legend>

<p><label for="street_name">Street Name:</label><input type="text" name="street_name" id="street_name" placeholder="eg:mandela street" required></p>


<p><label for="Town">Town</label><input type="text" name="Town" id="Town" required></p>

<p><label for="Province">City</label><input type="text" name="Province" id="Province" required></p>

<p><label for="Postal_code">Postal code</label><input type="number" placeholder="eg:1150" name="Postal_code" id="Postal_code" required></p>

<p><label for="Country">Country</label><input type="text" name="Country" id="Country" required></p>

<p><strong>Gender: </strong>Male<input type="radio" name="gender" value="Male" required>Female<input type="radio" name="gender" value="female" required>Other<input type="radio" name="gender" value="Other" required></p>

</fieldset>
</div>

<div>
<fieldset>
<legend>Create Logins</legend>
<p><label for="Username">Username:</label><input type="text" name="Username" id="Username" required><?php echo $username_err;?></p>

<p><label for="password">Password:</label><input type="password" name="password" id="password" required><span style="color:red"><?PHP  echo $pass_err ?></span></p>

<p><label for="password1">confirm Password:</label><input type="password" name="password1" id="password1" required></p>
<p><input type="hidden" name="identify" value="register"></p>
</fieldset>
<p><input type="submit" value="Submit" class="button"><input type="reset" value="Reset" style="margin-left:5%;"></p>
<p style="color:#330066">Already have an account? <a href="login.php">Login here</a></p>
</div>
  </div>  

 
</form>














</div>
</body>
</html>