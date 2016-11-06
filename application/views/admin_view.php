<?php $this->load->view('template/header.php'); ?>
<div class="container custom-body">

<div class="col-md-12" align=center>
<h2>Admin Profile</h2>
</div>

<div class="row">
<div class="col-md-6">
<h3>Employee List</h3>


<br>

<?php
$adminID = $this->session->userdata('admin_id');?>
<p><?php echo $adminID;?></p>



     <!--<?php foreach($posts as $post){?>
         <p><?php echo $post->first_name;?></p>
         <p><?php echo $post->business_id;?></p>
      </tr>     
     <?php }?> -->

     <?php
        foreach($posts as $post){
          echo "<h2>".$post->first_name."</h2>";
        }
         ?>

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
          <form>
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Name</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Title</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
         	<div class="form-group">
  				<input type="file" name="pic" accept="image/*">

            </div>
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
