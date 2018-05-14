<?php
include 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\phpcrudsample\public\includes\security.php';

//use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

ob_start();

$id = $_GET['id'];
$UM=new UserManager();
$user = $UM->getUserById($id);

/* if(isset($_REQUEST["submitted"])){
	$UM->saveApplication($user, $job);
	header("Location:/module5project/public/modules/user/jobapplied.php"); 
} */

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
	<link href="/phpcrudsample/public/css/home2/home2.css" type="text/css" rel="stylesheet"/>	
</head>

<!--TOP MENU-->
<div class="container-fluid">
	<div class="row" style="background-color:rgba(0, 51, 102, 1); height:60px">
		<div class="col-xl-7">
			<!-- Logo -->
			<img src="/phpcrudsample/public/images/logo.png" style="width:40px; height:70px; padding:0px; border:0px; margin:0px">
		</div>
		<div class="col-xl-5">
			<?php
			if($user->is_admin == 1){
			?><br/>		 
				<a href="/phpcrudsample/public/home.php" style="color:white">Home</a> &nbsp;
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
<!--<div>-->
	<br /><br />
	
	<!--PROFILE PIC AND NAME-->
	<div class="row">
		<div class="col-xl-1 offset-xl-1">
			<img src="<?php echo $user->profile_pic;?>" height="120px" width="120px">
		</div>
		<div class="col-xl-10">
			<h1><?php echo $user->firstName." ".$user->lastName;?></h1>
		</div>
	</div>
	
	
<div class="row">
	<div class="col-xl-11 offset-xl-1"><br/><br/>
		
		<!-- Nav tabs -->
		<div class="card">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#profile" aria-controls="home" role="tab" data-toggle="tab">Profiles</a></li>
				<li role="presentation" class="active"><a href="#messages" aria-controls="profile" role="tab" data-toggle="tab">Messages</a></li>
				<!--<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>-->
				<!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
			</ul>
				
		<!-- Tab panes -->
			<div class="tab-content">
			
				<div role="tabpanel" class="tab-pane active" id="profile">
				<?php echo $user->profile;?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="messages">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</div>
				
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php
include 'includes/footer.php';
?>