<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;
use classes\entity\Thread;

$id = $user->id;
$UM=new UserManager();
$threads = $UM->getAllThreads($id);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Inbox</title>
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
	<div id="bodycontainer" class="container-fluid">
			 
		<div  class="center">
			<div class="row">
				<div style="background-color:orange; width:60%; margin-top: 50px;" class="col-lg-8 col-lg-offset-2 text-center">
					<h2>Inbox</h2>
					<br>
					<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFA500">
					<tr>
					<td width="6%" align="center" bgcolor="#FFA500"><strong>#</strong></td>
					<td width="53%" align="center" bgcolor="#FFA500"><strong>Subject</strong></td>
					<td width="15%" align="center" bgcolor="#FFA500"><strong>From</strong></td>
					<td width="13%" align="center" bgcolor="#FFA500"><strong>Date/Time</strong></td>
					</tr>
			 
					<?php
					 
					// Start looping table row
					foreach ((array)$threads as $thread) { 
						if($thread!=null){
					?>
							<tr>
							<td><?php echo $thread->subjectId ?></td>
							<td><a href="view_thread.php?id=<?php 
							$subjectId = $thread->subjectId;
							echo $subjectId ?>&userFromId=<?php echo $UM->getUserTo($subjectId) ?>">
							<?php echo $thread->subject; ?></a><BR></td>
							<td><?php 
							$user_from_id = $thread->userFrom;
							$user_from = $UM->getUserById($user_from_id);
							echo $user_from->firstName; ?></td>
							<td><?php echo $thread->threadDate; ?></td>
							</tr>
							 
					<?php
						}
					}
					?>
					 
					<tr>
					<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_message.php"><strong>Compose New Message</strong> </a></td>
					</tr>
					</table>
				</div>
			</div>
		</div>
		
	</div>
	<?php
include '../../includes/footer.php';
?>
	
   </body>
</html>