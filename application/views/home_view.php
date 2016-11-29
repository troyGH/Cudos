<style type="text/css">
    .down-arrow{position: absolute;bottom: 8%;}

.down-arrow{position: absolute;top: 20%;}
.button_down img {
width: 50px;
    
}
.content-section-a {
    background-color: #f8f8f8;
    padding: 90px 0; 
    text-align: left;
}

.lead3 {
margin-bottom: 0px;
margin-top: 0px;
font-size: 16px;
color: #8D8D8D;
line-height: 1.46428571;
font-weight: 300;
}


.features {
  margin: 50px 0;
}

.feature {
  width: 100%;
  height: 320px;
  margin: 80px 0;
  text-align: center;
  border: 2px solid #ddd;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

.feature .icon-holder {
  color: #f35a1e;
  position: relative;
  top: 70px;
  display: inline-block;
  margin-bottom: 40px;
  padding: 10px;
  background: white;
  -webkit-transition: all 0.3s ease;
  transition: all 0.4s ease;
}

.feature .heading {
  position: relative;
  top: 90px;
  -webkit-transition: all 600ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transition: all 600ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.feature:hover {
  border-color: #039be5;
}

.feature:hover .icon-holder {
  top: -30px;
}

.feature:hover .heading {
  top: -30px;
}

.feature .description {
  font-size: 1.1em;
  width: 80%;
  margin: 0 auto;
  opacity: 0;
  -webkit-transition: all 600ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transition: all 600ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
  -webkit-transform: scale(0);
  -ms-transform: scale(0);
  transform: scale(0);
}

.feature:hover .description {
  opacity: 1;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.style-one{
  max-width: 90%;
  padding: 0;
border-top: medium double #f35a1e;
color: #f35a1e;
opacity:1;
}


</style>


<?php $this->load->view('template/header.php'); ?>


<header id="first">
    <div class="header-content">
        <div class="inner">

          <img class="cudos-img" src="<?php echo base_url('assets/img/Cudos Final.png'); ?>">
          <h3>Search for a business to rate an employee</h3>

          <hr />
          <?php $attributes = array("id" => "search-form", "class" => "form-inline", "method" => "get");
                              echo form_open("business/search", $attributes);  ?>
          <div class="form-group">
            <input id="business-input" class="form-control" name="business" type="text" placeholder="Business" require="">
            <input id="location-input" class="form-control" name="location" type="text" placeholder="City, State, or Zip"  require />
          </div>


          <div class="form-group">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
          <?php echo form_close();?>
        </div>
        <br><br><br>
                <div class="col-xs-12 text-center down-arrow">
            <div class="button_down"> 
                <a class="imgcircle page-scroll" data-wow-duration="1.5s"  href="#useit"> <img class="img_scroll" src="<?php echo base_url('assets/img');?>/circle.png" alt=""> </a>
            </div>
        </div>
    </div>

    <video autoplay="" loop="" class="fillWidth fadeIn wow collapse in" data-wow-delay="0.5s" poster="https://s3-us-west-2.amazonaws.com/coverr/poster/Traffic-blurred2.jpg" id="video-background">
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

        <div class="container">
            
            <div class="row">
            
                <div class="col-sm-6 pull-right wow fadeInRightBig">
                    <iframe width="520px" height="400px" src="https://youtube.com/embed/ryEsuevuZGs">
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

   <div class="container" align="center" style="padding-top: 100px">

   <div class="main-header wow fadeIn">
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
        <hr class="style-one"><br>
         <div class="main-header wow fadeIn">
         <h5 style="color: #262C3A">Associated Businesses Get More! Sign up Today and Manage your Employees!</h5><br>
         </div>
         <p><a class="btn btn-embossed btn-primary" href="<?php echo base_url(); ?>index.php/associatedbusiness" role="button">Learn More</a> 
         <a class="btn btn-embossed btn-info" href="<?php echo base_url(); ?>index.php/admin/login" role="button">Login to Dashboard</a></p>
            <div class="row features">
            <div class="col-md-4"></div>
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-user"></span>
            </div>
            <h4 class="heading">Manage</h4>
            <p class="description">Got a new employee? Or some employees are no longer are employees of your business? Make sure to update the list of your employees in your dashboard.</p>
          </div>
        </div>
       <div class="col-md-4"></div>
      </div>

</div> <!-- /container -->


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









<section id="gallery" class="no-padding">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-lg-4 col-sm-6">
                <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="http://splashbase.s3.amazonaws.com/unsplash/regular/photo-1430916273432-273c2db881a0%3Fq%3D75%26fm%3Djpg%26w%3D1080%26fit%3Dmax%26s%3Df047e8284d2fdc1df0fd57a5d294614d">
                    <img src="http://splashbase.s3.amazonaws.com/unsplash/regular/photo-1430916273432-273c2db881a0%3Fq%3D75%26fm%3Djpg%26w%3D1080%26fit%3Dmax%26s%3Df047e8284d2fdc1df0fd57a5d294614d" class="img-responsive" alt="Image 1">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="http://splashbase.s3.amazonaws.com/getrefe/regular/tumblr_nqune4OGHl1slhhf0o1_1280.jpg">
                    <img src="http://splashbase.s3.amazonaws.com/getrefe/regular/tumblr_nqune4OGHl1slhhf0o1_1280.jpg" class="img-responsive" alt="Image 2">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="http://splashbase.s3.amazonaws.com/unsplash/regular/photo-1433959352364-9314c5b6eb0b%3Fq%3D75%26fm%3Djpg%26w%3D1080%26fit%3Dmax%26s%3D3b9bc6caa190332e91472b6828a120a4">
                    <img src="http://splashbase.s3.amazonaws.com/unsplash/regular/photo-1433959352364-9314c5b6eb0b%3Fq%3D75%26fm%3Djpg%26w%3D1080%26fit%3Dmax%26s%3D3b9bc6caa190332e91472b6828a120a4" class="img-responsive" alt="Image 3">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="http://splashbase.s3.amazonaws.com/lifeofpix/regular/Life-of-Pix-free-stock-photos-moto-drawing-illusion-nabeel-1440x960.jpg">
                    <img src="http://splashbase.s3.amazonaws.com/lifeofpix/regular/Life-of-Pix-free-stock-photos-moto-drawing-illusion-nabeel-1440x960.jpg" class="img-responsive" alt="Image 4">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="http://splashbase.s3.amazonaws.com/lifeofpix/regular/Life-of-Pix-free-stock-photos-new-york-crosswalk-nabeel-1440x960.jpg">
                    <img src="http://splashbase.s3.amazonaws.com/lifeofpix/regular/Life-of-Pix-free-stock-photos-new-york-crosswalk-nabeel-1440x960.jpg" class="img-responsive" alt="Image 5">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="#galleryModal" class="gallery-box" data-toggle="modal" data-src="http://splashbase.s3.amazonaws.com/lifeofpix/regular/Life-of-Pix-free-stock-photos-clothes-exotic-travel-nabeel-1440x960.jpg">
                    <img src="http://splashbase.s3.amazonaws.com/lifeofpix/regular/Life-of-Pix-free-stock-photos-clothes-exotic-travel-nabeel-1440x960.jpg" class="img-responsive" alt="Image 6">
                    <div class="gallery-box-caption">
                        <div class="gallery-box-content">
                            <div>
                                <i class="icon-lg ion-ios-search"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid" id="features">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <h2 class="text-center text-primary">Features</h2>
            <hr>
            <div class="media wow fadeInRight">
                <h3>Simple</h3>
                <div class="media-body media-middle">
                    <p>What could be easier? Get information and reviews fast with us.</p>
                </div>
                <div class="media-right">
                    <i class="icon-lg ion-ios-bolt-outline"></i>
                </div>
            </div>
            <hr>
            <div class="media wow fadeIn">
                <h3>Free</h3>
                <div class="media-left">
                    <a href="#alertModal" data-toggle="modal" data-target="#alertModal"><i class="icon-lg ion-ios-cloud-download-outline"></i></a>
                </div>
                <div class="media-body media-middle">
                    <p>Yes, just sign up and have your best experience ever.</p>
                </div>
            </div>
            <hr>
            <div class="media wow fadeInRight">
                <h3>Unique</h3>
                <div class="media-body media-middle">
                    <p> To search for everything from the city's tastiest pizza to the most popular beauty salon. What will you uncover in your neighborhood?</p>
                </div>
                <div class="media-right">
                    <i class="icon-lg ion-ios-snowy"></i>
                </div>
            </div>
            <hr>
            <div class="media wow fadeIn">
                <h3>Popular</h3>
                <div class="media-left">
                    <i class="icon-lg ion-ios-heart-outline"></i>
                </div>
                <div class="media-body media-middle">
                    <p>There's good reason why Cudos is the most used serach and review website in the world.</p>
                </div>
            </div>
            <hr>
            <div class="media wow fadeInRight">
                <h3>Tested</h3>
                <div class="media-body media-middle">
                    <p>Cudos is matured and well-tested. It's a stable codebase that provides consistency.</p>
                </div>
                <div class="media-right">
                    <i class="icon-lg ion-ios-flask-outline"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about" style="background-image: url(<?php echo base_url('assets/img');?>/org.jpg");>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="margin-top-0 text-primary">About Us</h3>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container" );>
        <div class="row">
            <p class="wow fadeInDown" style="font-size:200%; color: #570E04" ; > <b> SJSU Software Engineers </p>

</div>

<br>

<div class="container">
 <div class="col-md-3">
  <img src="<?php echo base_url('assets/img');?>/troy.jpg" align="left" class="img-circle" alt="Troy" width="200" height="200">
      <h3> <br/> <b>Troy</h3>

  </div>
   <div class="col-md-3">
   <img src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAVuAAAAJDA3YjY3ZTQ4LTk2NjItNGQ5NS05OWFiLWVmMjg5MDA3MzAyYg.jpg" align="center" class="img-circle" alt="Roya" width="200" height="200">
       <h3> <b></b>Roya</h3>

   </div>
    <div class="col-md-3">
    <img src="https://media.licdn.com/mpr/mpr/shrinknp_200_200/AAEAAQAAAAAAAAg1AAAAJGY0Y2U0OTYwLTFlNzUtNDIxYS1hMzkyLTlkZjNkYTQxMmQ5Zg.jpg" align="right" class="img-circle" alt="Eya" width="200" height="200" >
    <h3> <br/> <b> Eya</h3>
    </div>
     <div class="col-md-3">
     <img src="<?php echo base_url('assets/img');?>/sueng.jpg" align="right" class="img-circle" alt="sueng" width="200" height="200">
     <br> </br>
          <br> </br>
         <h3> <br/> <b> Sueng</h3>

     </div>
</div>



    </div>
</section>








<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h3 class="margin-top-0 wow fadeIn">Get in Touch</h3>
                <hr class="primary">
                <p>We love feedback. Fill out the form below and we'll get back to you as soon as possible.</p>
            </div>
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <form class="contact-form row">
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-4">
                        <label></label>
                        <input type="text" class="form-control" placeholder="Phone">
                    </div>
                    <div class="col-md-12">
                        <label></label>
                        <textarea class="form-control" rows="9" placeholder="Your message here.."></textarea>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <label></label>
                        <button type="button" class="btn btn-default btn-block btn-lg wow flipInX">Send <i class="ion-android-arrow-forward"></i></button>
                    </div>
                </form>
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
