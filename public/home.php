<?php
include 'includes/header.php';
//include 'includes/security.php';
?>
	
<div class="row">
	<div class="col-xl-11 offset-xl-1"><br/><br/>
		
		<!-- Nav tabs -->
		<div class="card">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#profile" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
				<li role="presentation" class="active"><a href="#messages" aria-controls="profile" role="tab" data-toggle="tab">Messages</a></li>
				<!--<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>-->
				<!--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>-->
			</ul>
				
		<!-- Tab panes -->
			<div class="tab-content">				
				<div role="tabpanel" class="tab-pane active" id="profile">
				<?php echo $user->profile;?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="messages">
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php
include 'includes/footer.php';
?>