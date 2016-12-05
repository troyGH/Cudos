
<nav id="topNav" class="navbar navbar-default navbar-fixed-top">
   <div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
           <a id="bHome" class="navbar-brand page-scroll" href="<?php echo base_url(); ?>"><p class="brand-name">Cudos <i class="fa fa-address-card-o" aria-hidden="true"></i></p></a>
       </div>
       <div class="navbar-collapse collapse" id="bs-navbar">
           <ul class="nav navbar-nav">

           </ul>
           <ul class="nav navbar-nav navbar-right">
             <li>
               <a class="page-scroll" href="<?php if(!isActive("associatedbusiness")) echo base_url();?>associatedbusiness">Associated Businesses</a>
             </li>
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url();?>#about">About</a>
             </li>
             <li>
               <a class="page-scroll" href="<?php if(!isActive("home")) echo base_url();?>#contact">Contact</a>
             </li>
             <li <?php if(isActive("user/login")) echo "class='active' "; ?> id="login"><a href="<?php echo base_url(); ?>user/login">Log in</a></li>

             <li <?php if(isActive("admin/login")) echo "class='active' "; ?> id="login_admin"><a href="<?php echo base_url(); ?>admin/login">Business Login</a></li>
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
