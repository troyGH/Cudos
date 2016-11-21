<style type="text/css">
.profile{
	margin: 0 auto;
}

@media screen and (min-width: 980px) {
  .container.custom-body {
    padding:200px;
  }
}
</style>

<?php $this->load->view('template/header.php'); ?>
<div class="container custom-body">

    
		<div class="col-md-3">
			<div class="profile-sidebar" align=center>
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img class="img-rounded" src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAVuAAAAJDA3YjY3ZTQ4LTk2NjItNGQ5NS05OWFiLWVmMjg5MDA3MzAyYg.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->

				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-warning btn-sm">Edit Profile</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu" style="text-align: left;display: inline-block">
					<ul class="nav">
					<li class="active"><a data-toggle="tab" href="#home"><i class="glyphicon glyphicon-home"></i>Overview</a></li>

							<li>
							<a data-toggle="tab" href="#menu1"><i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a data-toggle="tab" href="#menu2">
							<i class="glyphicon glyphicon-ok"></i>
							Reviews </a>
						</li>
						<li>
							<a data-toggle="tab" href="#menu3">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9 tab-content" align=center>
		<div class="tabs" style="text-align: left;display: inline-block">
            <div id="home" class="tab-pane fade in active" >
			   <h2>Personal Information</h2>
			   Roya<br>
			   Developer
            </div>

            <div id="menu1" class="tab-pane fade">
            <h2>settings</h2>
            </div>
             <div id="menu2" class="tab-pane fade">
            reviews
            </div>
             <div id="menu3" class="tab-pane fade">
            help
            </div>
		</div>
		</div>
	

<center>
</div> <!-- /container -->


<?php $this->load->view('template/footer.php'); ?>
