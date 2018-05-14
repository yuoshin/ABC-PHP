<?php
session_start();
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
	require_once 'autoload.php';
	global $user;
	//global $usersearched;
	$user = unserialize($_SESSION['user']);
} else {
	$user = false;
	header("Location:/phpcrudsample/public/login.php");
}