<?php $this->load->view('template/header.php'); ?>

<div class="custom-body">
  <!--Business Info --->
  <div class="col-md-12 well business-banner">
      <h1 > <?php if($this->input->get("isAssoc") == 0) echo $name; else echo $name.'<span class="glyphicon glyphicon-ok"></span>'; ?></h1>
        <p><?php echo $phone; ?><br>
        <?php echo $address; ?>
      </p>
  </div>

      <?php if($this->session->flashdata('review_success'))
              echo $this->session->flashdata('review_msg');
            else
              echo $this->session->flashdata('review_msg');
      ?>
      <div class="panel panel-primary">
        <div class="panel-body">
          <?php if($this->input->get("isAssoc") == 1){
                    echo "This business is associated with Cudos.";
                }
                else{
                  echo "This business is not associated with Cudos, but you still can review anonymously.";
                }
          ?>
        </div>
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
                  echo "<th><a>Anonymous</a></th><tr>";
              }else{
                if(sizeof($employees)==0){
                      echo '<tr>';
                      echo "<th><a >Anonymous</a></th><tr>";
                }
               }
               for ($i = 0; $i < sizeof($employees); $i++) {
                 if($i == 0){
                   echo "<tr class='bg-primary'>";
                   echo "<th><a id='employee-list' data-val='$i'>".$employees[$i]->first_name.' '.$employees[$i]->last_name."</a></th><tr>";
                 }
                 else{
                   echo "<tr class='bg-primary'>";
                   echo "<th><a id='employee-list' data-val='$i'>".$employees[$i]->first_name.' '.$employees[$i]->last_name."</a></th><tr>";
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
  			<img id="employee-picture" src="<?php echo base_url(); ?>/assets/img/employee_default.jpg" class="img-circle" height="100" width="100" alt="Avatar">
        <h5 id="employee-avg-stars">
        </h5>
          <div class="form-group">
            <button id="review-button" type="submit"  data-toggle="modal"  data-target="<?php if($this->session->userdata('login')) echo "#reviewModal"; else echo "#loginModal";?>"
              class="btn btn-primary">Review Me</button>
          </div>
        </div>
  		  <div class="well text-left" id="employee-bio-container">
  			<h1 class="text-center" id="employee-bio-h1">Employee Bio</h1>
        <p id="employee-bio" class="text-center"><p>
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
          <input type="hidden" name="isAssoc" value="<?php echo $this->input->get('isAssoc'); ?>">
          <input type="hidden" id="eid-input" name="eID" value="0">

        <div class="modal-body">
          <div class="form-group">
            <label for="review">Review:</label>
            <textarea class="form-control" row="5" name="review" required> </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <select class="pull-left" name="stars" required>
            <option value="">Select Stars</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <button type="submit" class="btn btn-primary"> Review </button>
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
          <h4 class="modal-title">Review Form for </h4>
        </div>

        <div class="modal-body">
          <h3> You are not logged in.</h3>
          <p>Already have an account? <a href="http://localhost/Cudos/user/login/">Login  Here </a>. Otherwise, <a href="http://localhost/Cudos/user/signup/"> Signup Here </a>. </p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div id="editModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title" id="form-title"></h3>
        </div>

        <form onsubmit="edit_form_client(this);" id="modal-form">

          <input type="hidden" name="bID" value="<?php echo $id; ?>">
          <input type="hidden" name="bName" value="<?php echo $name; ?>">
          <input type="hidden" name="bAddress" value="<?php echo $address; ?>">
          <input type="hidden" name="bPhone" value="<?php echo $phone; ?>">
          <input type="hidden" name="isAssoc" value="<?php echo $this->input->get('isAssoc'); ?>">
          <input type="hidden" id="eid-input2" name="edit-eID" value="0">

        <div class="modal-body">
          <div class="form-group">
            <label for="review">Review:</label>
            <textarea class="form-control" row="5" name="edit-review" id="edit-text" required> </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <label for="edit-stars" class="pull-left">Stars:</label>
          <select class="pull-left" name="edit-stars" id="edit-stars">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
            <?php $attributes = array('class' => 'btn btn-primary', 'name' => 'review-btn');
            echo form_submit( $attributes, 'Submit'); ?>
        </form>
        </div>
      </div>

    </div>
  </div>

</div>
<?php $this->load->view('template/footer.php'); ?>

<script>
var loggedIn = false;
$( document ).ready(function() {
  init();
  loggedIn = <?php echo json_encode($this->session->userdata('login')); ?>;
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
      review['description'], review['ThumbsUp'], review['ThumbsDown'], review['timestamp'], review['review_id']);
      }
    });

    displayEmployeeProfile(employee[0]['first_name'], employee[0]['last_name'],
    employee[0]['title'], employee[0]['img_url'],
    employee[0]['about_me'], total/count);

    $("#eid-input").val(employee[0]['employee_id']);
    $("#eid-input2").val(employee[0]['employee_id']);

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
  $("#eid-input2").val(employee[employeeNum]['employee_id']);

  $("#reviews-here").empty();
  reviews.forEach(function(review){
    if(employee[employeeNum]['employee_id']===review['employee_id']){
      total += parseInt(review['stars']);
      count++;
      displayReviews(review['customer_id'], review['first_name'], review['last_name'], review['stars'],
    review['description'], review['ThumbsUp'], review['ThumbsDown'], review['timestamp'], review['review_id']);
    }
  });
  displayEmployeeProfile(employee[employeeNum]['first_name'], employee[employeeNum]['last_name'],
  employee[employeeNum]['title'], employee[employeeNum]['img_url'],
  employee[employeeNum]['about_me'], total/count);

  $('.thumbsup').click(function(e){
    if(loggedIn){
      vote_review(1, $(this).data('review-id'));
    }
    else{
      $('#loginModal').modal();
    }
  });
  $('.thumbsdown').click(function(e){
    if(loggedIn){
      vote_review(0, $(this).data('review-id'));
    }
    else{
      $('#loginModal').modal();
    }
  });
});

