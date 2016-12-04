<?php $this->load->view('template/header.php'); ?>

<div class="custom-body">
  <!--Business Info --->
  <div class="container">
    <div class="card" id="business-banner">
      <h2 class="card-title"><?php echo $name; ?></h2>

      <div class="card-block">
        <p class="card-text">
          <?php echo $address; ?><br>
          <?php echo $phone; ?><br>
      </p>
        <?php if($this->input->get("isAssoc") == 1){
                echo '<a href="javascript:void(0);" title="What is this?" data-toggle="popover" data-trigger="hover"
                  data-content="This business is associated with Cudos." class="pull-right">
                  <span class="fa fa-check-circle-o fa-2x"></span></a>';
              }
              else{
                echo '<a href="javascript:void(0);" title="What is this?" data-toggle="popover" data-trigger="hover"
                  data-content="This business is not associated with Cudos, but you still can leave an anonynmous review." class="pull-right">
                  <span class="fa fa-info-circle fa-2x"></span></a>';
              }
        ?>
      </p>
    </div>
    </div>
  </div>
  <?php echo $this->session->flashdata('review_msg');  ?>

      <div class="container">

        <div class="card" id="employee-card">
          <h2 class="card-title"><?php echo $name; ?> Employees</h2>

          <div class="card-block">

        <div class="col-md-3" id="employee-list">
          <div class="list-group">
            <form id="employee-select-form" action="" onsubmit="return false;">
            <?php
            $selected_name = "Anonymous";

            if(isset($employees)){
              for($i=0;$i<count($employees);$i++){
                if(isset($selected_employee)){
                  if($selected_employee == $employees[$i]->employee_id){
                    $selected_name = $employees[$i]->employee_name;
                    echo "<a href='javascript:void(0);' class='list-group-item active' data-eid='".$employees[$i]->employee_id."'>";
                    echo "<p class='list-group-item-text'>".$employees[$i]->employee_name."</p>";
                    echo "<p class='text-muted'>".$employees[$i]->title."</p></a>";
                  }else{
                    echo "<a href='javascript:void(0);' class='list-group-item' data-eid='".$employees[$i]->employee_id."'>";
                    echo "<p class='list-group-item-text'>".$employees[$i]->employee_name."</p>";
                    echo "<p class='text-muted'>".$employees[$i]->title."</p></a>";
                  }
                }else{
                  if($i==0){
                    $selected_name = $employees[$i]->employee_name;
                    echo "<a href='javascript:void(0);' class='list-group-item active' data-eid='".$employees[$i]->employee_id."'>";
                    echo "<p class='list-group-item-text'>".$employees[$i]->employee_name."</p>";
                    echo "<p class='text-muted'>".$employees[$i]->title."</p></a>";
                  }else{
                    echo "<a href='javascript:void(0);' class='list-group-item' data-eid='".$employees[$i]->employee_id."'>";
                    echo "<p class='list-group-item-text'>".$employees[$i]->employee_name."</p>";
                    echo "<p class='text-muted'>".$employees[$i]->title."</p></a>";
                  }
                }
              }
            }
            ?>
            <input type="hidden" name="selectedEmp" id="selectedEmp" />
          </form>
          </div>
        </div>
        <div class="col-md-9">

          <!--Card-->
        <div class="card" id="employee-profile">

            <!--Card content-->
            <div class="card-block">
              <div class="col-md-9" id="employee-about">
                <!--Title-->
                  <?php
                  if(isset($employees)){
                      for($i=0;$i<count($employees);$i++){
                        if(isset($selected_employee)){
                          if($selected_employee == $employees[$i]->employee_id){
                            echo "<h4 class='card-title'>".$employees[$i]->employee_name."</h4>";
                            echo "<p class='text-muted'>".$employees[$i]->title."</p><br>";
                            echo "<p class='card-text'>".$employees[$i]->about_me."</p></div>";
                            echo "<div class='col-md-3'>";
                            echo "<a><img src='".$employees[$i]->img_url."' class='img-responsive' alt='Employee Image' width='200' height='140'></a>";
                          }
                        }else{
                          if($i==0){
                            echo "<h4 class='card-title'>".$employees[$i]->employee_name."</h4>";
                            echo "<p class='text-muted'>".$employees[$i]->title."</p><br>";
                            echo "<p class='card-text'>".$employees[$i]->about_me."</p></div>";
                            echo "<div class='col-md-3'>";
                            echo "<a><img src='".$employees[$i]->img_url."' class='img-responsive' alt='Employee Image' width='200' height='140'></a>";
                          }
                        }
                      }
                    }
                    ?>
                    <br>
                    <button id="review-button" type="submit"  data-toggle="modal"  data-target="<?php if($this->session->userdata('login')) echo "#reviewModal"; else echo "#loginModal";?>"
                      class="btn btn-primary">Review Me</button>

            </div>
            </div>
            <!--/.Card content-->
        </div>
        <!--/.Card-->
