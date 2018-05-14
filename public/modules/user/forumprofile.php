<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;
//error_reporting(0);

$id = $_GET['id'];
$UM=new UserManager();
$forum = $UM->getForumById($id);
$forumName = $forum->forumName;
$topics = $UM->getAllTopics($forumName);

/*  if(isset($_REQUEST["submitted"])){
	$UM->saveApplication($user, $job);
	header("Location:/module5project/public/modules/user/jobapplied.php");  
 } */
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Forum Profile</title>
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
  </head>
  <body>
	<div class="container-fluid"> 
			<div class="row">
				<div style="background-color:orange; width:60%; margin-top: 50px;" class="col-lg-8 col-lg-offset-2 text-center">
					<h2><?php echo $forum->forumName?></h2>
					<p><?php echo $forum->forumLanguage?></p>
					<br>
					<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFA500">
					<tr>
					<td width="6%" align="center" bgcolor="#FFA500"><strong>#</strong></td>
					<td width="53%" align="center" bgcolor="#FFA500"><strong>Topic</strong></td>
					<td width="13%" align="center" bgcolor="#FFA500"><strong>Replies</strong></td>
					<td width="13%" align="center" bgcolor="#FFA500"><strong>Date/Time</strong></td>
					</tr>
			 
					<?php
					 
					// Start looping table row
					foreach ((array)$topics as $topic) { 
						if($topic!=null){
					/*while($rows = mysql_fetch_array($result)){*/
					?>
							<tr>
							<td><?php echo $topic->topicId ?></td>
							<td><a href="forumtopic.php?id=<?php echo $topic->topicId ?>&forumId=<?php echo $id ?>">
							<?php echo $topic->topicTopic; ?></a><BR></td>
							<td><?php echo $topic->topicReplies; ?></td>
							<td><?php echo $topic->topicDateTime; ?></td>
							</tr>
							 
					<?php
					// Exit looping
						}
					}
					?>
					 
					<tr>
					<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="newtopic.php"><strong>Create New Topic</strong> </a></td>
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