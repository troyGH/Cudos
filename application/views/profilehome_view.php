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
				<?php
							if($user_info['customer_id'] == $this->session->userdata('customer_id')):

						?>
					<button onclick="window.location.href='<?php echo base_url(); ?>profile/edit'" class="btn btn-warning btn-lg"><b>Edit Profile</b></button>
					<?php 
					else:
					 ?>
					<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">Message</button>
					<?php
endif;
?>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu" style="text-align: left;display: inline-block">
					<ul class="nav">
					<br><br>
					<li class="active">
					<h5><a data-toggle="tab" href="#home"><i class="glyphicon glyphicon-home"></i>Overview</a>
					</h5></li>

							<li>
							<h5><a data-toggle="tab" href="#menu1"><i class="glyphicon glyphicon-user"></i>
							Account Settings </a></h5>
						</li>
						<li>
							<h5><a data-toggle="tab" href="#menu2">
							<i class="glyphicon glyphicon-ok"></i>
							Reviews </a></h5>
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


            <div id="menu1" class="tab-pane fade" style="margin-top: -570px">
            <h2>settings</h2>
            </div>
             <div id="menu2" class="tab-pane fade" style="margin-top: -70px">
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

		</div>
		</div>


<center>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

            <?php $attributes = array("id" => "theForm", "method" => "post");
                                echo form_open("admin/addemployees", $attributes);  ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Send a Message to <?php echo $user_info['first_name']; ?></h4>
        </div>
        <div class="modal-body">

                   <div class="form-group">
                        
                        <textarea class="form-control" rows="9" placeholder="Your message here.."></textarea>
                    </div>


        </div>
        <div class="modal-footer">
                              <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <button type="button" class="btn btn-default btn-block btn-lg wow flipInX">Send <i class="ion-android-arrow-forward"></i></button>
                    </div>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div> <!-- /container -->



<?php $this->load->view('template/footer.php'); ?>
<?php
