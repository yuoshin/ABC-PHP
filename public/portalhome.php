<?php
use classes\business\UserManager;

require_once 'includes/autoload.php';

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
	<link href="/phpcrudsample/public/css/portalhome/portalhome.css" type="text/css" rel="stylesheet"/>
	
	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
	<script src="resources/scripts/jquery-1.7.1.min.js"></script>
    <script src="resources/scripts/jquery-ui-1.8.10.custom.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->	
</head>
<body>
<div id="bodycontainer" class="container-fluid">
	<div class="row">
		<!--Header-->
		<div class="col-xl-10" style="background-color:rgba(0, 51, 102, 1); height:60px">
			<!-- Logo -->
			<img src="/phpcrudsample/public/images/logo.png" style="width:40px; height:70px; padding:0px; border:0px; margin:0px">
		</div>
		<!--Login-->
		<div class="col-xl-2" style="background-color:rgba(0, 51, 102, 1); height:60px">
			<br /><a href="/phpcrudsample/public/login.php" class="myButton">Login</a>
			<a href="/phpcrudsample/public/modules/user/register.php" class="myButton">Register</a>
		</div>
	</div>	
	<div class="row">
		<div class="col-xl-12">
			<img src="/phpcrudsample/public/css/portalhome/u55.png" style="height:360px; width:1320px; padding:0px; margin:0px">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<img src="/phpcrudsample/public/css/portalhome/capture.png" style="height:400px; width:1320px; padding:0px; margin:0px">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<?php include "/includes/footer.php"?>
		</div>
	</div>
</div>

</body>
</html>




