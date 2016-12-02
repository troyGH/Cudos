<style type="text/css">
.profile{
	margin: 0 auto;
}

@media screen and (min-width: 980px) {
  .container.custom-body {
    padding:200px;
  }
}
</style>

<?php $this->load->view('template/header.php'); ?>
<div class="container custom-body">


		<div class="col-md-3">
			<div class="profile-sidebar" align=center>
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img class="img-rounded img-responsive" src=<?php echo "'".$user_info['img_url']."'";?> alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->

				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button onclick="window.location.href='http://localhost/Cudos/profile/edit'" class="btn btn-warning btn-sm">Edit Profile</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu" style="text-align: left;display: inline-block">
					<ul class="nav">
					<li class="active"><a data-toggle="tab" href="#home"><i class="glyphicon glyphicon-home"></i>Overview</a></li>

							<li>
							<a data-toggle="tab" href="#menu1"><i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a data-toggle="tab" href="#menu2">
							<i class="glyphicon glyphicon-ok"></i>
							Reviews </a>
						</li>
						<li>
							<a data-toggle="tab" href="#menu3">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9 tab-content" align=center>
		<div class="tabs" style="text-align: left;display: inline-block">
            <div id="home" class="tab-pane fade in active" >
							<h2>Personal Information</h2>
							<?php
							if($user_info['customer_id'] == $this->session->userdata('customer_id'))
							$test = "true";
							else $test = "false";
							echo "<p>True or false: ".$test.'</p>';
							echo "<p>ID: ".$user_info['customer_id'].'</p>';
							echo "<p>First Name: ".$user_info['first_name'].'</p>';
							echo "<p>Last Name: ".$user_info['last_name'].'</p>';
							echo "<p>About Me: ".$user_info['about_me'].'</p>';
							echo "<p>Member Since: ".$user_info['signup_date'].'</p>';
							echo "<p>City: ".$user_info['city'].'</p>';
							echo "<p>State: ".$user_info['state'].'</p>';
							echo "<p>Country: ".$user_info['country'].'</p>';
							?>
            </div>


            <div id="menu1" class="tab-pane fade">
            <h2>settings</h2>
            </div>
             <div id="menu2" class="tab-pane fade">
							 <h2>Reviews</h2>

							 <?php
							 foreach($reviews as $review){
								 echo "<div class='well'><p>Employeee: ".$review['first_name'].' '.$review['last_name'].'</p>';
								 echo "<p>Business Name: ".$review['business_name'].'</p>';
								 echo "<p>Business Google ID: ".$review['google_id'].'</p>';
								 echo "<p>Business Address: ".$review['business_address'].'</p>';
								 echo "<p>Business Phone: ".$review['business_phone'].'</p>';
								 echo "<p>Is Associated: ".$review['is_associated'].'</p>';
								 echo "<p>TimeStamp: ".$review['timestamp'].'</p>';
								 echo "<p>Description: ".$review['description'].'</p>';
								 echo "<p>Stars: ".$review['stars'].'</p>';
								 echo "<p>Thumbs Up: ".$review['ThumbsUp'].'</p>';
								 echo "<p>Thumbs Down: ".$review['ThumbsDown'].'</p></div>';
							 }
							 ?>

            </div>
             <div id="menu3" class="tab-pane fade">
            help
            </div>
		</div>
		</div>


<center>
</div> <!-- /container -->

<?php $this->load->view('template/footer.php'); ?>
<?php
