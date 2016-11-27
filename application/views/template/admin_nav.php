
<nav id="topNav" class="navbar navbar-default navbar-fixed-top" style="width:200px; height:100%; background-color: #262C3A;">
   <div class="container-fluid">

   <div class="sidebar-offcanvas" id="sidebar" role="navigation">

            <ul class="nav">
              <li class="active"><a href="#"><span class="glyphicon glyphicon-home"> Cudos</span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-user"> Employees</span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-briefcase"> Business Page</span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-envelope"> Contact Us</span></a></li>
              <li><a href="#"><span class="glyphicon glyphicon-lock"> Sign Out</span></a></li>
              <li><a href="#">Link 2</a></li>            
            </ul>
        </div>
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>

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
