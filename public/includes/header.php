<?php
//include 'includes/security.php';
include 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\phpcrudsample\public\includes\security.php';

use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

ob_start();
?>

<head>
<title>Profile</title>
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
	<link href="/phpcrudsample/public/css/homeprogrammer/homeProgrammerStyle.css" type="text/css" rel="stylesheet"/>
	<!--JS-->
	<script src="/phpcrudsample/public/scripts/demo.js"></script>
</head>

<!--TOP MENU-->
<div class="container-fluid">
	<div class="row" style="background-color:rgba(0, 51, 102, 1); height:60px">
		<div class="col-xl-6">
			<!-- Logo -->
			<img src="/phpcrudsample/public/images/logo.png" style="width:40px; height:70px; padding:0px; border:0px; margin:0px">
		</div>
		<!--Search bar-->
		<!--<div class="col-xl-8">
			<form action="/phpcrudsample/public/modules/user/searchusers.php" method="GET" name="search_form">
				<input type="text" onkeyup="getLiveSearchUsers(this.value, '<?php echo $user->firstName; ?>')" name ="q" id="searchInput" placeholder="Search">
			</form>
			<div class="search_results">
			</div>

			<div class="search_results_footer_empty">
			</div>
		</div>-->
							
		<div class="col-xl-6">
			<?php
			if($user->is_admin == 1){
			?><br/>		 
				<a href="/phpcrudsample/public/home.php" style="color:white">Home</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/inbox.php" style="color:white">Inbox</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/updateprofile.php" style="color:white">Update Profile</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/viewjobs.php" style="color:white">View Jobs</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/forum.php" style="color:white">Forum</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/searchusers.php" style="color:white">Search users</a> &nbsp;
				<a href="/phpcrudsample/public/logout.php" style="color:white">Logout</a> &nbsp;
				<?php 
			}else{
				?>
				<br/>		 
				<a href="/phpcrudsample/public/home.php" style="color:white">Home</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/inbox.php" style="color:white">Inbox</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/updateprofile.php" style="color:white">Update Profile</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/viewjobs.php" style="color:white">View Jobs</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/forum.php" style="color:white">Forum</a> &nbsp;
				<a href="/phpcrudsample/public/modules/user/searchusers.php" style="color:white">Search users</a> &nbsp;
				<a href="/phpcrudsample/public/logout.php" style="color:white">Logout</a> &nbsp;<?php
			}?>
		</div>
	</div>
</div>

<div id="bodycontainer" class="container-fluid">	<!--THE </DIV> for this is in home.php-->
	<br /><br />
	
	<!--PROFILE PIC AND NAME-->
	<div class="row">
		<div class="col-xl-1 offset-xl-1">
			<img src="<?php echo $user->profile_pic;?>" height="120px" width="120px">
			
		</div>
		<div class="col-xl-10">
			<h1><?php echo $user->firstName . ' ' . $user->lastName; ?></h1>
		</div>
	</div>	
	