</div>
</div>
        </div>
    </div>

  <!--Business's Employees Info --->
  <div class="container" id="reviews">

  <div class="card" id="reviews-card">
    <h2 class="card-title"><?php echo $selected_name; ?>'s Reviews</h2>

    <div class="card-block">

    <div class="row">
      <div class="col-sm-3 col-md-3 text-left">
          <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="fa fa-sort fa-lg">
                          </span> Sort By</a>
                        </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                     <div class="panel-body">
                         <table class="table">
                             <tr>
                               <td>
                                 <form>
                                 <div class="form-group">
                                   <select class="form-control">
                                     <option>Newest</option>
                                     <option>Oldest</option>
                                     <option>Highest Rated</option>
                                     <option>Lowest Rated</option>
                                     <option>Most Helpful</option>
                                     <option>Least Helpful</option>
                                   </select>
                                 </div>
                                 </form>
                               </td>
                             </tr>
                         </table>
                     </div>
                 </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="fa fa-filter fa-lg">
                          </span> Filter</a>
                      </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                     <div class="panel-body">
                         <table class="table">
                           <form class="form-inline">
                         <tr>
                           <td>
                               <a href="javascript:void(0);">
                                 <i class="fa fa-star"></i>
                               </a>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               <a href="javascript:void(0);">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                               </a>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               <a href="javascript:void(0);">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                               </a>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               <a href="javascript:void(0);">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                               </a>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               <a href="javascript:void(0);">
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                                 <i class="fa fa-star"></i>
                               </a>
                             </td>
                         </tr>
                         </form>
                         </table>
                     </div>
                 </div>
              </div>
          </div>
      </div>
      <!--- Reviews Display --->
  		<div class="col-sm-9 text-left card" id="reviews-display">
  				<div class="col-sm-12" id="reviews-here">
  		    </div>
      </div> <!--End Reviews Display --->
    </div>
  </div>
    </div>
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
            <textarea class="form-control" row="5" name="review"> </textarea>
          </div>
        </div>
        <div class="modal-footer">
          <label for="hidden-stars" id="rating-label" class="text-center pull-left">Rating:</label><br>
          <div id="hidden-stars" class="stars starrr pull-left" data-rating="1"></div>
          <input id="ratings-hidden" name="stars" type="hidden" required>
          <button type="submit" class="btn btn-primary"> Review </button>
        </form>
        </div>
      </div>
<script>
var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

var ratingsField = $('#ratings-hidden');

$('.starrr').on('starrr:change', function(e, value){
  ratingsField.val(value);
});
</script>
    </div>
  </div>

  <!-- Modal -->
  <div id="loginModal" class="modal" role="dialog">
    <div class="modal-dialog sm">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Review Form for <?php echo $selected_name; ?> </h4>
        </div>

        <div class="modal-body">
          <h3> You are not logged in.</h3>
          <p>To log in or sign up, <a href="http://localhost/Cudos/user/login/"> click here. </a> </p>
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
          <label for="hidden-stars"  id="rating-label"  class="text-center pull-left">Rating:</label><br>
          <div name="hidden-stars" class="stars starrr pull-left" data-rating="1"></div>
          <input id="ratings-hidden" name="stars" type="hidden">
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

    $('.fa-thumbs-up').click(function(e){
      if(loggedIn){
        vote_review(1, $(this).data('review-id'));
      }
      else{
        $('#loginModal').modal();
      }
    });
    $('.fa-thumbs-down').click(function(e){
      if(loggedIn){
        vote_review(0, $(this).data('review-id'));
      }
      else{
        $('#loginModal').modal();
      }
    });
});

