<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\entity\Answer;
use classes\business\UserManager;


$id = $_GET['id'];
$forumId = $_GET['forumId'];
$UM=new UserManager();
$forum = $UM->getForumById($forumId);
$forumName = $forum->forumName;
$topic = $UM->getTopicById($forumName,$id);

/* $id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result); */
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Forum Topic</title>
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
							<td><table width="100%" border="1" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
								<tr>
									<td bgcolor="#FFA500" border="1"><strong><?php echo $topic->topicTopic; ?></strong></td>
								</tr>
								 
								<tr>
									<td bgcolor="#FFA500" border="1"><?php echo $topic->topicDetail; ?></td>
								</tr>
								 
								<tr>
									<td bgcolor="#FFA500" border="1"><strong>By :</strong> <?php echo $topic->topicCreator; ?> <strong>Email : </strong><?php echo $topic->topicCreatorEmail;?></td>
								</tr>
								 
								<tr>
									<td bgcolor="#FFA500" border="1"><strong>Date/time : </strong><?php echo $topic->topicDateTime; ?></td>
								</tr>
							</table></td>
						</tr>
					</table>
<BR>
 
<?php
$answerName = "topic answers";
$answers=$UM->getAnswerById($answerName,$id);
/* $tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysql_query($sql2); */
foreach($answers as $answer) {
	if($answer!=null){
?>
 
<table width="400" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#FFA500"><strong>ID</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerId; ?></td>
</tr>
<tr>
<td width="18%" bgcolor="#FFA500"><strong>Name</strong></td>
<td width="5%" bgcolor="#FFA500">:</td>
<td width="77%" bgcolor="#FFA500"><?php echo $answer->answerName; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Email</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerEmail; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Answer</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerAnswer; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Date/Time</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerDateTime; ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
	}
}
/* $host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="Leparkour951"; // Mysql password 
$db_name="phpcrudsample"; // Database name 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

//$UM->updateViews($communityName,$id);
$sql3="SELECT view FROM $communityName WHERE id='$id'";
$result3=mysql_query($sql3);
$rows=mysql_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $communityName(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $communityName set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);
mysql_close(); */ 
?>
 
<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="addanswer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr >
<td width="18%"><strong>Name</strong></td>
<td width="3%">:</td>
<td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td>:</td>
<td><input name="a_email" type="text" id="a_email" size="45"></td>
</tr>
<tr>
<td valign="top"><strong>Answer</strong></td>	
<td valign="top">:</td>
<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input name="answerName" type="hidden" value="<?php echo $answerName; ?>"></td>
<td><input name="forumId" type="hidden" value="<?php echo $forumId; ?>"></td>
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