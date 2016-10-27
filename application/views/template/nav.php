
<nav id="topNav" class="navbar navbar-default navbar-fixed-top">
   <div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
           <a id="bHome" class="navbar-brand page-scroll" href="<?php echo base_url(); ?>index.php/home"><p class="brand-name">Cudos</p></a>
       </div>
       <div class="navbar-collapse collapse" id="bs-navbar">
           <ul class="nav navbar-nav">
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url("index.php/home");?>#intro">Intro</a>
             </li>
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url("index.php/home");?>#highlights">Highlights</a>
             </li>
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url("index.php/home");?>#gallery">Gallery</a>
             </li>
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url("index.php/home");?>#features">Features</a>
             </li>
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url("index.php/home");?>#about">About</a>
             </li>
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url("index.php/home");?>#contact">Contact</a>
             </li>
           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li <?php if(isActive("user/login")) echo "class='active' "; ?> id="login"><a href="<?php echo base_url(); ?>index.php/user/login">Log in</a></li>
             <li <?php if(isActive("user/signup")) echo "class='active' "; ?> id="signup"><a href="<?php echo base_url(); ?>index.php/user/signup">Signup</a></li>
           </ul>
       </div>
   </div>
</nav>


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
