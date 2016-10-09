<?php $this->load->view('template/header.php'); ?>
<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">register</div>
	<!-- Main Form -->
	<div class="login-form-1">
    <?php $attributes = array("id" => "register-form", "class" => "text-left");
                        echo form_open("user/signup", $attributes);  ?>
      <?php echo $this->session->flashdata('reg_msg');?>
			<div class="main-login-form" id="regform">
        <?php if($this->session->flashdata('reg_success'))
          echo "<script> $('#regform').hide(); </script>"; ?>
				<div class="login-group">
					<div class="form-group">
              <label for="reg_fname" class="sr-only">First Name</label>
              <input type="text" class="form-control" id="reg_fname" name="reg_fname" placeholder="first name" require="">
            </div>
          <div class="form-group">
            <label for="reg_lname" class="sr-only">Last Name</label>
            <input type="text" class="form-control" id="reg_lname" name="reg_lname" placeholder="last name" require="">
          </div>
          <div class="form-group">
            <label for="reg_email" class="sr-only">Email</label>
            <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email" require="">
          </div>
          <div class="form-group">

						<label for="reg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password" require="">
					</div>
					<div class="form-group">
						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password" require="">
					</div>

				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="<?php echo base_url(); ?>index.php/user/login">login here</a></p>
			</div>
      <?php echo form_close();?>
	</div>
	<!-- end:Main Form -->
</div>
<?php $this->load->view('template/footer.php'); ?>
