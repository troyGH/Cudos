<?php $this->load->view('template/header.php'); ?>


<header id="first">
    <div class="header-content">
        <div class="inner">
          <h3>Welcome to Cudos <i class="fa fa-address-card-o" aria-hidden="true"></i></h3>
          <h5>Search for a business to rate an employee</h5>

          <hr />
          <?php $attributes = array("id" => "search-form", "class" => "form-inline", "method" => "get");
                              echo form_open("business/search", $attributes);  ?>
          <div class="form-group">
            <input id="business-input" class="form-control" name="business" type="text" placeholder="Business">
            <input id="location-input" class="form-control" name="location" type="text" placeholder="City, State, or Zip"  required />
          </div>


          <div class="form-group" style="display: block">
            <button type="submit" class="btn btn-warning">Search</button>
          </div>
          <?php echo form_close();?>
        </div>
        <br><br><br>

                <div class="col-xs-12 text-center down-arrow hidden-xs">
            <div class="button_down">
                <a class="imgcircle page-scroll" data-wow-duration="1.5s"  href="#useit"> <img class="img_scroll" src="<?php echo base_url('assets/img');?>/circle.png" alt=""> </a>
            </div>
        </div>
    </div>
    <video autoplay="" loop="" class="fillWidth fadeIn wow collapse in hidden-xs" data-wow-delay="0.5s" poster="https://s3-us-west-2.amazonaws.com/coverr/poster/Traffic-blurred2.jpg" id="video-background">
    <source src="https://s3-us-west-2.amazonaws.com/coverr/mp4/Coffee-Shot.mp4" type="video/mp4">Your browser does not support the video tag. I suggest you upgrade your browser.
</video>
</header>

<head>
<script type="text/javascript">
<!--
function redirect() {
    window.location = "http://www.youtube.com/"

}
//-->
</script>

 </head>
    <!-- Use it -->
    <div id ="useit" class="content-section-a" align=left>

        <div class="container" id="padded">

            <div class="row">

                <div class="col-sm-6 pull-right wow fadeInRightBig">
                    <iframe width="520px" height="400px" src="https://youtube.com/embed/KZhngRg3Spo">
</iframe>
                </div>

                <div class="col-sm-6 wow fadeInLeftBig"  data-animation-delay="200">
                    <h3 class="section-heading">Cudos</h3>
                    <div class="sub-title lead3">Learn to Love your Business</div><br>
                    <p class="lead">
                        Our team at Cudos is dedicated to help your business reach its maximum potential. Your customers and employees are what makes your business great. The experience of your customers with yor employees is valuable and we believe customers should be able to share that experience to help your business the best it can be.
                    </p>
                    <!--
                     <p><a class="btn btn-embossed btn-primary" href="#" role="button">View Details</a>
                     <a class="btn btn-embossed btn-info" href="#" role="button">Visit Website</a></p>
                     -->
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>

    <div class="content-section-b" id="how-to" style="padding-top: 150px; padding-bottom: 150px; background-color: #f8f8f8;">

        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInLeftBig">
                     <div id="carousel-example" class="carousel slide" data-ride="carousel" style="margin-top:50px" data-interval="false">
  <ol class="carousel-indicators homepage">
    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example" data-slide-to="1"></li>
  </ol>

  <div class="carousel-inner">
    <div class="item active">
      <img class="slide" src="<?php echo base_url(); ?>/assets/img/customer.png"/>

    </div>

    <div class="item">
      <img class="slide" src="<?php echo base_url(); ?>/assets/img/employees.png" />

    </div>
  </div>
                </div>
                </div>

                <div class="col-sm-6 wow fadeInRightBig"  data-animation-delay="200">
                    <h3 class="section-heading">Sign Up Today</h3>
                    <div class="sub-title lead3">YOU have the power to make your community great again!</div>
                    <br>
                    <p class="lead">
                        Customers can now review their favorite and not so favorite employees of a local business. Reviews can help other customers choose a sales agent, barber, nail technician, ... (You name it) more wisely.
                        <br><br>
                        If you are a business representative, make sure to sign up to be associated with us and manage your employees.
                    </p>
                    <!--
                     <p><a class="btn btn-embossed btn-primary" href="#" role="button">View Details</a>
                     <a class="btn btn-embossed btn-info" href="#" role="button">Visit Website</a></p>
                     -->
                </div>
            </div>
        </div>
    </div>



