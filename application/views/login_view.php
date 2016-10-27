<?php $this->load->view('template/header.php'); ?>
<!-- LOGIN FORM -->
<div class="text-center custom-body">
	<div class="logo">login</div>
	<!-- Main Form -->
	<div class="login-form-1">
    <?php $attributes = array("id" => "login-form", "class" => "text-left");
                				echo form_open("user/login", $attributes);  ?>
    <!-- Error Message -->
		<?php echo $this->session->flashdata('lg_err'); ?>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_email" class="sr-only">Email Address</label>
						<input type="email" class="form-control" id="lg_email" name="lg_email" placeholder="email"  required="">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password" required="">
					</div>
					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember me</label>
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<h6>forgot your password? <a href="<?php echo base_url(); ?>index.php/user/forgotpassword">click here</a></h6>
				<h6>new user? <a href="<?php echo base_url(); ?>index.php/user/signup">create new account</a></h6>
			</div>
		<?php echo form_close();?>
	</div>
	<!-- end:Main Form -->
</div>
<?php $this->load->view('template/footer.php'); ?>
