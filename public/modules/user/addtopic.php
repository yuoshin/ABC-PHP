<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Forum;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;
 

$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

date_default_timezone_set('Asia/Singapore');
$datetime=date("d/m/y h:i:s"); //create date time
 
$UM = new UserManager;
$UM->addNewTopic($topic, $detail, $name, $email, $datetime);
 
header("Location: forum.php");

?>