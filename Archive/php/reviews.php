<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShoutMS - Rate an Employee of a Local Business</title>
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="https://s3-us-west-1.amazonaws.com/client-tier/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://s3-us-west-1.amazonaws.com/client-tier/fonts.css" rel="stylesheet" type="text/css" media="all" />
<script type = "text/javascript" src="JSScript.js"></script>

</head>
<body>
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="index.html">ShoutMS</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="http://shoutmyservice.com/" accesskey="1" title="">Home</a></li>
				<li><a href="http://shoutmyservice.com/Search.html" accesskey="2" title="">Search</a></li>
				<li><a href="http://shoutmyservice.com/Signup.html" accesskey="3" title="">Signup</a></li>
				<li><a href="http://shoutmyservice.com/FutureProjects.html" accesskey="4" title="">Future</a></li>
				<li><a href="http://shoutmyservice.com/ContactUs.html" accesskey="5" title="">Contact</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
							<div class="col-xs-6">
		<h1>Reviews</h1>
		<br><br>
		</div>
		<h3>Add a Review below</h3>
		<div class="col-xs-6">
		<form action="action_page.php">
  Review:<br>
  <input type="text" name="review" value="">
  <br><br>
  <input type="submit" value="Submit">
</form>
		<div class="col-xs-6">
</body>
</html>
	
	








	<?php
session_start();

$host = "dbserver.cgps93of9tq3.us-west-1.rds.amazonaws.com:3306";
$username = "root";
$password = "cmpe195a";
$dbname = "shoutmyservice";

$employeeID =  isset($_POST['getID']) ? $_POST['getID'] : '';
$_SESSION["getID"] = $employeeID;

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "SELECT Description FROM review ";
//$sql1 = "SELECT ReviewID FROM review";

//$sql = "SELECT Description FROM review
	//INNER JOIN employeereview ON employeereview.ReviewID = employee.ReviewID
	//WHERE employee.EmployeeID = '$employeeID'";

$sql = "SELECT description FROM review
INNER JOIN employeereview ON employeereview.EmployeeID = review.ReviewID
WHERE employeereview.ReviewID = review.ReviewID";

$result = $conn->query($sql);
//$result1 = $conn->query($sql1);

if ($result->num_rows > 0 ) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
       //echo "Review ID:" . $row["ReviewID"]. "<br>" "<br>" ;
        echo "Review:" . $row["Description"]. "<br>" ;

    
    }
} else {
    echo "0 results";
}
$conn->close();
?>