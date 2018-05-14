<?php
require_once '../../includes/autoload.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\PHP\includes\PHPMailer-master\src\Exception.php';
require 'C:\PHP\includes\PHPMailer-master\src\PHPMailer.php';
require 'C:\PHP\includes\PHPMailer-master\src\SMTP.php';

mysql_connect("localhost", "root", "swordfish") 
or die("Error connecting to database: ".mysql_error());
     
mysql_select_db("phpcrudsample") 
or die(mysql_error());

$rsent = false;
$remail = "";

$forgetObj = new UserManager();
$forget = $forgetObj->forgetPassword($remail,$rsent);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset password</title>
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
	<link href="/phpcrudsample/public/css/forgetpasswordStyle/forgetpasswordStyle.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<?php //include "../../includes/header.php"?>
<div id="bodycontainer" class="container-fluid">
	<div class="center"><br/><br/><br/><br/><br/><br/>
		<div id="fill" class="row"></div>
		<div id="homeheading" class="row row-centered">
			<div class="col-lg-12 text-center">
				<h1><br>Reset password</h1>
			</div>
		</div>
	</div>	
	<div class="center">
		<div id="homeheading" class="row row-centered">
			<div class="col-lg-12 text-center">
				<form action="" method="post">
						<p>Email Address: <input type="text" name="remail" size="50" maxlength="255">
						<br><br/>
						<?php //print $error;?>
						<input type="submit" name="submit" class="myButton" value="Get New Password"></p>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
//include '../../includes/footer.php';
?>