<!--
<section class="bg-primary" id="intro"); >
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                <h2 class="margin-top-0 text-primary" style="color:#FF4733  " >Cudos</h2>
                <br>
                <p class="text-faded"  style="font-size:180% ;color:black;" align="right";>
                  <b>  You use Cudos to find almost all the bussiness that you are intersetd in with their reviews. You can find anything from your local bussiness to some big famouse companies.
                </p>
<input type="button" onclick="redirect()"  style="color:orange"; size="250" value="Watch the tour" >
            </div>
        </div>
    </div>
</section>

<section id="highlights" style="  background-image: url(<?php echo base_url('assets/img');?>/c.jpg");>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="margin-top-0 text-primary" style="color:#FF4733"  >Cudos</h2>
                <hr class="primary">
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 text-center">
                <div class="feature">
                    <i class="icon-lg ion-android-laptop wow fadeIn" data-wow-delay=".3s"></i>
                    <h3>Responsive</h3>
                    <p class="text-muted" style="font:bold;"> <b> Search, Choose and Rate an employee from San Francisco to Paris</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
                <div class="feature">
                    <i class="icon-lg ion-social-sass wow fadeInUp" data-wow-delay=".2s"></i>
                    <h3>Customizable</h3>
                    <p class="text-muted"> <b> Easy to work with</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center">
                <div class="feature">
                    <i class="icon-lg ion-ios-star-outline wow fadeIn" data-wow-delay=".3s"></i>
                    <h3>Consistent</h3>
                    <p class="text-muted"> <b> A mature, well-tested, stable Web app</p>
                </div>
            </div>
        </div>
    </div>
</section>

-->







<section id="gallery" class="no-padding">
    <div class="container-fluid">
        <div class="row no-gutter">

            <div class="col-lg-4 col-sm-6 gallery-photo">
                <a class="gallery-box" href="<?php echo base_url();?>business/search?business=&location=las+vegas%2C+nevada">
                    <img src="<?php echo base_url('assets/img');?>/las-vegas.jpg" class="img-responsive" alt="Image 1">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                                <p>Las Vegas</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-sm-6 gallery-photo">
                <a class="gallery-box" href="<?php echo base_url();?>business/search?business=&location=san+francisco%2C+california">
                    <img src="<?php echo base_url('assets/img');?>/maxresdefault.jpg" class="img-responsive" alt="Image 2">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                                <p>San Francisco</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 gallery-photo">
             <a class="gallery-box" href="<?php echo base_url();?>business/search?business=&location=seattle%2C+washington">
                    <img src="<?php echo base_url('assets/img');?>/seattle.jpg" class="img-responsive" alt="Image 3">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                                <p>Seattle</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
               <a class="gallery-box" href="business/search?business=&location=new+york">
                    <img src="<?php echo base_url('assets/img');?>/newyork.jpg" class="img-responsive" alt="Image 4">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                                <p>New York</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="gallery-box" href="business/search?business=&location=chicago">
                    <img src="<?php echo base_url('assets/img');?>/chicago.jpg" class="img-responsive" alt="Image 5">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                                <p>Chicago</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="gallery-box" href="business/search?business=&location=miami">
                    <img src="<?php echo base_url('assets/img');?>/miami.jpg" class="img-responsive" alt="Image 6">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                                <p>Miami</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

   <div class="container" align="center" style="padding-top: 100px" id="3feature">

   <div class="main-header wow fadeIn">
   <h2 class="text-center text-primary">Features</h2><br>
   <h5 style="color: #262C3A">The 3 Steps of Helping your Community</h5></div>
