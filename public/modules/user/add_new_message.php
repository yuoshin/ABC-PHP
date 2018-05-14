<?php 
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;

$subject=$_POST['subject'];
$messageBody=$_POST['message'];
$user_to_name=$_POST['user_to'];
$UM = new UserManager();
$user_to=$UM->getUserByName($user_to_name);
$threadStarterId = $UM->getUserTo($subjectId);
$user_to_id=$user_to->id;
$user_from = $user->id;

date_default_timezone_set('Asia/Singapore');
$datetime=date("d/m/y h:i:s"); //create date time

$UM->addNewThread($user_to_id,$user_from,$subject,$datetime);
$thread = $UM->getThreadBySubject($subject);
$subjectId = $thread->subjectId;
$UM->addMessageReply($user_to_id, $user_from, $messageBody, $datetime, $subjectId);
 
 header("Location: view_thread.php?id=".$subjectId."&userFromId=".$threadStarterId);

?>