<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;

$UM = new UserManager(); 
$threadStarterId = $UM->getUserTo($subjectId);
$user_to=$_POST['userToId'];
$subjectId=$_POST['subjectId'];
//$threadStarterId = $UM->getUserTo($subjectId);
$messageBody=$_POST['a_message']; 
$user_from = $_POST['userFromId'];
date_default_timezone_set('Asia/Singapore');
$datetime=date("d/m/y H:i:s"); 

$UM->addMessageReply($user_to, $user_from, $messageBody, $datetime, $subjectId);

header("Location: view_thread.php?id=".$subjectId."&userFromId=".$threadStarterId."");
?>