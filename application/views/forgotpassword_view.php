<?php $this->load->view('template/header.php'); ?>
<!-- FORGOT PASSWORD FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">forgot password</div>
	<!-- Main Form -->
	<div class="login-form-1">
    <?php $attributes = array("id" => "forgot-password-form", "class" => "text-left");
                        echo form_open("user/forgotpassword", $attributes);  ?>
			<div class="etc-login-form">
        <?php echo $this->session->flashdata('fp_msg') ?>
				<p id="fp_label">When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
			</div>
			<div class="main-login-form" id="fpform">
        <?php if($this->session->flashdata('fp_success'))
        echo "<script> $('#fpform').hide(); $('#fp_label').hide(); </script>";?>
				<div class="login-group">
					<div class="form-group">
						<label for="fp_email" class="sr-only">Email address</label>
						<input type="email" class="form-control" id="fp_email" name="fp_email" placeholder="email address" require="">
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="<?php echo base_url(); ?>index.php/user/login">login here</a></p>
				<p>new user? <a href="<?php echo base_url(); ?>index.php/user/signup">create new account</a></p>
			</div>
    <?php echo form_close();?>
	</div>
	<!-- end:Main Form -->
</div>
<?php $this->load->view('template/footer.php'); ?>
