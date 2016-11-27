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
<h2> <?php echo $this->session->userdata('business_name');?></h2>
<?php
echo "<p>Business ID: ".$this->session->userdata('business_id').'</p>';
echo "<p>Google ID: ".$this->session->userdata('google_id').'</p>';
echo "<p>Business Name: ".$this->session->userdata('business_name').'</p>';
echo "<p>Business Address: ".$this->session->userdata('business_address').'</p>';
echo "<p>Business Phone: ".$this->session->userdata('business_phone').'</p>';
echo "<p><a href='http://localhost/Cudos/business/display?bID=".$this->session->userdata('google_id')."&bName=".$this->session->userdata('business_name')."&bAddress=".$this->session->userdata('business_address')."&bPhone=".$this->session->userdata('business_phone')."&isAssoc=1"."'>Link</a></p>";
?>
</div>
<div class="col-md-12" align=center>
<h2>Admin Profile</h2>
</div>

<div class="row">
<div class="col-md-6">
<h3>Employees</h3>

<br>
<ul class="employee-list" id="scroller">
     <?php
        foreach($employees as $employee){?>
          <li><?php echo "<h2>".$employee->first_name."</h2>";?></li><?php
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


</div>

</div> <!-- /container -->
<?php $this->load->view('template/footer.php'); ?>
