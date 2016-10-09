
<!-- Fixed navbar -->
   <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container">
       <div class="navbar-header">
         <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home">Cudos</a>
       </div>
       <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
           <li <?php if(lookForActive("home")) echo "class='active'"; ?>><a href="<?php echo base_url(); ?>index.php/home">Home</a></li>
           <li <?php if(lookForActive("about")) echo "class='active'"; ?>><a href="<?php echo base_url(); ?>index.php/about">About</a></li>
           <li <?php if(lookForActive("contact")) echo "class='active'"; ?>><a href="<?php echo base_url(); ?>index.php/contact">Contact</a></li>
         </ul>

         <ul class="nav navbar-nav navbar-right">

         <li class="dropdown" id="dropmenu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <strong><?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?> </strong><span></span><span class="glyphicon glyphicon-user"></span>
					          <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li <?php if(lookForActive("profile/index")) echo "class='active' "; ?>><a href="<?php echo base_url(); ?>index.php/profile/index">View Profile</a></li>
                  <li <?php if(lookForActive("profile/edit")) echo "class='active' "; ?>><a href="<?php echo base_url(); ?>index.php/profile/edit">Edit Profile</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url(); ?>index.php/profile/logout">Sign Out</a></li>
                </ul>
        </li>

        </ul>
       </div><!--/.nav-collapse -->
     </div>
   </nav>

<?php
function lookForActive($arg) {
  //because of "Using $this when not in object context" error
  //before, $ci would be $this
  $ci =& get_instance();
  if($arg === $ci->uri->segment(1))
    return true;
  else if($arg===$ci->uri->segment(1).'/'.$ci->uri->segment(2))
    return true;

  return false;
}
?>
