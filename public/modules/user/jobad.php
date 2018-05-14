<?php
ob_start();
include '../../includes/security.php';

use classes\entity\Job;
use classes\entity\User;
use classes\business\UserManager;
$jobId = $_GET['jobid'];
$UM=new UserManager();
$job = $UM->getJobById($jobId);
$user = unserialize ($_SESSION['user']);

 if(isset($_REQUEST["submitted"])){
	 //var_dump ($user);
	 //var_dump ($job);
	$UM->saveApplication($user, $job);
	header("Location:/phpcrudsample/public/modules/user/jobapplied.php"); 
 }
?>

<!DOCTYPE html>
<html>
  <title>Job Ad</title>
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
	<!--JS-->
	<script src="/phpcrudsample/public/scripts/demo.js"></script>
  <body>
  
  <!--TOP MENU-->
<div class="container-fluid">
	<div class="row" style="background-color:rgba(0, 51, 102, 1); height:60px">
		<div class="col-xl-6">
			<!-- Logo -->
			<img src="/phpcrudsample/public/images/logo.png" style="width:40px; height:70px; padding:0px; border:0px; margin:0px">
		</div>
							
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
    
	<div id="bodycontainer" class="container-fluid">
		<div class="container-fluid">
			<div class="center">
			<div id="fill" class="row"></div>
			<br />
				<div id="homeheading" class="row row-centered">
					<div class="col-xl-12 text-center">
						<h1><?php echo $job->jobTitle?></h1>
					</div>
				</div><br/>			
				<div class="center">
					<div class="row">
						<div style='background-color:rgba(0, 0, 0, 0.5); width:600; margin:auto; color:white' class="col-lg-8 col-lg-offset-2 text-center">
							<h3>Job Description</h3>
							<p style="text-align:left"><?php echo $job->jobDescription?></p>
							<h3>Job Requirement</h3>
							<p style="text-align:left"><?php echo $job->jobRequirement?></p>
							<h3>Expiry</h3>
							<p><?php echo $job->jobExpiry?> days</p>
						</div>
					</div>
				</div><br />
				<div class="col-lg-12 text-center">
					<form name="myForm" method="post">
						<input type="hidden" name="submitted" value="1"><input type="submit" class="myButton" name="submit" value="Apply">
					</form>
				</div>

			</div>
		</div>
	</div>
	<?php
include '../../includes/footer.php';
?>
	
   </body>
</html>