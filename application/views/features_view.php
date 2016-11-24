<style type="text/css">
  .container{
    padding:100px 0 0px 0;
}

#hero1{
 background:url(http://urbantrans.com/wp-content/uploads/sanfran.jpg);
  background-size:cover;
  background-position:center center;
  background-attachment:fixed;
}

.inner{
  margin-top: 100px;
}

.org-btn{
  background-color: #f35a1e;
  color: white;
}

.org-btn:hover{
  text-decoration:none;
  color:white;
  opacity:0.8;
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


<section id="hero1" class="hero" align=center>
  <div class="inner">
    <h1>This is What Makes Cudos Great</h1>
    <p>We help your business be the best it can be</p>
  </div>
</section>

   <div class="container">

   <div class="main-header wow fadeIn">
   <h5 style="color: #262C3A">As a Cudos user, you have the power to help your community improve and grow.</h5></div>
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

      <div class="row features">
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-thumbs-up"></span>
            </div>
            <h4 class="heading">Vote Up</h4>
            <p class="description">Find a review helpful? Make sure to vote it up to help other users make their decisions based on the most accurate and helpful reviews.</p>
          </div>
        </div>
          <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg  glyphicon glyphicon-thumbs-down"></span>
            </div>
            <h4 class="heading">Vote Down</h4>
            <p class="description">Don't think a review is of any value to the business? Vote it down to help other users not be misled by false or inaccurate information.</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg  glyphicon glyphicon-search"></span>
            </div>
            <h4 class="heading">Search</h4>
            <p class="description">Share your experience of your encounter with employees of a busisness with your community.</p>
          </div>
        </div>
      </div>
</div>



        <div class="container" style="padding-bottom: 200px">
        <hr class="style-one"><br>
         <div class="main-header wow fadeIn">
         <h5 style="color: #262C3A">As an Associated Business with us, you will have an exclusive account to manage that will help lead your business to success!</h5><br>
         </div>
         <p><a class="btn-lg org-btn" href="<?php echo base_url(); ?>index.php/home#contact">Sign Up Today</a></p>
            <div class="row features">
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-user"></span>
            </div>
            <h4 class="heading">Manage</h4>
            <p class="description">Got a new employee? Or some employees are no longer are employees of your business? Make sure to update the list of your employees in your dashboard.</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-user"></span>
            </div>
            <h4 class="heading">Manage</h4>
            <p class="description">Got a new employee? Or some employees are no longer are employees of your business? Make sure to update the list of your employees in your dashboard.</p>
          </div>
        </div>
        <div class="col-md-4 wow fadeInUp">
          <div class="feature">
            <div class="icon-holder">
              <span class="icon-lg glyphicon glyphicon-user"></span>
            </div>
            <h4 class="heading">Manage</h4>
            <p class="description">Got a new employee? Or some employees are no longer are employees of your business? Make sure to update the list of your employees in your dashboard.</p>
          </div>
        </div>
      </div>

</div> <!-- /container -->

<?php $this->load->view('template/footer.php'); ?>