function displayEmployeeProfile(first, last, title, url, bio, avg){
  $("#employee-name").text(first+' '+last);
  $("#employee-title").text(title);
  $("#employee-picture").attr("src", url);
  $("#employee-bio").text(bio);

  if(isNaN(avg))
    avg=0;

  $("#employee-avg-stars").text("Average Stars: "+avg.toPrecision(2)+"/5.0");
}

function displayReviews(cID, first, last, stars, description, thumbsup, thumbsdown, timestamp, reviewId){
  var reviewDateTime = new Date(Date.parse(timestamp));
  var currentID = <?php if($this->session->userdata('login')) echo $this->session->userdata('customer_id'); else echo 0; ?>;
  if(cID == currentID){
    $("#reviews-here").append("<div class='col-sm-5 well well-sm'>"  + 'Me' +"</div>");
    $("#reviews-here").append("<div class='col-sm-7 well well-lg'><span class='ion-star'>" + stars
    + "</span><p>" + description
    + "</p><button class='btn btn-default' data-toggle='modal'  data-target='#editModal'>" + 'Edit' + '</button>' +
    "<span class='pull-right text-muted'>" + reviewDateTime.toDateString() + "</span></div>");
    $('#edit-stars').val(stars);
    $('#edit-text').val(description);
  }else{
    $("#reviews-here").append("<div class='col-sm-5 well well-sm'><a href='<?php echo base_url('index.php/user/profile/') ?>"  + cID + "'>" +first+' '+last +"</a></div>");
    $("#reviews-here").append("<div class='col-sm-7 well well-lg'><span class='ion-star'>" + stars
    + "</span><p>" + description
    + "</p><a role='button' class='ion-thumbsup thumbsup' data-review-id='" + reviewId + "'>" + thumbsup
    + "</a>&nbsp;&nbsp;<a class='ion-thumbsdown thumbsdown' data-review-id='" + reviewId + "'>" + thumbsdown + "</a>" +
    "<span class='pull-right text-muted'>" + reviewDateTime.toDateString() + "</span></div>");
  }
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

function edit_form_client(obj) {
    $.ajax({
       type: 'POST',
       url: "http://localhost/Cudos/employee/edit_review",
       data:  $(obj).serialize(),
     });
     return true;
}
// 0 is thumbsdown
// 1 is thumbsup
function vote_review(thumbs, reviewId){
  $.ajax({
     type: 'POST',
     url: "http://localhost/Cudos/employee/vote_review",
     data:  {vote:thumbs, review_id: reviewId},
     success: function(data){
         window.location.reload();
     }
   });
}
</script>
