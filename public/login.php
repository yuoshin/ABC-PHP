<?php
use classes\business\UserManager;

require_once 'includes/autoload.php';

use classes\entity\User;
use classes\util\DBUtil;

$email="";
$password="";

$loginObj = new UserManager();
$login = $loginObj->loginUser($email,$password);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to ABC</title>
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
	<link href="/phpcrudsample/public/css/login/loginStyle.css" type="text/css" rel="stylesheet"/>
	
	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
	<script src="resources/scripts/jquery-1.7.1.min.js"></script>
    <script src="resources/scripts/jquery-ui-1.8.10.custom.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->	
	
	<script>function validateForm() {
    var x = document.forms["myForm"]["email"].value;
	var y = document.forms["myForm"]["password"].value;
    if (x == "") {
        alert("Email cannot be blank");
        return false;
    }
	if (y == "") {
        alert("Password cannot be blank");
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
				<img src="/phpcrudsample/public/images/logo.png" height="75%" width="25%" />
				<h1>Welcome!</h1>
			</div>
		</div>
	</div>
	<div class="center">
		<div id="homeheading" class="row row-centered">
			<div class="col-lg-12 text-center">
				<form name="myForm" method="post" onsubmit="return validateForm()">
					<input name="email" class="textbox" type="text" placeholder="Email*" value="<?=$email?>">
					<br><br>
					<input name="password" class="textbox" type="password" placeholder="Password*" value="<?=$password?>">
					<br><br>
					<input type="hidden" name="submitted" value="1"><input type="submit" name="submit" value="Login" class="myButton">
					<br>
					<h6><a href="/phpcrudsample/public/modules/user/forgetpassword.php">Forgot your password?</a></h6>
					<h6>Not a member yet? <a href="/phpcrudsample/public/modules/user/register.php">Sign up for free</a></h6>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>