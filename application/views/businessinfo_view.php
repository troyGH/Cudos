<?php $this->load->view('template/header.php'); ?>

<!--Business Info --->
<div class="col-md-12">
    <h1 align=center><?php echo $name ?></h1>
    <p align="center">
      <?php echo $phone; ?>
      <br>
      <?php echo $address; ?>
    </p>
</div>

<!--Business's Employees Info --->
<div class="container text-center">
	  <div class="row">

      <!--Employee List --->
      <div class="col-sm-2 well">
        <h3>Employees</h3>
        <hr>
        <div class="well" id="employee-list">
        </div>
      </div> <!--End Employee List --->

      <!-- Employee Profile --->
		<div class="col-sm-3 well">
		  <div class="well">
			<h2 id="employee-name">First Last</h2>
			<hr>
			<img src="<?php echo base_url(); ?>/assets/img/employee_default.jpg" class="img-circle" height="100" width="100" alt="Avatar">
		  </div>
		  <div class="well text-left">
			<h2 class="text-center">Employee Bio</h2>
			<hr>
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
      Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
		  </div>
		</div> <!--End Employee Profile --->


    <!--- Reviews Display --->
		<div class="col-sm-7">
		  <div class="row">
			<div class="col-sm-12">
			  <div class="panel panel-default text-left">
				<div class="panel-body id" id="comments">
				  <h3 class="text-center">Reviews</h3>
				  <hr>
		    </div>

      <div class="form-group">
        <input id="review" name="review" type="submit" value="Review" class="btn btn-primary pull-right" data-toggle="modal"
        data-target="<?php if($this->session->userdata('login')) echo "#reviewModal"; else echo "#loginModal";?>">
      </div>


      </div>
		</div>
		</div>
  </div> <!--End Reviews Display --->

  </div> <!--End row --->
</div> <!--End container --->

<!-- Modal -->
<div id="reviewModal" class="modal" role="dialog">
  <div class="modal-dialog lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Review Form for [Selected Employee]</h4>
      </div>

      <div class="modal-body">
        <textarea class="form-control" rows="4" name="message"></textarea>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary sm pull-left">1</button>
        <button type="button" class="btn btn-primary sm pull-left">2</button>
        <button type="button" class="btn btn-primary sm pull-left">3</button>
        <button type="button" class="btn btn-primary sm pull-left">4</button>
        <button type="button" class="btn btn-primary sm pull-left">5</button>
        <button type="button" class="btn btn-primary">Review</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="loginModal" class="modal" role="dialog">
  <div class="modal-dialog sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Review Form for [Selected Employee]</h4>
      </div>

      <div class="modal-body">
        <h3> You are not logged in.</h3>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url(); ?>index.php/user/login'">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view('template/footer.php'); ?>
