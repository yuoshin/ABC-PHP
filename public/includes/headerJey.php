This is a Site Header <br/><br/>
<?php 
   if(isset($_SESSION["email"])){
       ?>
       <a href="/phpcrudsample/public/home.php">Home</a> &nbsp;
       <a href="/phpcrudsample/public/modules/user/updateprofile.php">Update Profile</a> &nbsp;
       <a href="/phpcrudsample/public/modules/user/userlist.php">View Users</a> &nbsp; 
       <a href="/phpcrudsample/public/logout.php">Logout</a> &nbsp; 
       <?php 
   }
?>