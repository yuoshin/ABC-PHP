<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\business\UserManager;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>New Message</title>
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
					<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
						<tr>
							<form id="form1" name="form1" method="post" action="add_new_message.php">
								<td>
									<table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#f2bf61">
										<tr bgcolor="#f2bf61">
											<td colspan="3" bgcolor="#FFA500"><strong>Compose New Message</strong> </td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td width="14%"><strong>Subject</strong></td>
											<td width="2%">:</td>
											<td width="84%"><input name="subject" type="text" id="subject" size="50" /></td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td width="14%"><strong>To</strong></td>
											<td width="2%">:</td>
											<td width="84%"><input name="user_to" type="text" id="user_to" size="50" /></td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td valign="top"><strong>Message</strong></td>
											<td valign="top">:</td>
											<td><textarea name="message" cols="50" rows="3" id="message"></textarea></td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td><input type="submit" name="Submit" value="Submit" /> 
											<input type="reset" name="Submit2" value="Reset" /></td>
										</tr>
									</table>
								</td>
							</form>
						</tr>
					</table>
 </body>
</html>
<?php
include '../../includes/footer.php';
?>