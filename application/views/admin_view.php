<style type="text/css">

body.Admin-body{
  background-color: rgb(220,220,220);
}
@media screen and (min-width: 980px) {
  .container.admin {
    padding:100px;
  }
}


</style>


<script>
function openEvent(evt, adminTask) {
    var i, tabcontent,tabcontentbusiness, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
        tabcontentbusiness = document.getElementsByClassName("tabcontentbusiness");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
        for (i = 0; i < tabcontentbusiness.length; i++) {
        tabcontentbusiness[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(adminTask).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>



<?php $this->load->view('template/admin_header.php'); ?>



<nav id="topNav" class="navbar navbar-default navbar-fixed-top hidden-sm hidden-md hidden-lg hidden-xlg" style="width:90px; height:100%; background-color: #262C3A;">


   <div class="container-fluid">
   <div class="sidebar-offcanvas" id="sidebar" role="navigation">

            <ul class="nav">
            <li class="tablinks" align=center><span class="admin-item"><b style="color: transparent;">ADMIN</b></span></li>
            <hr>
             <!-- <li class="tablinks active"><a href="javascript:void(0)" onclick="openEvent(event, 'business_info')"><span class="glyphicon glyphicon-home"> <?php echo $this->session->userdata('business_name');
 ?></span></a></li>-->
 <li><a class="tablinks active" href="javascript:void(0)" onclick="openEvent(event, 'business_info')"><span class="glyphicon glyphicon-home"></span></a></li>

              <li><a href="javascript:void(0)" class="tablinks" onclick="openEvent(event, 'employees')"><span class="glyphicon glyphicon-user"></span></a></li>
              <li><a href="javascript:void(0)" class="tablinks" onclick="openEvent(event, 'business_review')"><span class="glyphicon glyphicon-briefcase"></span></a></li>
              <li><a href="<?php echo base_url(); ?>index.php/admin/logout""><span class="glyphicon glyphicon-lock"></span></a></li>
            </ul>
        </div>
        </div>

</nav>
<nav id="topNav" class="navbar navbar-default navbar-fixed-top hidden-xs" style="width:200px; height:100%; background-color: #262C3A;">

   <div class="container-fluid">


   <div class="sidebar-offcanvas" id="sidebar" role="navigation">

            <ul class="nav">
            <li class="tablinks" align=center><span class="admin-item"><b>ADMIN</b></span></li>
            <hr>
             <!-- <li class="tablinks active"><a href="javascript:void(0)" onclick="openEvent(event, 'business_info')"><span class="glyphicon glyphicon-home"> <?php echo $this->session->userdata('business_name');
 ?></span></a></li>-->
 <li><a class="tablinks active" href="javascript:void(0)" onclick="openEvent(event, 'business_info')"><span class="glyphicon glyphicon-home"></span><span class="admin-item"> Dashboard</span></a></li>

              <li><a href="javascript:void(0)" class="tablinks" onclick="openEvent(event, 'employees')"><span class="glyphicon glyphicon-user"></span><span class="admin-item"> Employees</span></a></li>
              <li><a href="javascript:void(0)" class="tablinks" onclick="openEvent(event, 'business_review')"><span class="glyphicon glyphicon-briefcase"></span><span class="admin-item"> Reviews</span></a></li>
              <li><a href="<?php echo base_url(); ?>index.php/admin/logout""><span class="glyphicon glyphicon-lock"></span><span class="admin-item"> Sign Out</span></a></li>
            </ul>
        </div>


   </div>
</nav>
<?php echo $this->session->flashdata('employee_delete_msg');?>





<?php
//Find which page is currently on, then make it active on navbar
function isActive($arg) {
  //$ci is used instead of $this because of "Using $this when not in object context" error
  $ci =& get_instance();
  if($arg === $ci->uri->segment(1))
    return true;
  else if($arg===$ci->uri->segment(1).'/'.$ci->uri->segment(2))
       return true;


  return false;
}
?>


<div class="container admin">
<div class="col-md-2"></div>
<div class="col-md-9 tabcontentbusiness active wow zoomIn" align=center id="business_info">
<div class="col-md-12 business-header">
<h2> <?php echo $this->session->userdata('business_name');?></h2>
</div>
<div class="col-md-12 businessinfo">
<?php

echo "<p>".$this->session->userdata('business_address')."</p>";
echo "<p>".$this->session->userdata('business_phone')."</p>";
echo "<p><a href='http://localhost/Cudos/business/display?bID=".$this->session->userdata('google_id')."&bName=".$this->session->userdata('business_name')."&bAddress=".$this->session->userdata('business_address')."&bPhone=".$this->session->userdata('business_phone')."&isAssoc=1"."'></a></p>";

?>
</div>
</div>


<div class="tabcontent wow zoomIn" id="employees">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="col-md-12 business-employee">
<h3 style="color:white">Employees</h3>
</div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>About Employee</th>
        <th>Title</th>

      </tr>
    </thead>
    <tbody>

      <?php
 echo '<tr>';
      foreach($employees as $employee) {
        echo '<td>',$employee->first_name,'</td>';
        echo '<td>',$employee->last_name,'</td>';
        echo '<td>',$employee->about_me,'</td>';
        echo '<td>',$employee->title,'</td>';
        echo '<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top:0px; background-color:#262C3A">Edit Employee</button></td>';
        echo '<td><a class="deleteEmp" data-toggle="modal" data-target="#deleteModal" data-eid="'.$employee->employee_id.'" id="close">&#10006;</a></td>';
        echo '</tr><tr>';
      }
      echo '</tr>';
      ?>
    </tbody>
  </table>
<br>
     <div class="bd-example">
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Employee</button>

</div>
</div>

<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document" aria-hidden="true">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <p class="modal-title">Are you sure you want to delete this employee? All his or her reviews will also be deleted.</p>
      </div>
      <div class="modal-body">
        <?php $attributes = array("id" => "deleteForm", "method" => "POST");
                            echo form_open("admin/deleteemployee", $attributes);  ?>
            <input type="hidden" name="deleteEid" id="deleteEid" />
        <div class="form-group">
          <button type="submit" class="btn btn-danger">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>

  </div>
</div>
<script>
$(".deleteEmp").click(function(){
  $("#deleteEid").val($(this).attr("data-eid"));
});
</script>

  <!--
<?php
echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';

      echo '<tr>';
      foreach($employees as $employee) {
        echo '<td>',$employee->first_name,'</td>';
      }
      echo '</tr>';

    echo '</table><br />';
    ?>
<ul class="employee-list" id="scroller">
     <?php
        foreach($employees as $employee){?>
          <li><?php echo "<h2>".$employee->first_name."</h2>";?></li><?php
        }
         ?>

</ul>
-->
</div>


<div class="tabcontent wow zoomIn" id="business_review">

<div class="col-md-10 pull-right">
  <div class="review_header" align="center">
               <h2>Reviews</h2>
               </div>

               <div class="review_info_admin">
<?php
foreach($reviews as $review){
  echo '<div class="">';
  echo  '<div class="panel-heading">'.$review->employee_name.', '.$review->title.'</div>';
  echo "<div class='panel-body'><p><div class='ratystars ".$review->review_id."' data-stars=".$review->stars."></div>".'</p></div>';
  echo  '<div class="panel-body">'.$review->description.'</div>';
  echo  '<div class="panel-body">'.$review->review_date.'</div>';
  echo "<div class='panel-body'><i class='fa fa-thumbs-up' align=right></i> ".$review->ThumbsUp;
  echo " <i class='fa fa-thumbs-down' align=right></i> ".$review->ThumbsDown."</div>";
  echo  '<div class="panel-footer">'."<a href='http://localhost/Cudos/user/profile/".$review->customer_id."'>".$review->customer_name."</a></div></div>";
  ?>
                   <script>
                 $( ".ratystars" ).each(function( index ) {
                   $(this).raty({ readOnly: true, score: $(this).attr('data-stars') });
                  });
                 </script>
  <hr class="style-two">
  <?php
}
?>
</div>
</div>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

            <?php $attributes = array("id" => "theForm", "method" => "post");
                                echo form_open("admin/addemployees", $attributes);  ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">New Employee</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="first-name" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeFName" placeholder="First name" required/>
            </div>
            <div class="form-group">
              <label for="last-name" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeLName" placeholder="Last name" required/>
            </div>
            <div class="form-group">
              <label for="about" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeAbout" placeholder="About Employee" required/>
            </div>
            <div class="form-group">
              <label for="title" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeTitle" placeholder="Title" required/>
            </div>
            <div class="form-group">
              <label for="title" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="imgURL" placeholder="Image URL">
            </div>
            <input type="hidden" name="bID">
            <!--
         	<div class="form-group">
  				<input type="file" name="pic" accept="image/*">

            </div>-->
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
          <button type="submit" class="btn btn-warning">Create</button>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div>



</div>





 <!-- /container -->
