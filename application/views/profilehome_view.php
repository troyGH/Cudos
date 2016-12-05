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
					<h5><a data-toggle="tab" href="#home"><i class="glyphicon glyphicon-home"></i> Overview</a>
					</h5></li>

						<li>
							<h5><a data-toggle="tab" href="#menu1">
							<i class="glyphicon glyphicon-ok"></i> Reviews </a></h5>
						</li>

					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9 tab-content" align=center>
		<div class="tabs" style="text-align: left;display: inline-block">
            <div id="home" class="tab-pane wow zoomIn fade in active" style="margin-top: 20px;">
            				<div class="personal_header" align="center">
							<h2>Personal Information</h2>
							</div>
							<div class="personal_info">
							<?php
							//if($user_info['customer_id'] == $this->session->userdata('customer_id'))
							//$test = "true";
							//else $test = "false";
							//echo "<p>True or false: ".$test.'</p>';
							//echo "<p>ID: ".$user_info['customer_id'].'</p>';
							echo "<h5 align=center><b>".$user_info['first_name'].'';
							echo " ".$user_info['last_name'].'</h5></b>';
							?>
							<hr class="style-two">
							<?php
							echo "<p><b>About Me:</b> ".$user_info['about_me'].'</p>';
							echo "<p><b>Member Since: </b>".$user_info['signup_date'].'</p>';
							echo "<p><b>City: </b>".$user_info['city'].'</p>';
							echo "<p><b>State: </b>".$user_info['state'].'</p>';
							echo "<p><b>Country: </b>".$user_info['country'].'</p>';
							?>
							</div>
            </div>

             <div id="menu1" class="tab-pane fade" style="margin-top: -500px">
             <div class="review_header" align="center">
							 <h2>Reviews</h2>
							 </div>
							 <div class="review_info">
							 <?php
							 foreach($reviews as $review){
								 echo "<div class='well'><p align=center>".$review['first_name'].' '.$review['last_name'].'</p>';
								 echo "<p align=center>Employee of ".$review['business_name'].'</p>';
								 //echo "<p>Business Google ID: ".$review['google_id'].'</p>';
								 echo "<p align=center>".$review['business_address'].'</p>';
								 echo "<p align=center>".$review['business_phone'].'</p><br>';
								 //echo "<p>Is Associated: ".$review['is_associated'].'</p>';
								 echo "<p><div class='ratystars ".$review['review_id']."' data-stars=".$review['stars']."></div>".'</p>';
								 echo "<p>".$review['description'].'</p>';
								 echo "<i class='fa fa-thumbs-up' align=right></i> ".$review['ThumbsUp'];
								 echo "  <i class='fa fa-thumbs-down' align=right></i> ".$review['ThumbsDown'];
								 echo "<p class='text-muted' align=right>".$review['datestamp'].'</p></div>';
								 ?>
								 <script>
								 $( ".ratystars" ).each(function( index ) {
									 $(this).raty({ readOnly: true, score: $(this).attr('data-stars') });
									});
								 </script>
								 <hr class="style-two">
								 <?php
							 }
							 ?>
							 </div>

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
