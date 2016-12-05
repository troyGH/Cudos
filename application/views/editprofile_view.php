<!-- Header -->
<?php $this->load->view('template/header.php'); ?>
<!-- End Header -->

<!-- Body -->
	<div class="container custom-body">

		<div class="row">
			<div class="col-md-4 col-md-offset-4 well">
				<?php $attributes = array("name" => "editprofileform", "method" => "POST");
				echo form_open("profile/edit", $attributes);?>

				<?php echo $this->session->flashdata('edit_msg');  ?>
				<legend><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> Edit Profile</legend>

				<div class="form-group">
					<label for="name">First Name</label>
					<input class="form-control" name="fname" placeholder="First Name" type="text" value="<?php echo set_value('fname', $user_data['first_name']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="name">Last Name</label>
					<input class="form-control" name="lname" placeholder="Last Name" type="text" value="<?php echo set_value('lname', $user_data['last_name']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control" name="email" placeholder="Email" type="email" value="<?php echo set_value('email', $user_data['email']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input class="form-control" name="city" placeholder="City" type="text" value="<?php echo set_value('city', $user_data['city']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="state">State</label>
					<input class="form-control" name="state" placeholder="State" type="text" value="<?php echo set_value('state', $user_data['state']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					<input class="form-control" name="country" placeholder="Country" type="text" value="<?php echo set_value('country', $user_data['country']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="about">About Me</label>
					<input class="form-control" name="about" placeholder="About me" type="text" value="<?php echo set_value('about', $user_data['about_me']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="about">Image URL</label>
					<input class="form-control" name="img" placeholder="Image URL" type="text" value="<?php echo set_value('img', $user_data['img_url']); ?>" required/>
				</div>
				<div class="form-group">
					<label for="subject">Password</label>
					<input class="form-control" name="password" placeholder="Password" type="password" required/>
				</div>
				<div class="form-group">
					<label for="subject">Confirm Password</label>
					<input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" required/>
				</div>
				<div class="form-group">
					<button name="update" type="submit" value="update" class="btn btn-primary">Update</button>
					<button name="cancel" type="reset" class="btn btn-default">Reset</button>
					<?php echo form_close(); ?>
				</div>
				<a href="#" class="pull-right" data-toggle='modal' data-target='#deleteModal'> <i class="fa fa-trash fa-4x" aria-hidden="true"></i></a>
			</div>
		</div>
		<!-- Modal -->

		<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-sm" role="document" aria-hidden="true">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<p class="modal-title">Are you sure you want to delete your account? All your reviews will also be deleted.</p>
					</div>
					<div class="modal-body">
						<?php $attributes = array("id" => "deleteForm");
																echo form_open("profile/delete", $attributes);  ?>
						<div class="form-group">
							<button name="cancel" type="submit" class="btn btn-danger">Yes</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>

			</div>
		</div>
	</div>
<!-- End Body -->

<!-- Footer -->
<?php $this->load->view('template/footer.php'); ?>
<!-- End Footer -->
