<?php
	require_once '../../includes/autoload.php';
	ob_start();

	use classes\business\UserManager;
	use classes\entity\User;
	include '../../includes/header.php';
	
	//include '../../includes/security.php';
    /* mysql_connect("localhost", "root", "swordfish") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("phpcrudsample") or die(mysql_error()); */
	$query = $_GET['query'];
?>
 <head>
  <script>
	function myfunction(clicked_id) {
		var id = clicked_id;
		window.location = "/phpcrudsample/public/home2.php?id=" + id;
	};
</script>
  </head>
	<div  class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-xl-12 text-center">
					<div class="col-xl-12 text-center">
						<h1>Search Results</h1>
					</div>
				</div>
			</div>
			 
		<div class="center">
			<div class="row">
				<div id="registerbutton" class="col-xl-12 text-center">
					<?php
					$UM=new UserManager();
					$users=$UM->searchUsers($query);
					?>


					<?php 
					foreach ((array)$users as $user) {
						if($user!=null){
							?>
							<table class='table' style='background-color:rgba(0, 0, 0, 0.7); width:600; margin:auto'>
							<thead>
								<tr>
									<th style='color:white'><h4>Name</h4></th>
									<th style='color:white'><h4>Email</h4></th>
								</tr>
							</thead>
							
							<tr>
								<td style='color:white'><?=$user->firstName." ".$user->lastName?></button></td>
								<td style='color:white'><?=$user->email?></td>
								<td><button id=<?php echo "'".$user->id."'"?> onclick="myfunction(this.id)">View</button></td>
							</tr>						
							<?php 
						}
					}					

					?>
				</div>
			</div>
		</div>
		
	</div>

</div>
</div>
<?php
//include '../../includes/footer.php';

?>