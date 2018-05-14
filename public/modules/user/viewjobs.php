<?php
require_once '../../includes/autoload.php';
//include '../../includes/security.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\entity\Job;

ob_start();
?>


<head>
<title>View Jobs</title>
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
	<link href="/phpcrudsample/public/css/updateprofile/updateprofile.css" type="text/css" rel="stylesheet"/>
	<script>
	function myfunction(clicked_id) {
		var id = clicked_id;
		window.location = "/phpcrudsample/public/modules/user/jobad.php?jobid=" + id;
	};
</script>
</head>

<body>
<?php include '../../includes/header.php';?>
	<div class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-xl-12 text-center">
					<div class="col-xl-12 text-center">
						<h1>Available Jobs</h1><br />
					</div>
				</div>
			</div> 
		<div class="center">
			<div class="row">
				<div id="registerbutton" class="col-xl-12 text-center">
					<?php 
						$UM=new UserManager();
						$jobs=$UM->getAllJobs();
						$total=count($jobs);
						if(isset($jobs)){
					?>
						<table style="background-color:rgba(0, 0, 0, 0.5)" border="1" align="center">
								<tr>
								   <td style='color:white;font-size:18px'align="center"><b>Id</b></td>
								   <td style='color:white;font-size:18px'align="center"><b>Job Title</b></td>
								   <td style='color:white;font-size:18px'align="center"><b>Job Expiry</b></td>
								   <td style='color:white;font-size:18px'align="center"><b>Job Requirement</b></td>
								</tr>    
						<?php 
						foreach ($jobs as $job) {
							if($job!=null){
						?>
							<tr>
							   <td width="50" align="center" style='color:white'><?=$job->jobId?></td>
							   <td width="100" align="center" style='color:white'><?=$job->jobTitle?></td>
							   <td width="100" align="center" style='color:white'><?=$job->jobExpiry?></td>
							   <td width="700" style='color:white'><?=$job->jobRequirement?></td>
							   <td>
							   <button id=<?php echo "'".$job->jobId."'"?> onclick="myfunction(this.id)">View</button>
							   </td>     
							</tr>
						<?php 
							}
						}
						?>
						</table><br/><br/>
					<?php 
						}
					?>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
</body>


<?php
include '../../includes/footer.php';
?>