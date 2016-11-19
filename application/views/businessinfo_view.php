<?php $this->load->view('template/header.php'); ?>

<div class="custom-body">

    <?php if($this->session->flashdata('review_success'))
            echo $this->session->flashdata('review_msg');
          else
            echo $this->session->flashdata('review_msg');
    ?>

  <!--Business Info --->
  <div class="col-md-12 well business-banner">
      <h1 ><?php echo $name ?></h1>
      <p align="center">
        <?php echo $phone; ?>
        <br>
        <?php echo $address; ?>
      </p>
  </div>

  <!--Business's Employees Info --->
  <div class="container text-center well">

        <!--Employee List --->
        <div class="col-sm-2 well" id="well-config">
          <h1>Employees</h1>
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
  			<h1 id="employee-name"></h1>
        <h4 id="employee-title"><h4>
  			<hr>
  			<img id="employee-picture" src="<?php echo base_url(); ?>/assets/img/employee_default.jpg" class="img-circle" height="100" width="100" alt="Avatar">
        <h5 id="employee-avg-stars">
        </h5>
          <div class="form-group">
            <button id="review-button" type="submit"  data-toggle="modal"  data-target="<?php if($this->session->userdata('login')) echo "#reviewModal"; else echo "#loginModal";?>"
              class="button button--ujarak button--border-thick button--text-thick">Review Me</button>
          </div>
        </div>
  		  <div class="well text-left" id="employee-bio-container">
  			<h1 class="text-center" id="employee-bio-h1">Employee Bio</h1>
  			<hr>
        <p id="employee-bio"><p>
  		  </div>
  		</div> <!--End Employee Profile --->

      <!--- Reviews Display --->
  		<div class="col-sm-7 well text-left" id="reviews-display">
  			<div class="col-sm-12">
    				  <h1 class="text-center">Reviews</h1>
  				<div class="col-sm-12" id="reviews-here">
  		    </div>
  		</div>
      </div> <!--End Reviews Display --->

  </div> <!--End container --->

  <!-- Modal -->
  <div id="reviewModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" id="form-title"></h3>
        </div>

        <form onsubmit="review_form_client(this);" id="modal-form">

          <input type="hidden" name="bID" value="<?php echo $id; ?>">
          <input type="hidden" name="bName" value="<?php echo $name; ?>">
          <input type="hidden" name="bAddress" value="<?php echo $address; ?>">
          <input type="hidden" name="bPhone" value="<?php echo $phone; ?>">
          <input type="hidden" id="eid-input" name="eID" value="0">

        <div class="modal-body">
          <div class="form-group">
            <label for="review">Review:</label>
            <textarea class="form-control" row="5" name="review"> </textarea>
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
            <?php $attributes = array('class' => 'btn btn-primary', 'name' => 'review-btn');
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
      review['description'], review['thumbsup'], review['thumbsdown'], review['timestamp']);
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
  $('.alert').hide();

  $("#eid-input").val(employee[employeeNum]['employee_id']);

  $("#reviews-here").empty();
  reviews.forEach(function(review){
    if(employee[employeeNum]['employee_id']===review['employee_id']){
      total += parseInt(review['stars']);
      count++;
      displayReviews(review['customer_id'], review['first_name'], review['last_name'], review['stars'],
    review['description'], review['thumbsup'], review['thumbsdown'], review['timestamp']);
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

function displayReviews(cID, first, last, stars, description, thumbsup, thumbsdown, timestamp){
  var reviewDateTime = new Date(Date.parse(timestamp));
  var currentID = <?php if($this->session->userdata('login')) echo $this->session->userdata('customer_id'); else echo 0; ?>;

  if(cID == currentID){
    $("#reviews-here").append("<div class='col-sm-5 well well-sm'>"  + 'Me' +"</div>");
  }else{
    $("#reviews-here").append("<div class='col-sm-5 well well-sm'><a href='<?php echo base_url('index.php/user/profile/') ?>"  + cID + "'>" +first+' '+last +"</a></div>");
  }
  $("#reviews-here").append("<div class='col-sm-7 well well-lg'><span class='ion-star'>" + stars
  + "</span><p>" + description
  + "</p><button class='ion-thumbsup'>" + thumbsup
  + "</button><button class='ion-thumbsdown'>" + thumbsdown + "</button>" +
  "<span class='pull-right text-muted'>" + reviewDateTime.toDateString() + "</span></div>");
}

function removeEmployeeProfile(){
  $("#employee-name").text("Anonymous");
   $("#employee-bio-container").remove();

}


function review_form_client(obj) {
    $.ajax({
       type: 'POST',
       url: "http://localhost/Cudos/employee/review",
       data:  $(obj).serialize(),
     });
     return true;
}

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 3000);

</script>
