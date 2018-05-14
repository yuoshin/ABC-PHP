<?php
require_once '../../includes/autoload.php';
include '../../includes/header.php';

use classes\business\UserManager;
//use classes\business\UserManagerDB;
use classes\entity\User;
use classes\util\DBUtil;

ob_start();
?>

<?php

$firstName=$user->firstName;
$lastName=$user->lastName;
$email=$user->email;
$password=$user->password;

$updateObj = new UserManager();
$upd = $updateObj->updateProfile($firstName,$lastName,$email,$password);

?>
<head>
<script>
	function validateForm() {
		var a = document.forms["myForm"]["firstName"].value;
		var y = document.forms["myForm"]["lastName"].value;
		var x = document.forms["myForm"]["email"].value;
		var y = document.forms["myForm"]["password"].value;
		var z = document.forms["myForm"]["cpassword"].value;
		if (a == "" || b == "" || x == "" || y == "" || z == ""){
			alert("Please do not leave the fields blank");
			return false;
			}
	}
</script>
</head>
<form name="myForm" method="post" onsubmit="return validateForm()">
	<div align=center><h1>Update Profile</h1></div>
	<div align=center>
	<table border='1' width="800">
	  <tr>
		<td style='color:white;font-size:18px;background-color:rgba(0,0,0,0.5);'>First Name</td>
		<td><input type="text" name="firstName" value="<?=$firstName?>" size="50"></td>
	  </tr>
	  <tr>
		<td style='color:white;font-size:18px;background-color:rgba(0,0,0,0.5);width:600px; margin:auto'>Last Name</td>
		<td><input type="text" name="lastName" value="<?=$lastName?>" size="50"></td>
	  </tr>
	  <tr>
		<td style='color:white; font-size:18px; background-color: rgba(0, 0, 0, 0.5);width:600px; margin:auto'>Email</td>
		<td><input type="text" name="email" value="<?=$email?>" size="50"></td>
	  </tr>
	  <tr>
		<td style='color:white; font-size:18px; background-color: rgba(0, 0, 0, 0.5);width:600px; margin:auto'>Password</td>
		<td><input type="password" name="password" value="<?=$password?>" size="20"></td>
	  </tr>
	  <tr>
		<td style='color:white; font-size:18px; background-color: rgba(0, 0, 0, 0.5);width:600px; margin:auto'>Confirm Password</td>
		<td><input type="password" name="cpassword" value="<?=$password?>" size="20"></td>
	  </tr>
	  <tr>
		<td colspan="2" align="right">
		   <input type="hidden" name="submitted" value="1">
		   <input type="submit" name="submit" value="Submit"> 
		   <input type="reset" name="clear" value="Clear Search" onClick="javascript:clearForm();">
		</td>
	  </tr>
	</table>
	</div>
</form>
</div>


<?php
include '../../includes/footer.php';
?>