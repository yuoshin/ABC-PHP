<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;

$id=$_POST['id'];
$answerName=$_POST['answerName'];
$forumId=$_POST['forumId'];

$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer']; 

date_default_timezone_set('Asia/Singapore');
$a_datetime=date("d/m/y H:i:s"); 
$UM = new UserManager();
$UM->addReply($answerName, $id, $a_name, $a_email, $a_answer, $a_datetime);

header("Location: forumtopic.php?id=".$id."&forumId=".$forumId."");
?>