<div class="row features">
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg  glyphicon glyphicon-search"></span>
            </div>
            <h4 class="heading">Search</h4>
            <p class="description">Search for businesses in your area or any parts of the world. Whether you wanna know about
            your local bakery or a fancy restaurant for your honey moon in Paris, Cudos has got you covered.</p>
          </div>
        </div>
                <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-envelope"></span>
            </div>
            <h4 class="heading">Contact</h4>
            <p class="description">Got a question or concern that needs to be directed to a manager? You can message any business on Cudos.</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-pencil"></span>
            </div>
            <h4 class="heading">Review</h4>
            <p class="description">Share your experience of your encounter with employees of a busisness with your community.</p>
          </div>
        </div>
      </div>


</div>



        <div class="container" style="padding-bottom: 200px" align=center>
        <hr class="style-two"><br>
         <div class="main-header wow fadeIn">
         <h5 style="color: #262C3A">Associated Businesses Get More! Sign up Today and Manage your Employees!</h5><br>
         </div>
         <p><a class="btn btn-embossed btn-primary" href="<?php echo base_url(); ?>index.php/associatedbusiness" role="button">Learn More</a>
         <a class="btn btn-embossed btn-info" href="<?php echo base_url(); ?>index.php/admin/login" role="button">Login to Dashboard</a></p>
            <div class="row features">
            <div class="col-md-2"></div>
            <a href="<?php echo base_url(); ?>admin/signup" ><div class="col-md-4 wow fadeInUp">
          <div class="feature-static">

            <h4 class="heading">Associate With Us</h4>
            <p class="description">Customers are more likely to review your employees when you are associated with us.</p>
          </div>
        </div></a>
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-user"></span>
            </div>
            <h4 class="heading">Manage</h4>
            <p class="description">Got a new employee? Or some employees are no longer are employees of your business? Make sure to update the list of your employees in your dashboard.</p>
          </div>
        </div>
       <div class="col-md-2"></div>
      </div>

</div> <!-- /container -->

<style type="text/css">


.btn-big{
    padding-top:10px;
    padding-bottom: 10px;
    font-size: 20px;
    margin: 0px;
}

</style>

<script type="text/javascript">
    function showDiv() {
   document.getElementById('subscribe-form').style.display = "block";
}
</script>
    <div  class="content-section-c " style="background-color: #f8f8f8; padding:100px">
        <div class="container">
            <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 style="color:#262C3A"><b>Get Live Updates</b></h2>
                <p class="lead" style="margin-top:0"></p>
             </div>
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="mockup-content">
                        <div class="morph-button org-btn wow pulse morph-button-inflow morph-button-inflow-1">
                            <button class="btn btn-embossed btn-info btn-big" type="button " value="Show Div" onclick="showDiv()" style="width:100%;white-space: pre-wrap;">Subscribe to our Newsletter</button>
                            <div class="morph-content">
                                    <div class="content-style-form content-style-form-4 " id="subscribe-form" style="display:none; background-color: #262C3A;padding: 10px">
                                        <br><br><h4 class="morph-clone" style="color:white">Be Notified of Special Events</h4>
                                        <form align=center>
                                            <div align="center"><p style="color: white; width: 80%;align-content: center;"><input type="text" placeholder="Your Email" /></p></div>
                                            <p><button class="btn btn-embossed btn-primary btn-big" style="width:80%;white-space: pre-wrap;">Subscribe me</button></p>
                                        </form>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </div>
    </div>

<section id="about" align=center>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="margin-top-0 text-primary">About Us</h3>
                <hr class="style-two">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <p class="wow fadeInDown" style="font-size:200%; color: #570E04" ; > <b> SJSU Software Engineers </p>

