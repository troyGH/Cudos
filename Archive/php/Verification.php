<!DOCTYPE html>
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Assembly 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140330
-->
<META NAME="Author" CONTENT="Troy Nguyen, Eya Badal Abdisho, Roya Del Parastaran, Seung Yeon Joo">
<META NAME="Date" CONTENT="April 17, 2016">
<META NAME="Copyright" CONTENT="SJSU CMPE195A Spring 2016 Project. All rights reserved.">
<META NAME="Robots" CONTENT="all">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShoutMS - Rate an Employee of a Local Business</title>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="https://s3-us-west-1.amazonaws.com/client-tier/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://s3-us-west-1.amazonaws.com/client-tier/fonts.css" rel="stylesheet" type="text/css" media="all" />

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type = "text/javascript" src="js/JSScript.js"></script>

</head>
<body>
<div id="header-wrapper-1">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.html">ShoutMS</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html" accesskey="1" title="">Home</a></li>
				<li><a href="Search.html" accesskey="2" title="">Search</a></li>
				<li><a href="Signup.html" accesskey="3" title="">Signup</a></li>
				<li><a href="FutureProjects.html" accesskey="4" title="">Future</a></li>
				<li><a href="ContactUs.html" accesskey="5" title="">Contact</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="container">
   <form id="search-form" class="form-inline" role="form" onsubmit="return searchSubmission()">
			
			<div class="form-group">
				<input
				  id="phone-number-test"
				  class="form-control"
				  type="phone"
				  placeholder="Phone Number" required>
			</div>
					  
				<button
				id="test-button"
				type="submit" 
				class="btn btn-default">Send SMS</button>
			</form> 
    <br />     <br />
     <br />
     <br />

        <div class="form-group">
				<input
				  id="digit-verification"
				  class="form-control"
				  type="text"
				  placeholder="6 digit pin number" required>
			</div>
					  
				<button
				id="test-button"
				type="submit" 
				class="btn btn-default">Verify</button>
			</form> 
</div>    
    
<div id="copyright" class="container">
	<p>&copy; SJSU CMPE195A Spring 2016 Project. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
