
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
             <li class="dropdown" id="dropmenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>  <?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?> <span></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li <?php if(isActive("profile/index")) echo "class='active' "; ?>><a href="<?php echo base_url(); ?>profile/index">View Profile</a></li>
                      <li <?php if(isActive("profile/edit")) echo "class='active' "; ?>><a href="<?php echo base_url(); ?>profile/edit">Edit Profile</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php echo base_url(); ?>index.php/profile/logout">Sign Out</a></li>
                    </ul>
            </li>
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
