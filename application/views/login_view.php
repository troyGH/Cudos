<?php $this->load->view('template/header.php'); ?>
<!-- LOGIN FORM -->
<div class="login-body">
<?php echo $this->session->flashdata('reg_msg');?>
<?php echo $this->session->flashdata('lg_err'); ?>
<div id="back">
  <div class="backRight"></div>
  <div class="backLeft"></div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="leftpart">
      <div class="content">
        <h2>Sign Up</h2>
				<?php $attributes = array("id" => "register-form", "class" => "text-left");
		                        echo form_open("user/signup", $attributes);  ?>
					<div class="form-group">
							<label for="reg_fname" class="form-label"><span class="glyphicon glyphicon-user"></span> First Name</label>
							<input type="text" class="form-control" id="reg_fname" name="reg_fname"  required />
					</div>
					<div class="form-group">
            <label for="reg_lname" class="form-label"><span class="glyphicon glyphicon-user"></span> Last Name</label>
            <input type="text" class="form-control" id="reg_lname" name="reg_lname" required />
          </div>
					<div class="form-group">
						<label for="reg_zip" class="form-label"><span class="glyphicon glyphicon-map-marker"></span> Zip Code</label>
						<input type="text" class="form-control" id="reg_zip" name="reg_zip" required />
					</div>
          <div class="form-group">
            <label for="reg_email" class="form-label"><span class="glyphicon glyphicon-envelope"></span> Email</label>
            <input type="email" class="form-control" id="reg_email" name="reg_email"  required />
          </div>
					<div class="form-group">
						<label for="reg_password" class="form-label"><span class="glyphicon glyphicon-lock"></span> Password</label>
						<input type="password" class="form-control" id="reg_password" name="reg_password"  required />
					</div>
					<div class="form-group">
						<label for="reg_password_confirm" class="form-label"><span class="glyphicon glyphicon-lock"></span> Confirm Password</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" required />
					</div>
        <button id="goLeft" class="off" ng-disabled="form.$invalid">Login</button>
        <button id="signup" type="submit">Sign up</button>
				<?php echo form_close();?>

      </div>
    </div>
    <div class="rightpart">
      <div class="content">
        <h2>Login</h2>
				<?php $attributes = array("id" => "login-form", "class" => "text-left");
		                				echo form_open("user/login", $attributes);  ?>
		    <!-- Error Message -->
				  <div class="form-group">
						<label for="lg_email" class="form-label"><span class="glyphicon glyphicon-envelope"></span> Email Address</label>
						<input type="email" class="form-control" id="lg_email" name="lg_email"   required />
          </div>
					<div class="form-group">
						<label for="lg_password" class="form-label"><span class="glyphicon glyphicon-lock"></span> Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" required />
					</div>
          <button id="goRight" class="off" ng-disabled="form.$invalid">Sign Up</button>
          <button id="login" type="submit">Login</button>
					<?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->load->view('template/footer.php'); ?>
