<?php $this->load->view('template/header.php'); ?>


<div id="carousel-example" class="carousel slide" data-ride="carousel" style="margin-top:50px">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example" data-slide-to="1"></li>
    <li data-target="#carousel-example" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <a href="#"><img class="slide" src="<?php echo base_url(); ?>/assets/img/kitchen.png"/></a>
      <div class="carousel-caption">
        <h4>Evaluate Employees</h4>
        <p>Value the experience of your customers with your employees!</p>
      </div>
    </div>
    <div class="item">
      <a href="#"><img class="slide" src="<?php echo base_url(); ?>/assets/img/server.png" /></a>
      <div class="carousel-caption">
        <h4>Improve Service</h4>
        <p>Improve your customer service based on what your customers have to say!</p>
      </div>
    </div>
    <div class="item">
      <a href="#"><img class="slide" src="<?php echo base_url(); ?>/assets/img/open.png" /></a>
      <div class="carousel-caption">
        <h4>Want to be an associated business with Cudos?</h4>
        <p><a class="btn-lg org-btn" href="<?php echo base_url(); ?>index.php/home#contact">Contact Us Today</a></p>
      </div>
    </div>
  </div>

  <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>


<div class="container quote">
    <div class="row">
      <div class="col-md-12 wow fadeInRight">
        <p class="lead" align=center> <q>Ask your customers to be part of the solution, and don't view them as part of the problem. </q></p>
<div class="wow fadeInUp" data-wow-delay="0.5s">
<p style="text-align:right;">Alan Weiss, Author "Million Dollar Consulting</p>
</div>
 
     
      </div>
    </div>
</div>

<section class="main-section">
<div class="container wow fadeIn">
<!--<h1>Associated Businesses With Cudos</h1>-->
<hr class="style-one wow fadeIn"><br><br><br>



<div class="row logos wow fadeInRight">
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/supercuts.png" class="img-rounded img-responsive" alt="Avatar">
</div>
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/target.png" class="img-rounded img-responsive"  alt="Avatar">
</div>
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/mcdonalds.png" class="img-circle img-responsive" alt="Avatar">
</div>
</div>


<div class="row logos wow fadeInLeft">
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/chipotle.png" class="img-circle img-responsive" alt="Avatar">
</div>
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/petsmart.png" class="img-circle img-responsive"  alt="Avatar">
</div>
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/starbucks.png" class="img-circle img-responsive" alt="Avatar">
</div>
</div>


<div class="row logos wow fadeInRight">
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/walmart.png" class="img-circle img-responsive" alt="Avatar">
</div>
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/peets.png" class="img-circle img-responsive"  alt="Avatar">
</div>
<div class="col-md-4">
<img src="<?php echo base_url(); ?>/assets/img/bj.png" class="img-circle img-responsive" alt="Avatar">
</div>
</div>


</div>
</section>



<?php $this->load->view('template/footer.php'); ?>