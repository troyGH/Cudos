
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
  			 <li <?php if(lookForActive("user/login")) echo "class='active' "; ?> id="login"><a href="<?php echo base_url(); ?>index.php/user/login?previousurl=<?php echo get_the_current_url(); ?>">Log in</a></li>
  			 <li <?php if(lookForActive("user/signup")) echo "class='active' "; ?> id="signup"><a href="<?php echo base_url(); ?>index.php/user/signup">Signup</a></li>

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
function get_the_current_url() {


    $url =  str_replace("/cudos/index.php","",strtolower($_SERVER["REQUEST_URI"]));
    $url = rtrim($url);
    $url = ltrim($url);
    return substr($url, 1);
}
?>
