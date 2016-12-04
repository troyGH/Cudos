<?php $this->load->view('template/header.php'); ?>


<!-- Body -->
<div class="container custom-body">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<a href="javascript:void(0);" title="What is this?" data-toggle="popover" data-trigger="hover"
				data-content="This is only for businesses' representatives. If you are a customer interesting in reviewing employees, click 'Log In' in the navigation bar." class="pull-right">
				<span class="glyphicon glyphicon-info-sign"></span></a>
		<?php $attributes = array("name" => "loginform");
			echo form_open("admin/login", $attributes);?>
			<h3>Login</h3>
			<p class="text-center">For Businesses only</p>

			<?php echo $this->session->flashdata('admin_err'); ?>

			<div class="form-group  text-left">
				<label for="name"><span class="glyphicon glyphicon-envelope"></span> Email</label>
				<input id = 'email' class="form-control" name="admin_email"  type="text"  required/>
			</div>
			<div class="form-group  text-left">
				<label for="name"><span class="glyphicon glyphicon-lock"></span> Password</label>
				<input id = 'password' class="form-control" name="admin_password" type="password"  required/>
			</div>
			<div class="form-group">
				<button id = 'bSubmit' name="submit" type="submit" class="btn btn-primary">Login</button>
				<button id = 'bReset' name="cancel" type="reset" class="btn btn-default">Clear</button>
			</div>
		<?php echo form_close(); ?>
		<p class="text-center text-muted">
		Interested in signing up with Cudos? <br><a href="<?php echo base_url(); ?>/admin/signup">Contact Us</a> or
		<a href="<?php echo base_url(); ?>/associatedbusiness">Learn More</a>
	</p>
</div>
	</div>
</div>
<!-- End Body -->
<?php $this->load->view('template/footer.php'); ?>
