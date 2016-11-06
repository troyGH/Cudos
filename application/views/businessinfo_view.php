<?php $this->load->view('template/header.php'); ?>

<div class="custom-body">
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
        <div class="col-sm-2 well" id="well-config">
          <h3>Employees</h3>
          <hr>
          <div class="table-responsive">
            <table class="table table-hover" id="myTable">
              <tbody>
              <?php

              if(!isset($employees)){
                  echo '<tr>';
                  echo "<th><a href='#'>Anonymous</a></th><tr>";
              }else{
                if(sizeof($employees)==0){
                      echo '<tr>';
                      echo "<th><a href='#'>Anonymous</a></th><tr>";
                }
               }
               for ($i = 0; $i < sizeof($employees); $i++) {
                 if($i == 0){
                   echo "<tr class='bg-primary'>";
                   echo "<th><a href='#' id='employee-list' data-val='$i'>".$employees[$i]->first_name.' '.$employees[$i]->last_name."</a></th><tr>";
                 }
                 else{
                   echo "<tr class='bg-primary'>";
                   echo "<th><a href='#' id='employee-list' data-val='$i'>".$employees[$i]->first_name.' '.$employees[$i]->last_name."</a></th><tr>";
                 }
               }
               ?>
             </tbody>
            </table>
          </div>
        </div> <!--End Employee List --->

        <!-- Employee Profile --->
  		<div class="col-sm-3 well" id="employee-profile">
  		  <div class="well">
  			<h3 id="employee-name"></h3>
        <h4 id="employee-title"><h4>
  			<hr>
  			<img id="employee-picture" src="<?php echo base_url(); ?>/assets/img/employee_default.jpg" class="img-circle" height="100" width="100" alt="Avatar">
        <h5 id="employee-avg-stars"><h5>
        </div>
  		  <div class="well text-left">
  			<h3 class="text-center">Employee Bio</h3>
  			<hr>
        <p id="employee-bio"><p>
  		  </div>
  		</div> <!--End Employee Profile --->


      <!--- Reviews Display --->
  		<div class="col-sm-7 well text-left" id="reviews-display">
  			<div class="col-sm-12">
    				  <h3 class="text-center">Reviews</h3>
              <hr />
  				<div class="col-sm-12" id="reviews-here">
  		    </div>
        <div class="form-group">
          <button id="review" type="submit"  data-toggle="modal"  data-target="<?php if($this->session->userdata('login')) echo "#reviewModal"; else echo "#loginModal";?>"
            class="button button--ujarak button--border-thick button--text-thick">Review</button>
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
          <h3 class="modal-title" id="form-title"></h3>
        </div>

        <form onsubmit="review_form_client(this);" id="modal-form">

          <input type="hidden" id="eid-input" name="eID" value="0">
        <div class="modal-body">
          <div class="form-group">
            <label for="review">Review:</label>
            <textarea class="form-control" row="5" name="review"> Be nice...</textarea>
          </div>
        </div>
        <div class="modal-footer">
          <select class="pull-left" name="stars">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <button type="submit" class="btn btn-primary">Review</button>
          <?php $attributes = array('class' => 'button', 'name' => 'review-btn');
          echo form_submit( $attributes, 'Review'); ?>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
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

</div>
<?php $this->load->view('template/footer.php'); ?>

<script>
$( document ).ready(function() {
  init();
});

function init(){
  var employee = <?php echo json_encode($employees); ?>;
  var reviews = <?php echo json_encode($reviews); ?>;
  var total = 0;
  var count = 0;

  if(employee.length>0){

    reviews.forEach(function(review){
      if(employee[0]['employee_id']===review['employee_id']){
        total += parseInt(review['stars']);
        count++;
        displayReviews(review['customer_id'], review['first_name'], review['last_name'], review['stars'],
      review['description'], review['thumbsup'], review['thumbsdown']);
      }
    });

    displayEmployeeProfile(employee[0]['first_name'], employee[0]['last_name'],
    employee[0]['title'], employee[0]['img_url'],
    employee[0]['about_me'], total/count);

    $("#eid-input").val(employee[0]['employee_id']);
  }
  else{
    removeEmployeeProfile();
  }
}

$("a#employee-list").click(function(e){
  var employee = <?php echo json_encode($employees); ?>;
  var reviews = <?php echo json_encode($reviews); ?>;
  var employeeNum = $(this).data('val');
  var total = 0;
  var count = 0;

  $("#eid-input").val(employee[employeeNum]['employee_id']);

  $("#reviews-here").empty();
  reviews.forEach(function(review){
    if(employee[employeeNum]['employee_id']===review['employee_id']){
      total += parseInt(review['stars']);
      count++;
      displayReviews(review['customer_id'], review['first_name'], review['last_name'], review['stars'],
    review['description'], review['thumbsup'], review['thumbsdown']);
    }
  });
  displayEmployeeProfile(employee[employeeNum]['first_name'], employee[employeeNum]['last_name'],
  employee[employeeNum]['title'], employee[employeeNum]['img_url'],
  employee[employeeNum]['about_me'], total/count);

});

function displayEmployeeProfile(first, last, title, url, bio, avg){
  $("#employee-name").text(first+' '+last);
  $("#employee-title").text(title);
  $("#employee-picture").attr("src", url);
  $("#employee-bio").text(bio);

  if(isNaN(avg))
    avg=0;

  $("#employee-avg-stars").text("Average Stars: "+avg+"/5");
}

function displayReviews(cID, first, last, stars, description, thumbsup, thumbsdown){
  $("#reviews-here").append("<div class='col-sm-5 well well-sm'><a href='<?php echo base_url('index.php/user/profile/') ?>"  + cID + "'>" +first+' '+last +"</a></div>");
  $("#reviews-here").append("<div class='col-sm-7 well well-lg'><span class='ion-star'>" + stars+ "</span><p>" + description + "</p><button class='ion-thumbsup'>" + thumbsup+ "</button><button class='ion-thumbsdown'>" + thumbsdown+ "</button></div>");
}

function removeEmployeeProfile(){
  $("#employee-profile").hide();
  $("#reviews-display").toggleClass('col-sm-7 col-sm-10');
}


function review_form_client(obj) {
    $.ajax({
       type: 'POST',
       url: "http://localhost/Cudos/index.php/employee/review",
       data: $(obj).serialize(),
     });
     return false;
}
</script>
