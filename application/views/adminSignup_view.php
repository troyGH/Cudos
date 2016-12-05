<?php $this->load->view('template/header.php'); ?>


<!-- Body -->
<div class="container custom-body">
	<?php echo $this->session->flashdata('admin_email_msg'); ?>
	<section>
	    <div class="container well">
	        <div class="row">
	            <div class="col-lg-8 col-lg-offset-2 text-center">
	                <h3 class="margin-top-0 wow fadeIn">Associate with Cudos</h3>
	                <hr class="primary">
	                <p>Sign with us to have full access to your employee profiles, customer reviews, etc.</p>
	            </div>
	            <div class="col-lg-10 col-lg-offset-1 text-center">
										<?php $attributes = array("id" => "admin-signup-form", "class" => "contact-form row", "method" => "POST");
																				echo form_open("admin/signup", $attributes);  ?>
	                    <div class="col-md-3">
	                        <label></label>
	                        <input type="text" class="form-control" name="name" placeholder="Name" required />
	                    </div>
	                    <div class="col-md-3">
	                        <label></label>
	                        <input type="text" class="form-control" name="email"  placeholder="Email" required />
	                    </div>
	                    <div class="col-md-3">
	                        <label></label>
	                        <input type="text" class="form-control" name="phone"  placeholder="Phone" required />
	                    </div>
											<div class="col-md-3">
													<label></label>
													<input type="text" class="form-control" name="business" placeholder="Business Name" required />
											</div>
	                    <div class="col-md-12">
	                        <label></label>
	                        <textarea class="form-control" rows="9" name="message" placeholder="Your message here.." required /></textarea>
	                    </div>
	                    <div class="col-md-4 col-md-offset-4">
	                        <label></label>
	                        <button type="submit" class="btn btn-primary btn-block btn-lg wow flipInX">Submit <i class="ion-android-arrow-forward"></i></button>
	                    </div>
											<?php echo form_close();?>
	            </div>
	        </div>
	    </div>
	</section>
</div>
<!-- End Body -->
<?php $this->load->view('template/footer.php'); ?>
