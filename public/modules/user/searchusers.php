<?php
ob_start();
//include '../../includes/security.php';
include '../../includes/header.php';

$con = mysqli_connect("localhost", "root", "swordfish", "phpcrudsample");

?>
	<div align="center">
		<h2 style="color:white">Search Users</h2>
		<form action="search.php" method="GET" name="search_form">
			<input type="text" name="query" style="width:300px">
			<input type="submit" value="Search">
		</form>
	</div>
		
	<!--<div id="bodycontainer" class="container-fluid"><br/><br/><br/>
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-12 text-center">
					<h2>Search Users</h2>
				</div>
			</div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-12 text-center">
					<form action="search.php" method="GET" name="search_form">
						<input type="text" name="query"/>
						<input type="submit" value="Search" />
					</form>
				</div>
			</div>
		</div>	
	</div>-->
</div>

<?php
include '../../includes/footer.php';
?>