<?php
require_once '../../includes/autoload.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$formerror="";
$emailError="";

$firstName="";
$lastName="";
$email="";
$password="";

$regObj = new UserManager();
$reg = $regObj->registerUser($firstName,$lastName,$email,$password);

/* if(isset($_REQUEST["submitted"])){
    $firstName=$_REQUEST["firstName"];
    $lastName=$_REQUEST["lastName"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    
    if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
        $UM=new UserManager();
        $user=new User();
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
		/* $user->is_admin=0;
		$user->is_block=0;
		$user->profile_pic="/phpcrudsample/public/images/default.png";
		$user->profile="This is my profile.";
        
        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            header("Location:/phpcrudsample/public/modules/user/registerthankyou.php");
        }
        else{
            $formerror="User Already Exist";
        }
    }
	else
	{
        $formerror="Please fill in the fields";
    }
	
	if (($email != "") && (!filter_var($email, FILTER_VALIDATE_EMAIL)))
	{
		$emailError = "Invalid email format";	
	}
} */

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register with us!</title>
	<!--Required Meta tags-->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--BootstrapCSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<!--Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<!--CSS-->
	<link href="/phpcrudsample/public/css/register/registerStyle.css" type="text/css" rel="stylesheet"/>
	<script>
	function validateForm() {
	var a = document.forms["myForm"]["firstName"].value;
	var y = document.forms["myForm"]["lastName"].value;
    var x = document.forms["myForm"]["email"].value;
	var y = document.forms["myForm"]["password"].value;
	var z = document.forms["myForm"]["cpassword"].value;
    if (a == "" || b == "" || x == "" || y == "" || z == ""){
        alert("Please do not leave the fields blank");
        return false;
		}
	}
	</script>
</head>

<body>
<div id="bodycontainer" class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-12 text-center">
					<h1><br>Welcome to ABC!</h1>
					<a href="https://www.facebook.com/"><img class="link" src="/phpcrudsample/public/css/register/facebook.png" width="436" height="44" /></a><br>
					<a href="https://accounts.google.com/ServiceLogin/signinchooser?elo=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><img class="link" src="/phpcrudsample/public/css/register/gmail.png" width="436" height="44" /></a><br>
					<img class="link" src="/phpcrudsample/public/css/register/or.png" width="436" height="44" />
				</div>
			</div>
		</div>

		<div class="center">
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-12 text-center">
					<form name="myForm" method="post" onsubmit="return validateForm()">
							<input class="textbox" type="text" placeholder="First Name*" name="firstName"> 
							<br><br>
							<input class="textbox" type="text" placeholder="Last Name*" name="lastName"> 
							<br><br>
							<input class="textbox" type="text" placeholder="Email*" name="email"> 
							<br><br>
							<input class="textbox" type="password" placeholder="Password*" name="password"> 
							<br><br>
							<input class="textbox" type="password" placeholder="Confirm Password*" name="cpassword">
							<br><br>
							<input type="hidden" name="submitted" value="1"><input type="submit" name="submit" value="Join ABC" class="myButton">
					</form>
				</div>
				
			</div>
		</div>
	</div>
</body>

</html>