<style type="text/css">
@media screen and (min-width: 980px) {
  .container.custom-body {
    padding:200px;
  }
}

.employee-list{
  height:300px; 
  border: 1px solid #F5F5F5;
  border-radius: 10px;
}
.employee-list{overflow:hidden; overflow-y:scroll;}


#scroller::-webkit-scrollbar-track
{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  border-radius: 10px;
  background-color: #F5F5F5;
}

#scroller::-webkit-scrollbar
{
  width: 7px;
  background-color: transparent;
  border-radius: 10px;
}

#scroller::-webkit-scrollbar-thumb
{
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #555;
}

</style>

<?php $this->load->view('template/header.php'); ?>
<div class="container custom-body">

<div class="col-md-12" align=center>
<h2>Admin Profile</h2>
</div>

<div class="row">
<div class="col-md-6">
<h3>Employees</h3>


<br>

<?php
$adminID = $this->session->userdata('admin_id');?>
<p><?php echo $adminID;?></p>



     <!--<?php foreach($posts as $post){?>
         <p><?php echo $post->first_name;?></p>
         <p><?php echo $post->business_id;?></p>
      </tr>     
     <?php }?> -->
<ul class="employee-list" id="scroller">
     <?php
        foreach($posts as $post){?>
          <li><?php echo "<h2>".$post->first_name."</h2>";?></li><?php
        }
         ?>
</ul>
     <div class="bd-example">
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Employee</button>

</div>

<div class="col-md-6">
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">New Employee</h4>
        </div>
        <div class="modal-body">
          <form action="admin.php" name="EmployeeForm" id="theForm" method="post">
            <div class="form-group">
              <label for="first-name" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeFName" placeholder="First name">
            </div>
            <div class="form-group">
              <label for="last-name" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeLName" placeholder="Last name">
            </div>
            <div class="form-group">
              <label for="about" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeAbout" placeholder="About Employee">
            </div>
            <div class="form-group">
              <label for="title" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="employeeTitle" placeholder="Title">
            </div>
            <div class="form-group">
              <label for="title" class="form-control-label"></label>
              <input type="text" class="form-control" id="recipient-name" name="imgURL" placeholder="Image URL">
            </div>
            <!--
         	<div class="form-group">
  				<input type="file" name="pic" accept="image/*">

            </div>-->
          </form>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
          <button type="button" class="btn btn-warning">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>


</div>

</div> <!-- /container -->
<?php $this->load->view('template/footer.php'); ?>
