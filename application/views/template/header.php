<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cudos</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("assets/img/apple-touch-icon.png"); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16">
    <link rel="manifest" href="<?php echo base_url("assets/img/manifest.json"); ?>">
    <link rel="mask-icon" href="<?php echo base_url("assets/img/safari-pinned-tab.svg"); ?>" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">


    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-theme.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/custom.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/login_register.css"); ?>">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo base_url("assets/js/custom.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("assets/js/login_register.js"); ?>"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    if( $this->session->userdata('login') ){
       $this->load->view('template/auth_nav.php');
    }
    else{
      $this->load->view('template/nav.php');
    }
     ?>
