<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\entity\Answer;
use classes\business\UserManager;
use classes\entity\Message;

$subjectId = $_GET['id'];
$UM=new UserManager();
$threadStarterId = $UM->getUserTo($subjectId);
$messages = $UM->getAllMessages($subjectId, $threadStarterId);
$sender = $user->id;
$recipient = $UM->getRecipient($subjectId, $sender);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>View Thread</title>
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
		<div class="center">
			<div class="row">
				<div id="registerbutton" class="col-lg-8 col-lg-offset-2 text-center">
 
<?php

foreach($messages as $message) {
	if($message!=null){
?>
 
<table width="400" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%" bgcolor="#FFA500"><strong>From</strong></td>
<td width="5%" bgcolor="#FFA500">:</td>
<td width="77%" bgcolor="#FFA500"><?php 
$user_from_id = $message->userFrom;
$user_from = $UM->getUserById($user_from_id);
echo $user_from->firstName; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>To</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php 
$user_to_id = $message->userTo;
$user_to = $UM->getUserById($user_to_id);
echo $user_to->firstName;
?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Message</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $message->messageBody; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Date</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $message->messageDate; ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
	}
}
?>
 
<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form2" method="post" action="reply.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Message</strong></td>
<td valign="top">:</td>
<td><textarea name="a_message" cols="45" rows="3" id="a_message"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="userFromId" type="hidden" value="<?php echo $sender; ?>"></td>
<td><input name="subjectId" type="hidden" value="<?php echo $subjectId; ?>"></td>
<td><input name="userToId" type="hidden" value="<?php echo $recipient; ?>"></td>
<td><input type="submit" name="Submit" value="Submit"> 
<input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>
			</div>
		</div>
	</div>