$('.list-group-item').click(function(e){
  $('.list-group-item').removeClass("active");
  $(this).addClass("active");
});

function init(){
  var employees = <?php echo json_encode($employees); ?>;
  var reviews = <?php echo json_encode($reviews); ?>;
  var employeeNum = <?php echo json_encode($selected_employee); ?>;

  if(employees.length>0){
    if(employeeNum){

        reviews.forEach(function(review){
        if(review['employee_id'] === employeeNum){
          $("#reviews-here").empty();
          displayReviews(review['customer_id'], review['customer_name'], review['city'], review['state'], review['stars'],
        review['description'], review['ThumbsUp'], review['ThumbsDown'], review['timestamp'], review['review_id']);
        }
      });
    }else{
      reviews.forEach(function(review){
        if(employees[0]['employee_id']===review['employee_id']){
          displayReviews(review['customer_id'], review['customer_name'], review['city'], review['state'], review['stars'],
        review['description'], review['ThumbsUp'], review['ThumbsDown'], review['timestamp'], review['review_id']);
        }
      });
    }
  }
}

function displayReviews(cID, name, city, state, stars, description, thumbsup, thumbsdown, timestamp, reviewId){
  var reviewDateTime = new Date(Date.parse(timestamp));
  var currentID = <?php if($this->session->userdata('login')) echo $this->session->userdata('customer_id'); else echo 0; ?>;
  if(cID == currentID){
    $("#reviews-here").append("<div class='col-sm-3 card'>"  + 'Me' +"</div>");
    $("#reviews-here").append("<div class='col-sm-9 card'><div class='ratystars"+currentID+"'></div>"
    + "<p>" + description
    + "</p><button class='btn btn-default' data-toggle='modal'  data-target='#editModal'>" + 'Edit' + '</button>' +
    "<span class='pull-right text-muted'>" + reviewDateTime.toDateString() + "</span></div>");
    $('#edit-stars').val(stars);
    $('#edit-text').val(description);
  }else{
    $("#reviews-here").append("<div class='col-sm-3 card'><a href='<?php echo base_url('index.php/user/profile/') ?>"  + cID + "'>" + name +"</a><br>"+ city +", " + state+"</div>");
    $("#reviews-here").append("<div class='col-sm-9 card'><p><div class='ratystars"+cID+"'></div><label class='pull-right'>" + reviewDateTime.toDateString() + "</label></p>"
    + "<p>" + description
    + "</p><p class='pull-left'><label>Helpful?&nbsp;<label><a role='button' aria-hidden='true' class='fa fa-thumbs-up fa-lg' data-review-id='" + reviewId + "'></a>" + thumbsup
    + "&nbsp;&nbsp;<a aria-hidden='true' role='button' class='fa fa-thumbs-down fa-lg' data-review-id='" + reviewId + "'></a>" + thumbsdown + "</p>" +
    "</div>");
  }
  $('.ratystars'+cID).raty({ readOnly: true, score: stars });

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

$('.list-group-item').click(function(e){
  var url = window.location.href;
  var regx =  new RegExp(/selectedEmp=[0-9]+/);
  if(regx.test(url)){
    var newUrl = url.replace(/selectedEmp=[0-9]+/, "selectedEmp="+$(this).attr("data-eid"));
    window.location.href = newUrl;
  }else{
    var newUrl = url+"&selectedEmp="+$(this).attr("data-eid");
    window.location.href = newUrl;
  }
});
</script>