</div>
<br>

 <div class="col-md-3">
  <img src="<?php echo base_url('assets/img');?>/troy.jpg" class="img-circle" alt="Troy" width="200" height="200">
      <h3>Troy</h3>

  </div>
   <div class="col-md-3">
   <img src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAVuAAAAJDA3YjY3ZTQ4LTk2NjItNGQ5NS05OWFiLWVmMjg5MDA3MzAyYg.jpg" class="img-circle" alt="Roya" width="200" height="200">
       <h3> Roya</h3>

   </div>
    <div class="col-md-3">
    <img src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAg1AAAAJGY0Y2U0OTYwLTFlNzUtNDIxYS1hMzkyLTlkZjNkYTQxMmQ5Zg.jpg" class="img-circle" alt="Eya" width="200" height="200" >
    <h3>Eya</h3>
    </div>
     <div class="col-md-3">
     <img src="<?php echo base_url('assets/img');?>/sueng.jpg" class="img-circle" alt="sueng" width="200" height="200">
         <h3>Seung</h3>

     </div>
</div>



    </div>
</section>








<section id="contact" class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h3 class="margin-top-0 wow fadeIn">Get in Touch</h3>
                <hr class="primary">
                <p>We love feedback. Fill out the form below and we'll get back to you as soon as possible.</p>
                <?php echo $this->session->flashdata('contact_success');?>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
                  <?php $attributes = array("id" => "customer-contact-form", "class" => "contact-form row", "method" => "POST");
                                      echo form_open("user/contact", $attributes);  ?>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required />
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required />
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone" required />
                    </div>
                    <div class="col-md-12">
                        <label></label>
                        <textarea class="form-control" rows="9"name="message" placeholder="Your message here.." required /></textarea>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-default btn-block btn-lg wow flipInX" data-toggle="modal"
                        data-target="<?php if($this->session->flashdata('contact_success')) {echo "#alertModal";}?>">Send <i class="ion-android-arrow-forward"></i></button>
                    </div>
                    <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>

<div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <img src="//placehold.it/1200x700/222?text=..." id="galleryImage" class="img-responsive" />
        <p>
            <br/>
            <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close <i class="ion-android-close"></i></button>
        </p>
      </div>
    </div>
    </div>
</div>
<div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="text-center">Landing Zero Theme</h2>
        <h5 class="text-center">
            A free, responsive landing page theme built by BootstrapZero.
        </h5>
        <p class="text-justify">
            This is a single-page Bootstrap template with a sleek dark/grey color scheme, accent color and smooth scrolling.
            There are vertical content sections with subtle animations that are activated when scrolled into view using the jQuery WOW plugin. There is also a gallery with modals
            that work nicely to showcase your work portfolio. Other features include a contact form, email subscribe form, multi-column footer. Uses Questrial Google Font and Ionicons.
        </p>
        <p class="text-center"><a href="http://www.bootstrapzero.com">Download at BootstrapZero</a></p>
        <br/>
        <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true"> OK </button>
      </div>
    </div>
    </div>
</div>
<div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="text-center">Message Sent!</h2>
        <p class="text-center">Someone from the team will respond back soon.</p>

        <br/>
        <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">OK</i></button>
      </div>
    </div>
    </div>
</div>
<!-- End Body -->
<script>

new WOW().init();
$(".page-scroll").on("click", function(event) {
      var $ele = $(this);
      $('html, body').stop().animate({
          scrollTop: ($($ele.attr('href')).offset().top - 60)
      }, 1450, 'easeInOutExpo');
      event.preventDefault();
});
$('#topNav').affix({
    offset: {
        top: 200
    }
});

$('.navbar-collapse ul li a').click(function() {
    /* always close responsive nav after click */
    $('.navbar-toggle:visible').click();
});

$('#galleryModal').on('show.bs.modal', function (e) {
   $('#galleryImage').attr("src",$(e.relatedTarget).data("src"));
});

function getUserInfo(){
  $.getJSON("http://www.geoplugin.net/json.gp?jsoncallback=?",
      function (data) {
            window.document.getElementById("location-input").setAttribute("value", data['geoplugin_city'] + ", " +data['geoplugin_region']);
      }
  );
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-6CzpsxPQPdiOV_3M0QhATgjyTqO7JQE&libraries=places&callback=getUserInfo" async defer>
</script>


<?php $this->load->view('template/footer.php'); ?>
