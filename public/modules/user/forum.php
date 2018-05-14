<?php
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\entity\Forum;

ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php 
$UM=new UserManager();
$forums=$UM->getAllForum();

if(isset($forums)){
    ?>

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
	<link href="/phpcrudsample/public/css/updateprofile/updateprofile.css" type="text/css" rel="stylesheet"/>
	<script>
	function myfunction(clicked_id) {
		var id = clicked_id;
		window.location = "/phpcrudsample/public/modules/user/forumprofile.php?id=" + id;
	};
	</script>
  </head>
  <body>
		<div class="container-fluid">
			<div class="center">
			<div id="fill" class="row"></div>
				<div id="homeheading" class="row row-centered">
					<div class="col-xl-12 text-center">
						<div class="col-xl-12 text-center">
							<h1>List of forums</h1><br />
						</div>
					</div>
				</div> 
			</div>
			<div class="center">
				<div class="row">
					<div class="col-xl-12 text-center">
						<table style="background-color:rgba(0, 0, 0, 0.5)" border="1" align="center" width="800">
								<tr>
								   <td style='color:white;font-size:18px'align="center"><b>No.</b></td>
								   <td style='color:white;font-size:18px'align="center"><b>Name</b></td>
								   <td style='color:white;font-size:18px'align="center"><b>Topic</b></td>
								   <td style='color:white;font-size:18px'align="center"><b>Admin</b></td>
								</tr>    
						<?php 
						foreach ($forums as $forum) {
							if($forum!=null){
								?>
								<tr>
								   <td align="center" style='color:white'><?=$forum->forumId?></td>
								   <td align="center" style='color:white'><?=$forum->forumName?></td>
								   <td align="center" style='color:white'><?=$forum->forumLanguage?></td>
								   <td align="center" style='color:white'><?=$forum->forumAdminId?></td>
								   <td>
									<button id=<?php echo "'".$forum->forumId."'"?> onclick="myfunction(this.id)">View</button>
							   </td> 
								</tr>
								<?php 
							}
						}
						?>
						</table><br/><br/>
					</div>
				</div>
			</div>
			</div>
			</div>

		
    <?php 
}
?>



<?php
include '../../includes/footer.php';
?>
</body>
</html>