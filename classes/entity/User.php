<?php
namespace classes\entity;
use classes\business\UserManager;
use classes\util\DBUtil;
//include '../../public/includes/autoload.php';	//for login error but doesnt seem to be working

class User
{
	public $id=0;
	public $firstName;
	public $lastName;
	public $email;
	public $password;
	public $is_admin;	
	public $is_block;	
	public $profile_pic;
	public $profile;

	/* public $firstName2;
	public $lastName2;
	public $profile_pic2;
	public $profile2; */
   
}
?>